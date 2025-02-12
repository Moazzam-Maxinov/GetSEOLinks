@extends('layouts.common.home')

@section('title', 'GetSEOLinks - Terms and Conditions')
@section('meta_description', "Please read GetSEOLinks' Terms & Conditions carefully. Understand your relationship with GetSEOLinks ('Website').")

@section('content')
@viteReactRefresh
@vite('resources/js/components/common/TermsConditions.jsx')
<div id="terms-conditions"></div>
@endsection