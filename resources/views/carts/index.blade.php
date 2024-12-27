@extends('layouts.landing')

@section('content')
<x-landing-header>
</x-landing-header>


    <div class="content dark-background">
        <h2 class="mx-5 text-white">CART</h2>
    </div>

    @if($cartItems->isEmpty())
        <div class="container p-5 my-5">
            <div class="p-5 my-5 border border-dark text-center">
                <h1>Your cart is empty</h1>
            </div>
        </div>
    @else
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <!-- Products Table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col" class="text-center">Unit Price</th>
                                <th scope="col" class="text-center" style="width: 200px;">Quantity</th>
                                <th scope="col" class="text-center">Total Price</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                            <tr>
                                <td scope="col">
                                    <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="select-item">
                                    <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : asset('images/image-placeholder.webp') }}" class="img-fluid" alt="" width="100" height="100">
                                    {{ $item->product->name }}
                                </td>
                                <td scope="col" class="text-center align-middle">PHP {{ number_format($item->product->price, 2) }}</td>
                                <td scope="col" class="align-middle">
                                    <form action="{{ route('cart.updateQuantity') }}" method="POST" data-product-id="{{ $item->product->id }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                        <div class="d-flex justify-content-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <!-- Decrement Button -->
                                                <button type="button" class="decrement btn" data-product-id="{{ $item->product->id }}">-</button>
                                                <!-- Quantity Input Field -->
                                                <input type="number" class="text-center" name="quantity" id="quantity-{{ $item->product->id }}" class="form-control" value="{{ $item->quantity }}" min="1" data-product-id="{{ $item->product->id }}">
                                                <!-- Increment Button -->
                                                <button type="button" class="increment btn" data-product-id="{{ $item->product->id }}">+</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td scope="col" class="text-center align-middle">PHP {{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                <td scope="col" class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCartModal{{ $item->id }}">Delete</button>
                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteCartModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteCartModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteCartModalLabel{{ $item->id }}">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete the item "{{ $item->product->name }}"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete Confirmation Modal -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Products Table -->
            </div>
        </div>

        <!-- Checkout Button (Submit Form with Selected Items) -->
        <div class="card">
            <div class="card-body d-flex justify-content-end">
                <form action="{{ route('checkout.index') }}" method="post">
                    @csrf
                    <input type="hidden" name="selected_items" id="selected_items" value="">
                    <button type="submit" class="btn btn-primary">Checkout</button>
                </form>
            </div>
        </div>
    </div>
    @endif

    <!-- Include this JavaScript at the bottom of your page -->
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.btn-primary').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent the default form submission
    let selectedItems = [];

    // Loop through all checkboxes and collect the checked ones
    document.querySelectorAll('.select-item:checked').forEach(function(checkbox) {
        selectedItems.push(checkbox.value); // Collect the item id
    });

    console.log(selectedItems);

    // Set the selected items in the hidden input field
    document.getElementById('selected_items').value = selectedItems.join(',');

    // Now submit the form
    this.closest('form').submit();
});

            // Handle Decrement button click
            document.querySelectorAll('.decrement').forEach(function(button) {
                button.addEventListener('click', function() {
                    var productId = this.dataset.productId;
                    var inputField = document.querySelector('#quantity-' + productId);
                    var quantity = parseInt(inputField.value) || 1;

                    // Decrement the quantity if it's greater than 1
                    if (quantity > 1) {
                        inputField.value = quantity - 1;
                        updateQuantity(productId, inputField.value);
                    }
                });
            });

            // Handle Increment button click
            document.querySelectorAll('.increment').forEach(function(button) {
                button.addEventListener('click', function() {
                    var productId = this.dataset.productId;
                    var inputField = document.querySelector('#quantity-' + productId);
                    var quantity = parseInt(inputField.value) || 1;

                    // Increment the quantity
                    inputField.value = quantity + 1;
                    updateQuantity(productId, inputField.value);
                });
            });

            // Function to update the quantity in the backend
            function updateQuantity(productId, quantity) {
                var form = document.querySelector('form[data-product-id="' + productId + '"]');
                var csrfToken = document.querySelector('input[name="_token"]').value;

                // Update the quantity input and submit the form
                form.querySelector('input[name="quantity"]').value = quantity;

                // Submit the form via AJAX to avoid reloading the page
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Cart updated successfully');
                    }
                })
                .catch(error => {
                    console.error('Error updating cart:', error);
                });
            }
        });
    </script>
    <x-landing-footer></x-landing-footer>
@endsection
