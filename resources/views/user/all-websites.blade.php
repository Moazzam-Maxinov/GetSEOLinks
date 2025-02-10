@extends('layouts.user.user')

@section('content')
    @viteReactRefresh
    @vite('resources/js/components/user/WebsitesTable.jsx')
    <div id="all-websites" class="px-6" data-categories="{{ json_encode($initialCategories) }}"></div>
@endsection
