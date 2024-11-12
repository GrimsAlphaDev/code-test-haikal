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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const citySelect = document.getElementById('city');
        const foodTypeSelect = document.getElementById('food_type');
        const menuCards = document.querySelectorAll('#menu > div');

        function filterCards() {
            const selectedCity = citySelect.value;
            const selectedFoodType = foodTypeSelect.value;

            menuCards.forEach(card => {
                const cardCity = card.getAttribute('data-city');
                const cardFoodType = card.getAttribute('data-food-type');

                const cityMatch = selectedCity === '' || cardCity === selectedCity;
                const foodTypeMatch = selectedFoodType === '' || cardFoodType === selectedFoodType;

                if (cityMatch && foodTypeMatch) {
                    card.style.display = 'flex'; // Show card
                } else {
                    card.style.display = 'none'; // Hide card
                }
            });
        }

        citySelect.addEventListener('change', filterCards);
        foodTypeSelect.addEventListener('change', filterCards);
    </script>
@endsection
