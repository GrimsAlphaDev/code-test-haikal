@extends('merchant.layout.app')

@section('title')
    Profile
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Profile</h1>
    </div>
    <hr>

    <div class="mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white p-4 rounded-md shadow-md h-fit">
                <h2 class="text-lg font-semibold text-gray-700">Personal Information</h2>
                <div class="mt-4">
                    <p class="text-gray-600">Company Name: <span class="font-semibold">{{ $user->company_name }}</span></p>
                    <p class="text-gray-600">Food Type: <span class="font-semibold">{{ $user->food_type }}</span></p>
                    <p class="text-gray-600">Email: <span class="font-semibold">{{ $user->email }}</span></p>
                    <p class="text-gray-600">Contact: <span class="font-semibold">{{ $user->contact }}</span></p>
                    <p class="text-gray-600">Description: <span class="font-semibold">{{ $user->description }}</span></p>
                    <p class="text-gray-600">Address: <span class="font-semibold">{{ $user->address }}</span></p>
                </div>
            </div>
            <div class="bg-white p-4 rounded-md shadow-md">
                <h2 class="text-lg font-semibold text-gray-700">Update Information</h2>
                <form action="{{ route('merchant.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                        <label for="company_name" class="text-gray-600">Company Name</label>
                        <input type="text" name="company_name" id="company_name"
                            class="w-full border rounded-md p-2 mt-1 @error('name') border-red-500 @else border-gray-300 @enderror"
                            value="{{ $user->company_name }}">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="food_type" class="text-gray-600">Food Type</label>
                        <input type="text" name="food_type" id="food_type"
                            class="w-full border rounded-md p-2 mt-1 @error('food_type') border-red-500 @else border-gray-300 @enderror"
                            value="{{ $user->food_type }}">
                    </div>
                    <div class="mt-4">
                        <label for="email" class="text-gray-600">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full border rounded-md p-2 mt-1 @error('email') border-red-500 @else border-gray-300 @enderror"
                            value="{{ $user->email }}">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="contact" class="text-gray-600">Contact</label>
                        <input type="text" name="contact" id="contact"
                            class="w-full border rounded-md p-2 mt-1 @error('contact') border-red-500 @else border-gray-300 @enderror"
                            value="{{ $user->contact }}">
                    </div>
                    @error('contact')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="description" class="text-gray-600">Description</label>
                        <textarea name="description" id="description"
                            class="w-full border rounded-md p-2 mt-1 @error('description') border-red-500 @else border-gray-300 @enderror"
                            rows="4">{{ $user->description }}</textarea>
                    </div>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="address" class="text-gray-600">Address</label>
                        <input type="text" name="address" id="address" class="w-full border rounded-md p-2 mt-1 @error('address') border-red-500 @else border-gray-300 @enderror"
                            value="{{ $user->address }}">
                    </div>
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
