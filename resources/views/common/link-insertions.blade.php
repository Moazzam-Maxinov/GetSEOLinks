@php
    use Spatie\SchemaOrg\Schema;

    // WebPage Schema for Guest Post Page
    $webPageSchema = Schema::webPage()
        ->id("https://getseolinks.com/link-insertions")
        ->url("https://getseolinks.com/link-insertions")
        ->name("Buy Quality Link Insertions to Boost Your SEO")
        ->isPartOf(Schema::webSite()->id("https://getseolinks.com/#website"))
        ->description("Boost your website ranking with GetSEOLinks' quality link insertions. Our custom services draw organic traffic and expand your audience.")
        ->breadcrumb(Schema::breadcrumbList()->id("https://getseolinks.com/link-insertions/#breadcrumb"))
        ->inLanguage("en-US")
        ->potentialAction([
            Schema::readAction()->target("https://getseolinks.com/link-insertions")
        ])
        ->toScript();

    // BreadcrumbList Schema for Guest Post Page
    $breadcrumbListSchema = Schema::breadcrumbList()
        ->id("https://getseolinks.com/link-insertions/#breadcrumb")
        ->itemListElement([
            Schema::listItem()->position(1)->name("Home")->item("https://getseolinks.com/"),
            Schema::listItem()->position(2)->name("Link Insertions")
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
                ->name("What Are Link Insertions?")
                ->acceptedAnswer(
                    Schema::answer()->text("Link Insertions are backlinks placed within existing, high-quality, and relevant content. Each link acts as an endorsement for your website, since search engines take these signals into account when evaluating your site’s trustworthiness and authority. This, in turn, helps improve your site’s visibility, keyword rankings, and overall traffic.")
                ),
            Schema::question()
                ->name("How Do Link Insertions Work?")
                ->acceptedAnswer(
                    Schema::answer()->text("Often referred to as niche edits or in-content backlinks, these links are highly effective because they are inserted into content that is already live, indexed, and holds considerable authority in Google’s records. This method often produces faster and sustained SEO benefits.")
                ),
            Schema::question()
                ->name("Are Link Insertions “White Hat”?")
                ->acceptedAnswer(
                    Schema::answer()->text("Google’s guidelines caution against building or paying for links. However, our link insertions are arranged so they appear natural—real website owners are the ones placing them, which aligns with Google’s expectations.")
                ),
            Schema::question()
                ->name("How Do Link Insertions Differ From Guest Posts?")
                ->acceptedAnswer(
                    Schema::answer()->text("Guest posting involves writing and publishing new content on another website, whereas link insertions (or niche edits) involve inserting a link into an already published article. Both techniques are used to boost search rankings and drive traffic, though they follow different procedures.")
                ),
            Schema::question()
                ->name("What Is RD (Referring Domains)?")
                ->acceptedAnswer(
                    Schema::answer()->text("RD stands for “Referring Domains” and indicates the number of unique domains that link back to your website. For example, if your site receives 15,000 backlinks from 536 different domains, its RD would be 536.")
),
            Schema::question()
                ->name("How Do You Choose the Right Websites for Link Insertions?")
                ->acceptedAnswer(
                    Schema::answer()->text("We select websites based on a number of factors, including relevance to your niche, the number of referring domains (RD), Domain Authority (DA), organic traffic, and the overall quality of the site. Our aim is to secure placements on reputable sites that fit well with your industry and target audience.")
),
            Schema::question()
                ->name("How Long Do Link Insertions Last?")
                ->acceptedAnswer(
                    Schema::answer()->text("In a perfect scenario, they would be permanent. However, websites can change focus or expire over time, which means we cannot control the lifespan of the links. That said, we guarantee that all links will remain active for at least 12 months, and we will replace any that are removed within that period.")
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

@section('title', 'Buy Quality Link Insertions to Boost Your SEO')
@section('meta_description', "Boost your website ranking with GetSEOLinks' quality link insertions. Our custom services draw organic traffic and expand your audience.")

@section('content')
@viteReactRefresh
@vite('resources/js/components/common/LinkInsertions.jsx')
<div id="link-insertions"></div>
@endsection