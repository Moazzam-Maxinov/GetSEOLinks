@extends('layouts.admin.admin')

@section('content')
    <h2>Welcome to the Admin Dashboard!</h2>
    @viteReactRefresh
    @vite('resources/js/components/admin/AdminDashboard.jsx')
    <div id="admin-dashboard" class="px-6"></div>
@endsection
