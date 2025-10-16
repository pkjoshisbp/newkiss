<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'KISS Aquatics') }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-md-5 col-lg-4">
                    <div class="text-center mb-4">
                        <a href="/" wire:navigate>
                            <img src="{{ asset('images/kiss-aquatics-logo.png') }}" alt="KISS Aquatics" style="max-width: 180px; height: auto;">
                        </a>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
