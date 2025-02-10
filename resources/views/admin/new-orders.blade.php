@extends('layouts.admin.admin')

@section('content')
    @viteReactRefresh
    @vite('resources/js/components/admin/NewOrders.jsx')
    <div id="new-orders" class="px-6"></div>
@endsection
