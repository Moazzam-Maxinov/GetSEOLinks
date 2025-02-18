import { MoveRight } from "lucide-react";

const CTAStrip = ({ ctaStripTitle, ctaButtonLabel, ctaButtonLink }) => {
    return (
        <section className="bg-white">
            <div className="container mx-auto px-6 lg:px-10">
                {/* Title */}
                <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-12 md:gap-6 bg-gradient-to-l from-primary to-[#2f4a00] px-8 md:px-16 py-10 md:py-16 rounded-lg text-white">
                    <h5 className="text-3xl font-semibold">{ctaStripTitle}</h5>
                    <a
                        href={ctaButtonLink}
                        className="bg-primary-dark hover:bg-[#056248] text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2"
                    >
                        {ctaButtonLabel} <MoveRight />
                    </a>
                </div>
            </div>
        </section>
    );
};

export default CTAStrip;
