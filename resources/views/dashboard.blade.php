<x-app-layout>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
<div class="col-xxl-6 col-md-6">
    <div class="card info-card sales-card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" id="salesTab" role="tablist">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>
                <li role="presentation">
                    <button class="nav-link active w-100 text-start ps-2 py-1" id="salesToday-tab" data-bs-toggle="tab" data-bs-target="#salesToday" type="button" role="tab" aria-controls="salesToday" aria-selected="true">Today</button>
                </li>
                <li role="presentation">
                    <button class="nav-link w-100 text-start ps-2 py-1" id="salesMonth-tab" data-bs-toggle="tab" data-bs-target="#salesMonth" type="button" role="tab" aria-controls="salesMonth" aria-selected="false">This Month</button>
                </li>
                <li role="presentation">
                    <button class="nav-link w-100 text-start ps-2 py-1" id="salesYear-tab" data-bs-toggle="tab" data-bs-target="#salesYear" type="button" role="tab" aria-controls="salesYear" aria-selected="false">This Year</button>
                </li>
            </ul>
        </div>
        <div class="card-body tab-content" id="salesTabContent">
            <!-- Today Tab -->
            <div class="tab-pane fade show active" id="salesToday" role="tabpanel" aria-labelledby="salesToday-tab">
                <h5 class="card-title">Sales <span>| Today</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ number_format($salesToday, 2) }}</h6> <!-- Displaying sales for today -->

                    </div>
                </div>
            </div>
            <!-- This Month Tab -->
            <div class="tab-pane fade" id="salesMonth" role="tabpanel" aria-labelledby="salesMonth-tab">
                <h5 class="card-title">Sales <span>| This Month</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ number_format($salesMonth, 2) }}</h6> <!-- Displaying sales for this month -->

                    </div>
                </div>
            </div>
            <!-- This Year Tab -->
            <div class="tab-pane fade" id="salesYear" role="tabpanel" aria-labelledby="salesYear-tab">
                <h5 class="card-title">Sales <span>| This Year</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ number_format($salesYear, 2) }}</h6> <!-- Displaying sales for this year -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Sales Card -->


                    <!-- Customers Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" id="customersTab" role="tablist">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li role="presentation">
                                    <button class="nav-link w-100 text-start ps-2 py-1" id="customersToday-tab" data-bs-toggle="tab" data-bs-target="#customersToday" type="button" role="tab" aria-controls="customersToday" aria-selected="false">Today</button>
                                </li>
                                <li role="presentation">
                                    <button class="nav-link w-100 text-start ps-2 py-1" id="customersMonth-tab" data-bs-toggle="tab" data-bs-target="#customersMonth" type="button" role="tab" aria-controls="customersMonth" aria-selected="false">This Month</button>
                                </li>
                                <li role="presentation">
                                    <button class="nav-link active w-100 text-start ps-2 py-1" id="customersYear-tab" data-bs-toggle="tab" data-bs-target="#customersYear" type="button" role="tab" aria-controls="customersYear" aria-selected="true">This Year</button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body tab-content" id="customersTabContent">
                            <!-- Today Tab -->
                            <div class="tab-pane fade" id="customersToday" role="tabpanel" aria-labelledby="customersToday-tab">
                                <h5 class="card-title">Customers <span>| Today</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $customersToday }}</h6>

                                    </div>
                                </div>
                            </div>
                            <!-- This Month Tab -->
                            <div class="tab-pane fade" id="customersMonth" role="tabpanel" aria-labelledby="customersMonth-tab">
                                <h5 class="card-title">Customers <span>| This Month</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $customersThisMonth }}</h6>

                                    </div>
                                </div>
                            </div>
                            <!-- This Year Tab -->
                            <div class="tab-pane fade show active" id="customersYear" role="tabpanel" aria-labelledby="customersYear-tab">
                                <h5 class="card-title">Customers <span>| This Year</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $customersThisYear }}</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Customers Card -->


                    <!-- Recent Order -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Recent Order</h5>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentSales as $sale)
                                            <tr>
                                                <th scope="row"><a href="#">{{ $sale->id }}</a></th>
                                                <td>{{ $sale->user->name }}</td>
                                                <td>
                                                    @foreach($sale->products as $product)
                                                        <span>{{ $product->name }}{{ !$loop->last ? ',' : '' }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($sale->products as $product)
                                                        <span>₱{{ $product->price }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <span class="badge bg-{{ $sale->status == 'delivered' ? 'success' : ($sale->status == 'shipped' ? 'info' : ($sale->status == 'pending' ? 'warning' : 'danger')) }}">
                                                        {{ $sale->status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Activity</h5>
                        <div class="activity">
                            @foreach($latestOrders as $order)
                                <div class="activity-item d-flex">
                                    <div class="activite-label">
                                        {{ $order->created_at->diffForHumans(null, true) }}
                                    </div>
                                    <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                                    <div class="activity-content">
                                        {{ $order->user->name ?? 'Unknown Customer' }}
                                        placed an order for
                                        {{ $order->products->first()->name ?? 'Unknown Product' }},
                                        with status {{ ucfirst($order->status) }}
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div><!-- End Recent Activity -->
            </div>

        </div>
    </section>
</x-app-layout>
