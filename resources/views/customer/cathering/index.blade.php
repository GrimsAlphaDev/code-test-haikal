@extends('customer.layout.app')

@section('title')
    Cathering
@endsection

@section('content')
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-semibold text-gray-700">List Cathering</h1>
    </div>
    <hr>

    {{-- search input --}}
    <div class="mt-4">
        <div class="flex items-center">
            {{-- create filter for city and food type --}}
            <label for="city" class="text-gray-600 me-2">City : </label>
            <select name="city" id="city" class="border border-gray-300 rounded-md p-2">
                <option value="">All</option>
                @foreach ($cities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
            <label for="food_type" class="text-gray-600 me-2 ms-2">Food Type : </label>
            <select name="food_type" id="food_type" class="border border-gray-300 rounded-md p-2">
                <option value="">All</option>
                @foreach ($foodTypes as $food_type)
                    <option value="{{ $food_type }}">{{ $food_type }}</option>
                @endforeach
            </select>
            {{-- search --}}
            <label for="search" class="text-gray-600 me-2 ms-2">Address Filter : </label>
            <input type="text" id="search" class="border border-gray-300 rounded-md p-2 ms-2" placeholder="Search...">
        </div>
    </div>

    <div class="mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="menu">
            @foreach ($catherings as $merchant)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between"
                    data-city="{{ $merchant->city }}" data-food-type="{{ $merchant->food_type }}" data-address="{{ $merchant->address }}">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ ($merchant->profile_photo !== null ? asset('Images/profile_image/'. $merchant->profile_photo) : asset('Images/defaultFood.png')) }}"
                            alt="Article Image">
                    </a>
                    <div class="p-5 flex flex-col flex-grow">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $merchant->company_name }}</h5>
                        </a>
                        <h3 class="font-bold text-white">Food Type : {{ $merchant->food_type }}</h3>
                        <p class=" font-normal text-gray-700 dark:text-gray-400">{{ $merchant->description }}</p>
                        <p class=" font-normal text-gray-700 dark:text-gray-400">Address : {{ $merchant->address }}</p>
                        <p class=" font-normal text-gray-700 dark:text-gray-400">Contact : {{ $merchant->contact }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">City : {{ $merchant->city }}</p>
                        <div class="mt-auto flex items-center justify-between mx-auto border-t border-gray-200 pt-3 ">
                            <a href="{{ route('customer.cathering.show', $merchant->id) }}"
                                class="text-blue-500 hover:text-blue-700 px-10 bg-blue-200 hover:bg-blue-500 py-2 rounded-lg text-center uppercase font-bold
                                ">Lihat Menu</a>
                        </div>
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
        const search = document.getElementById('search');

        function filterCards() {
            const selectedCity = citySelect.value;
            const selectedFoodType = foodTypeSelect.value;
            const search = document.getElementById('search').value.toLowerCase();

            menuCards.forEach(card => {
                const cardCity = card.getAttribute('data-city');
                const cardFoodType = card.getAttribute('data-food-type');
                const cardAddress = card.getAttribute('data-address');

                const cityMatch = selectedCity === '' || cardCity === selectedCity;
                const foodTypeMatch = selectedFoodType === '' || cardFoodType === selectedFoodType;
                const searchMatch = cardAddress.toLowerCase().includes(search);

                if (cityMatch && foodTypeMatch && searchMatch) {
                    card.style.display = 'flex'; // Show card
                } else {
                    card.style.display = 'none'; // Hide card
                }
            });
        }

        citySelect.addEventListener('change', filterCards);
        foodTypeSelect.addEventListener('change', filterCards);
        search.addEventListener('input', function(e){
            filterCards();
        });
    </script>
@endsection
