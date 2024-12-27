<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\CartItem;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // Get selected item IDs from the request
        $selectedItemIds = explode(',', $request->input('selected_items'));

        // Get the current cart (create one if it doesn't exist)
        $cart = $this->getCart();

        // Load the cart items that are selected by their IDs
        $cartItems = $cart->cartItems()->whereIn('id', $selectedItemIds)->with('product')->get();

        // Optionally, you can calculate the total price for the selected items
        $total = $cartItems->sum(function($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });

        // Pass the selected cart items and the total to the checkout view
        return view('checkout.index', compact('cartItems', 'total'));
    }


    public function processCheckout(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'selected_items' => 'required|string',
            'address' => 'required|string',
            'payment_method' => 'required|string|in:cod', // Add other payment methods if applicable
        ]);

        // Get the selected item IDs
        $selectedItemIds = explode(',', $request->input('selected_items'));

        // Get the current cart
        $cart = $this->getCart();

        if ($cart->cartItems->isEmpty() || empty($selectedItemIds)) {
            return redirect()->route('cart.index')->with('error', 'No items selected for checkout.');
        }

        // Retrieve selected cart items
        $cartItems = $cart->cartItems()->whereIn('id', $selectedItemIds)->with('product')->get();

        // Calculate total amount
        $totalAmount = $cartItems->sum(function ($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'address' => $request->address,
        ]);

        // Prepare pivot data
        $pivotData = $cartItems->mapWithKeys(function ($cartItem) {
            return [$cartItem->product_id => ['quantity' => $cartItem->quantity]];
        })->toArray();

        // Attach products
        $order->products()->attach($pivotData);

        // Deduct product quantities
        // foreach ($cartItems as $cartItem) {
        //     $product = $cartItem->product;
        //     $product->quantity -= $cartItem->quantity;
        //     $product->save();
        // }

        // Remove selected items from the cart
        $cart->cartItems()->whereIn('id', $selectedItemIds)->delete();

        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
    }



    protected function getCart()
    {
        // Check if the user is logged in and retrieve their cart
        if (Auth::check()) {
            // If the user is logged in, retrieve their cart or create a new one
            return Cart::firstOrCreate(['user_id' => Auth::id()]);
        }

        // If the user is not logged in, you could store the cart in session
        // Here we will use session-based cart for guests
        $cartId = session()->get('cart_id');

        if (!$cartId) {
            $cart = Cart::create(); // Create a new cart for the guest
            session()->put('cart_id', $cart->id);
            return $cart;
        }

        return Cart::findOrFail($cartId); // Retrieve the existing cart for the guest
    }

}
