@extends('layouts.common.home')

@section('title', 'Buy Quality Curated Links & Link Insertions to Boost Your SEO')
@section('meta_description', "Boost your website ranking with GetSEOLinks' quality curated links & link insertions. Our custom services draw organic traffic and expand your audience.")

@section('content')
@viteReactRefresh
@vite('resources/js/components/common/CuratedLinks.jsx')
<div id="curated-links"></div>
@endsection