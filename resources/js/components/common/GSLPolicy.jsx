import ReactDOM from "react-dom/client";
import BreadcrumbBanner from "./BreadcrumbBanner";

const PrivacyPolicy = () => {
    return (
        <>
            <BreadcrumbBanner pageTitle="Privacy Policy" />

            <section className="bg-BG1 py-12 md:py-20 space-y-16 md:space-y-20">
                <div className="container mx-auto px-6 lg:px-10">
                    <h2 className="text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
                        Who We Are
                    </h2>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-16">
                        Welcome to GetSEOLinks. Our website can be found at{" "}
                        <a href="/" className="text-primary underline">
                            https://getseolinks.com/
                        </a>
                        . We are committed to protecting your personal
                        information and explaining how we collect and use it
                        when you interact with our site.
                    </p>

                    <h2 className="text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
                        Comments
                    </h2>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-16">
                        When you leave a comment on our site, we gather the
                        details you provide in the comment form. In addition, we
                        record your IP address and browser’s user agent string.
                        This information helps us identify and prevent spam.
                    </p>

                    <h2 className="text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
                        Media
                    </h2>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-16">
                        Should you upload any images to our website, please
                        refrain from including files that contain embedded
                        location details (EXIF GPS data). Visitors might be able
                        to extract any such information if they download the
                        images.
                    </p>

                    <h2 className="text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
                        Cookies
                    </h2>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-8">
                        If you submit a comment on our site, you may opt to save
                        your name, email address, and website in cookies. This
                        helps you avoid having to re-enter your details on
                        future visits. These cookies remain on your device for
                        one year.
                    </p>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-8">
                        When you visit our login page, we set a temporary cookie
                        to verify that your browser accepts cookies. This
                        temporary cookie does not include any personal data and
                        is deleted when you close your browser.
                    </p>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-8">
                        When you log in, we establish several cookies to store
                        your login status and any screen display settings you
                        choose. Login cookies will remain for two days, while
                        screen options cookies will persist for one year.
                        Choosing the “Remember Me” option will keep you logged
                        in for two weeks. Logging out will remove the login
                        cookies.
                    </p>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-16">
                        If you edit or publish an article, an additional cookie
                        might be created. This cookie only stores the ID of the
                        post you have just edited. It does not contain personal
                        information and will expire after one day.
                    </p>

                    <h2 className="text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
                        Embedded Content from Other Websites
                    </h2>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-8">
                        Our pages may include content such as videos, images, or
                        articles that are hosted by third parties. This content
                        works exactly as if you had visited the other website
                        directly.
                    </p>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-16">
                        These third-party sites might collect data, set cookies,
                        or track your interactions with the embedded content if
                        you are logged into their services.
                    </p>

                    <h2 className="text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
                        Who We Share Your Data With
                    </h2>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-16">
                        In the event you request a password reset, your IP
                        address is included in the reset email. Other than such
                        cases, we do not share your personal data with external
                        parties unless necessary for the operation of our
                        services or required by law.
                    </p>

                    <h2 className="text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
                        How Long We Retain Your Data
                    </h2>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-8">
                        If you leave a comment, both the comment and its
                        associated data are stored indefinitely. This allows us
                        to automatically approve any follow-up comments without
                        delay.
                    </p>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-16">
                        For those who register on our website, we save the
                        personal details provided in your user profile. You are
                        free to view, modify, or delete your information at any
                        time (although your username cannot be changed). Site
                        administrators may also access and modify this data as
                        needed.
                    </p>

                    <h2 className="text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
                        Your Rights Regarding Your Data
                    </h2>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-16">
                        If you have an account or have left a comment, you can
                        request an export of the personal data we have collected
                        about you. You may also ask us to remove any personal
                        information we hold, except for data we must retain for
                        administrative, legal, or security purposes.
                    </p>

                    <h2 className="text-3xl md:text-4xl font-semibold text-gray-900 leading-tight">
                        Where Your Data Is Sent
                    </h2>
                    <p className="text-primary-neutral text-lg sm:text-xl mt-4 mb-8">
                        Please note that visitor comments may be processed using
                        an automated spam detection service, which may result in
                        your data being sent to external systems for review.
                    </p>

                    <hr className="border-t-1 border-primary-neutral border-opacity-30" />

                    <p className="text-primary-neutral text-lg sm:text-xl mt-8">
                        This policy is intended to clearly outline how
                        GetSEOLinks handles your personal information. If you
                        have any questions or need further clarification, please
                        do not hesitate to contact us at{" "}
                        <a
                            href="mailto:contact@getseolinks.com"
                            className="text-primary underline"
                        >
                            contact@getseolinks.com
                        </a>
                    </p>
                </div>
            </section>
        </>
    );
};

const rootElement = document.getElementById("privacy-policy");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<PrivacyPolicy />);
}

export default PrivacyPolicy;
