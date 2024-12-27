<x-app-layout>
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="m-0">Latest Orders Notifications</h5>
            </div>
            <div class="card-body p-3">
                @forelse ($latestOrders as $order)
                    <div class="notification-item mb-2 p-2 border rounded shadow-sm bg-light d-flex align-items-center justify-content-between" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <div>
                            <span class="font-weight-bold">Order #{{ $order->id }} -</span>
                            <span>By: {{ $order->user->name ?? 'Guest' }} -</span>
                            <span class="text-success">Status: {{ ucfirst($order->status) }} -</span>
                            <span class="text-muted">{{ $order->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-primary">View</a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">No notifications found at the moment</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
