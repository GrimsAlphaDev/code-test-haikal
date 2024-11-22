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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    @yield('styles')
</head>

<body class="relative overflow-auto max-h-screen">


    @include('merchant.layout.sidebar')

    @include('merchant.layout.navbar')
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
    <script>
        // Toggle Dropdown
        document.getElementById('dropdownToggle').addEventListener('click', function() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('dropdownMenu');
            const toggle = document.getElementById('dropdownToggle');

            if (!dropdown.contains(event.target) && !toggle.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
    @yield('scripts')
</body>

</html>
