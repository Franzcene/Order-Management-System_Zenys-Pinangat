<x-app-layout>
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title">Order Details</h5>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
                    </div>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="order_id" class="form-label">Order ID</label>
                        <input type="text" class="form-control" id="order_id" value="{{ $order->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="user_name" class="form-label">User</label>
                        <input type="text" class="form-control" id="user_name" value="{{ $order->user->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" value="{{ $order->status == 'shipped' ? 'to ship' : $order->status }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="total_amount" class="form-label">Total Amount</label>
                        <input type="text" class="form-control" id="total_amount" value="{{ $order->total_amount }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <input type="text" class="form-control" id="payment_method" value="{{ $order->payment_method }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" disabled value="{{ $order->address }}">
                    </div>
                    <div class="mb-3">
                        <label for="order_date" class="form-label">Order Date</label>
                        <input type="text" class="form-control" id="order_date" value="{{ $order->created_at->format('F j, Y') }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="products" class="form-label">Products</label>
                        <table id="products" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
