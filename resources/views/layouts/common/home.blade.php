<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Write for us - Buy SEO Backlinks - GetSEOLinks')</title>
    <meta name="description" content="@yield('meta_description', 'Write for us and buy high-quality SEO backlinks at Get SEO Links. We offer guest posts, link insertions, and SEO content writing on trusted niche sites.')">
    {{-- <meta name="keywords" content="@yield('meta_keywords', 'admin, dashboard, link market')">
    <meta name="author" content="@yield('meta_author', 'Your Name or Company')"> --}}

    <!-- Open Graph Meta Tags -->
    {{-- <meta property="og:title" content="@yield('og_title', @yield('title', 'LinkMarket - Admin Dashboard'))">
    <meta property="og:description" content="@yield('og_description', @yield('meta_description', 'Default description for your admin dashboard'))">
    <meta property="og:image" content="@yield('og_image', asset('images/default-og-image.png'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="@yield('og_type', 'website')">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', @yield('title', 'LinkMarket - Admin Dashboard'))">
    <meta name="twitter:description" content="@yield('twitter_description', @yield('meta_description', 'Default description for your admin dashboard'))">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/default-twitter-image.png'))"> --}}

    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    <!--Index and Follow-->
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    
    <!--Google Search Console Verfication Code-->
    <meta name="google-site-verification" content="r2Mcp80LlD4VTVVTW_u6gD3iWAlt518pJ26wsXavK88" />

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Flowbite and Select2 Styles -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- App CSS -->
    @vite('resources/css/app.css')
    @yield('styles') <!-- Include custom styles here -->
</head>

<body class="bg-gray-100">
    <!-- Header Section -->
    @include('layouts.common.common-header')

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer Section -->
    @include('layouts.common.common-footer')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @stack('scripts') <!-- Include custom scripts here -->
</body>

</html>
