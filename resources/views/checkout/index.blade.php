@extends('layouts.landing')

@section('content')
<x-landing-header></x-landing-header>

<div class="content dark-background">
    <h2 class="mx-5 text-white">Checkout</h2>
</div>

<div class="container mt-4">
    <div class="mt-4">
        @if($cartItems->isNotEmpty())
        <div class="card">
            <div class="card-body d-flex justify-content-start align-items-center">
                Delivery Address:&nbsp<strong id="currentAddress">{{ Auth::user()->address }}</strong>
                <a href="#" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editAddressModal">Edit</a>
            </div>
        </div>
        @endif

        <!-- Edit Address Modal -->
        <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAddressModalLabel">Edit Delivery Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editAddressForm">
                            <div class="mb-3">
                                <label for="address" class="form-label">New Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('editAddressForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var newAddress = document.getElementById('address').value;
        document.getElementById('currentAddress').textContent = newAddress;
        document.getElementById('checkoutAddress').value = newAddress; // Update the hidden input
        var modal = bootstrap.Modal.getInstance(document.getElementById('editAddressModal'));
        modal.hide();
    });
    </script>

    <div class="card">
        <div class="card-body">
            @if($cartItems->isEmpty())
            <div class="container p-5 my-5">
                <div class="p-5 my-5 border border-dark text-center">
                    <h1>No products selected for checkout</h1>
                </div>
            </div>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col" class="text-center">Unit Price</th>
                                <th scope="col" class="text-center">Quantity</th>
                                <th scope="col" class="text-center">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : asset('images/image-placeholder.webp') }}" class="img-fluid" alt="" width="100" height="100">
                                    {{ $item->product->name }}
                                </td>
                                <td class="text-center align-middle">PHP {{ number_format($item->product->price, 2) }}</td>
                                <td class="text-center align-middle">{{ $item->quantity}}</td>
                                <td class="text-center align-middle">PHP {{ number_format($item->product->price * $item->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    @if($cartItems->isNotEmpty())
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Payment Options</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                <label class="form-check-label" for="cod">
                    Cash on Delivery
                </label>
            </div>
        </div>
    </div>
    @endif

    @if($cartItems->isNotEmpty())
    <!-- Checkout Form -->
    <div class="card">
        <div class="card-body d-flex justify-content-end align-items-center">
            <div class="mx-2">
                <h4>Total Price: PHP {{ number_format($total, 2) }}</h4>
            </div>
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <input type="hidden" name="selected_items" value="{{ request()->input('selected_items') }}">
                <input type="hidden" id="checkoutAddress" name="address" value="{{ Auth::user()->address }}">
                <input type="hidden" name="payment_method" value="cod">
                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>
    </div>
    @endif
</div>

<x-landing-footer></x-landing-footer>
@endsection
