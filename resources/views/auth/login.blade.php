<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="icon" href="{{ asset('Images/icon.png') }}" type="image/icon type">
    <title>Mailmate | Login</title>
</head>

<body class="bg-gray-100">
    <main>
        <div class="min-h-screen flex fle-col items-center justify-center py-6 px-4">
            <div class="grid md:grid-cols-2 items-center gap-4 max-w-6xl w-full">
                <div
                    class="border border-gray-300 rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
                    <form class="space-y-4" action="{{ route('signIn') }}" method="POST">
                        @csrf

                        <a href="{{ route('landing') }}"
                            class="flex items-center text-gray-800 text-sm hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-[18px] h-[18px] me-2" viewBox="0 0 24 24">
                                <path
                                    d="M20 11H7.41l5.3-5.29a1 1 0 0 0-1.42-1.42l-7 7a1 1 0 0 0 0 1.42l7 7a1 1 0 0 0 1.42-1.42L7.41 13H20a1 1 0 0 0 0-2z"
                                    data-original="#000000"></path>
                            </svg>
                            <span class="hover:cursor-pointer text-gray-800 text-sm">Back to landing page</span>
                        </a>

                        <div class="mb-8">
                            <h3 class="text-gray-800 text-3xl font-extrabold">Sign in</h3>
                            <p class="text-gray-500 text-sm mt-4 leading-relaxed">
                                Welcome back! Please sign in to your account.
                            </p>
                        </div>

                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Email</label>
                            <div class="relative flex items-center">
                                <input name="email" type="email" required
                                    class="w-full text-sm text-gray-800 border @error('email') border-red-500 @else border-gray-300 @enderror px-4 py-3 rounded-lg outline-blue-600"
                                    placeholder="Enter email" value="{{ old('email') }}" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path
                                        d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Password</label>
                            <div class="relative flex items-center">
                                <input name="password" type="password" required
                                    class="w-full text-sm text-gray-800 border @error('password') border-red-500 @else border-gray-300 @enderror px-4 py-3 rounded-lg outline-blue-600"
                                    placeholder="Enter password" />

                                <button type="button" onclick="togglePasswordVisibility()"
                                    class="absolute right-4 cursor-pointer">
                                    <span class="material-symbols-outlined"
                                        style="display: block; font-size: 21px; color: #bbb;" id="eye-open">
                                        visibility
                                    </span>
                                    <span class="material-symbols-outlined"
                                        style="display: none; font-size: 21px; color: #bbb;" id="eye-closed">
                                        visibility_off
                                    </span>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="!mt-8">
                            <button type="submit"
                                class="w-full shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                                Log in
                            </button>
                        </div>

                        <p class="text-sm !mt-8 text-center text-gray-800">Don't have an account <a
                                href="{{ route('register') }}"
                                class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Register
                                here</a>
                        </p>
                    </form>
                </div>
                <div class="lg:h-[400px] md:h-[300px] max-md:mt-8 hidden md:flex">
                    <img src="https://readymadeui.com/login-image.webp"
                        class="w-full h-full max-md:w-4/5 mx-auto block object-cover" alt="Dining Experience" />
                </div>
            </div>
        </div>
    </main>
    @include('components.alert')
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.querySelector('input[name="password"]');
            var eyeOpenIcon = document.getElementById('eye-open');
            var eyeClosedIcon = document.getElementById('eye-closed');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeOpenIcon.style.display = 'none';
                eyeClosedIcon.style.display = 'block';
            } else {
                passwordInput.type = "password";
                eyeOpenIcon.style.display = 'block';
                eyeClosedIcon.style.display = 'none';
            }
        }
    </script>

</body>

</html>
