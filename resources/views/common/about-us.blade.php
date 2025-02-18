@php
    use Spatie\SchemaOrg\Schema;

    // WebPage Schema for Guest Post Page
    $webPageSchema = Schema::webPage()
        ->id("https://getseolinks.com/about-us")
        ->url("https://getseolinks.com/about-us")
        ->name("About GetSEOLinks: Link Building Services That Work")
        ->isPartOf(Schema::webSite()->id("https://getseolinks.com/#website"))
        ->description("Find out what sets GetSEOLinks apart from the competition and how we deliver exceptional link building services.")
        ->breadcrumb(Schema::breadcrumbList()->id("https://getseolinks.com/about-us/#breadcrumb"))
        ->inLanguage("en-US")
        ->potentialAction([
            Schema::readAction()->target("https://getseolinks.com/about-us")
        ])
        ->toScript();

    // BreadcrumbList Schema for Guest Post Page
    $breadcrumbListSchema = Schema::breadcrumbList()
        ->id("https://getseolinks.com/about-us/#breadcrumb")
        ->itemListElement([
            Schema::listItem()->position(1)->name("Home")->item("https://getseolinks.com/"),
            Schema::listItem()->position(2)->name("About Us")
        ])
        ->toScript();

    // WebSite Schema for GetSEOLinks
    $webSiteSchema = Schema::webSite()
        ->id("https://getseolinks.com/#website")
        ->url("https://getseolinks.com/")
        ->name("GetSEOLinks")
        ->description("Write for us and buy high-quality SEO backlinks at Get SEO Links. We offer guest posts, link insertions, and SEO content writing on trusted niche sites.")
        ->publisher(Schema::organization()->id("https://getseolinks.com/#organization"))
        ->potentialAction([
            Schema::searchAction()
                ->target(Schema::entryPoint()->urlTemplate("https://getseolinks.com/?s={search_term_string}"))
                ->setProperty("query-input", "required name=search_term_string")
        ])
        ->inLanguage("en-US")
        ->toScript();

    // Organization Schema for GetSEOLinks
    $organizationSchema = Schema::organization()
        ->id("https://getseolinks.com/#organization")
        ->name("GetSEOLinks")
        ->url("https://getseolinks.com/")
        ->logo(
            Schema::imageObject()
                ->inLanguage("en-US")
                ->id("https://getseolinks.com/#/schema/logo/image/")
                ->url("https://getseolinks.com/images/logo1.webp")
                ->contentUrl("https://getseolinks.com/images/logo1.webp")
                ->width(798)
                ->height(122)
                ->caption("GetSEOLinks")
        )
        ->image("https://getseolinks.com/#/schema/logo/image/")
        ->toScript();
@endphp

@section('schema')
    {!! $webPageSchema !!}
    {!! $breadcrumbListSchema !!}
    {!! $webSiteSchema !!}
    {!! $organizationSchema !!}
@endsection

@extends('layouts.common.home')

@section('title', 'About GetSEOLinks: Link Building Services That Work')
@section('meta_description', "Find out what sets GetSEOLinks apart from the competition and how we deliver exceptional link building services.")

@section('content')
@viteReactRefresh
@vite('resources/js/components/common/AboutUs.jsx')
<div id="about-us"></div>
@endsection