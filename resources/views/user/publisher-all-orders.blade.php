@extends('layouts.user.user')

@section('content')
    @viteReactRefresh
    @vite('resources/js/components/user/PublisherAllOrders.jsx')
    <div id="publisher-all-orders" class="px-6"></div>
@endsection
