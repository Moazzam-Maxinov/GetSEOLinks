@extends('layouts.user.user')

@section('content')
    @viteReactRefresh
    @vite('resources/js/components/user/PublisherNewOrders.jsx')
    <div id="publisher-new-orders" class="px-6"></div>
@endsection
