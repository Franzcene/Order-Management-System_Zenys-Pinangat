<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body {{ $attributes }}>
        @php
            $latestOrders = App\Models\Order::where('created_at', '>=', now()->subDay())->latest()->take(10)->get();
        @endphp

        <x-header :latest-orders="$latestOrders"></x-header>
        <x-sidebar></x-sidebar>

        <main id="main" class="main">
            <section class="section">
                <div class="row">
                    {{ $slot }}
                </div>
            </section>
        </main>

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '{{ session("success") }}',
                        position: 'top-end',
                        color: "#ffffff",
                        background: "#0d6efd",
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            </script>
        @endif

        @livewireScripts
    </body>
</html>
