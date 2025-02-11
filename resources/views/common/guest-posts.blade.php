@extends('layouts.common.home')

@section('content')
@viteReactRefresh
@vite('resources/js/components/common/GuestPosts.jsx')
<div id="guest-posts"></div>
@endsection