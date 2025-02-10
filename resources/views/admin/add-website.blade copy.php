@extends('layouts.admin.admin')

@section('content')
{{-- Hello --}}
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.add-website') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block font-medium text-gray-700">Website Name</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('name') }}" required>
        </div>

        <!-- URL -->
        <div>
            <label for="url" class="block font-medium text-gray-700">Website URL</label>
            <input type="url" name="url" id="url"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('url') }}" required>
        </div>

        <!-- Category -->
        <div>
            <label for="category_id" class="block font-medium text-gray-700">Category</label>
            <select name="categories[]" id="categories" multiple>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Monthly Traffic -->
        <div>
            <label for="monthly_traffic" class="block font-medium text-gray-700">Monthly Traffic</label>
            <input type="number" name="monthly_traffic" id="monthly_traffic"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('monthly_traffic') }}">
        </div>

        <!-- Domain Rating -->
        <div>
            <label for="domain_rating" class="block font-medium text-gray-700">Domain Rating</label>
            <input type="number" name="domain_rating" id="domain_rating"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('domain_rating') }}" min="0" max="100">
        </div>

        <!-- Domain Authority -->
        <div>
            <label for="domain_authority" class="block font-medium text-gray-700">Domain Authority</label>
            <input type="number" name="domain_authority" id="domain_authority"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('domain_authority') }}" min="0" max="100">
        </div>

        <!-- Spam Score -->
        <div>
            <label for="spam_score" class="block font-medium text-gray-700">Spam Score</label>
            <input type="number" name="spam_score" id="spam_score"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('spam_score') }}" min="0" max="100" step="0.01">
        </div>

        <!-- Turnaround Time -->
        <div>
            <label for="turnaround_time" class="block font-medium text-gray-700">Turnaround Time</label>
            <input type="text" name="turnaround_time" id="turnaround_time"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('turnaround_time') }}">
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('price') }}" step="0.01">
        </div>

        <!-- Language -->
        <div>
            <label for="language" class="block font-medium text-gray-700">Language</label>
            <input type="text" name="language" id="language"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('language') }}">
        </div>

        <!-- Quality Score -->
        <div>
            <label for="quality_score" class="block font-medium text-gray-700">Quality Score</label>
            <input type="number" name="quality_score" id="quality_score"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('quality_score') }}" min="1" max="5">
        </div>

        <!-- Max Dofollow Links -->
        <div>
            <label for="max_dofollow_links" class="block font-medium text-gray-700">Max Dofollow Links</label>
            <input type="number" name="max_dofollow_links" id="max_dofollow_links"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('max_dofollow_links') }}">
        </div>

        <!-- Content Guidelines -->
        <div>
            <label for="content_guidelines" class="block font-medium text-gray-700">Content Guidelines</label>
            <textarea name="content_guidelines" id="content_guidelines"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('content_guidelines') }}</textarea>
        </div>

        <!-- Minimum Word Count -->
        <div>
            <label for="minimum_word_count" class="block font-medium text-gray-700">Minimum Word Count</label>
            <input type="number" name="minimum_word_count" id="minimum_word_count"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('minimum_word_count') }}">
        </div>

        <!-- Allowed Link Types -->
        <div>
            <label for="allowed_link_types" class="block font-medium text-gray-700">Allowed Link Types</label>
            <select name="allowed_link_types[]" id="allowed_link_types"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                multiple>
                <option value="do-follow">Do-Follow</option>
                <option value="no-follow">No-Follow</option>
            </select>
        </div>

        <!-- Payment Methods -->
        <div>
            <label for="payment_methods" class="block font-medium text-gray-700">Payment Methods</label>
            <select name="payment_methods[]" id="payment_methods"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                multiple>
                <option value="paypal" {{ in_array('paypal', old('payment_methods', [])) ? 'selected' : '' }}>PayPal
                </option>
                <option value="bank_transfer"
                    {{ in_array('bank_transfer', old('payment_methods', [])) ? 'selected' : '' }}>Bank Transfer
                </option>
                <option value="credit_card"
                    {{ in_array('credit_card', old('payment_methods', [])) ? 'selected' : '' }}>Credit Card</option>
                <option value="crypto" {{ in_array('crypto', old('payment_methods', [])) ? 'selected' : '' }}>
                    Cryptocurrency</option>
            </select>
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block font-medium text-gray-700">Status</label>
            <select name="status" id="status"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Add
                Website</button>
        </div>
    </form>
</div>
@endsection