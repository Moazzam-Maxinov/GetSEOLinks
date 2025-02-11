import {
    BadgeCheck,
    ChartNoAxesCombined,
    FileText,
    MoveRight,
} from "lucide-react";
import ReactDOM from "react-dom/client";
import {
    Accordion,
    AccordionContent,
    AccordionItem,
    AccordionTrigger,
} from "../ui/accordion";
const GuestPosts = () => {
    return (
        <>
            {/* Page Hero Section */}
            <section className="py-12 md:py-16 text-white bg-primary-dark">
                <div className="container mx-auto px-6 lg:px-10 w-full space-y-5 md:space-y-7">
                    <h1 className="text-4xl md:text-5xl font-semibold">
                        Guest Posts
                    </h1>
                    <p className="text-white/90 text-lg sm:text-xl w-full md:w-[50%] ">
                        Improve your digital presence, reputation, and search
                        rankings by publishing fresh guest articles on
                        well-respected websites that match your industry.
                    </p>
                    <p className="text-white/90 text-lg sm:text-xl w-full md:w-[40%] ">
                        For only $60, our premium guest posting service builds
                        meaningful contextual connections and solid credibility
                        in any niche.
                    </p>
                    <a
                        href="/register"
                        className="bg-primary hover:bg-primary/75 text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2"
                    >
                        Buy Guest Posts <MoveRight />
                    </a>
                </div>
            </section>

            {/* Why Our Guest Post Service Section */}
            <section className="py-10 md:py-16 bg-white">
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-8 md:gap-20">
                    {/* Left Content */}
                    <div className="w-full md:w-[65%] space-y-4 md:space-y-10">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark leading-tight">
                            <span className="text-primary text-2xl md:text-4xl">
                                Why
                            </span>
                            <br /> Over 1,500 SEO Professionals Trust Our Guest
                            Posting Service
                        </h2>
                        <div className="space-y-6">
                            <p className="text-primary-neutral text-lg sm:text-xl opacity-75">
                                Every guest post begins with our hands-on
                                outreach, followed by obtaining links from
                                genuine websites managed by real people. Each
                                article is over 800 words and offers content
                                that sends clear, contextual signals to Google.
                            </p>
                            <p className="text-primary-neutral text-lg sm:text-xl opacity-75">
                                To guarantee our guest posting service remains
                                top quality, we review every site carefully —
                                assessing factors like traffic, content
                                relevance, authority, and many others. Most
                                clients choose guest posts to build strong
                                topical signals for their websites.
                            </p>
                        </div>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[35%]">
                        <div className="bg-primary p-10 rounded-lg shadow-sm space-y-4">
                            {/* <span className="text-primary-dark">
                                <Clock4 size={40} />
                            </span> */}
                            <h3 className="text-primary-dark font-bold text-2xl">
                                What are the benefits of Guest Posting?
                            </h3>
                            <p className="text-white">
                                Curated links are widely seen as one of the best
                                ways to build authority and boost your site's
                                link profile. Guest posts, in contrast, offer
                                much stronger signals of topical relevance
                                because they include over 800 words of
                                supporting content that directly relates to your
                                niche. Using both methods together creates a
                                link building campaign that delivers solid,
                                measurable results.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Benefits of Guest Post Service Section */}
            <section className="bg-primary-BG1 py-12 md:py-20 space-y-16 md:space-y-20">
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="text-center">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark leading-tight">
                            <span className="text-primary text-2xl md:text-4xl">
                                Benefits
                            </span>
                            <br /> Buying Guest Post From Us
                        </h2>
                    </div>

                    {/* Benefits Grid Layout */}
                    <div className="mt-12 sm:mt-20 mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
                        {/* First Benefit */}
                        <div className="bg-white p-8 rounded-lg shadow-sm space-y-4">
                            <div className="bg-primary p-4 rounded-full inline-flex">
                                <FileText className="text-white" size={36} />
                            </div>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Content control
                            </h3>
                            <p className="text-primary-neutral/75">
                                Our guest posting service focuses on producing
                                original content, giving you complete oversight
                                of the material that includes your link.
                            </p>
                        </div>

                        {/* Second Benefits */}
                        <div className="bg-white p-8 rounded-lg shadow-sm space-y-4">
                            <div className="bg-primary p-4 rounded-full inline-flex">
                                <BadgeCheck className="text-white" size={36} />
                            </div>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Build Industry Reputation
                            </h3>
                            <p className="text-primary-neutral/75">
                                You’ll receive high-quality backlinks from
                                respected websites that are relevant to your
                                industry.
                            </p>
                        </div>

                        {/* Third Benefits */}
                        <div className="bg-white p-8 rounded-lg shadow-sm space-y-4">
                            <div className="bg-primary p-4 rounded-full inline-flex">
                                <ChartNoAxesCombined
                                    className="text-white"
                                    size={36}
                                />
                            </div>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Expand Visibility & Reach
                            </h3>
                            <p className="text-primary-neutral/75">
                                Our guest post service is crafted to secure
                                strong backlinks that gradually boost your
                                website’s authority and traffic over time.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* What is Guest Posting Section */}
            <section className="bg-white py-12 md:py-20 space-y-16 md:space-y-20">
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="text-center space-y-5">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark">
                            What Is {""}
                            <span className="text-primary">Guest Posting?</span>
                        </h2>
                        <p className="text-primary-neutral/75 text-lg sm:text-xl px-0 md:px-16">
                            Guest Posts often called Guest Blog Posts offer an
                            excellent method for building strong backlinks,
                            boosting your website's online presence, and
                            improving your keyword rankings and traffic.
                        </p>
                        <p className="text-primary-neutral/75 text-lg sm:text-xl px-0 md:px-16">
                            As a leading provider of guest post and blogger
                            outreach services, we offer a valuable addition to
                            your ongoing link-building efforts. Our US-based
                            team creates original, topic-relevant posts that
                            naturally incorporate your link into the content. We
                            follow a straightforward outreach approach to choose
                            the best website for your post by considering
                            factors like the site's current content, relevance,
                            authority, and DA score.
                        </p>
                        <p className="text-primary-neutral/75 text-lg sm:text-xl px-0 md:px-16">
                            Why do clients choose guest posts from GetSEOLinks?
                            Simply put, our top-notch service helps expand your
                            link profile and adds real value to your website.
                            Our team draws on years of industry experience to
                            pinpoint guest post opportunities that meet your
                            business needs, providing you with a service
                            tailored just for you.
                        </p>
                        <p className="text-primary-neutral/75 text-lg sm:text-xl px-0 md:px-16">
                            Ready to see more website traffic? Find out why over
                            1,500 SEOs have placed their trust in us for guest
                            posting.
                        </p>
                    </div>
                </div>
            </section>

            {/* CTA Section */}
            <section className="bg-white py-12 md:py-20">
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-12 md:gap-6 bg-primary-BG3 px-8 md:px-16 py-10 md:py-16 rounded-lg text-white">
                        <h5 className="text-3xl font-semibold">
                            Increase Your Website Traffic With Our Guest Posts
                            Service
                        </h5>
                        <a
                            href="/register"
                            className="bg-primary-light hover:bg-[#8adb0b] text-primary-BG3 text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2"
                        >
                            Buy Guest Posts <MoveRight />
                        </a>
                    </div>
                </div>
            </section>

            {/* FAQs Section */}
            <section className="bg-primary-BG1 py-12 md:py-20 space-y-16 md:space-y-20">
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="text-center space-y-4">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark">
                            Guest Post {""}
                            <span className="text-primary">FAQs</span>
                        </h2>
                        <p className="text-primary-neutral text-lg sm:text-xl px-0 md:px-40">
                            Below are a few of the questions we receive most
                            often. If your question isn’t listed, please feel
                            free to reach out to our customer support
                            team—they’re here to help.
                        </p>
                    </div>
                    <div className="mt-12 sm:mt-20 max-w-4xl mx-auto">
                        <Accordion
                            type="multiple"
                            collapsible="true"
                            className="w-full space-y-5"
                        >
                            <AccordionItem
                                value="item-1"
                                className="border bg-white border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    What Is Guest Posting?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    Guest posting often called guest blogging is
                                    a content marketing method where you create
                                    an original article and publish it on a
                                    website that you don't own. This post
                                    typically includes a link that directs
                                    readers back to your main site.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-2"
                                className="border bg-white border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    What Are Guest Posts?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg space-y-3">
                                    <p>
                                        Guest posts, sometimes called guest blog
                                        entries, are new articles created to
                                        promote your brand and build your online
                                        credibility and trust.
                                    </p>
                                    <p>
                                        At GetSEOLinks, when you purchase a
                                        guest post from us, our team writes an
                                        original article of over 800 words that
                                        is specifically tailored to your website
                                        and industry. We then reach out directly
                                        to real website owners to secure a spot
                                        for your premium guest blog entry, which
                                        includes a link back to your site.
                                    </p>
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-3"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    How Do You Ensure the Quality of the Guest
                                    Posts?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    Our guest posts are written by a dedicated
                                    team of experienced professionals who
                                    produce original, captivating, and
                                    thoroughly researched content. As one of the
                                    leading guest post agencies, we make it a
                                    point to work only with well-regarded
                                    websites, ensuring that every post meets our
                                    high quality standards.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-4"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    What Is DA (Domain Authority)?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    Domain Authority, or DA, is a score
                                    developed by Moz that predicts a website’s
                                    potential to rank in search engine results.
                                    This metric ranges from 1 to 100, with
                                    higher scores indicating a stronger ability
                                    to perform well in search rankings.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-5"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    How Long Does It Take to Get a Guest Post
                                    Published?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    Typically, the process from initial outreach
                                    to publication takes about one to two weeks.
                                    Keep in mind that this timeframe can vary
                                    based on the editorial schedule of the
                                    target website, and it might extend slightly
                                    if you order more than 25 guest posts.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-6"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    What Happens If a Guest Post Is Removed or
                                    the Link Is Broken?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    We stand behind our work with a 12-month
                                    warranty on all guest posts. If a post is
                                    taken down or a link stops working within
                                    this period, we will replace it with a
                                    similar guest post at no extra charge.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-7"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    Can I Get a Refund If I'm Not Satisfied With
                                    the Guest Post?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    Your satisfaction is our top priority, which
                                    is why we offer unlimited revisions for
                                    guest posts whenever needed. However,
                                    because of the way our service is
                                    structured, we are unable to provide refunds
                                    once a guest post has been published.
                                </AccordionContent>
                            </AccordionItem>
                        </Accordion>
                    </div>
                </div>
            </section>
        </>
    );
};

const rootElement = document.getElementById("guest-posts");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<GuestPosts />);
}

export default GuestPosts;
