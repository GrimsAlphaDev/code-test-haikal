<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="icon" href="{{ asset('Images/icon.png') }}" type="image/icon type">
    <title>Mailmate | @yield('title')</title>
    <style>
        .active {
            background-color: #2563eb;
            color: #2563eb;
            border-radius: 12px;
        }
        
    </style>
    @yield('styles')
</head>

<body class="relative overflow-auto max-h-screen">


    @include('customer.layout.sidebar')

    <main class="p-4 sm:ml-64">
        @yield('content')
    </main>
    
    @include('components.alert')
    <script>
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar-multi-level-sidebar');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        const sidebarToggleClose = document.getElementById('sidebar-toggle-close');

        sidebarToggleClose.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
    @yield('scripts')
</body>

</html>
