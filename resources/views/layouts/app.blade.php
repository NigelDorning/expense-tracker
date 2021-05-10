<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        @stack('styles')
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        <livewire:navigation-menu />

        <div class="min-h-screen bg-gray-200 text-gray-700 p-5 md:p-0">

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        </div>

        @stack('modals')

        @livewireScripts
        @livewireChartsScripts
        @stack('scripts')
    </body>
</html>
