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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="menu">
            @foreach ($menus as $menu)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between"
                    >
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('images/' . $menu->photo) }}"
                            alt="Article Image">
                    </a>
                    <div class="p-5 flex flex-col flex-grow">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $menu->name }}</h5>
                        </a>
                        <p class=" font-normal text-gray-700 dark:text-gray-400">{{ $menu->description }}</p>
                        <p class=" font-bold text-gray-700 dark:text-gray-400">Rp {{ number_format($menu->price, 2, ',', '.') }}</p>

                        {{-- button to add to cart --}}
                        <form action="{{ route('customer.order.addToCart', $menu->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="merchant_id" value="{{ $menu->merchant_id }}">
                            <input type="hidden" name="price" value="{{ $menu->price }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit"
                                class="mt-3 py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                Add to Cart
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

