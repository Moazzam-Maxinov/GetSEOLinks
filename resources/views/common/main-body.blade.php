@php
    use Spatie\SchemaOrg\Schema;

    // FAQPage Schema
    $faqSchema = Schema::faqPage()
        ->mainEntity([
            Schema::question()
                ->name("How much time does it take to rank in Google's Top 10?")
                ->acceptedAnswer(
                    Schema::answer()->text("The time frame varies based on how competitive your niche is and the number of quality backlinks needed to surpass your competitors.")
                ),
            Schema::question()
                ->name("What are your link prices, and how can I view them?")
                ->acceptedAnswer(
                    Schema::answer()->text("The cost of links varies widely, starting as low as $0.01 and going up indefinitely. Pricing depends on several factors and is determined by publishers rather than our backlink service. After signing up and logging in, you’ll find that we offer only high-quality backlinks. To view the most affordable options, create an account, log in at https://getseolinks.com/login/, and sort the list by price by clicking on the 'Cost' column.")
                ),
            Schema::question()
                ->name("How can we assist you?")
                ->acceptedAnswer(
                    Schema::answer()->text("We can help increase your website’s traffic and sales by improving its ranking on Google and other search engines. A higher position means more visitors and potential customers finding your site. Our approach involves creating high-quality backlinks with DA40-DA60 to strengthen your online presence and boost search visibility.")
                ),
            Schema::question()
                ->name("How much will it cost me to get in the Top 10 of Google?")
                ->acceptedAnswer(
                    Schema::answer()->text("The cost of ranking in Google's Top 10 varies based on your industry and location. For instance, if your business operates in Delhi or Australia, you might spend around $50 to $200 per month. However, in highly competitive markets like the USA, UK, or Canada, the cost typically ranges between $500 and $1,000 due to stronger competition.")
                ),
            Schema::question()
                ->name("Why are your whitehat links 10 times more effective?")
                ->acceptedAnswer(
                    Schema::answer()->text("When you invest in our backlinks, you can expect a significant improvement in your search engine ranking. Links from GetSEOLinks are 10 times more powerful than regular links because: \nEvery one of our links is surrounded by content relevant to your site. \nAll our links are added manually, ensuring they appear natural to Google and other search engines.")
                )
        ])
        ->toScript();

    // WebPage Schema
    $webPageSchema = Schema::webPage()
        ->id("https://getseolinks.com/")
        ->url("https://getseolinks.com/")
        ->name("Write for us - Buy SEO Backlinks - GetSEOLinks")
        ->isPartOf(Schema::webSite()->id("https://getseolinks.com/#website"))
        ->about(Schema::organization()->id("https://getseolinks.com/#organization"))
        ->description("Write for us and buy high-quality SEO backlinks at Get SEO Links. We offer guest posts, link insertions, and SEO content writing on trusted niche sites.")
        ->breadcrumb(Schema::breadcrumbList()->id("https://getseolinks.com/#breadcrumb"))
        ->inLanguage("en-US")
        ->potentialAction([
            Schema::readAction()->target("https://getseolinks.com/")
        ])
        ->toScript();

    // BreadcrumbList Schema
    $breadcrumbListSchema = Schema::breadcrumbList()
        ->id("https://getseolinks.com/#breadcrumb")
        ->itemListElement([
            Schema::listItem()->position(1)->name("Home")
        ])
        ->toScript();

    // WebSite Schema
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

    // Organization Schema
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
    {!! $faqSchema !!}
    {!! $webPageSchema !!}
    {!! $breadcrumbListSchema !!}
    {!! $webSiteSchema !!}
    {!! $organizationSchema !!}
@endsection


@extends('layouts.common.home')

@section('content')
@viteReactRefresh
@vite('resources/js/components/common/Home.jsx')
<div id="main-body"></div>
@endsection