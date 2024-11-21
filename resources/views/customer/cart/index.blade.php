@extends('customer.layout.app')

@section('title')
    Cart
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Cart</h1>
    </div>
    <hr>


    <div class="bg-white p-4 mt-4 border border-gray-200 rounded-lg shadow">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-700">Cart</h1>
        </div>
        <div class="mt-4 flex flex-col md:flex-row gap-2">
            <div class="h-full flex flex-col basis-9/12 justify-between p-2 rounded-lg gap-2">
                <div class="flex gap-2 justify-between content-center">
                    <h2 class="text-xl font-semibold">{{ ($carts->count() > 0 ? $carts[0]->merchant->company_name : '') }}</h2>
                    @if($carts->count() > 0)
                        <a href="{{ route('customer.cart.clear') }}"
                            class="text-blue-500 hover:text-blue-700 text-xl">Clear Cart</a>
                    @endif
                </div>
                <div id="cardContent" class="flex flex-col gap-2">
                    @foreach ($carts as $cart)
                        <hr>
                        <div class="flex gap-2">
                            <img src="{{ asset('images/' . $cart->menu->photo) }}" alt="{{ $cart->menu->name }}"
                                class="w-20 h-20 rounded-lg">
                            <div class="flex flex-col md:flex-row justify-between w-full">

                                <div class="flex flex-col basis-11/12">
                                    <h1 class="text-xl font-bolt">{{ $cart->menu->name }}</h1>
                                    <h1 class="font-semibold">Rp {{ number_format($cart->menu->price, 2, ',', '.') }}</h1>
                                    <a class="text-red-500 hover:text-red-700 w-fit"
                                        onclick="removeItem({{ $cart->id }})">Remove</a>
                                </div>
                                <div class="flex basis-1/12">
                                    {{-- kuantity --}}
                                    <div class="flex justify-between gap-1 items-center">
                                        <h2 class="text-lg font-semibold me-2">Quantity</h2>
                                        <button
                                            class="bg-gray-200 hover:bg-gray-300 rounded-lg px-2 py-1 text-gray-700 font-semibold"
                                            onclick="modifyQuantity({{ $cart->id }}, 'min')">-</button>
                                        <h1 class="text-lg font-semibold">{{ $cart->quantity }}</h1>
                                        <button
                                            class="bg-gray-200 hover:bg-gray-300 rounded-lg px-2 py-1 text-gray-700 font-semibold"
                                            onclick="modifyQuantity({{ $cart->id }}, 'plus')">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>


            </div>
            <div
                class="mt-4 bg-white basis-3/12 justify-start h-fit flex flex-col border border-gray-200 rounded-lg shadow p-2">
                <h1 class="font-semibold text-gray-700">Ringkasan Pesanan <i class="bi bi-cart"></i> </h1>
                <h1 class="text-sm font-semibold text-gray-700">Total Harga:</h1>
                <h1 class="text-lg font-semibold text-gray-700 p-0" id="totalPrice">Rp
                    {{ number_format($totalPrice, 2, ',', '.') }}</h1>
                <form action="{{ route('customer.order.checkout') }}" method="POST">
                    @csrf
                    {{-- delivery date --}}
                    <div class="mt-2 mb-2">
                        <label for="delivery_date" class="text-sm font-semibold text-gray-700">Delivery Date</label>
                        <input type="date" name="delivery_date" id="delivery_date" class="w-full p-2 border border-gray-200 rounded-lg"
                            required min="{{ date('Y-m-d') }}">
                    </div>
                    <button type="submit"
                    class=" flex bg-blue-500 hover:bg-blue-700 justify-center w-24 text-white font-bold py-2 px-4 rounded">Checkout</button>
                </form>

            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>
        function removeItem(id) {
            // remove item from cart
            fetch(`/customer/cart/remove/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    freshCardContent();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error
                    });
                }
            }).catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error
                });
                console.error(error);
            });
        }

        function unformatRupiah(formattedValue) {
            return parseFloat(
                formattedValue
                .replace(/[^0-9,-]/g, '') // Hapus karakter selain angka, koma, dan minus
                .replace(',', '.') // Ganti koma dengan titik untuk parsing
            );
        }

        // fresh cardContent
        const cardContent = document.getElementById('cardContent');
        const total = document.getElementById('totalPrice');

        function freshCardContent() {
            let totalPrice = 0;
            fetch('{{ route('customer.cart.get') }}', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(response => {
                response.json().then(data => {
                    cardContent.innerHTML = '';
                    data.carts.forEach(cart => {

                        // count total price

                        totalPrice += cart.menu.price * cart.quantity;
                        console.log(totalPrice);

                        cart.menu.price = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }).format(cart.menu.price);



                        cardContent.innerHTML += `
                        <hr>
                        <div class="flex gap-2">
                            <img src="{{ asset('images/') }}/${cart.menu.photo}" alt="${cart.menu.name}"
                                class="w-20 h-20 rounded-lg">
                            <div class="flex flex-col md:flex-row justify-between w-full">

                                <div class="flex flex-col basis-11/12">
                                    <h1 class="text-xl font-bolt">${cart.menu.name}</h1>
                                    <h1 class="font-semibold">${cart.menu.price}</h1>
                                    <a class="text-red-500 hover:text-red-700 w-fit"
                                        onclick="removeItem(${cart.id})">Remove</a>
                                </div>
                                <div class="flex basis-1/12">
                                    {{-- kuantity --}}
                                    <div class="flex justify-between gap-1 items-center">
                                        <h2 class="text-lg font-semibold me-2">Quantity</h2>
                                        <button
                                            class="bg-gray-200 hover:bg-gray-300 rounded-lg px-2 py-1 text-gray-700 font-semibold" onclick="modifyQuantity(${cart.id}, 'min')">-</button>
                                        <h1 class="text-lg font-semibold">${cart.quantity}</h1>
                                        <button
                                            class="bg-gray-200 hover:bg-gray-300 rounded-lg px-2 py-1 text-gray-700 font-semibold" onclick="modifyQuantity(${cart.id} , 'plus')">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        `;
                    });

                    total.innerHTML = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }).format(totalPrice);

                });


                // count total price
            }).catch(error => {
                console.error(error);
            });
        }

        function modifyQuantity(id, selector) {
            // modify quantity
            console.log(id);
            console.log(selector)
            fetch('/customer/cart/modifyQuantity/' + id, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    selector: selector
                })
            }).then(response => {
                if (response.ok) {
                    console.log(response);
                    freshCardContent();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error
                    });
                }
            }).catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error
                });
                console.error(error);
            });
        }
    </script>
@endsection
