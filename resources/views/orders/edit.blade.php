<x-app-layout>
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
                </div>
                <h5 class="card-title">Edit Order</h5>
                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>pending</option>
                            <option value="shipped" {{ old('status', $order->status) == 'shipped' ? 'selected' : '' }}>to ship</option>
                            <option value="delivered" {{ old('status', $order->status) == 'delivered' ? 'selected' : '' }}>delivered</option>
                            <option value="canceled" {{ old('status', $order->status) == 'canceled' ? 'selected' : '' }}>canceled</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-control" id="payment_method" name="payment_method" required>
                            <option value="cod" {{ old('payment_method', $order->payment_method) == 'cod' ? 'selected' : '' }}>Cash on Delivery</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $order->address) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="products" class="form-label">Products</label>
                        @foreach($products as $product)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $product->id }}" id="product_{{ $product->id }}" name="product_ids[]" {{ in_array($product->id, $order->products->pluck('id')->toArray()) ? 'checked' : '' }}>
                                <label class="form-check-label" for="product_{{ $product->id }}">
                                    {{ $product->name }} ({{ $product->price }})
                                </label>
                                <input type="number" class="form-control mt-2" id="quantity_{{ $product->id }}" name="quantities[{{ $product->id }}]" placeholder="Quantity" min="1" value="{{ $order->products->find($product->id)->pivot->quantity ?? 1 }}">
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Update Order</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
