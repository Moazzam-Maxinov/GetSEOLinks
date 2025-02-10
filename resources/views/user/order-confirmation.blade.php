{{-- @extends('layouts.user.user')

@section('content')
    <h1>Order Confirmation</h1>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Requested URL:</strong> {{ $order->requested_url }}</p>
    <p><strong>Link Text:</strong> {{ $order->link_text ?? 'N/A' }}</p>
    <p><strong>Price:</strong> ${{ $order->price }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
@endsection --}}

@extends('layouts.user.user')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-green-500 to-emerald-500 px-6 py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h1 class="text-2xl font-bold text-white">Order Confirmation</h1>
                        </div>
                    </div>
                </div>

                <!-- Order Details -->
                <div class="px-6 py-4">
                    <!-- Order ID -->
                    <div class="flex items-center p-4 bg-gray-50 rounded-lg mb-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 flex items-center justify-center rounded-full bg-purple-100">
                                <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Order ID</p>
                            <p class="text-lg font-bold text-gray-900">#{{ $order->id }}</p>
                        </div>
                    </div>

                    <!-- URL Section -->
                    <div class="mb-4 p-4 bg-blue-50 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">Requested URL</p>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                            <a href="{{ $order->requested_url }}" class="text-blue-600 hover:text-blue-800 break-all"
                                target="_blank">
                                {{ $order->requested_url }}
                            </a>
                        </div>
                    </div>

                    <!-- Link Text -->
                    <div class="mb-4 p-4 bg-yellow-50 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">Link Text</p>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-yellow-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            <p class="text-gray-900 font-medium">{{ $order->link_text ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="mb-4 p-4 bg-green-50 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">Price</p>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-green-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-lg font-bold text-green-600">${{ number_format($order->price, 2) }}</p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div
                        class="p-4 {{ $order->status === 'pending' ? 'bg-orange-50' : ($order->status === 'completed' ? 'bg-green-50' : 'bg-gray-50') }} rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">Status</p>
                        <div class="flex items-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                            {{ $order->status === 'pending'
                                ? 'bg-orange-100 text-orange-800'
                                : ($order->status === 'completed'
                                    ? 'bg-green-100 text-green-800'
                                    : 'bg-gray-100 text-gray-800') }}">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $order->status === 'pending'
                                            ? 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                                            : ($order->status === 'completed'
                                                ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
                                                : 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z') }}" />
                                </svg>
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    <div class="flex justify-center">
                        <a href="{{ url('/vendor/orders') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            View All Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
