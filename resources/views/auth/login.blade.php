<x-guest-layout>
    <!-- Logo -->
    <div class="d-flex justify-content-center py-4">
        <a href="/" class="logo d-flex align-items-center w-auto">
            <img src="#" alt="">
            <span class="d-none d-lg-block">Zenys Pinangat</span>
        </a>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                <p class="text-center small">Enter your email & password to login</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                @csrf

                <!-- Email Address -->
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" id="email" :value="old('email')" required autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email')"/>
                    </div>
                </div>

                <!-- Password -->
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group has-validation">
                        <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')"/>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember_me">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>
                </div>

                <div class="col-12">
                    <x-primary-button> {{ __('Log in') }} </x-primary-button>
                </div>

                <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
