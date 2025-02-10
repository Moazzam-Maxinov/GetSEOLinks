@extends('layouts.admin.admin')
@section('content')
    @viteReactRefresh
    @vite('resources/js/components/admin/websites/WebsiteDetail.jsx')
    <div id="website-detail-app" class="px-6"></div>
@endsection
