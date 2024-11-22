@extends('customer.layout.app')

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
            <div class="flex flex-col gap-4">

                <div class="bg-white p-4 rounded-md shadow-md h-fit">
                    <h2 class="text-lg font-semibold text-gray-700">Personal Information</h2>
                    <div class="flex gap-0">

                        <div class="mt-4 basis-2/6 sm:basis-6/12 md:basis-3/12">
                            <div class="relative w-32 h-32 group">
                                <img src="{{ $user->profile_photo ? asset('images/profile_image/' . $user->profile_photo) : asset('images/profile_default/profile.png') }}"
                                    alt="Profile Image"
                                    class="w-32 h-32 object-cover rounded-full transition-opacity duration-300 group-hover:opacity-70 shadow-lg border border-gray-300">

                                <label for="profile_photo"
                                    class="absolute inset-0 flex items-center justify-center rounded-full cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-30">
                                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
                                        class="hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </label>
                            </div>

                        </div>
                        <div class="mt-4 basis-4/6 sm:basis-6/12 md:basis-9/12">
                            <p class="text-gray-600">Company Name: <span
                                    class="font-semibold">{{ $user->company_name }}</span>
                            </p>
                            <p class="text-gray-600">Food Type: <span class="font-semibold">{{ $user->food_type }}</span>
                            </p>
                            <p class="text-gray-600">Email: <span class="font-semibold">{{ $user->email }}</span></p>
                            <p class="text-gray-600">Contact: <span class="font-semibold">{{ $user->contact }}</span></p>
                            <p class="text-gray-600">Description: <span
                                    class="font-semibold">{{ $user->description }}</span>
                            </p>
                            <p class="text-gray-600">Address: <span class="font-semibold">{{ $user->address }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-md shadow-md h-fit">
                    <h2 class="text-lg font-semibold text-gray-700">Change Password</h2>
                    <div class="flex md:gap-4 flex-col md:flex-row">
                        <div class="mt-4 w-full">
                            {{-- check validation error --}}

                            <form action="{{ route('customer.profile.changePassword') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mt-4">
                                    <label for="password" class="text-gray-600">New Password</label>
                                    <input type="password" name="password" id="password"
                                        class="w-full border rounded-md p-2 mt-1 @error('password') border-red-500 @else border-gray-300 @enderror" required>
                                </div>
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <div class="mt-4">
                                    <label for="password_confirmation" class="text-gray-600">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="w-full border rounded-md p-2 mt-1 @error('password_confirmation') border-red-500 @else border-gray-300 @enderror" required> 
                                </div>
                                @error('password_confirmation')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <div class="mt-4">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Change
                                        Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded-md shadow-md">
                <h2 class="text-lg font-semibold text-gray-700">Update Information</h2>
                <form action="{{ route('customer.profile.update') }}" method="POST">
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
                        <label for="email" class="text-gray-600">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full border rounded-md p-2 mt-1 @error('email') border-red-500 @else border-gray-300 @enderror"
                            value="{{ $user->email }}">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="phone" class="text-gray-600">Phone Number</label>
                        <input type="text" name="phone" id="phone"
                            class="w-full border rounded-md p-2 mt-1 @error('phone') border-red-500 @else border-gray-300 @enderror"
                            value="{{ $user->phone }}">
                    </div>
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="city" class="text-gray-600">City</label>
                        <input type="text" name="city" id="city"
                            class="w-full border rounded-md p-2 mt-1 @error('city') border-red-500 @else border-gray-300 @enderror"
                            value="{{ $user->city }}">
                    </div>
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="address" class="text-gray-600">Address</label>
                        <input type="text" name="address" id="address"
                            class="w-full border rounded-md p-2 mt-1 @error('address') border-red-500 @else border-gray-300 @enderror"
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

@section('scripts')
    <script>
        document.getElementById('profile_photo').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Ubah gambar preview
                    document.querySelector('img[alt="Profile Image"]').src = e.target.result;

                    // Kirim file ke server
                    const formData = new FormData();
                    formData.append('profile_photo', file);

                    fetch("{{ route('customer.profile.changeImage') }}", {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Tampilkan notifikasi sukses
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Foto profil berhasil diperbarui',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                // reload halaman
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);

                            } else {
                                // Tampilkan error
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Terjadi kesalahan',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan');
                        });
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
