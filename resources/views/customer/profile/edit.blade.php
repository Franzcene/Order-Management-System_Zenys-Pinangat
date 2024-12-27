@extends('layouts.landing')

@section('content')
    <x-landing-header> </x-landing-header>

    <div class="content dark-background">
        <h2 class="mx-5 text-white">Edit Profile</h2>
    </div>

    <div class="col-lg-5 mx-auto m-3">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('customer.profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @if ($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                        @if ($errors->has('phone'))
                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required>
                        @if ($errors->has('address'))
                            <div class="text-danger">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Role</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Customer</option>
                        </select>
                        @if ($errors->has('role_id'))
                            <div class="text-danger">{{ $errors->first('role_id') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>


    <x-landing-footer></x-landing-footer>
@endsection


