const BreadcrumbBanner = ({ pageTitle }) => {
    return (
        <section className="py-10 md:py-16 text-white bg-primary-dark">
            <div className="container mx-auto px-6 lg:px-10 w-full">
                <h1 className="text-4xl md:text-5xl font-semibold">
                    {pageTitle}
                </h1>
            </div>
        </section>
    );
};

export default BreadcrumbBanner;
