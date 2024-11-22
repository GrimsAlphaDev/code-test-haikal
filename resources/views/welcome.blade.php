<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="icon" href="{{ asset('Images/icon.png') }}" type="image/icon type">
    <title>MealMate</title>
</head>

<body class="max-w-[1920px] mx-auto">
    <div class="bg-white text-black text-[15px]">
        <header
            class='shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] sticky top-0 py-3 px-4 sm:px-10 bg-white z-50 min-h-[70px]'>
            <div class='flex flex-wrap items-center gap-4'>
                <a href="javascript:void(0)"><img src="{{ asset('Images/icon_clean.png') }}" alt="logo"
                        class='w-36' />
                </a>

                <div id="collapseMenu"
                    class='max-lg:hidden lg:!block max-lg:fixed max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50'>
                    <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
                            <path
                                d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                                data-original="#000000"></path>
                            <path
                                d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                                data-original="#000000"></path>
                        </svg>
                    </button>

                    <ul
                        class='lg:ml-12 lg:flex gap-x-6 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
                        <li class='mb-6 hidden max-lg:block'>
                            <a href="javascript:void(0)"><img src="{{ asset('Images/icon_clean.png') }}" alt="logo"
                                    class='w-36' />
                            </a>
                        </li>
                        <li class='max-lg:border-b max-lg:py-3 px-3'>
                            <a href='#home'
                                class='hover:text-blue-600 block font-semibold transition-all'>Home</a>
                        </li>
                        <li class='max-lg:border-b max-lg:py-3 px-3'><a href='#features'
                                class='hover:text-blue-600 block font-semibold transition-all'>How It Works</a>
                        </li>
                        <li class='max-lg:border-b max-lg:py-3 px-3'><a href='#forOffice'
                                class='hover:text-blue-600 block font-semibold transition-all'>For Office</a>
                        </li>
                        <li class='max-lg:border-b max-lg:py-3 px-3'><a href='#forCath'
                                class='hover:text-blue-600 block font-semibold transition-all'>For Caterers</a>
                        </li>
                    </ul>
                </div>

                <div class='flex ml-auto'>
                    <button class='mr-6 font-semibold border-none outline-none'><a href='{{ route('login') }}'
                            class='text-blue-600 hover:underline'>Login</a></button>
                    <button class='bg-blue-600 hover:bg-blue-700 transition-all text-white rounded-full px-5 py-2.5'><a
                            href='{{ route('register') }}'>Register</a></button>
                    <button id="toggleOpen" class='lg:hidden ml-7'>
                        <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <section class="px-4 sm:px-10" id="home">
            <div class="min-h-[500px]">
                <div class="grid md:grid-cols-2 justify-center items-center gap-10">
                    <div class="max-md:order-1">
                        <p class="mt-4 mb-2 font-semibold text-blue-600"><span
                                class="rotate-90 inline-block mr-2">|</span> ALL IN
                            ONE CATERING SOLUTION</p>
                        <h1 class="md:text-5xl text-4xl font-bold mb-4 md:!leading-[55px]">
                            Elevate Your Dining Experience</h1>
                        <p class="mt-4 text-base leading-relaxed">
                            MealMate is a one-stop solution for all your catering needs. From ordering food to managing
                            your office pantry, we have got you covered. Experience a seamless dining experience with MealMate.
                        </p>
                        <div class="flex items-center mt-10">
                            <input id="checkbox3" type="checkbox" class="hidden peer" checked />
                            <label for="checkbox3"
                                class="relative flex items-center justify-center p-1 peer-checked:before:hidden before:block before:absolute before:w-full before:h-full before:bg-white w-5 h-5 cursor-pointer bg-blue-600 border rounded-full overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-white" viewBox="0 0 520 520">
                                    <path
                                        d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136 43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613 1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0 1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z"
                                        data-name="7-Check" data-original="#000000" />
                                </svg>
                            </label>
                            <p class="text-base ml-3">No credit card required!</p>
                        </div>
                        
                    </div>
                    <div class="max-md:mt-12 h-full">
                        <img src="{{ asset('Images/landing/indo_food.jpg') }}" alt="banner img"
                            class="w-full h-full object-cover" />
                    </div>
                </div>
            </div>

            <section class="bg-gray-50 px-4 sm:px-10 py-12" id="features">
                <div class="max-w-7xl mx-auto">
                    <div class="md:text-center max-w-2xl mx-auto">
                        <h2 class="md:text-4xl text-3xl font-bold mb-6">
                            How It Works
                        </h2>
                        <p>
                            MealMate work seamlessly to provide a comprehensive solution for catering companies and offices
                        </p>
                    </div>
                    <div class="grid lg:grid-cols-3 sm:grid-cols-2 gap-10 mt-14">
                        <div >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block"
                                viewBox="0 0 512 512">
                                <path
                                    d="M256 0C114.84 0 0 114.84 0 256s114.84 256 256 256 256-114.84 256-256S397.16 0 256 0zm0 482c-126.67 0-229-102.33-229-229S129.33 24 256 24s229 102.33 229 229-102.33 229-229 229z"
                                    data-original="#000000" />
                                <path
                                    d="M256 64c-8.837 0-16 7.163-16 16v144c0 8.837 7.163 16 16 16s16-7.163 16-16V80c0-8.837-7.163-16-16-16z"
                                    data-original="#000000" />
                                <path
                                    d="M256 352c-8.837 0-16 7.163-16 16v64c0 8.837 7.163 16 16 16s16-7.163 16-16v-64c0-8.837-7.163-16-16-16z"
                                    data-original="#000000" />
                            </svg>
                            <h3 class="text-xl font-semibold mb-2">User-Friendly Interface</h3>
                            <p>Easy to use interface for both catering companies and office managers.</p>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block"
                                viewBox="0 0 682.667 682.667">
                                <defs>
                                    <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                        <path d="M0 512h512V0H0Z" data-original="#000000" />
                                    </clipPath>
                                </defs>
                                <g fill="none" class="stroke-blue-600" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="40"
                                    clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                    <path
                                        d="M256 492 60 410.623v-98.925C60 183.674 137.469 68.38 256 20c118.53 48.38 196 163.674 196 291.698v98.925z"
                                        data-original="#000000" />
                                    <path d="M178 271.894 233.894 216 334 316.105" data-original="#000000" />
                                </g>
                            </svg>
                            <h3 class="text-xl font-semibold mb-2">Catering Collaboration</h3>
                            <p>Facilitates collaboration between catering companies and offices needing lunch services.</p>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block"
                                viewBox="0 0 512.001 512.001">
                                <path
                                    d="M271.029 0c-33.091 0-61 27.909-61 61s27.909 61 61 61 60-27.909 60-61-26.909-61-60-61zm66.592 122c-16.485 18.279-40.096 30-66.592 30-26.496 0-51.107-11.721-67.592-30-14.392 15.959-23.408 36.866-23.408 60v15c0 8.291 6.709 15 15 15h151c8.291 0 15-6.709 15-15v-15c0-23.134-9.016-44.041-23.408-60zM144.946 460.404 68.505 307.149c-7.381-14.799-25.345-20.834-40.162-13.493l-19.979 9.897c-7.439 3.689-10.466 12.73-6.753 20.156l90 180c3.701 7.423 12.704 10.377 20.083 6.738l19.722-9.771c14.875-7.368 20.938-25.417 13.53-40.272zM499.73 247.7c-12.301-9-29.401-7.2-39.6 3.9l-82 100.8c-5.7 6-16.5 9.6-22.2 9.6h-69.901c-8.401 0-15-6.599-15-15s6.599-15 15-15h60c16.5 0 30-13.5 30-30s-13.5-30-30-30h-78.6c-7.476 0-11.204-4.741-17.1-9.901-23.209-20.885-57.949-30.947-93.119-22.795-19.528 4.526-32.697 12.415-46.053 22.993l-.445-.361-21.696 19.094L174.28 452h171.749c28.2 0 55.201-13.5 72.001-36l87.999-126c9.9-13.201 7.2-32.399-6.299-42.3z"
                                    data-original="#000000" />
                            </svg>
                            <h3 class="text-xl font-semibold mb-2">Office Lunch Solutions</h3>
                            <p>Provides a platform for offices to manage and order lunch for their employees.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-12" id="forOffice">
                <div class="md:text-center max-w-2xl mx-auto">
                    <h class="md:text-4xl text-3xl font-bold mb-6">For Office</h>
                    <p>For offices looking to provide lunch services to their employees, MealMate offers a comprehensive
                        solution that simplifies the process of ordering and managing meals.</p>
                </div>
                <div class="mt-14">
                    <div class="grid md:grid-cols-2 items-center gap-16">
                        <div>
                            <img src="{{ asset('Images/landing/office.jpg') }}"
                                class="w-full object-contain rounded-md shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]" />
                        </div>
                        <div class="max-w-lg">
                            <h3 class="text-xl font-semibold mb-4">For Your Office Needs</h3>
                            <p>MealMate provides a seamless solution for offices to manage and order lunch for their
                                employees. With a user-friendly interface and a wide selection of catering options, MealMate
                                makes it easy to provide delicious meals for your team.</p>
                            <button type="button"
                                class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 mt-8 transition-all">
                                <a href="{{ route('login') }}">Learn More</a>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-12" id="forCath">
                <div class="md:text-center max-w-2xl mx-auto">
                    <h class="md:text-4xl text-3xl font-bold mb-6">For Merchant</h>
                    <p>For Merchant looking to provide lunch services to their employees, MealMate offers a comprehensive
                        solution that simplifies the process of ordering and managing meals.</p>
                </div>
                <div class="mt-14">
                    <div class="grid md:grid-cols-2 items-center gap-16">
                        <div  class="max-w-lg">
                            <h3 class="text-xl font-semibold mb-4">For Your Merchant Needs</h3>
                            <p>MealMate provides a seamless solution for food merchants to provide lunch services to their
                                client. With a user-friendly interface and a wide selection of catering options, MealMate
                                makes it easy to provide delicious meals for your team.</p>
                            <button type="button"
                                class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 mt-8 transition-all">
                                <a href="{{ route('login') }}">Learn More</a>
                            </button>
                            
                        </div>
                        <div>
                            <img src="{{ asset('Images/landing/salad.jpg') }}"
                                class="w-full object-contain rounded-md shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]" />
                        </div>
                    </div>
                </div>
            </section>
 

        </section>

        <footer class="bg-gray-50 px-4 sm:px-10 py-12 mt-12">
            
            <div
                class="grid max-sm:grid-cols-1 max-xl:grid-cols-2 xl:grid-cols-5 gap-8 border-t border-gray-300 mt-10 pt-8">
                <div class="xl:col-span-2">
                    <h4 class="text-xl font-semibold mb-6">Disclaimer</h4>
                    <p class="mb-2">MealMate is a fictional company created for the purpose of this demo. All images and
                        content are for demonstration purposes only.
                    </p>
                </div>
            </div>
            <p class='mt-10'>© 2024<a href='https://github.com/GrimsAlphaDev/code-test-haikal' target='_blank'
                    class="hover:underline mx-1">Mochammad Haikal Alfandi Subagyo</a>All Rights Reserved.</p>
        </footer>

    </div>

    <script>
        var toggleOpen = document.getElementById('toggleOpen');
        var toggleClose = document.getElementById('toggleClose');
        var collapseMenu = document.getElementById('collapseMenu');

        function handleClick() {
            if (collapseMenu.style.display === 'block') {
                collapseMenu.style.display = 'none';
            } else {
                collapseMenu.style.display = 'block';
            }
        }

        toggleOpen.addEventListener('click', handleClick);
        toggleClose.addEventListener('click', handleClick);
    </script>
</body>

</html>
