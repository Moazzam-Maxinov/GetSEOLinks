import {
    BadgeCheck,
    Check,
    HandCoins,
    MoveRight,
    ServerCog,
} from "lucide-react";
import ReactDOM from "react-dom/client";
import {
    Accordion,
    AccordionContent,
    AccordionItem,
    AccordionTrigger,
} from "../ui/accordion";
const CuratedLinks = () => {
    return (
        <>
            {/* Page Hero Section */}
            <section className="py-12 md:py-16 text-white bg-primary-dark">
                <div className="container mx-auto px-6 lg:px-10 w-full space-y-5 md:space-y-7">
                    <h1 className="text-4xl md:text-5xl font-semibold">
                        Curated Links
                    </h1>
                    <p className="text-white/90 text-lg sm:text-xl w-full md:w-[50%] ">
                        Boost your website’s visibility, build its credibility,
                        and climb keyword rankings with premium, handpicked
                        backlinks placed directly within your content!
                    </p>
                    <p className="text-white/90 text-lg sm:text-xl w-full md:w-[40%] ">
                        For only <span className="font-bold">$55</span>, our
                        handpicked Curated Links (Niche Edits) provide an
                        affordable solution to improve your website’s SEO
                        performance.
                    </p>
                    <a
                        href="/register"
                        className="bg-primary hover:bg-primary/75 text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2"
                    >
                        Buy Curated Links <MoveRight />
                    </a>
                </div>
            </section>

            {/* Why Our Curated Links Service Section */}
            <section className="py-10 md:py-16 bg-white">
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-8 md:gap-20">
                    {/* Left Content */}
                    <div className="w-full md:w-[65%] space-y-4 md:space-y-10">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark leading-tight">
                            <span className="text-primary text-2xl md:text-4xl">
                                Why
                            </span>
                            <br /> Over 1,500 SEOs Choose Our Curated Links
                        </h2>
                        <div className="space-y-6">
                            <p className="text-primary-neutral text-lg sm:text-xl opacity-75">
                                Our approach to link building stands apart from
                                typical methods you won’t need to create new
                                content. Instead, we personally reach out to
                                secure placements for your links within existing
                                articles and blog posts on respected sites
                                within your niche.
                            </p>
                            <p className="text-primary-neutral text-lg sm:text-xl opacity-75">
                                This service is a proven way to build a reliable
                                set of quality links, support your target
                                keywords, and provide steady SEO improvements
                                for our clients.
                            </p>
                        </div>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[35%]">
                        <div className="bg-primary-BG1 p-10 rounded-lg shadow-sm space-y-4">
                            <h3 className="text-primary-dark font-bold text-2xl">
                                How do Curated Links Contribute To A Link
                                Building Strategy?
                            </h3>
                            <p className="text-primary-neutral/85">
                                Curated Links improve your website’s profile by
                                being embedded within content that already
                                performs well. This placement means they pass on
                                more “link juice” compared to other link types.
                                Even though they might not offer as much content
                                as{" "}
                                <a
                                    href="/guest-posts"
                                    className="text-primary hover:underline"
                                >
                                    Guest posts
                                </a>
                                , they still provide a solid boost to SEO.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Benefits of Curated Links Service Section */}
            <section className="bg-primary-BG1 py-12 md:py-20 space-y-16 md:space-y-20">
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="text-center">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark leading-tight">
                            <span className="text-primary text-2xl md:text-4xl">
                                Benefits
                            </span>
                            <br /> Buying Curated Links From Us
                        </h2>
                    </div>

                    {/* Benefits Grid Layout */}
                    <div className="mt-12 sm:mt-20 mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
                        {/* First Benefit */}
                        <div className="bg-white p-8 rounded-lg shadow-sm space-y-4">
                            <div className="bg-primary p-4 rounded-full inline-flex">
                                <HandCoins className="text-white" size={36} />
                            </div>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Cost-Effective
                            </h3>
                            <p className="text-primary-neutral/75">
                                Our handpicked links offer one of the most
                                affordable ways to build your backlink profile.
                            </p>
                        </div>

                        {/* Second Benefits */}
                        <div className="bg-white p-8 rounded-lg shadow-sm space-y-4">
                            <div className="bg-primary p-4 rounded-full inline-flex">
                                <ServerCog className="text-white" size={36} />
                            </div>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Faster implementation
                            </h3>
                            <p className="text-primary-neutral/75">
                                It’s much easier to connect with website owners
                                who accept links than to create and pitch
                                completely new content.
                            </p>
                        </div>

                        {/* Third Benefits */}
                        <div className="bg-white p-8 rounded-lg shadow-sm space-y-4">
                            <div className="bg-primary p-4 rounded-full inline-flex">
                                <BadgeCheck className="text-white" size={36} />
                            </div>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Quick Results
                            </h3>
                            <p className="text-primary-neutral/75">
                                You may start noticing improvements as soon as
                                the links are live and search engines update the
                                pages.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* What is Curated Links Section */}
            <section className="bg-white py-12 md:py-20 space-y-16 md:space-y-20">
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="text-center space-y-5">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark">
                            What Are {""}
                            <span className="text-primary">Curated Links?</span>
                        </h2>
                        <p className="text-primary-neutral/75 text-lg sm:text-xl px-0 md:px-16">
                            Curated Links, often referred to as “Niche Edits,”
                            are among the most efficient and budget-friendly
                            methods to secure high-quality, authoritative
                            backlinks for your website. They deliver fast,
                            long-lasting improvements in your site's SEO
                            performance.
                        </p>
                        <p className="text-primary-neutral/75 text-lg sm:text-xl px-0 md:px-16">
                            We have reshaped the way things are done and, in the
                            process, helped thousands of clients reach top
                            search engine rankings. It’s completely natural to
                            have doubts about inserting links into existing
                            content. However, our clients’ successes prove just
                            how effective a genuine, human-driven outreach
                            approach can be.
                        </p>
                        <p className="text-primary-neutral/75 text-lg sm:text-xl px-0 md:px-16">
                            So why do so many choose to buy backlinks from
                            GetSEOLinks? The answer is simple. We’re a leading
                            link building service that supplies superior
                            backlinks through a careful, manual outreach process
                            tailored specifically to your website and industry.
                            We search for a relevant blog post and page, reach
                            out personally to real site owners, and seamlessly
                            incorporate your anchor text and link into the
                            content. Whether you’re a small business owner or
                            part of an agency handling several clients, our
                            service is designed to grow with you.
                        </p>
                        <p className="text-primary-neutral/75 text-lg sm:text-xl px-0 md:px-16">
                            What are you waiting for? Begin your path to
                            improved keyword rankings and see why more than
                            1,500 SEO professionals trust us for curated link
                            building.
                        </p>
                    </div>
                </div>
            </section>

            {/* CTA Section */}
            <section className="bg-white">
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-12 md:gap-6 bg-primary-BG3 px-8 md:px-16 py-10 md:py-16 rounded-lg text-white">
                        <h5 className="text-3xl font-semibold">
                            Increase Your Website Traffic With Our Curated Links
                            Service
                        </h5>
                        <a
                            href="/register"
                            className="bg-primary-light hover:bg-[#8adb0b] text-primary-BG3 text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2"
                        >
                            Buy Curated Links <MoveRight />
                        </a>
                    </div>
                </div>
            </section>

            {/* Trust Points Section */}
            <section className="py-16 md:py-28 bg-white space-y-16 md:space-y-40">
                {/* First Point */}
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-8 md:gap-28">
                    {/* Left Content */}
                    <div className="w-full md:w-[35%]">
                        <div className="bg-primary p-10 rounded-lg shadow-sm h-96"></div>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[65%] space-y-4 md:space-y-6">
                        <h5 className="text-3xl md:text-4xl font-semibold text-primary-dark">
                            Contextually Relevant Links That Drive Results
                        </h5>
                        <p className="text-primary-neutral text-lg sm:text-xl opacity-75">
                            Once we identify a blog post or webpage that fits
                            your link, we work directly with the site owner to
                            insert your link naturally into their content. Our
                            US-based in-house team then produces the surrounding
                            text, making sure your link is supported by
                            excellent writing quality.
                        </p>
                        <hr className="border-t-1 border-primary-neutral border-opacity-20 !mt-10 !mb-12" />
                        <ul className="flex flex-col md:flex-row gap-4 md:gap-10">
                            <li className="inline-flex items-center gap-x-3 text-primary-dark font-semibold text-base">
                                <span className="bg-primary-BG2 p-1 rounded-full inline-flex">
                                    <Check className="text-primary" size={20} />
                                </span>
                                Relevant Content
                            </li>
                            <li className="inline-flex items-center gap-x-3 text-primary-dark font-semibold text-base">
                                <span className="bg-primary-BG2 p-1 rounded-full inline-flex">
                                    <Check className="text-primary" size={20} />
                                </span>
                                Expertly Written
                            </li>
                        </ul>
                    </div>
                </div>

                {/* Second Point */}
                <div className="container mx-auto px-6 lg:px-10 flex flex-col-reverse md:flex-row gap-8 md:gap-28">
                    {/* Left Content */}
                    <div className="w-full md:w-[65%] space-y-4 md:space-y-6">
                        <h5 className="text-3xl md:text-4xl font-semibold text-primary-dark">
                            High Quality Links Via Referring Domains
                        </h5>
                        <p className="text-primary-neutral text-lg sm:text-xl opacity-75">
                            We rely on Majestic, a leading SEO tool, to check
                            the referring domains for each website we work with.
                            This process guarantees that our clients receive
                            only authentic, strong links, and it helps us secure
                            solid outcomes in demanding sectors like insurance,
                            FinTech, and real estate.
                        </p>
                        <hr className="border-t-1 border-primary-neutral border-opacity-20 !mt-10 !mb-12" />
                        <ul className="flex flex-col md:flex-row gap-4 md:gap-10">
                            <li className="inline-flex items-center gap-x-3 text-primary-dark font-semibold text-base">
                                <span className="bg-primary-BG2 p-1 rounded-full inline-flex">
                                    <Check className="text-primary" size={20} />
                                </span>
                                100% Genuine links
                            </li>
                            <li className="inline-flex items-center gap-x-3 text-primary-dark font-semibold text-base">
                                <span className="bg-primary-BG2 p-1 rounded-full inline-flex">
                                    <Check className="text-primary" size={20} />
                                </span>
                                Industry Leading Software
                            </li>
                        </ul>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[35%]">
                        <div className="bg-primary p-10 rounded-lg shadow-sm h-96"></div>
                    </div>
                </div>
            </section>

            {/* FAQs Section */}
            <section className="bg-primary-BG1 py-12 md:py-20 space-y-16 md:space-y-20">
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="text-center space-y-4">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark">
                            Curated Link Building {""}
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
                                    What Are Curated Links?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    Curated links are backlinks placed within
                                    existing, high-quality, and relevant
                                    content. Each link acts as an endorsement
                                    for your website, since search engines take
                                    these signals into account when evaluating
                                    your site’s trustworthiness and authority.
                                    This, in turn, helps improve your site’s
                                    visibility, keyword rankings, and overall
                                    traffic.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-2"
                                className="border bg-white border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    How Do Curated Links Work?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    Often referred to as niche edits or
                                    in-content backlinks, these links are highly
                                    effective because they are inserted into
                                    content that is already live, indexed, and
                                    holds considerable authority in Google’s
                                    records. This method often produces faster
                                    and sustained SEO benefits.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-3"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    Are Curated Links “White Hat”?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    Google’s guidelines caution against building
                                    or paying for links. However, our curated
                                    links are arranged so they appear
                                    natural—real website owners are the ones
                                    placing them, which aligns with Google’s
                                    expectations.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-4"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    How Do Curated Links Differ From Guest
                                    Posts?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    Guest posting involves writing and
                                    publishing new content on another website,
                                    whereas curated links (or niche edits)
                                    involve inserting a link into an already
                                    published article. Both techniques are used
                                    to boost search rankings and drive traffic,
                                    though they follow different procedures.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-5"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    What Is RD (Referring Domains)?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    RD stands for “Referring Domains” and
                                    indicates the number of unique domains that
                                    link back to your website. For example, if
                                    your site receives 15,000 backlinks from 536
                                    different domains, its RD would be 536.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-6"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    How Do You Choose the Right Websites for
                                    Curated Links?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    We select websites based on a number of
                                    factors, including relevance to your niche,
                                    the number of referring domains (RD), Domain
                                    Authority (DA), organic traffic, and the
                                    overall quality of the site. Our aim is to
                                    secure placements on reputable sites that
                                    fit well with your industry and target
                                    audience.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-7"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    How Long Do Curated Links Last?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    In a perfect scenario, they would be
                                    permanent. However, websites can change
                                    focus or expire over time, which means we
                                    cannot control the lifespan of the links.
                                    That said, we guarantee that all links will
                                    remain active for at least 12 months, and we
                                    will replace any that are removed within
                                    that period.
                                </AccordionContent>
                            </AccordionItem>
                        </Accordion>
                    </div>
                </div>
            </section>
        </>
    );
};

const rootElement = document.getElementById("curated-links");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<CuratedLinks />);
}

export default CuratedLinks;
