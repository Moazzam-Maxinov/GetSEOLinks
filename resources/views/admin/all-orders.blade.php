@extends('layouts.admin.admin')

@section('content')
    @viteReactRefresh
    @vite('resources/js/components/admin/AllOrders.jsx')
    <div id="all-orders" class="px-6"></div>
@endsection
