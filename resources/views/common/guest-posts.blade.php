@extends('layouts.common.home')

@section('title', 'Buy Guest Posts on Trusted Websites')
@section('meta_description', "Buy guest posts on trusted and high-quality websites in your niche. GetSEOLinks' guest posting service helps boost your online credibility.")

@section('content')
@viteReactRefresh
@vite('resources/js/components/common/GuestPosts.jsx')
<div id="guest-posts"></div>
@endsection