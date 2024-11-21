@extends('merchant.layout.app')

@section('title')
    Order Detail
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection


@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Detail Order</h1>

        <!-- Modal Trigger Button -->
        <a href="{{ route('customer.order') }}"
            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 mb-2">
            Back To Order
        </a>
    </div>
    <hr>

    <div class="mt-4 bg-white p-4 rounded-lg shadow">
        <div class="overflow-x-auto">
            <table id="orderTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Menu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sub Total
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($order->orderItems as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->menu->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($order->menu->price, 2, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->quantity }}</td>
                            @php
                                $subtotal = $order->menu->price * $order->quantity;
                                $totalPrice += $subtotal;
                            @endphp
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($subtotal, 2, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- tfooter for total price --}}
                <tfoot>
                    <tr>
                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-right">Total Price</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($totalPrice, 2, ',', '.') }}
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
            $('#orderTable').DataTable({
            });
        });
    </script>
@endsection
