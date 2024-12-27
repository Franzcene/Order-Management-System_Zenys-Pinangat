<x-app-layout>
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title">Messages List</h5>
                    <!-- Search Bar -->
                    <form method="GET" action="{{ route('messages') }}" class="d-flex">
                        <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control me-2" placeholder="Search by Name or Email">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Contacts Table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">
                                                <a href="{{ route('messages', ['sort_by' => 'created_at', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                                    Date {{ $sortBy === 'created_at' && $sortOrder === 'asc' ? '🔽' : '🔼' }}
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contacts as $contact)
                                        <tr>
                                            <th scope="row">{{ $contacts->firstItem() + $loop->index }}</th>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>{{ $contact->message }}</td>
                                            <td>{{ $contact->created_at->format('F d, Y') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Contacts Table -->
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
