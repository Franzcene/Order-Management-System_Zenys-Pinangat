<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class OrderController extends Controller
{
    // Display a listing of the orders
    public function index(Request $request)
    {
        $query = Order::with('user');

        // Search by customer name
        if ($request->has('search') && $request->search !== null) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        // Search by status
        if ($request->has('status') && $request->status !== null) {
            $query->where('status', $request->status);
        }

        // Sort by date or status
        if ($request->has('sort') && in_array($request->sort, ['created_at', 'status'])) {
            $direction = $request->has('direction') && $request->direction === 'desc' ? 'desc' : 'asc';
            $query->orderBy($request->sort, $direction);
        } else {
            $query->latest(); // Default sorting
        }

        $orders = $query->paginate(10);

        return view('orders.index', compact('orders'));
    }


    // Show the form for creating a new order
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('orders.create', compact(['products', 'users']));
    }

    // Store a newly created order in storage
public function store(Request $request)
{
    $order = new Order();
    $order->user_id = $request->input('user_id');
    $order->status = $request->input('status');
    $order->payment_method = $request->input('payment_method');
    $order->address = $request->input('address');

    $totalAmount = 0;
    $productIds = $request->input('product_ids', []);
    $quantities = $request->input('quantities', []);

    $productQuantities = [];

    foreach ($productIds as $productId) {
        $product = Product::find($productId);
        $quantity = isset($quantities[$productId]) ? $quantities[$productId] : 1;
        $totalAmount += $product->price * $quantity;
        $productQuantities[$productId] = ['quantity' => $quantity];
    }

    $order->total_amount = $totalAmount;
    $order->save();

    $order->products()->attach($productQuantities);

    return redirect()->route('orders.index')->with('success', 'Order added successfully.');
}

    // Display the specified order
    public function show($id)
    {
        $order = Order::with('products')->find($id);
        $users = User::all();
        $products = Product::all();
        return view('orders.show', compact('order', 'users', 'products'));
    }

    // Show the form for editing the specified order

public function edit(Order $order)
{
    $products = Product::all();
    return view('orders.edit', compact('order', 'products'));
}

    // Update the specified order in storage
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|max:255',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        $order->status = $request->input('status');

        $totalAmount = 0;
        $productIds = $request->input('product_ids', []);
        $quantities = $request->input('quantities', []);

        $productQuantities = [];

        foreach ($productIds as $productId) {
            $product = \App\Models\Product::find($productId);
            $quantity = isset($quantities[$productId]) ? $quantities[$productId] : 1;
            $totalAmount += $product->price * $quantity;
            $productQuantities[$productId] = ['quantity' => $quantity];
        }

        $order->total_amount = $totalAmount;
        $order->save();

        $order->products()->sync($productQuantities);

        // Reduce the quantity of products if status is changed to delivered
        if ($order->status === 'delivered') {
            foreach ($productQuantities as $productId => $details) {
                $product = \App\Models\Product::find($productId);
                $product->quantity -= $details['quantity'];
                $product->save();
            }
        }

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Remove the specified order from storage
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->products()->detach();
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
