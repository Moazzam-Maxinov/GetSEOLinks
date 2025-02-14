@extends('layouts.user.user')

@section('content')
    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">There were errors with your submission:</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg shadow-lg p-6 mb-8">
                <h1 class="text-3xl font-bold text-white">
                    Place Order for {{ $website->url }}
                </h1>
            </div>

            <!-- Website Details Card -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8 border-t-4">
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
            <div class="bg-white rounded-lg shadow-md p-6 border-t-2">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Fill in the Order Details</h2>
                <form action="{{ url('/websites/buy-link') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="website_id" value="{{ $website->id }}">

                    <div>
                        <label for="requested_url" class="block text-sm font-medium text-gray-700 mb-1">
                            URL of the shared document (Google Drive, Dropbox, etc.)<span
                                class="text-red-600 font-semibold">*</span>
                        </label>
                        <input type="text" id="requested_url" name="requested_url"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 placeholder:text-xs"
                            required placeholder="">
                        @error('requested_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <span class=" text-gray-700 italic" style="font-size: 13px;">Enter the URL of the shared document
                            containing
                            guest
                            post content or link insertion details (e.g., https://example.com or www.example.com).</span>
                    </div>

                    {{-- <div>
                        <label for="link_text" class="block text-sm font-medium text-gray-700 mb-1">
                            Link Text <span class="text-red-600 font-semibold">*</span><span
                                class="text-xs text-gray-600 italic pl-2">(Enter the anchor text you want displayed/use for
                                the link)</span>
                        </label>
                        <input type="text" id="link_text" name="link_text"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            required placeholder="Enter your anchor text">
                    </div> --}}

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">
                            Notes
                        </label>
                        <textarea id="notes" name="notes" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder=""></textarea>
                        @error('notes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <span class="text-xs text-gray-600 italic" style="font-size: 13px;">(Provide any additional
                            instructions or
                            details for your order. Leave it blank if none.)</span>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" id="submit-btn"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-md hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform transition hover:-translate-y-0.5">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[action*="/websites/buy-link"]');
            if (form) {
                form.addEventListener('submit', function() {
                    const button = document.getElementById('submit-btn');
                    button.innerHTML = 'Placing Order...';
                    button.disabled = true;
                    button.classList.add('opacity-75', 'cursor-not-allowed');
                });
            }

            // URL validation
            const urlInput = document.getElementById('requested_url');
            if (urlInput) {
                urlInput.addEventListener('input', function() {
                    // URL pattern that accepts http://, https://, or www.
                    const urlPattern = /^(https?:\/\/|www\.)[a-zA-Z0-9-_.]+\.[a-zA-Z]{2,}(\/\S*)?$/;

                    if (this.value.trim() === '') {
                        this.setCustomValidity('URL is required');
                    } else if (!urlPattern.test(this.value)) {
                        this.setCustomValidity(
                            'Please enter a valid URL starting with http://, https://, or www.');
                    } else {
                        this.setCustomValidity('');
                    }

                    // Add visual feedback classes
                    if (this.validity.valid) {
                        this.classList.remove('border-red-500');
                        this.classList.add('border-green-500');
                    } else {
                        this.classList.remove('border-green-500');
                        this.classList.add('border-red-500');
                    }
                });

                // Show validation message on blur
                urlInput.addEventListener('blur', function() {
                    if (!this.validity.valid) {
                        this.reportValidity();
                    }
                });
            }
        });
    </script>
@endsection
