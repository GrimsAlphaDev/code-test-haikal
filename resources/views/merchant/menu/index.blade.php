@extends('merchant.layout.app')

@section('title')
    Menu
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Menu</h1>

        <!-- Modal Trigger Button -->
        <a href="{{ route('merchant.menu.create') }}"
            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 mb-2">
            Add New Menu
        </a>
    </div>
    <hr>

    {{-- search input --}}
    <div class="mt-4">
        <div class="flex items-center">
            <input type="text" name="search" id="search" class="w-full border rounded-md p-2 mt-1 "
                placeholder="Search menu">
        </div>
    </div>

    <div class="mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="menu">
            @foreach ($menus as $menu)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('images/' . $menu->photo) }}" alt="Article Image">
                    </a>
                    <div class="p-5 flex flex-col flex-grow">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $menu->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $menu->description }}</p>
                        <p class="mb-3 font-bold text-gray-700 dark:text-gray-400">Rp
                            {{ number_format($menu->price, 2, ',', '.') }}</p>
                        <div class="mt-auto flex items-center justify-between">
                            <a href="{{ route('merchant.menu.edit', $menu->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('merchant.menu.delete', $menu->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are You Sure ?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- make pagination in the bottom of page --}}
    <div class="mt-4">
        {{ $menus->links() }}
    </div>
@endsection

@section('scripts')
    <script>
        const menu = document.getElementById('menu');
        const menus = @json($menus);
        const search = document.getElementById('search');
        const baseURL = "{{ asset('') }}";

        search.addEventListener('keyup', function() {
            const filteredMenus = menus.data.filter(menu => {
                return menu.name.toLowerCase().includes(search.value.toLowerCase());
            });

            menu.innerHTML = '';

            filteredMenus.forEach(menuItem => {
                menu.innerHTML += `
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
                    <a href="#">
                        <img class="rounded-t-lg" src="
                        ${baseURL + 'images/' + menuItem.photo}
                        " alt="Article Image">
                    </a>
                    <div class="p-5 flex flex-col flex-grow">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                ${menuItem.name}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${menuItem.description}</p>
                        <p class="mb-3 font-bold text-gray-700 dark:text-gray-400">Rp
                            ${menuItem.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}
                            </p>
                        <div class="mt-auto flex items-center justify-between">
                            <a href="
                            ${baseURL + 'merchant/menu/' + menuItem.id + '/edit'}
                            " class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="${baseURL + 'merchant/menu/' + menuItem.id}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are You Sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                `;
                console.log(menu);
            });

        });
    </script>
@endsection
