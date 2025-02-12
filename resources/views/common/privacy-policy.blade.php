@extends('layouts.common.home')

@section('title', 'GetSEOLinks - Privacy Policy and Cookie Policy')
@section('meta_description', "Please read GetSEOLinks' Privacy Policy and Cookie Policy carefully. Discover what we do with your website data.")

@section('content')
@viteReactRefresh
@vite('resources/js/components/common/GSLPolicy.jsx')
<div id="privacy-policy"></div>
@endsection