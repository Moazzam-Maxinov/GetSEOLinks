import { MoveRight } from "lucide-react";

const OldHome = () => {
    return (
        <>
            {/* Hero Section */}
            <section
                className="relative bg-cover bg-center min-h-screen text-white"
                style={{ backgroundImage: "url('./images/hero-bg.jpg')" }}
            >
                {/* Overlay */}
                <div className="absolute inset-0 bg-black bg-opacity-50"></div>
                <div className="container mx-auto px-6 lg:px-10 relative z-10 py-24">
                    <div className="max-w-md space-y-8">
                        <h1 className="text-white block [&>strong]:text-primary [&>strong]:font-semibold font-display [text-wrap:balance] text-5xl font-bold sm:text-6xl">
                            Grow Your <br />{" "}
                            <span className="text-white">Website Traffic</span>
                        </h1>
                        <p className="text-white text-lg sm:text-2xl font-light opacity-90">
                            High-quality, natural, links to help you boost your
                            rankings and generate more traffic to your site.
                        </p>
                        <button className="bg-primary text-white font-medium py-3 px-6 rounded-lg shadow-md hover:bg-primary-dark transition duration-300 flex justify-center items-center gap-2">
                            Get Started <MoveRight />
                        </button>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mt-36">
                        <div className="bg-primary bg-opacity-90 p-6 rounded-lg shadow-lg">
                            <h3 className="text-sm uppercase font-semibold text-primary-dark">
                                Link Insertions
                            </h3>
                            <h2 className="text-2xl font-bold mt-2">
                                Sit Back & Relax
                            </h2>
                            <p className="mt-3 text-gray-100">
                                Fully custom link building campaigns delivered
                                by GetSEOLinks' experts.
                            </p>
                            <a
                                href="#"
                                className="inline-block mt-4 text-white font-semibold text-sm"
                            >
                                Learn More →
                            </a>
                        </div>

                        <div className="bg-primary bg-opacity-90 p-6 rounded-lg shadow-lg">
                            <h3 className="text-sm uppercase font-semibold text-primary-dark">
                                Guest Posts
                            </h3>
                            <h2 className="text-2xl font-bold mt-2">
                                Advanced Control
                            </h2>
                            <p className="mt-3 text-gray-100">
                                Get access to real websites with powerful
                                metrics in your niche.
                            </p>
                            <a
                                href="#"
                                className="inline-block mt-4 text-white font-semibold text-sm"
                            >
                                Learn More →
                            </a>
                        </div>

                        <div className="bg-primary bg-opacity-90 p-6 rounded-lg shadow-lg">
                            <h3 className="text-sm uppercase font-semibold text-primary-dark">
                                Link Packages
                            </h3>
                            <h2 className="text-2xl font-bold mt-2">
                                Choose Package
                            </h2>
                            <p className="mt-3 text-gray-100">
                                You choose the metrics and our expert team
                                selects the best sites at the best prices.
                            </p>
                            <a
                                href="#"
                                className="inline-block mt-4 text-white font-semibold text-sm"
                            >
                                Learn More →
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            {/* Plan Section */}
            <section
                className="relative bg-cover bg-center py-8 md:py-20 text-white"
                style={{ backgroundImage: 'url("./images/mountain-bg.jpg")' }}
            >
                {/* Overlay */}
                <div className="absolute inset-0 bg-black bg-opacity-20"></div>
                <div className="container mx-auto px-6 lg:px-10 flex flex-col md:flex-row gap-20 md:gap-32 z-10 relative">
                    {/* Left Content */}
                    <div className="w-full md:w-[45%] space-y-10">
                        <h2 className="text-3xl sm:text-5xl font-semibold">
                            GetSEOLinks
                        </h2>
                        <p className="text-lg sm:text-xl text-white font-light opacity-75">
                            Fully custom link building campaigns delivered by
                            GetSEOLinks' experts
                        </p>
                        <a
                            href="#"
                            className="bg-white/10 hover:bg-white/20 text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2"
                        >
                            Learn More <MoveRight />
                        </a>

                        <div className="items-start grid grid-cols-1 md:grid-cols-2 gap-y-8 mt-12 max-lg:!gap-y-12 gap-x-6 sm:gap-x-8 md:gap-x-16 max-lg:grid-cols-2">
                            <div className="space-y-8">
                                <span className="text-primary-light">
                                    <ChartNoAxesColumn size={32} />
                                </span>
                                <p className="text-white font-light text-base opacity-75">
                                    A fully comprehensive competitor link
                                    analysis required to rank.
                                </p>
                            </div>

                            <div className="space-y-8">
                                <span className="text-primary-light">
                                    <Link2 size={32} />
                                </span>
                                <p className="text-white font-light text-base opacity-75">
                                    An exact anchor text road map for your
                                    backlinks.
                                </p>
                            </div>

                            <div className="space-y-8">
                                <span className="text-primary-light">
                                    <BadgeDollarSign size={32} />
                                </span>
                                <p className="text-white font-light text-base opacity-75">
                                    Discounts on hand-selected links.
                                </p>
                            </div>

                            <div className="space-y-8">
                                <span className="text-primary-light">
                                    <CalendarCheck size={32} />
                                </span>
                                <p className="text-white font-light text-base opacity-75">
                                    Fully transparent month-to-month reporting.
                                </p>
                            </div>
                        </div>
                    </div>

                    {/* Right Side Graphics */}
                    <div className="w-full md:w-[55%]">
                        <img src="./images/hero_process.png" alt="" />
                    </div>
                </div>
            </section>

            {/* Testimonial Section */}
            <section className="py-16 bg-white">
                <div className="container mx-auto px-6 lg:px-10">
                    <div className="bg-[#d4f4a3] rounded-lg py-16 px-8">
                        <div className="flex items-center justify-center gap-5 max-w-3xl relative mx-auto">
                            <span className="text-primary-dark font-bold rotate-180 self-start">
                                <Quote size={50} />
                            </span>
                            <p className="text-primary-dark text-xl sm:text-3xl !leading-relaxed text-center">
                                GetSEOLinks is a{" "}
                                <span className="font-bold">
                                    perfect solution
                                </span>{" "}
                                for anyone needing to scale up their outreach.
                                These are quality guest posts on real sites that
                                I'm actually proud to show my clients.
                            </p>
                        </div>
                    </div>
                    <div className="mt-6 flex flex-col items-end gap-2">
                        <span className="text-xl font-bold leading-[1em] text-primary-dark">
                            Ryan Stewart
                        </span>
                        <span className="text-primary text-lg leading-[1em] font-medium">
                            Webris
                        </span>
                    </div>
                </div>
            </section>
        </>
    );
};

export default OldHome;
