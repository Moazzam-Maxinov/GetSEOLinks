@extends('layouts.admin.admin')

@section('title', 'Add New Website')
@section('meta_description', 'Add a new website to store in the database')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
            <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
                <!-- Header -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Add New Website</h2>
                    <p class="mt-1 text-sm text-gray-600">Enter the website details below to add it to your collection.</p>
                </div>

                <!-- Alerts -->
                @if (session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-sm text-red-700">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form id="websiteForm" action="{{ route('admin.add-website') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Grid layout for form fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Website Name</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('name') }}" required>
                        </div>

                        <!-- URL -->
                        <div>
                            <label for="url" class="block text-sm font-medium text-gray-700">Website URL</label>
                            <input type="url" name="url" id="url"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('url') }}" required>
                        </div>

                        <!-- Category -->
                        {{-- <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category_id" id="category_id"
                                class="select2-single mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                required>
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}

                        <!-- Change from category_id to categories[] -->
                        <div class="mt-1">
                            <label for="categories" class="block text-sm font-medium text-gray-700">Categories</label>
                            <select name="categories[]" id="categories" class="select2-multiple" multiple required>
                                <option value="">Select Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Monthly Traffic -->
                        <div>
                            <label for="monthly_traffic" class="block text-sm font-medium text-gray-700">Monthly
                                Traffic</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="number" name="monthly_traffic" id="monthly_traffic"
                                    class="block w-full rounded-md border-gray-300 pl-3 pr-12 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    value="{{ old('monthly_traffic') }}">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">visits</span>
                                </div>
                            </div>
                        </div>

                        <!-- Domain Rating -->
                        <div>
                            <label for="domain_rating" class="block text-sm font-medium text-gray-700">Domain Rating
                                (0-100)</label>
                            <div class="flex items-center space-x-3">
                                <input type="range" name="domain_rating" id="domain_rating" class="mt-1 block w-full"
                                    min="0" max="100" value="{{ old('domain_rating', 0) }}">
                                <span id="domain_rating_value" class="text-sm text-gray-500 w-12 text-center">0</span>
                            </div>
                        </div>

                        <!-- Domain Authority -->
                        <div>
                            <label for="domain_authority" class="block text-sm font-medium text-gray-700">Domain Authority
                                (0-100)</label>
                            <div class="flex items-center space-x-3">
                                <input type="range" name="domain_authority" id="domain_authority"
                                    class="mt-1 block w-full" min="0" max="100"
                                    value="{{ old('domain_authority', 0) }}">
                                <span id="domain_authority_value" class="text-sm text-gray-500 w-12 text-center">0</span>
                            </div>
                        </div>

                        <!-- Spam Score -->
                        <div>
                            <label for="spam_score" class="block text-sm font-medium text-gray-700">Spam Score</label>
                            <input type="number" name="spam_score" id="spam_score"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('spam_score') }}" min="0" max="100" step="0.01">
                        </div>

                        <!-- Turnaround Time -->
                        <div>
                            <label for="turnaround_time" class="block text-sm font-medium text-gray-700">Turnaround
                                Time</label>
                            <input type="text" name="turnaround_time" id="turnaround_time"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('turnaround_time') }}" placeholder="e.g., 3-5 days">
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" name="price" id="price"
                                    class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    value="{{ old('price') }}" step="0.01">
                            </div>
                        </div>

                        <!-- Language -->
                        <div>
                            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                            <select name="language" id="language"
                                class="select2-single mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Select Language</option>
                                <option value="en" {{ old('language') == 'en' ? 'selected' : '' }}>English</option>
                                <option value="es" {{ old('language') == 'es' ? 'selected' : '' }}>Spanish</option>
                                <option value="fr" {{ old('language') == 'fr' ? 'selected' : '' }}>French</option>
                                <option value="de" {{ old('language') == 'de' ? 'selected' : '' }}>German</option>
                                <!-- Add more languages as needed -->
                            </select>
                        </div>

                        <!-- Quality Score -->
                        <div>
                            <label for="quality_score" class="block text-sm font-medium text-gray-700">Quality Score
                                (1-5)</label>
                            <select name="quality_score" id="quality_score"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Select Score</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}"
                                        {{ old('quality_score') == $i ? 'selected' : '' }}>
                                        {{ $i }} {{ str_repeat('★', $i) }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Max Dofollow Links -->
                        <div>
                            <label for="max_dofollow_links" class="block text-sm font-medium text-gray-700">Max Dofollow
                                Links</label>
                            <input type="number" name="max_dofollow_links" id="max_dofollow_links"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('max_dofollow_links') }}" min="0">
                        </div>

                        <!-- Minimum Word Count -->
                        <div>
                            <label for="minimum_word_count" class="block text-sm font-medium text-gray-700">Minimum Word
                                Count</label>
                            <input type="number" name="minimum_word_count" id="minimum_word_count"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('minimum_word_count') }}" min="0">
                        </div>

                        <!-- Allowed Link Types -->
                        <div>
                            <label for="allowed_link_types" class="block text-sm font-medium text-gray-700">Allowed Link
                                Types</label>
                            <select name="allowed_link_types[]" id="allowed_link_types" class="select2-multiple"
                                multiple>
                                <option value="do-follow"
                                    {{ in_array('do-follow', old('allowed_link_types', [])) ? 'selected' : '' }}>Do-Follow
                                </option>
                                <option value="no-follow"
                                    {{ in_array('no-follow', old('allowed_link_types', [])) ? 'selected' : '' }}>No-Follow
                                </option>
                            </select>
                        </div>

                        <!-- Payment Methods -->
                        <div>
                            <label for="payment_methods" class="block text-sm font-medium text-gray-700">Payment
                                Methods</label>
                            <select name="payment_methods[]" id="payment_methods" class="select2-multiple" multiple>
                                <option value="paypal"
                                    {{ in_array('paypal', old('payment_methods', [])) ? 'selected' : '' }}>PayPal</option>
                                <option value="bank_transfer"
                                    {{ in_array('bank_transfer', old('payment_methods', [])) ? 'selected' : '' }}>Bank
                                    Transfer</option>
                                <option value="credit_card"
                                    {{ in_array('credit_card', old('payment_methods', [])) ? 'selected' : '' }}>Credit Card
                                </option>
                                <option value="crypto"
                                    {{ in_array('crypto', old('payment_methods', [])) ? 'selected' : '' }}>Cryptocurrency
                                </option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="msd:col-span-2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <!-- Content Guidelines -->
                        <div class="md:col-span-2">
                            <label for="content_guidelines" class="block text-sm font-medium text-gray-700">Content
                                Guidelines</label>
                            <textarea name="content_guidelines" id="content_guidelines" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                placeholder="Enter any specific content guidelines or requirements">{{ old('content_guidelines') }}</textarea>
                        </div>


                        <!-- Submit Button -->
                        <div class="md:col-span-2 pt-5">
                            <button type="submit" id="submitBtn"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                                Add Website
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Initialize Select2 for multiple select boxes
                $('.select2-multiple').select2({
                    theme: 'classic',
                    placeholder: 'Select options',
                    allowClear: true,
                    tags: true,
                    width: '100%'
                });

                // Initialize Select2 for single select boxes
                $('.select2-single').select2({
                    theme: 'classic',
                    placeholder: 'Select an option',
                    allowClear: true,
                    width: '100%'
                });

                // Range input displays
                $('#domain_rating, #domain_authority').on('input', function() {
                    $(`#${this.id}_value`).text(this.value);
                });

                // Form submission handling
                $('#websiteForm').on('submit', function() {
                    const $btn = $('#submitBtn');
                    const originalText = $btn.text();

                    $btn.prop('disabled', true)
                        .html(
                            '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Processing...'
                        );

                    // Form submits automatically after this
                });
            });
        </script>
    @endpush
@endsection
