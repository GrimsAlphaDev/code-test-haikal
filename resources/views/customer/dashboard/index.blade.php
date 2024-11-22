@extends('customer.layout.app')

@section('title')
    Dashboard Customers
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Dashboard </h1>
    </div>
    <hr class="mt-4">

    <div class="mt-4">
        <div class="grid grid-cols-1 gap-4">
            <div class="bg-white p-4 rounded-md shadow-md">
                <div class="grid grid-cols-1 gap-2">
                    <h2 class="text-xl font-semibold">Welcome {{ auth()->guard('customer')->user()->company_name }} To
                        Mealmate</h2>
                    <p class="text-gray-500">Please Enjoy Your Time Here</p>
                </div>
            </div>

        </div>
    </div>

    <div class="mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:flex lg:flex-row gap-4">
            <div class="bg-white p-4 rounded-md shadow-md h-80">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    We provide the best meal for you
                </h1>
                <p class="text-gray-600 text-lg mb-6 text-justify">
                    Mealmate is a platform that provides the best meal for you. We provide a variety of food and drinks that
                    you can enjoy. We also provide a variety of promos that you can enjoy. So what are you waiting for?
                    Let's enjoy the food and drinks we provide.
                </p>
                <div class="flex space-x-4">
                    <a href="{{ route('customer.cathering') }}"
                        class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition">
                        Start Choosing Meal
                    </a>
                </div>
            </div>

            <div class="bg-white p-4 rounded-md shadow-md h-80">
                <div id="carousel" class="relative h-full">
                    <div class="overflow-hidden rounded-lg shadow-lg h-full">
                        <div class="carousel-inner flex transition-transform duration-500 h-full" id="carouselInner">
                            <div class="carousel-item w-full flex-shrink-0 h-full">
                                <img src="{{ asset('Images/carousel/food1.png') }}" alt="Slide 1"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="carousel-item w-full flex-shrink-0 h-full">
                                <img src="{{ asset('Images/carousel/food2.png') }}" alt="Slide 2"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="carousel-item w-full flex-shrink-0 h-full">
                                <img src="{{ asset('Images/carousel/food3.png') }}" alt="Slide 3"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Navigasi -->
                    <div class="absolute top-1/2 transform -translate-y-1/2 w-full flex justify-between px-4">
                        <button id="prevBtn" class="bg-white/50 rounded-full p-2 hover:bg-white/75">
                            ←
                        </button>
                        <button id="nextBtn" class="bg-white/50 rounded-full p-2 hover:bg-white/75">
                            →
                        </button>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('carouselInner');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const items = carousel.querySelectorAll('.carousel-item');
            let currentIndex = 0;

            function showSlide(index) {
                // Ensure index wraps around
                currentIndex = (index + items.length) % items.length;

                // Move the carousel
                carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            }

            nextBtn.addEventListener('click', () => {
                showSlide(currentIndex + 1);
            });

            prevBtn.addEventListener('click', () => {
                showSlide(currentIndex - 1);
            });
        });
    </script>
@endsection
