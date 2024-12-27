<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->with('products')->get();
        return view('customer.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('products');

        return view('customer.orders.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('customer.orders.index')->with('success', 'Order deleted successfully');
    }

    public function create(Request $request)
    {
        $selectedItemIds = $request->input('selected_items');
        if (!$selectedItemIds) {
            return redirect()->route('cart.index')->with('error', 'Please select at least one item to checkout.');
        }

        // Fetch selected items
        $items = CartItem::whereIn('id', $selectedItemIds)->get();

        // Calculate the total price
        $totalPrice = $items->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout.create', compact('items', 'totalPrice'));
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'cancelled';
        $order->save();

        return redirect()->route('customer.orders.index')->with('success', 'Order cancelled successfully');
    }

    public function pending()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
                       ->where('status', 'pending')
                       ->with('products')
                       ->get();
        return view('customer.orders.pending', compact('orders'));
    }

    public function toShip()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
                       ->where('status', 'shipped')
                       ->with('products')
                       ->get();
        return view('customer.orders.to-ship', compact('orders'));
    }

    public function delivered()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
                       ->where('status', 'delivered')
                       ->with('products')
                       ->get();
        return view('customer.orders.received', compact('orders'));
    }

    public function cancelled()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
                       ->where('status', 'cancelled')
                       ->with('products')
                       ->get();
        return view('customer.orders.cancelled', compact('orders'));
    }
}
