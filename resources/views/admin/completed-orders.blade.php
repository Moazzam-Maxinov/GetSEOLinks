@extends('layouts.admin.admin')

@section('content')
    @viteReactRefresh
    @vite('resources/js/components/admin/CompletedOrders.jsx')
    <div id="completed-orders" class="px-6"></div>
@endsection
