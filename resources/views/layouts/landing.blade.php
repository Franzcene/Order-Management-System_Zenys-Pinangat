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
        @vite(['resources/css/landing.css', 'resources/js/landing.js'])
    </head>
    <body>
        <main>
                <div>
                    @yield('content')
                </div>
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
                        timer: 2000,
                        customClass: {
                            popup: 'alert alert-primary bg-primary text-light border-0 alert-dismissible fade show',
                            title: 'alert-title',
                            content: 'alert-content'
                        }
                    });
                });
            </script>
        @endif
    </body>
</html>
