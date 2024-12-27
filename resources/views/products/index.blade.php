<x-app-layout>
<div class="col-lg-12 mx-auto">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
                <h5 class="card-title">Products List</h5>
                <div class="d-flex flex-column flex-md-row align-items-center mb-2 mb-md-0">
                    <form action="{{ route('products.index') }}" method="GET" class="d-flex mb-2 mb-md-0 me-md-2">
                        <input type="text" name="search" class="form-control me-2" placeholder="Search Products..." value="{{ $search }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal">
                        Add Product
                    </button>
                </div>
            </div>

            <!-- Create Product Modal -->
            <div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createProductModalLabel">Create Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('products.store') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="col-md-12 position-relative">
                                    <label for="image" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <div class="invalid-tooltip">
                                        Please provide a product image.
                                    </div>
                                </div>
                                <div class="col-md-12 position-relative">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    <div class="invalid-tooltip">
                                        Please provide a product name.
                                    </div>
                                </div>
                                <div class="col-md-12 position-relative">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                    <div class="invalid-tooltip">
                                        Please provide a description.
                                    </div>
                                </div>
                                <div class="col-md-12 position-relative">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid price.
                                    </div>
                                </div>
                                <div class="col-md-12 position-relative">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                                    <div class="invalid-tooltip">
                                        Please provide a quantity.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Create Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Create Product Modal -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Products Table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">Edit</a>

                                            <!-- Edit Product Modal -->
                                            <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Edit Product</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="col-md-12 position-relative">
                                                                    <label for="image" class="form-label">Product Image</label>
                                                                    <input type="file" class="form-control" id="image" name="image">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="name{{ $product->id }}" class="form-label">Product Name</label>
                                                                    <input type="text" class="form-control" id="name{{ $product->id }}" name="name" value="{{ $product->name }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="description{{ $product->id }}" class="form-label">Description</label>
                                                                    <textarea class="form-control" id="description{{ $product->id }}" name="description" rows="3" required>{{ $product->description }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="price{{ $product->id }}" class="form-label">Price</label>
                                                                    <input type="number" class="form-control" id="price{{ $product->id }}" name="price" step="0.01" value="{{ $product->price }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="quantity{{ $product->id }}" class="form-label">Quantity</label>
                                                                    <input type="number" class="form-control" id="quantity{{ $product->id }}" name="quantity" value="{{ $product->quantity }}" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Edit Product Modal -->

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteProductModal{{ $product->id }}">
                                                Delete
                                            </button>
                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade" id="deleteProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteProductModalLabel{{ $product->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteProductModalLabel{{ $product->id }}">Confirm Delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the product "{{ $product->name }}"?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
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
                        <!-- End Default Table -->

                        <div class="d-flex justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
