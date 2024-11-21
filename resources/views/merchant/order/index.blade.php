@extends('merchant.layout.app')

@section('title')
    Order
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Menu</h1>

        <!-- Modal Trigger Button -->
        <a href="{{ route('merchant.menu.create') }}"
            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 mb-2">
            Add New Menu
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer
                            Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                            Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Invoice
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->customer->company_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($order->total_price, 2, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($order->status_id == 1)
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-black">
                                        Order Placed
                                    </span>
                                @elseif($order->status_id == 2)
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Order On Progress
                                    </span>
                                @elseif($order->status_id == 3)
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Order Delivered
                                    </span>
                                @elseif($order->status_id == 4)
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Order Cancelled
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($order->status_id == 1)
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Invoice Not Available Yet
                                    </span>
                                @elseif ($order->status_id == 2)
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Invoice Not Available Yet
                                    </span>
                                @elseif ($order->status_id == 3)
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <a href="{{ route('viewInvoice', $order->id) }}">
                                            View
                                        </a>
                                    </span>
                                @elseif ($order->status_id == 4)
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Order Cancelled
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap flex flex-row gap-2">
                                <a href="{{ route('merchant.order.show', $order->id) }}"
                                    class="text-blue-500 hover:text-blue-700 bg-blue-100 px-2 py-1 rounded-md text-xs font-medium uppercase ">Detail</a>
                                @if ($order->status_id == 1)
                                    <form action="{{ route('merchant.order.cancel', $order->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure to cancel {{ $order->customer->company_name }} order?')"
                                            class=" hover:text-red-700 bg-red-100 text-red-500 px-2 py-1 rounded-md text-xs font-medium uppercase ">Cancel</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
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
            $('#orderTable').DataTable({});
        });
    </script>
@endsection
