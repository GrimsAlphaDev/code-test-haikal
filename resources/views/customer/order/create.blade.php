@extends('customer.layout.app')

@section('title')
    Order
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Make An Order</h1>

        <!-- Modal Trigger Button -->
        <a href="{{ route('customer.order') }}"
            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 mb-2">
            Back To Order
        </a>
    </div>
    <hr>

    <div class="mt-4 bg-white p-4 rounded-lg shadow">
        <div class="overflow-x-auto">
            {{-- select untuk mencari merchant --}}
            <select name="merchant" id="merchant" class="w-full border rounded-md p-2 mt-1 mb-4">
                <option value="" disabled selected>Select Merchant</option>
                @foreach ($merchants as $merchant)
                    <option value="{{ $merchant->id }}">{{ $merchant->company_name }}</option>
                @endforeach
            </select>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="menu">
            </div>

            <table id="menuTable" class="min-w-full divide-y divide-gray-200 mb-6">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Menu ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="menuTableContent">
                </tbody>
            </table>
            
            <h2 class="text-lg font-semibold text-gray-700 mt-6 mb-2">Order Summary</h2>

            {{-- create choose delivery date --}}
            <div class="mt-4">
                <label for="delivery_date" class="text-gray-600">Delivery Date</label>
                <input type="date" name="delivery_date" id="delivery_date"
                    class="w-full border rounded-md p-2 mt-1 @error('delivery_date') border-red-500 @else border-gray-300 @enderror"
                    value="{{ old('delivery_date') }}">
            </div>
        
                <table id="orderTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Menu ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="mainOrder">
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="px-6 py-4 whitespace-nowrap font-bold">Total</td>
                        <td class="px-6 py-4 whitespace-nowrap" id="totalPrice">Rp 0</td>
                        <td class="px-6 py-4 whitespace-nowrap"></td>
                        <td class="px-6 py-4 whitespace-nowrap"></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="py-2 px-4 bg-blue-600 text-white hover:bg-blue-700 rounded-lg" id="confirmOrder">Order</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Tailwind CSS -->
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script>

    <script>
        $(document).ready(function() {
        });

        // if selected merchant change then get the menu
        const merchant = @json($merchants);
        const menus = @json($menus);
        const merchantId = document.getElementById('merchant');
        const menu = document.getElementById('menu');
        const menuTableContent = document.getElementById('menuTableContent');

        // merchantId change show menu 
        merchantId.addEventListener('change', function() {
            const selectedMerchant = merchantId.value;

            // filter menu by merchant
            const filteredMenu = menus.filter(menu => menu.merchant_id == selectedMerchant);
            
            menuTableContent.innerHTML = '';

            filteredMenu.forEach((menu, index) => {
                menuTableContent.innerHTML += `
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">${index + 1}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${menu.id}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${menu.name}</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp ${menu.price}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="number" name="quantity" id="quantity" value="1" class="w-20 border rounded-md p-2 mt-1">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Available
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="py-2 px-4 bg-blue-600 text-white hover:bg-blue-700 rounded-lg" id="orderMenu">Order</button>
                        </td>
                    </tr>
                `;
            });

        });

        // order menu
        const mainOrder = document.getElementById('mainOrder');
        menuTableContent.addEventListener('click', function(e) {
            if (e.target.id === 'orderMenu') {
                const tr = e.target.parentElement.parentElement;
                const menuId = tr.children[1].innerText;
                const name = tr.children[2].innerText;
                const price = tr.children[3].innerText;
                const quantity = tr.children[4].children[0].value;

                mainOrder.innerHTML += `
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">${mainOrder.children.length + 1}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${menuId}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${name}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${price}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${quantity}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Available
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="py-2 px-4 bg-red-600 text-white hover:bg-red-700 rounded-lg" id="removeMenu">Remove</button>
                        </td>
                    </tr>
                `;

                // calculate total price
                const totalPrice = document.getElementById('totalPrice');
                let total = 0;
                mainOrder.querySelectorAll('tr').forEach(tr => {
                    const price = tr.children[3].innerText;
                    const quantity = tr.children[4].innerText;
                    const priceNumber = parseInt(price.split(' ')[1].replace('.', ''));
                    total += priceNumber * quantity;
                });

                totalPrice.innerText = `Rp ${total}`;
            }
        });

        // remove menu
        mainOrder.addEventListener('click', function(e) {
            if (e.target.id === 'removeMenu') {
                e.target.parentElement.parentElement.remove();

                // calculate total price
                const totalPrice = document.getElementById('totalPrice');
                let total = 0;
                mainOrder.querySelectorAll('tr').forEach(tr => {
                    const price = tr.children[3].innerText;
                    const quantity = tr.children[4].innerText;
                    const priceNumber = parseInt(price.split(' ')[1].replace('.', ''));
                    total += priceNumber * quantity;
                });

                totalPrice.innerText = `Rp ${total}`;
            }
        });

        // confirm order
        const confirmOrder = document.getElementById('confirmOrder');
        confirmOrder.addEventListener('click', function() {
            const totalPrice = document.getElementById('totalPrice').innerText;
            const total = parseInt(totalPrice.split(' ')[1].replace('.', ''));

            if (total === 0) {
                alert('Please order at least 1 menu');
            } else {
                // ajax
                const order = [];
                mainOrder.querySelectorAll('tr').forEach(tr => {
                    const menuId = tr.children[1].innerText;
                    const quantity = tr.children[4].innerText;
                    const price = tr.children[3].innerText;
                    const merchant_id = merchantId.value;
                    const delivery_date = document.getElementById('delivery_date').value;
                    order.push({ menuId, quantity, price, merchant_id, delivery_date });
                });

                $.ajax({
                    url: '{{ route('customer.order.store') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        order: order
                    },
                    success: function(response) {
                        alert('Order success');
                        window.location.href = '{{ route('customer.order') }}';
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            }
        });

</script>
@endsection
