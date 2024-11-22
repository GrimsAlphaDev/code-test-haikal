@extends('merchant.layout.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Dashboard Merchant </h1>
    </div>
    <hr class="mt-4">

    <div class="mt-4">
        <div class="grid grid-cols-1 gap-4">
            <div class="bg-white p-4 rounded-md shadow-md">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
                    <div class="bg-green-200 p-4 rounded-md shadow-md">
                        <div class="flex items center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">Total Order</h2>
                                <p class="text-sm text-gray-500">Number of order that have been placed</p>
                            </div>
                            <div class="content-center">
                                <h2 class="text-4xl font-semibold text-gray-700">{{ $countOrder->total_orders }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-200 p-4 rounded-md shadow-md">
                        <div class="flex items center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">Canceled Order</h2>
                                <p class="text-sm text-gray-500">Number of orders that have been canceled</p>
                            </div>
                            <div class="content-center">
                                <h2 class="text-4xl font-semibold text-gray-700">{{ $countCanceled->total_orders }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="bg-yellow-200 p-4 rounded-md shadow-md">
                        <div class="flex items center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">Proccecing Order</h2>
                                <p class="text-sm text-gray-500">Number of orders that currently being processed</p>
                            </div>
                            <div class="content-center">
                                <h2 class="text-4xl font-semibold text-gray-700">{{ $countProcessed->total_orders }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="bg-purple-200 p-4 rounded-md shadow-md">
                        <div class="flex items center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">Completed Order</h2>
                                <p class="text-sm text-gray-500">Number of orders that have been completed</p>
                            </div>
                            <div class="content-center">
                                <h2 class="text-4xl font-semibold text-gray-700">{{ $countCompleted->total_orders }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="mt-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="bg-white p-4 rounded-md shadow-md">
                <h2 class="text-xl font-semibold mb-4">Order Completed Yearly</h2>
                <canvas id="orderChart" width="300" height="150"></canvas>
            </div>
            
            <div class="bg-white p-4 rounded-md shadow-md">
                <h2 class="text-xl font-semibold mb-4">Order Canceled Yearly</h2>
                <canvas id="cancelChart" width="300" height="150"></canvas>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('orderChart').getContext('2d');
            const ctx2 = document.getElementById('cancelChart').getContext('2d');
            
            // Gradient Background
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(54, 162, 235, 0.7)');
            gradient.addColorStop(1, 'rgba(54, 162, 235, 0.1)');
    
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($monthNames),
                    datasets: [{
                        label: 'Order Completed',
                        data: @json($orderCounts),
                        backgroundColor: gradient,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        borderRadius: 10,
                        hoverBackgroundColor: 'rgba(54, 162, 235, 0.8)'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    interaction: {
                        mode: 'nearest',
                        intersect: false,
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Order Completed per Months'
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.7)',
                            titleColor: 'white',
                            bodyColor: 'white'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0,0,0,0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: @json($monthNames),
                    datasets: [{
                        label: 'Order Canceled',
                        data: @json($cancelCounts),
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        borderRadius: 10,
                        hoverBackgroundColor: 'rgba(255, 99, 132, 0.8)'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    interaction: {
                        mode: 'nearest',
                        intersect: false,
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Order Canceled per Months'
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.7)',
                            titleColor: 'white',
                            bodyColor: 'white'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0,0,0,0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
            
            
        
        });
    </script>
@endsection
