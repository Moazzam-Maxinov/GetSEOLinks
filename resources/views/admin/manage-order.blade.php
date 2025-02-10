@extends('layouts.admin.admin')
@section('content')
    <input type="hidden" id="orderId" name="orderId" value={{ $order->id }}>
    @viteReactRefresh
    @vite('resources/js/components/admin/ManageOrder.jsx')
    <div id="manage-order" class="px-6"></div>
@endsection
