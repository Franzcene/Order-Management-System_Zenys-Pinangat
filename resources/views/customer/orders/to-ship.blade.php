@extends('layouts.landing')

@section('content')
    <x-landing-header> </x-landing-header>

    <div class="content dark-background">
        <h2 class="mx-5 text-white">ORDER</h2>
    </div>



    <nav class="orderstatus container">
        <ul class="d-flex flex-wrap justify-content-evenly p-3">
            <li><a href="/customer/orders">All</a></li>
            <li><a href="/customer/orders/pending">Pending</a></li>
            <li><a href="/customer/orders/to-ship" style="color: #ce1212;">To Ship</a></li>
            <li><a href="/customer/orders/delivered">Received</a></li>
            <li><a href="/customer/orders/cancelled">Cancelled</a></li>
        </ul>

    </nav>



    <div class="container">
        @if($orders->isEmpty())
            <div class="container p-5 my-5">
                <div class="p-5 my-4 border border-dark text-center">
                    <h1>You don't have any shipped orders</h1>
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
                <div class="d-flex justify-content-end me-5 pt-2">
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

