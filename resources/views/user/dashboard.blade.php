{{-- User Dashboard --}}
@extends('layouts.user.user')

@section('content')
    {{-- @viteReactRefresh --}}

    @if ($role == 'publisher')
        @viteReactRefresh
        @vite('resources/js/components/user/PublisherDashboard.jsx')
        <div id="publisher-dashboard" class="px-6"></div>
    @else
        @viteReactRefresh
        @vite('resources/js/components/user/VendorDashboard.jsx')
        <div id="vendor-dashboard" class="px-6"></div>
    @endif
    {{-- @viteReactRefresh
    @vite('resources/js/components/user/PublisherDashboard.jsx')
    <div id="publisher-dashboard" class="px-6"></div> --}}
@endsection
