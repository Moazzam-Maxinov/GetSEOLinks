@extends('layouts.admin.admin')
@section('content')
    @viteReactRefresh
    @vite('resources/js/components/admin/websites/index.jsx')
    <div id="websites-app" data-categories='@json($categories)' class="px-6"></div>
@endsection
