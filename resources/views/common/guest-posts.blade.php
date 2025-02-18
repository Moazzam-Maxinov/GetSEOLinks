@php
    use Spatie\SchemaOrg\Schema;

    // WebPage Schema for Guest Post Page
    $webPageSchema = Schema::webPage()
        ->id("https://getseolinks.com/guest-posts")
        ->url("https://getseolinks.com/guest-posts")
        ->name("Buy Guest Posts on Trusted Websites")
        ->isPartOf(Schema::webSite()->id("https://getseolinks.com/#website"))
        ->description("Buy guest posts on trusted and high-quality websites in your niche. GetSEOLinks' guest posting service helps boost your online credibility.")
        ->breadcrumb(Schema::breadcrumbList()->id("https://getseolinks.com/guest-posts/#breadcrumb"))
        ->inLanguage("en-US")
        ->potentialAction([
            Schema::readAction()->target("https://getseolinks.com/guest-posts")
        ])
        ->toScript();

    // BreadcrumbList Schema for Guest Post Page
    $breadcrumbListSchema = Schema::breadcrumbList()
        ->id("https://getseolinks.com/guest-posts/#breadcrumb")
        ->itemListElement([
            Schema::listItem()->position(1)->name("Home")->item("https://getseolinks.com/"),
            Schema::listItem()->position(2)->name("Guest Posts")
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

        // FAQPage Schema
    $faqSchema = Schema::faqPage()
        ->mainEntity([
            Schema::question()
                ->name("What Is Guest Posting?")
                ->acceptedAnswer(
                    Schema::answer()->text("Guest posting often called guest blogging is
                                    a content marketing method where you create
                                    an original article and publish it on a
                                    website that you don't own. This post
                                    typically includes a link that directs
                                    readers back to your main site.")
                ),
            Schema::question()
                ->name("What Are Guest Posts?")
                ->acceptedAnswer(
                    Schema::answer()->text("Guest posts, sometimes called guest blog
                                        entries, are new articles created to
                                        promote your brand and build your online
                                        credibility and trust. \nAt GetSEOLinks, when you purchase a
                                        guest post from us, our team writes an
                                        original article of over 800 words that
                                        is specifically tailored to your website
                                        and industry. We then reach out directly
                                        to real website owners to secure a spot
                                        for your premium guest blog entry, which
                                        includes a link back to your site.")
                ),
            Schema::question()
                ->name("How Do You Ensure the Quality of the Guest
                                    Posts?")
                ->acceptedAnswer(
                    Schema::answer()->text("Our guest posts are written by a dedicated
                                    team of experienced professionals who
                                    produce original, captivating, and
                                    thoroughly researched content. As one of the
                                    leading guest post agencies, we make it a
                                    point to work only with well-regarded
                                    websites, ensuring that every post meets our
                                    high quality standards.")
                ),
            Schema::question()
                ->name("What Is DA (Domain Authority)?")
                ->acceptedAnswer(
                    Schema::answer()->text("Domain Authority, or DA, is a score
                                    developed by Moz that predicts a website’s
                                    potential to rank in search engine results.
                                    This metric ranges from 1 to 100, with
                                    higher scores indicating a stronger ability
                                    to perform well in search rankings.")
                ),
            Schema::question()
                ->name("How Long Does It Take to Get a Guest Post
                                    Published?")
                ->acceptedAnswer(
                    Schema::answer()->text("Typically, the process from initial outreach
                                    to publication takes about one to two weeks.
                                    Keep in mind that this timeframe can vary
                                    based on the editorial schedule of the
                                    target website, and it might extend slightly
                                    if you order more than 25 guest posts.")
),
            Schema::question()
                ->name("What Happens If a Guest Post Is Removed or
                                    the Link Is Broken?")
                ->acceptedAnswer(
                    Schema::answer()->text("We stand behind our work with a 12-month
                                    warranty on all guest posts. If a post is
                                    taken down or a link stops working within
                                    this period, we will replace it with a
                                    similar guest post at no extra charge.")
),
            Schema::question()
                ->name("Can I Get a Refund If I'm Not Satisfied With
                                    the Guest Post?")
                ->acceptedAnswer(
                    Schema::answer()->text("Your satisfaction is our top priority, which
                                    is why we offer unlimited revisions for
                                    guest posts whenever needed. However,
                                    because of the way our service is
                                    structured, we are unable to provide refunds
                                    once a guest post has been published.")
                )
        ])
        ->toScript();
@endphp

@section('schema')
    {!! $webPageSchema !!}
    {!! $breadcrumbListSchema !!}
    {!! $webSiteSchema !!}
    {!! $organizationSchema !!}
    {!! $faqSchema !!}
@endsection


@extends('layouts.common.home')

@section('title', 'Buy Guest Posts on Trusted Websites')
@section('meta_description', "Buy guest posts on trusted and high-quality websites in your niche. GetSEOLinks' guest posting service helps boost your online credibility.")

@section('content')
@viteReactRefresh
@vite('resources/js/components/common/GuestPosts.jsx')
<div id="guest-posts"></div>
@endsection