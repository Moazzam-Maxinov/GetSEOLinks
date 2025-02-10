@extends('layouts.admin.admin')
@section('styles')
    <style>
        .tooltip {
            position: absolute;
            z-index: 1000;
            padding: 8px;
            background: #333;
            color: #fff;
            border-radius: 4px;
            font-size: 12px;
            max-width: 300px;
        }
    </style>
@endsection
@section('content')
    <div class="p-6">
        <!-- Search and Filter Section -->
        <div class="mb-6 grid grid-cols-1 gap-4 lg:grid-cols-6">
            <!-- Search Bar -->
            <div class="relative lg:col-span-2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search"
                    class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search websites...">
            </div>

            <!-- Filters -->
            <div>
                <select
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>All Categories</option>
                    <option>Business</option>
                    <option>Technology</option>
                    <option>News</option>
                </select>
            </div>
            <div>
                <select
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>Monthly Traffic</option>
                    <option>0 - 5k</option>
                    <option>5k - 20k</option>
                    <option>20k+</option>
                </select>
            </div>
            <div>
                <select
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>Domain Rating</option>
                    <option>0 - 30</option>
                    <option>31 - 60</option>
                    <option>61+</option>
                </select>
            </div>
            <div>
                <select
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>Language</option>
                    <option>English</option>
                    <option>Spanish</option>
                    <option>French</option>
                </select>
            </div>
        </div>

        <!-- Websites Table -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">URL</th>
                        <th scope="col" class="px-6 py-3">Categories</th>
                        <th scope="col" class="px-6 py-3">Monthly Traffic</th>
                        <th scope="col" class="px-6 py-3">DR</th>
                        <th scope="col" class="px-6 py-3">DA</th>
                        <th scope="col" class="px-6 py-3">Language</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($websites as $website)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <a href="{{ $website->url }}" target="_blank"
                                        class="font-medium text-blue-600 hover:text-blue-800" title="{{ $website->url }}">
                                        {{ Str::limit($website->url, 30) }}
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($website->categories as $category)
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                        {{ $category->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($website->monthly_traffic) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $website->domain_rating }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $website->domain_authority }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $website->language }}
                            </td>
                            <td class="px-6 py-4">
                                {{-- <a href="{{ route('admin.website.details', $website->id) }}" --}}
                                <a href="#"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $websites->links() }}
        </div>
    </div>

    @push('scripts')
        <script>
            // Add tooltip functionality for long URLs
            $(document).ready(function() {
                $('[title]').hover(
                    function() {
                        var title = $(this).attr('title');
                        $(this).data('tipText', title).removeAttr('title');
                        $('<p class="tooltip"></p>')
                            .text(title)
                            .appendTo('body')
                            .fadeIn('slow');
                    },
                    function() {
                        $(this).attr('title', $(this).data('tipText'));
                        $('.tooltip').remove();
                    }
                );
            });
        </script>
    @endpush
@endsection
