import ReactDOM from "react-dom/client";
import { useState } from "react";
// import { useNavigate } from "react-router-dom";
import {
    BriefcaseBusiness,
    Check,
    Clock4,
    Facebook,
    Filter,
    Globe,
    Instagram,
    Link,
    Linkedin,
    Mail,
    MoveRight,
    Phone,
    ThumbsUp,
    Twitter,
    Youtube,
} from "lucide-react";
import { Input } from "../ui/input";
import { Button } from "../ui/button";
import PricingTab from "./PricingTab";
import {
    Accordion,
    AccordionContent,
    AccordionItem,
    AccordionTrigger,
} from "../ui/accordion";

const Home = () => {
    const [email, setEmail] = useState("");
    // const navigate = useNavigate();

    const handleSignUp = () => {
        const registerUrl = email
            ? `/register?email=${encodeURIComponent(email)}`
            : "/register";

        window.location.href = registerUrl;
    };
    return (
        <>
            {/* hero section */}
            <section className="bg-gradient-to-b from-gray-100 to-primary-BG2 pt-8 md:pt-10 pb-20 space-y-16 md:space-y-20">
                {/* hero top section */}
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-12 md:gap-24">
                    {/* Left Content */}
                    <div className="w-full md:w-[40%]">
                        <h1 className="text-[2.75rem] md:text-[4rem] font-bold text-primary-dark leading-tight">
                            Buy Backlinks (DA30-60) From <br />
                            <span className="text-primary">$5.72/Per Link</span>
                        </h1>
                        <p className="text-primary-neutral text-lg sm:text-xl mt-4 opacity-90">
                            Build your site's authority with high-quality
                            backlinks from trusted niche sites. GetSEOLinks
                            delivers guest posts, link insertions, and SEO
                            content that drive results.
                        </p>
                        <div className="flex flex-col md:flex-row w-full items-start md:items-center mt-10 gap-3 md:gap-0">
                            <Input
                                type="email"
                                placeholder="Email"
                                className="py-7 px-6 rounded-l-xl rounded-r-xl md:rounded-r-none text-primary-neutral text-opacity-75"
                                value={email}
                                onChange={(e) => setEmail(e.target.value)}
                            />
                            <Button
                                type="submit"
                                className="text-white text-sm font-semibold py-7 px-10 rounded-r-xl rounded-l-xl md:rounded-l-none bg-primary hover:bg-primary-dark"
                                onClick={handleSignUp}
                            >
                                Sign Up Free
                            </Button>
                        </div>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[60%] flex items-center">
                        <img
                            src="./images/hero-image.webp"
                            alt=""
                            className=""
                        />
                    </div>
                </div>

                {/* hero stats section */}
                <div className="container mx-auto px-6 lg:px-10 grid grid-cols-1 md:grid-cols-5 gap-6">
                    <div className="bg-primary-dark p-6 rounded-lg shadow-sm space-y-1">
                        <h4 className="text-primary font-bold text-2xl">
                            12+ Years
                        </h4>
                        <p className="text-white text-base">On The Market</p>
                    </div>

                    <div className="bg-primary-dark p-6 rounded-lg shadow-sm space-y-1">
                        <h4 className="text-primary font-bold text-2xl">
                            9,00,000+
                        </h4>
                        <p className="text-white text-base">
                            Backlinks in Our Inventory
                        </p>
                    </div>

                    <div className="bg-primary-dark p-6 rounded-lg shadow-sm space-y-1">
                        <h4 className="text-primary font-bold text-2xl">
                            5,000+
                        </h4>
                        <p className="text-white text-base">
                            Websites Promoted by GetSEOLinks
                        </p>
                    </div>

                    <div className="bg-primary-dark p-6 rounded-lg shadow-sm space-y-1">
                        <h4 className="text-primary font-bold text-2xl">
                            2,200+
                        </h4>
                        <p className="text-white text-base">
                            Successful Customers
                        </p>
                    </div>

                    <div className="bg-primary-dark p-6 rounded-lg shadow-sm space-y-1">
                        <h4 className="text-primary font-bold text-2xl">
                            3,50,200+
                        </h4>
                        <p className="text-white text-base">
                            Keywords in Top 10
                        </p>
                    </div>
                </div>
            </section>

            {/* Features Section */}
            <section className="py-10 md:py-16 bg-white">
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-8 md:gap-20">
                    {/* Left Content */}
                    <div className="w-full md:w-[40%] space-y-4 md:space-y-10">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark leading-tight w-full sm:max-w-xs">
                            <span className="text-primary text-2xl md:text-4xl">
                                What
                            </span>
                            <br /> You Get From Us
                        </h2>
                        <p className="text-primary-neutral text-lg sm:text-2xl opacity-75">
                            Delivering speed, simplicity, and unmatched reach,
                            we ensure every link works harder for your SEO
                            goals. With us, trust isn’t optional – it’s
                            guaranteed.
                        </p>
                        <a
                            href="/register"
                            className="bg-primary hover:bg-primary-dark text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2"
                        >
                            Get Started <MoveRight />
                        </a>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[60%] grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <span className="text-primary-dark">
                                <Clock4 size={40} />
                            </span>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Links Published in 5 Days
                            </h3>
                            <p className="text-primary-neutral">
                                Quality takes time, but our links don't. Get
                                your content published within 5 days – quick and
                                reliable without cutting corners.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <span className="text-primary-dark">
                                <Filter size={40} />
                            </span>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Easy Filtering
                            </h3>
                            <p className="text-primary-neutral">
                                With our filters, finding the right donor
                                websites becomes easier and more personalized.
                                You can organize them based on category,
                                location, keywords, and many other options to
                                match your needs.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <span className="text-primary-dark">
                                <BriefcaseBusiness size={40} />
                            </span>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                50,000+ Websites
                            </h3>
                            <p className="text-primary-neutral">
                                Explore a wide range of options. Our website
                                features pages across various niches, providing
                                countless opportunities for placements.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <span className="text-primary-dark">
                                <ThumbsUp size={40} />
                            </span>
                            <h3 className="text-primary-dark font-bold text-2xl">
                                Guaranteed Placement
                            </h3>
                            <p className="text-primary-neutral">
                                We don’t rely on guesswork – your placement is
                                guaranteed, no matter what happens. Our trusted
                                publishers make sure your link goes live.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Price Section */}
            <section
                id="backlink-price"
                className="bg-primary-BG3 py-12 md:py-20 space-y-16 md:space-y-20"
            >
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="text-center">
                        <h2 className="text-4xl md:text-6xl font-bold text-white">
                            Price of Our {""}
                            <span className="text-primary-light">
                                Backlinks
                            </span>
                        </h2>
                    </div>
                    <div className="mt-12 sm:mt-20 max-w-4xl mx-auto">
                        {/* Pricing Tab Component */}
                        <PricingTab />
                    </div>
                </div>
            </section>

            {/* Benefits Section */}
            <section className="py-10 md:py-16 bg-white">
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-8 md:gap-20">
                    {/* Left Content */}
                    <div className="w-full md:w-[40%] space-y-4 md:space-y-10">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark leading-tight w-full sm:max-w-xs">
                            <span className="text-primary text-2xl md:text-4xl">
                                What
                            </span>
                            <br /> You Get Buying Backlinks
                        </h2>
                        <p className="text-primary-neutral text-lg sm:text-2xl opacity-75">
                            Get powerful backlinks that bring real results.
                            Improve your rankings, attract quality traffic, and
                            grow your business with services designed to
                            strengthen your online presence.
                        </p>
                        <a
                            href="/register"
                            className="bg-primary hover:bg-primary-dark text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2"
                        >
                            Start Building DA40+ Links Now
                        </a>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[60%] grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <div className="flex items-center gap-x-3">
                                <div className="bg-primary p-3 rounded-full">
                                    <Check className="text-white" size={28} />
                                </div>
                                <h3 className="text-primary-dark font-bold text-2xl">
                                    Natural Backlink Profile
                                </h3>
                            </div>

                            <p className="text-primary-neutral">
                                Using our DA40+ links and proven SEO methods,
                                you can build a backlink profile that stands out
                                from the competition.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <div className="flex items-center gap-x-3">
                                <div className="bg-primary p-3 rounded-full">
                                    <Check className="text-white" size={28} />
                                </div>
                                <h3 className="text-primary-dark font-bold text-2xl">
                                    Heavy Traffic & Top Backlink Service
                                </h3>
                            </div>

                            <p className="text-primary-neutral">
                                A well-planned and effective link-building
                                approach can drive over 30,000 monthly visitors
                                within just 3 to 6 months while increasing your
                                website’s authority.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <div className="flex items-center gap-x-3">
                                <div className="bg-primary p-3 rounded-full">
                                    <Check className="text-white" size={28} />
                                </div>
                                <h3 className="text-primary-dark font-bold text-2xl">
                                    Professional SEO Help
                                </h3>
                            </div>

                            <p className="text-primary-neutral">
                                Our dedicated customer support team and in-house
                                SEO professionals for manual link-building
                                services are always ready to support your
                                outstanding link-building efforts.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <div className="flex items-center gap-x-3">
                                <div className="bg-primary p-3 rounded-full">
                                    <Check className="text-white" size={28} />
                                </div>
                                <h3 className="text-primary-dark font-bold text-2xl">
                                    Increased Sales
                                </h3>
                            </div>

                            <p className="text-primary-neutral">
                                Once you’ve secured premium backlinks, use our
                                tips to gradually improve your website and
                                achieve exceptional sales and profit growth.
                            </p>
                        </div>

                        <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-4">
                            <div className="flex items-center gap-x-3">
                                <div className="bg-primary p-3 rounded-full">
                                    <Check className="text-white" size={28} />
                                </div>
                                <h3 className="text-primary-dark font-bold text-2xl">
                                    Higher Rankings
                                </h3>
                            </div>

                            <p className="text-primary-neutral">
                                A carefully planned and executed outreach
                                link-building strategy can help your website
                                rank among the Top 10 on Google, Bing, Yahoo,
                                AOL, and hundreds of other search engines.
                                Secure dofollow backlinks that deliver real
                                results!
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* FAQs Section */}
            <section className="bg-primary-BG1 py-12 md:py-20 space-y-16 md:space-y-20">
                <div className="container mx-auto px-6 lg:px-10">
                    {/* Title */}
                    <div className="text-center">
                        <h2 className="text-4xl md:text-6xl font-bold text-primary-dark leading-tight">
                            <span className="text-primary text-2xl md:text-4xl">
                                Questions
                            </span>
                            <br /> You Might Want to Ask Us
                        </h2>
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
                                    How much time does it take to rank in
                                    Google's Top 10?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    The time frame varies based on how
                                    competitive your niche is and the number of
                                    quality backlinks needed to surpass your
                                    competitors.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-2"
                                className="border bg-white border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    What are your link prices, and how can I
                                    view them?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    The cost of links varies widely, starting as
                                    low as $0.01 and going up indefinitely.
                                    Pricing depends on several factors and is
                                    determined by publishers rather than our
                                    backlink service. After signing up and
                                    logging in, you’ll find that we offer only
                                    high-quality backlinks. To view the most
                                    affordable options, create an account, log
                                    in at{" "}
                                    <a
                                        href="https://getseolinks.com/login/"
                                        className="text-primary underline"
                                    >
                                        https://getseolinks.com/login/
                                    </a>
                                    , and sort the list by price by clicking on
                                    the 'Cost' column.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-3"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    How can we assist you?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    We can help increase your website’s traffic
                                    and sales by improving its ranking on Google
                                    and other search engines. A higher position
                                    means more visitors and potential customers
                                    finding your site. Our approach involves
                                    creating high-quality backlinks with
                                    DA40-DA60 to strengthen your online presence
                                    and boost search visibility.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-4"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    How much will it cost me to get in the Top
                                    10 of Google?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    The cost of ranking in Google's Top 10
                                    varies based on your industry and location.
                                    For instance, if your business operates in
                                    Delhi or Australia, you might spend around
                                    $50 to $200 per month. However, in highly
                                    competitive markets like the USA, UK, or
                                    Canada, the cost typically ranges between
                                    $500 and $1,000 due to stronger competition.
                                </AccordionContent>
                            </AccordionItem>

                            <AccordionItem
                                value="item-5"
                                className="bg-white border border-primary-dark/20 rounded-lg py-4 sm:py-6 px-4 sm:px-6 space-y-6"
                            >
                                <AccordionTrigger className="p-0 text-2xl font-bold hover:no-underline text-primary-dark text-left gap-x-3 [&>svg]:w-8 [&>svg]:h-8 [&>svg]:rounded-full [&>svg]:bg-primary [&>svg]:text-white">
                                    Why are your whitehat links 10 times more
                                    effective?
                                </AccordionTrigger>
                                <AccordionContent className="p-0 text-primary-neutral text-lg">
                                    When you invest in our backlinks, you can
                                    expect a significant improvement in your
                                    search engine ranking. Links from
                                    GetSEOLinks are 10 times more powerful than
                                    regular links because:
                                    <ul>
                                        <li>
                                            Every one of our links is surrounded
                                            by content relevant to your site.
                                        </li>
                                        <li>
                                            All our links are added manually,
                                            ensuring they appear natural to
                                            Google and other search engines.
                                        </li>
                                    </ul>
                                </AccordionContent>
                            </AccordionItem>
                        </Accordion>
                    </div>
                </div>
            </section>
        </>
    );
};

const rootElement = document.getElementById("main-body");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<Home />);
}

export default Home;
