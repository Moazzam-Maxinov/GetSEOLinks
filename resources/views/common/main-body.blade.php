@extends('layouts.common.home')

@section('content')
@viteReactRefresh
@vite('resources/js/components/common/Home.jsx')
<div id="main-body"></div>
@endsection