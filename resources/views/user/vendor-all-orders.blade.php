@extends('layouts.user.user')

@section('content')
    @viteReactRefresh
    @vite('resources/js/components/user/VendorAllOrders.jsx')
    <div id="vendor-all-orders" class="px-6"></div>
@endsection
