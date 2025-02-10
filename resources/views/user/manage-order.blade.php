@extends('layouts.user.user')
@section('content')
    <input type="hidden" id="orderId" name="orderId" value={{ $order->id }}>
    @viteReactRefresh
    @vite('resources/js/components/user/ManageOrder.jsx')
    <div id="manage-order" class="px-6"></div>
@endsection
