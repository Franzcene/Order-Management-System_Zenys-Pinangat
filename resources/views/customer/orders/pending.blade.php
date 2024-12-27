@extends('layouts.landing')

@section('content')
    <x-landing-header> </x-landing-header>

    <div class="content dark-background">
        <h2 class="mx-5 text-white">ORDER</h2>
    </div>



    <nav class="orderstatus container">
        <ul class="d-flex flex-wrap justify-content-evenly p-3">
            <li><a href="/customer/orders">All</a></li>
            <li><a href="/customer/orders/pending" style="color: #ce1212;">Pending</a></li>
            <li><a href="/customer/orders/to-ship">To Ship</a></li>
            <li><a href="/customer/orders/delivered">Received</a></li>
            <li><a href="/customer/orders/cancelled">Cancelled</a></li>
        </ul>

    </nav>



    <div class="container">
        @if($orders->isEmpty())
            <div class="container p-5 my-5">
                <div class="p-5 my-4 border border-dark text-center">
                    <h1>You don't have any pending orders</h1>
                </div>
            </div>
        @else


        @foreach($orders as $order)
        <div class="border mb-4">
                        @foreach($order->products as $product)

                            <div class="d-flex justify-content-between border p-2">
                                <div class="d-flex align-items-center justify-content-start ms-3">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/image-placeholder.webp') }}" class="img-fluid border me-2" alt="" width="100" height="100">
                                    <div>
                                        <p>{{ $product->name }}</p>
                                        <p>x{{ $product->pivot->quantity }}</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center me-3">
                                    <p>PHP {{ $product->price }}</p>
                                </div>
                            </div>

                        @endforeach
                        <div class="d-flex justify-content-between mx-3 mx-sm-5 py-2 align-items-center">
                            <!-- Cancel Confirmation Modal -->
                            <div class="modal fade" id="cancelModal{{ $order->id }}" tabindex="-1" aria-labelledby="cancelModalLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cancelModalLabel{{ $order->id }}">Cancel Order</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to cancel this order?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Cancel Order</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Trigger Modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal{{ $order->id }}">
                                Cancel
                            </button>
                            <div>
                                <p class="m-0">Order Total: <strong>PHP {{ $order->products->sum(function($product) { return $product->price * $product->pivot->quantity; }) }}</strong></p>
                                <p class="m-0">Address: <strong>{{ $order->address }}</strong></p>
                                <p >Order Date: <strong>{{ $order->created_at->format('F j, Y') }}</strong></p>
                            </div>

                        </div>
        </div>
        @endforeach


        @endif
    </div>

    <x-landing-footer></x-landing-footer>
@endsection

