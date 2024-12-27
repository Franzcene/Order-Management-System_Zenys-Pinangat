@php
use Carbon\Carbon;
@endphp

<x-app-layout>
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title">Monthly Inventory Material</h5>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMaterialModal">
                            Add Material
                        </button>
                    </div>
                </div>

                <!-- Create Material Modal -->
                <div class="modal fade" id="createMaterialModal" tabindex="-1" aria-labelledby="createMaterialModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createMaterialModalLabel">Create Material</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('materials.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    <div class="col-md-12 position-relative">
                                        <label for="name" class="form-label">Material Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                        <div class="invalid-tooltip">
                                            Please provide a material name.
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <label for="unit" class="form-label">Unit</label>
                                        <input type="text" class="form-control" id="unit" name="unit" required>
                                        <div class="invalid-tooltip">
                                            Please provide a unit.
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <label for="unit_cost" class="form-label">Unit Cost</label>
                                        <input type="number" class="form-control" id="unit_cost" name="unit_cost" step="0.01" required>
                                        <div class="invalid-tooltip">
                                            Please provide a valid unit cost.
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                                        <div class="invalid-tooltip">
                                            Please provide a valid quantity.
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <label for="created_at" class="form-label">Created At</label>
                                        <input type="date" class="form-control" id="created_at" name="created_at" value="{{ date('Y-m-d') }}" required>
                                        <div class="invalid-tooltip">
                                            Please select a creation date.
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Create Material</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Create Material Modal -->

                <!-- Filter by Month and Year -->
                <form action="{{ route('materials.index') }}" method="GET" class="mb-4">
                    <div class="d-flex">
                        <select name="month" class="form-select mx-2" aria-label="Select Month">
                            <option value="1" {{ $month == 1 ? 'selected' : '' }}>January</option>
                            <option value="2" {{ $month == 2 ? 'selected' : '' }}>February</option>
                            <option value="3" {{ $month == 3 ? 'selected' : '' }}>March</option>
                            <option value="4" {{ $month == 4 ? 'selected' : '' }}>April</option>
                            <option value="5" {{ $month == 5 ? 'selected' : '' }}>May</option>
                            <option value="6" {{ $month == 6 ? 'selected' : '' }}>June</option>
                            <option value="7" {{ $month == 7 ? 'selected' : '' }}>July</option>
                            <option value="8" {{ $month == 8 ? 'selected' : '' }}>August</option>
                            <option value="9" {{ $month == 9 ? 'selected' : '' }}>September</option>
                            <option value="10" {{ $month == 10 ? 'selected' : '' }}>October</option>
                            <option value="11" {{ $month == 11 ? 'selected' : '' }}>November</option>
                            <option value="12" {{ $month == 12 ? 'selected' : '' }}>December</option>
                        </select>

                        <select name="year" class="form-select mx-2" aria-label="Select Year">
                            <option value="{{ Carbon::now()->year }}" {{ $year == Carbon::now()->year ? 'selected' : '' }}>{{ Carbon::now()->year }}</option>
                            <option value="{{ Carbon::now()->year - 1 }}" {{ $year == Carbon::now()->year - 1 ? 'selected' : '' }}>{{ Carbon::now()->year - 1 }}</option>
                            <option value="{{ Carbon::now()->year - 2 }}" {{ $year == Carbon::now()->year - 2 ? 'selected' : '' }}>{{ Carbon::now()->year - 2 }}</option>
                            <!-- Add more years if necessary -->
                        </select>

                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Materials Table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Unit Cost</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total Cost</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($materials as $material)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $material->name }}</td>
                                            <td>{{ $material->unit }}</td>
                                            <td>{{ $material->unit_cost }}</td>
                                            <td>{{ $material->quantity }}</td>
                                            <td>{{$material->unit_cost * $material->quantity}}</td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMaterialModal{{ $material->id }}">Edit</a>

                                                <!-- Edit Material Modal -->
                                                <div class="modal fade" id="editMaterialModal{{ $material->id }}" tabindex="-1" aria-labelledby="editMaterialModalLabel{{ $material->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editMaterialModalLabel{{ $material->id }}">Edit Material</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('materials.update', $material->id) }}" method="POST" class="row g-3 needs-validation" novalidate>
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="col-md-12 position-relative">
                                                                        <label for="name{{ $material->id }}" class="form-label">Material Name</label>
                                                                        <input type="text" class="form-control" id="name{{ $material->id }}" name="name" value="{{ $material->name }}" required>
                                                                        <div class="invalid-tooltip">
                                                                            Please provide a material name.
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 position-relative">
                                                                        <label for="unit{{ $material->id }}" class="form-label">Unit</label>
                                                                        <input type="text" class="form-control" id="unit{{ $material->id }}" name="unit" value="{{ $material->unit }}" required>
                                                                        <div class="invalid-tooltip">
                                                                            Please provide a unit.
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 position-relative">
                                                                        <label for="unit_cost{{ $material->id }}" class="form-label">Unit Cost</label>
                                                                        <input type="number" class="form-control" id="unit_cost{{ $material->id }}" name="unit_cost" step="0.01" value="{{ $material->unit_cost }}" required>
                                                                        <div class="invalid-tooltip">
                                                                            Please provide a valid unit cost.
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 position-relative">
                                                                        <label for="quantity{{ $material->id }}" class="form-label">Quantity</label>
                                                                        <input type="number" class="form-control" id="quantity{{ $material->id }}" name="quantity" value="{{ $material->quantity }}" required>
                                                                        <div class="invalid-tooltip">
                                                                            Please provide a valid quantity.
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <button type="submit" class="btn btn-primary">Update Material</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Edit Material Modal -->

                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteMaterialModal{{ $material->id }}">
                                                    Delete
                                                </button>
                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteMaterialModal{{ $material->id }}" tabindex="-1" aria-labelledby="deleteMaterialModalLabel{{ $material->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteMaterialModalLabel{{ $material->id }}">Confirm Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete the material "{{ $material->name }}"?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline;">
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
                            <!-- End Materials Table -->

                            <div class="d-flex justify-content-center">
                                {{ $materials->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
