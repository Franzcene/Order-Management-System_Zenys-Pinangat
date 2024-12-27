<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderProduct;

class CartController extends Controller
{
    public function index()
    {
        // Get the current cart (create one if it doesn't exist)
        $cart = $this->getCart();

        // Load cart items along with the product details (name, price)
        $cartItems = $cart->cartItems()->with('product')->get();

        // Calculate the total price of the cart
        $total = $cartItems->sum(function($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });

        // Pass the cart items and total price to the view
        return view('carts.index', compact('cart', 'cartItems', 'total'));
    }

    public function create(Request $request)
    {
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Get the current cart (create one if it doesn't exist)
    $cart = $this->getCart();

    // Find the product being added
    $product = Product::findOrFail($request->product_id);

    // Check if the product already exists in the cart
    $cartItem = CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $product->id)
                        ->first();

    if ($cartItem) {
        // If the item already exists, update the quantity
        $cartItem->quantity += $request->quantity;
        $cartItem->save();
    } else {
        // Otherwise, create a new cart item
        $cart->cartItems()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
        ]);
    }

    return redirect()->route('customer.products.index')->with('success', 'Product added to cart.');
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

    public function placeOrder(Request $request)
    {
    // Get the current cart
    $cart = $this->getCart();

    // Get cart items with product details
    $cartItems = $cart->cartItems()->with('product')->get();

    // Calculate the total amount
    $totalAmount = $cartItems->sum(function ($cartItem) {
        return $cartItem->quantity * $cartItem->product->price;
    });

    // Create the order
    $order = Order::create([
        'user_id' => Auth::id(),
        'total_amount' => $totalAmount,
        'status' => 'pending',
    ]);

    // Prepare the pivot data (product_id => quantity)
    $pivotData = $cartItems->mapWithKeys(function ($cartItem) {
        return [
            $cartItem->product_id => [
                'quantity' => $cartItem->quantity
            ]
        ];
    })->toArray();

    // Attach products to the order with quantity using the pivot table
    $order->products()->attach($pivotData);

    // After the order is placed, clear the cart
    $cart->cartItems()->delete();

    // Optionally, clear session cart if the user is a guest
    if (!Auth::check()) {
        session()->forget('cart_id');
    }

    return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
}

public function updateQuantity(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Get the current cart
    $cart = $this->getCart();

    // Find the cart item
    $cartItem = CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $request->product_id)
                        ->firstOrFail();

    // Update the quantity
    $cartItem->quantity = $request->quantity;
    $cartItem->save();

    // If the request is AJAX, return a JSON response
    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
    }

    // If not an AJAX request, redirect back
    return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
}

public function destroy($cartItemId, Request $request)
{
    // Find the cart item using the passed cartItemId
    $cartItem = CartItem::findOrFail($cartItemId);

    // Delete the cart item
    $cartItem->delete();

    // If the request is AJAX, return a JSON response
    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Product removed from cart']);
    }

    // If not an AJAX request, redirect back to the cart page
    return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
}

}
