<x-app-layout>
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
                    <h5 class="card-title mb-3 mb-md-0">Orders List</h5>
                    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center mb-3 mb-md-0">
                        <form action="{{ route('orders.index') }}" method="GET" class="d-flex flex-column flex-md-row align-items-start align-items-md-center me-md-2">
                            <input type="text" name="search" class="form-control mb-2 mb-md-0 me-md-2" placeholder="Search by customer" value="{{ request('search') }}">
                            <select name="status" class="form-select mb-2 mb-md-0 me-md-2">
                                <option value="">All Statuses</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>To Ship</option>
                                <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                        <a href="{{ route('orders.create') }}" class="btn btn-primary mt-2 mt-md-0">Add Order</a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Orders Table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User</th>
                                            <th scope="col">
                                                <a href="{{ route('orders.index', ['sort' => 'status', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                                                    Status
                                                    @if(request('sort') === 'status')
                                                        <i class="bi bi-chevron-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                                    @endif
                                                </a>
                                            </th>
                                            <th scope="col">Total</th>
                                            <th scope="col">
                                                <a href="{{ route('orders.index', ['sort' => 'created_at', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                                                    Order Date
                                                    @if(request('sort') === 'created_at')
                                                        <i class="bi bi-chevron-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                                    @endif
                                                </a>
                                            </th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $order->id }}</th>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->status == 'shipped' ? 'to ship' : $order->status }}</td>
                                            <td>{{ $order->total_amount }}</td>
                                            <td>{{ $order->created_at->format('F j, Y') }}</td>
                                            <td>
                                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Show</a>
                                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Orders Table -->

                            <div class="d-flex justify-content-center">
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
