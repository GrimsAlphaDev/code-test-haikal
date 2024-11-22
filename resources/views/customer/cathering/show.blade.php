@extends('customer.layout.app')

@section('title')
    Cathering
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Menu</h1>

        <!-- Modal Trigger Button -->
        <a href="{{ route('customer.cathering') }}"
            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 mb-2">
            Back To Merchant
        </a>
    </div>
    <hr>


    <div class="mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2" id="menu">
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
                        <p class=" font-normal text-gray-700 dark:text-gray-400">{{ $menu->description }}</p>
                        <p class=" font-bold text-gray-700 dark:text-gray-400">Rp
                            {{ number_format($menu->price, 2, ',', '.') }}</p>


                        <form action="{{ route('customer.order.addToCart', $menu->id) }}" method="POST">
                            <input type="hidden" name="merchant_id" value="{{ $menu->merchant_id }}">
                            <input type="hidden" name="price" value="{{ $menu->price }}">
                            @csrf
                            <div class="grid grid-cols-2 gap-3">
                                <div class="flex items-center">
                                    <button type="button"
                                        class="px-2 py-1 rounded-l-lg border border-gray-300 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                        onclick="addQty({{ $menu->id }})">
                                        -
                                    </button>
                                    <input type="number" name="quantity" value="1" id="quantity" data-id="{{ $menu->id }}"
                                        class="w-10 px-2 py-1 rounded-none border border-gray-300 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-center"
                                        min="1" max="999" oninput="validity.valid||(value='1');" required>
                                    <button type="button"
                                        class="px-2 py-1 rounded-r-lg border border-gray-300 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                        onclick="removeQty({{ $menu->id }})">
                                        +
                                    </button>
                                </div>
                                <button type="submit"
                                    class="py-2 px-2  inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 justify-center">
                                    Add to Cart
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        function addQty(id) {
            let quantity = document.querySelector(`input[data-id="${id}"]`);
            quantity.value = parseInt(quantity.value) - 1;
            if (quantity.value < 1) {
                quantity.value = 1;
            }
        }

        function removeQty(id) {
            let quantity = document.querySelector(`input[data-id="${id}"]`);
            quantity.value = parseInt(quantity.value) + 1;
        }

    </script>
@endsection
