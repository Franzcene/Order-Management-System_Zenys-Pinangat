@extends('layouts.landing')

@section('content')
    <x-landing-header></x-landing-header>

    <div class="content dark-background">
        <h2 class="mx-5">PRODUCTS</h2>
    </div>

    <section id="menu" class="menu section">
        <div class="container section-title" data-aos="fade-up">
            <p><span>Check Our</span> <span class="description-title">Products</span></p>
        </div>

        <div class="container">
            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 menu-item">
                            <div class="col p-3 border">
                                <a href="#" class="glightbox">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/image-placeholder.webp') }}" class="menu-img img-fluid" alt="">
                                </a>
                                <h4>{{ $product->name }}</h4>
                                <p class="price"> ₱{{ number_format($product->price, 2) }} </p>
                                <p class="stock">Stock: {{ $product->quantity }}</p>

                                    <!-- Form to Add to Cart -->
                                    <form action="{{ route('cart.create') }}" method="POST" class="d-flex justify-content-around">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        <div class="row">
                                            <div class="col-md-8 col-6">
                                                <!-- Display a quantity input for the user -->
                                                <div class="d-flex justify-content-center">
                                                    <div class="quantity-control input-group d-flex justify-content-center align-items-center my-3">
                                                        <!-- Decrement Button -->
                                                        <button type="button" class="decrement btn btn-counter" data-product-id="{{ $product->id }}">-</button>

                                                        <!-- Quantity Input Field -->
                                                        <input type="number" name="quantity" id="quantity-{{ $product->id }}" class="quantity-input form-control form-control-sm" value="1" min="1" data-product-id="{{ $product->id }}">

                                                        <!-- Increment Button -->
                                                        <button type="button" class="increment btn btn-counter" data-product-id="{{ $product->id }}">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6 d-flex align-items-center justify-content-center">
                                                <!-- Add to Cart Button -->
                                                <div class="d-flex align-items-center">
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                            </div>
                        </div>
                    @endforeach
                </div><!-- End Product List -->
            </div><!-- End Tab Content -->
        </div>
    <div class="container"></div>
    </section><!-- /Menu Section -->

    <x-landing-footer></x-landing-footer>

    <script>
        // JavaScript to handle increment and decrement of the quantity input for each product
        document.querySelectorAll('.increment').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                const quantityInput = document.querySelector(`#quantity-${productId}`);
                quantityInput.value = parseInt(quantityInput.value) + 1;
            });
        });

        document.querySelectorAll('.decrement').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                const quantityInput = document.querySelector(`#quantity-${productId}`);
                if (parseInt(quantityInput.value) > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                }
            });
        });
    </script>

@endsection
