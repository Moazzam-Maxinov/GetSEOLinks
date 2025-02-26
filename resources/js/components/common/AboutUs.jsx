import { Gem, Globe, Heart, Quote, RefreshCcw, Zap } from "lucide-react";
import ReactDOM from "react-dom/client";
import CTAStrip from "./CTAStrip";
const AboutUs = () => {
    return (
        <>
            {/* Page Hero Section */}
            <section className="text-white bg-primary-dark py-12 md:py-16 space-y-16 md:space-y-20">
                {/* hero top section */}
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row items-center gap-12 md:gap-20">
                    {/* Left Content */}
                    <div className="w-full md:w-[40%] space-y-5 md:space-y-7">
                        <h1 className="text-4xl md:text-5xl font-semibold">
                            The GetSEOLinks Difference: Quality, Innovation, and
                            Expertise
                        </h1>
                        <p className="text-white/90 text-lg sm:text-xl">
                            Discover what sets GetSEOLinks apart from the rest.
                            Our commitment to quality, creative ideas, and
                            specialized know-how helps us deliver outstanding
                            link building services for our valued customers.
                        </p>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[60%] flex items-center">
                        {/* <img
                            src="./images/hero_process.png"
                            alt=""
                            className=""
                        /> */}
                    </div>
                </div>

                {/* hero stats section */}
                <div className="container mx-auto px-6 lg:px-10 grid grid-cols-1 md:grid-cols-5 gap-6">
                    <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-2">
                        <h4 className="text-primary font-bold text-4xl">
                            1500+
                        </h4>
                        <p className="text-primary-dark text-lg">
                            SEO's Using Our Links
                        </p>
                    </div>

                    <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-2">
                        <h4 className="text-primary font-bold text-4xl">20+</h4>
                        <p className="text-primary-dark text-lg">
                            Team Members
                        </p>
                    </div>

                    <div className="bg-primary-BG1 p-8 rounded-lg shadow-sm space-y-2">
                        <h4 className="text-primary font-bold text-4xl">
                            90k+
                        </h4>
                        <p className="text-primary-dark text-lg">
                            Links Build Every Year
                        </p>
                    </div>
                </div>
            </section>

            {/* GetSEOLinks Section */}
            <section className="py-16 md:py-28 bg-primary-BG1 space-y-16 md:space-y-40">
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-8 md:gap-28">
                    {/* Left Content */}
                    <div className="w-full md:w-[35%]">
                        <div className="bg-primary p-10 rounded-lg shadow-sm h-96"></div>
                    </div>

                    {/* Right Side Features */}
                    <div className="w-full md:w-[65%] space-y-4 md:space-y-6">
                        <h3 className="text-3xl md:text-5xl font-bold text-primary-dark">
                            GetSEOLinks
                        </h3>
                        <p className="text-primary-neutral/85 text-lg sm:text-xl">
                            GetSEOLinks is a top link building agency that
                            brings together quality, creativity, and solid
                            expertise to help businesses grow online. Our track
                            record speaks for itself: our experienced team
                            builds over 90,000 links each year for more than
                            1,500 SEO professionals through custom campaigns. We
                            stay updated with industry trends to provide fresh
                            solutions tailored to each client’s specific needs.
                        </p>
                        <hr className="border-t-1 border-primary-neutral border-opacity-20 !mt-10 !mb-12" />
                        <ul className="flex flex-col md:flex-row gap-4 md:gap-10">
                            <li className="inline-flex items-center gap-x-3 text-primary-dark font-semibold text-base">
                                <span className="bg-primary-BG2 p-1 rounded-full inline-flex">
                                    <Globe className="text-primary" size={20} />
                                </span>
                                20+ Staff Operating Worldwide
                            </li>
                            <li className="inline-flex items-center gap-x-3 text-primary-dark font-semibold text-base">
                                <span className="bg-primary-BG2 p-1 rounded-full inline-flex">
                                    <Zap className="text-primary" size={20} />
                                </span>
                                90% Agency Retention
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            {/* Our Values Section */}
            <section className="bg-white py-0 md:py-28">
                <div className="container mx-auto px-0 lg:px-10 flex flex-col md:flex-row items-center gap-0 md:gap-12 z-10 relative">
                    {/* Left Content */}
                    <div className="bg-primary-dark w-full md:w-[70%] space-y-10 pt-16 pb-10 md:pt-16 md:pb-16 px-6 md:px-16 rounded-none md:rounded-2xl">
                        <div className="space-y-4">
                            <h2 className="text-3xl sm:text-5xl font-semibold text-white">
                                Our Values
                            </h2>
                            <p className="text-lg text-white/75">
                                Since 2019, our directors have built GetSEOLinks
                                into a dynamic team known for its strength. Our
                                core values have been the foundation for our
                                growth, connecting us with more than 10,000
                                businesses worldwide.
                            </p>
                        </div>

                        <div className="items-start grid grid-cols-1 md:grid-cols-3 gap-12">
                            <div className="space-y-4 md:space-y-8">
                                <span className="bg-primary-light/10 p-3 rounded-md inline-flex">
                                    <Gem
                                        className="text-primary-light"
                                        size={32}
                                    />
                                </span>
                                <div className="space-y-2">
                                    <h4 className="text-white text-3xl font-semibold">
                                        Quality
                                    </h4>
                                    <p className="text-white font-light text-base opacity-75">
                                        We focus on delivering excellent
                                        services by building reliable backlinks,
                                        producing engaging content, and
                                        designing personalized strategies. Our
                                        strong commitment to high standards
                                        ensures our clients achieve lasting
                                        outcomes and maintain a solid online
                                        presence.
                                    </p>
                                </div>
                            </div>

                            <div className="space-y-4 md:space-y-8">
                                <span className="bg-primary-light/10 p-3 rounded-md inline-flex">
                                    <RefreshCcw
                                        className="text-primary-light"
                                        size={32}
                                    />
                                </span>
                                <div className="space-y-2">
                                    <h4 className="text-white text-3xl font-semibold">
                                        Innovation
                                    </h4>
                                    <p className="text-white font-light text-base opacity-75">
                                        We use the latest technologies and
                                        trends to develop advanced solutions
                                        tailored to each client's unique
                                        requirements. Our forward-thinking
                                        approach keeps us ahead, offering
                                        creative strategies that help our
                                        clients stay highly ranked.
                                    </p>
                                </div>
                            </div>

                            <div className="space-y-4 md:space-y-8">
                                <span className="bg-primary-light/10 p-3 rounded-md inline-flex">
                                    <Heart
                                        className="text-primary-light"
                                        size={32}
                                    />
                                </span>
                                <div className="space-y-2">
                                    <h4 className="text-white text-3xl font-semibold">
                                        Expertise
                                    </h4>
                                    <p className="text-white font-light text-base opacity-75">
                                        Our team is composed of seasoned
                                        professionals in digital strategy and
                                        SEO. By combining our varied skills, we
                                        work together effectively to produce
                                        outstanding results that support our
                                        clients in reaching their online goals.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Right Side Graphics */}
                    <div className="w-full md:w-[30%] pt-10 pb-16 md:pt-0 md:pb-0 px-6 md:px-0">
                        <div className="space-y-4">
                            <h3 className="text-3xl sm:text-4xl font-semibold text-primary-dark">
                                Goal Statement
                            </h3>
                            <p className="text-lg text-primary-neutral/75 font-light">
                                At GetSEOLinks, our mission is to help
                                businesses succeed online by delivering
                                exceptional link building services that stand
                                for quality, creativity, and expertise. We work
                                hard to forge enduring partnerships with each
                                client, crafting custom strategies that produce
                                clear, measurable results while exceeding
                                expectations. As we evolve and expand, we stay
                                updated with the latest industry trends,
                                fine-tune our practices, and continue to broaden
                                our knowledge so we can consistently offer
                                outstanding value and support your growth in
                                today's competitive online market.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* CTA Section */}
            <CTAStrip
                ctaStripTitle="We'd Love To Hear From You"
                ctaButtonLabel="Contact Us"
                ctaButtonLink="mailto:contact@getseolinks.com"
            />

            {/* Testimonial Section */}
            <section className="py-16 bg-white">
                <div className="container mx-auto px-6 lg:px-10">
                    <div className="bg-[#d4f4a3] rounded-lg py-16 px-8">
                        <div className="flex items-center justify-center gap-5 max-w-3xl relative mx-auto">
                            <span className="text-primary-dark font-bold rotate-180 self-start">
                                <Quote size={50} />
                            </span>
                            <p className="text-primary-dark text-xl sm:text-3xl !leading-relaxed text-center">
                                GetSEOLinks is an essential asset for your SEO
                                efforts. Forget about third-party figures and
                                focus on the{" "}
                                <span className="font-bold">
                                    backlinks that really count
                                </span>
                                . Among the few providers that consistently
                                deliver as promised, GetSEOLinks stands out as
                                the{" "}
                                <span className="font-bold">top choice</span> in
                                our community. I strongly recommend their
                                services for anyone serious about quality
                                backlinks.
                            </p>
                        </div>
                    </div>
                    <div className="mt-6 flex flex-col items-end gap-2">
                        <span className="text-xl font-bold leading-[1em] text-primary-dark">
                            Christian Hefner
                        </span>
                        <span className="text-primary text-lg leading-[1em] font-medium">
                            Via Trustpilot
                        </span>
                    </div>
                </div>
            </section>
        </>
    );
};

const rootElement = document.getElementById("about-us");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<AboutUs />);
}

export default AboutUs;
