@extends('merchant.layout.app')

@section('title')
    Menu
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Create New Menu</h1>

        <!-- Modal Trigger Button -->
        <a href="{{ route('merchant.menu') }}"
            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 mb-2">
            Back To Menu
        </a>
    </div>
    <hr>
    
    <div class="mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white p-4 rounded-md shadow-md">
                <h2 class="text-lg font-semibold text-gray-700">Menu Information</h2>
                <form action="{{ route('merchant.menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-4">
                        <label for="name" class="text-gray-600">Name</label>
                        <input type="text" name="name" id="name"
                            class="w-full border rounded-md p-2 mt-1 @error('name') border-red-500 @else border-gray-300 @enderror"
                            value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="description" class="text-gray-600">Description</label>
                        <textarea name="description" id="description"
                            class="w-full border rounded-md p-2 mt-1 @error('description') border-red-500 @else border-gray-300 @enderror"
                            rows="4">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="price" class="text-gray-600">Price</label>
                        <input type="text" name="price" id="price" 
                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                            class="w-full border rounded-md p-2 mt-1 @error('price') border-red-500 @else border-gray-300 @enderror"
                            value="{{ old('price') }}">
                    </div>
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="photo" class="text-gray-600">Photo</label>
                        <input type="file" name="photo" id="photo"
                            class="w-full border rounded-md p-2 mt-1 @error('photo') border-red-500 @else border-gray-300 @enderror"
                            value="{{ old('photo') }}" accept="image/png, image/jpeg, image/jpg">
                        <p class="text-xs text-gray-500 mt-1">* Only support .jpg, .jpeg, .png</p>
                        <p class="text-xs text-gray-500">* Max size 2MB</p>
                        <p class="text-xs text-gray-500">* Recommended resolution 500x500</p>
                    </div>
                    @error('photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <button type="submit"
                            class="py-2 px-4 bg-blue-600 text-white hover:bg-blue-700 rounded-lg">Save</button>
                    </div>
                </form>
            </div>

            <div>
                <h2 class="font-bold text-2xl">Preview Photo</h2>
                <div id="previewImg"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const photo = document.getElementById('photo');
        const previewImg = document.getElementById('previewImg');

        photo.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    previewImg.innerHTML = `
                        <img src="${this.result}" class="w-128 h-128 object-cover rounded-md border border-gray-200">
                    `;
                });

                reader.readAsDataURL(file);
            }
        });

        const price = document.getElementById('price');
        price.addEventListener('change', function() {
            price.value = formatRupiah(this.value, 'Rp ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }
    </script>
@endsection
