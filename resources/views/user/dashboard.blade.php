{{-- User Dashboard --}}
@extends('layouts.user.user')

@section('content')
    {{-- @viteReactRefresh --}}
    {{-- <h1>{{ $role }}</h1> --}}

    @if ($role == 'publisher')
        @viteReactRefresh
        @vite('resources/js/components/user/PublisherDashboard.jsx')
        <div id="publisher-dashboard" class="px-6"></div>
    @else
        @viteReactRefresh
        @vite('resources/js/components/user/VendorDashboard.jsx')
        <div id="vendor-dashboard" class="px-6" data-categories="{{ json_encode($initialCategories) }}"></div>
    @endif
    {{-- @viteReactRefresh
    @vite('resources/js/components/user/PublisherDashboard.jsx')
    <div id="publisher-dashboard" class="px-6"></div> --}}
@endsection
