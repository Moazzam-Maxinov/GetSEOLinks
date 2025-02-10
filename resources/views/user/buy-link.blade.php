{{-- @extends('layouts.user.user')

@section('content')
    <div class="container">
        <h1>Place Order for {{ $website->name }}</h1>

        <!-- Display website details -->
        <div class="website-details">
            <p><strong>Traffic:</strong> {{ $website->monthly_traffic }} visitors/month</p>
            <p><strong>Domain Authority (DA):</strong> {{ $website->domain_authority }}</p>
            <p><strong>Domain Rating (DR):</strong> {{ $website->domain_rating }}</p>
            <p><strong>Type:</strong>
                {{ is_string($website->allowed_link_types) ? implode(', ', json_decode($website->allowed_link_types)) : implode(', ', $website->allowed_link_types) }}
            </p>
            <p><strong>Categories:</strong>
                {{ $website->categories->pluck('name')->join(', ') }}
            </p>
            <p><strong>Price:</strong> ${{ $website->price }}</p>
        </div>

        <!-- Order Form -->
        <form action="{{ url('/websites/buy-link') }}" method="POST">
            @csrf
            <input type="hidden" name="website_id" value="{{ $website->id }}">

            <div class="form-group">
                <label for="requested_url">Requested URL:</label>
                <input type="url" id="requested_url" name="requested_url" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="link_text">Link Text:</label>
                <input type="text" id="link_text" name="link_text" class="form-control">
            </div>

            <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea id="notes" name="notes" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
@endsection --}}

@extends('layouts.user.user')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg shadow-lg p-6 mb-8">
                <h1 class="text-3xl font-bold text-white">
                    Place Order for {{ $website->masked_url }}
                </h1>
            </div>

            <!-- Website Details Card -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Website Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Monthly Traffic</p>
                            <p class="font-medium">{{ number_format($website->monthly_traffic) }} visitors</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-purple-100">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Domain Authority</p>
                            <p class="font-medium">{{ $website->domain_authority }}</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-green-100">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Domain Rating</p>
                            <p class="font-medium">{{ $website->domain_rating }}</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-red-100">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Price</p>
                            <p class="font-medium text-lg text-green-600">${{ number_format($website->price, 2) }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-500 mb-3">Link Types</p>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $linkTypes = is_string($website->allowed_link_types)
                                    ? json_decode($website->allowed_link_types)
                                    : $website->allowed_link_types;
                            @endphp

                            @foreach ($linkTypes as $type)
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                    {{ $type }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-500 mb-3">Categories</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($website->categories as $category)
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Form Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Order Details</h2>
                <form action="{{ url('/websites/buy-link') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="website_id" value="{{ $website->id }}">

                    <div>
                        <label for="requested_url" class="block text-sm font-medium text-gray-700 mb-1">
                            Requested URL
                        </label>
                        <input type="url" id="requested_url" name="requested_url"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            required placeholder="https://example.com/your-page">
                    </div>

                    <div>
                        <label for="link_text" class="block text-sm font-medium text-gray-700 mb-1">
                            Link Text
                        </label>
                        <input type="text" id="link_text" name="link_text"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter your anchor text">
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">
                            Notes
                        </label>
                        <textarea id="notes" name="notes" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Any additional instructions or requirements..."></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-md hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform transition hover:-translate-y-0.5">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
