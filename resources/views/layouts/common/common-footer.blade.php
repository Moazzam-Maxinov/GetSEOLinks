<footer class="bg-gray-50 pt-12 md:pt-20 pb-10 border-t border-gray-200">
    <div class="container mx-auto px-6 md:px-10 flex flex-col md:flex-row gap-8 md:gap-4">
        <div class="w-full md:w-[75%] flex flex-col md:flex-row gap-8">
            {{-- {/* Logo & Contact Information */} --}}
            <div class="w-full md:w-[40%] space-y-4">
                <a href="/" class="flex items-center space-x-1">
                    <x-lucide-link class="w-7 h-7 text-primary" />
                    <h6 class="text-3xl font-semibold whitespace-nowrap text-primary-dark dark:text-white">
                        GetSEOLinks
                    </h6>
                </a>
                <p class="text-lg text-primary-neutral">
                    M.A. Jauhar Road, Okhla, New Delhi, India
                </p>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center text-base text-primary-neutral">
                        <x-lucide-phone
                            class="w-5 h-5 mr-2 text-primary"
                        />
                        <a
                            href="tel:+1-917-675-3345"
                            class="text-primary-neutral hover:text-primary"
                        >
                            +1-917-675-3345
                        </a>
                    </li>
                    <li class="flex items-center text-base text-primary-neutral">
                        <x-lucide-phone class="w-5 h-5 mr-2 text-primary" />
                        <a
                            href="tel:+91-9891-4310-27"
                            class="text-primary-neutral hover:text-primary"
                        >
                            +91-9891-4310-27
                        </a>
                    </li>
                    <li class="flex items-center text-base text-primary-neutral">
                        <x-lucide-mail
                            class="w-5 h-5 mr-2 text-primary"
                        />
                        <a
                            href="mailto:contact@getseolinks.com"
                            class="text-primary-neutral hover:text-primary"
                        >
                            contact@getseolinks.com
                        </a>
                    </li>
                </ul>
            </div>

            {{-- {/* Company Links */} --}}
            <div class="w-full md:w-[20%]">
                <h4 class="text-lg font-semibold text-primary mb-4">
                    Company
                </h4>
                <ul class="space-y-2 text-base">
                    <li>
                        <a
                            href="#"
                            class="text-primary-neutral hover:text-primary"
                        >
                            Blog
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="text-primary-neutral hover:text-primary"
                        >
                            Case Studies
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="text-primary-neutral hover:text-primary"
                        >
                            About Us
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="text-primary-neutral hover:text-primary"
                        >
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>

            {{-- {/* Services & Industries */} --}}
            <div class="w-full md:w-[20%]">
                <h4 class="text-lg font-semibold text-primary mb-4">
                    Services
                </h4>
                <ul class="space-y-2 text-base">
                    <li>
                        <a
                            href="#"
                            class="text-primary-neutral hover:text-primary"
                        >
                            Link Insertions
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="text-primary-neutral hover:text-primary"
                        >
                            Guest Posts
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="text-primary-neutral hover:text-primary"
                        >
                            Link Packages
                        </a>
                    </li>
                </ul>
            </div>

            {{-- {/* Other Links */} --}}
            <div class="w-full md:w-[20%]">
                <h4 class="text-lg font-semibold text-primary mb-4">
                    Other Links
                </h4>
                <ul class="space-y-2 text-base">
                    <li>
                        <a
                            href="#"
                            class="text-primary-neutral hover:text-primary"
                        >
                            Login
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="text-primary-neutral hover:text-primary"
                        >
                            Register
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="w-full md:w-[25%]">
            {{-- {/* Contact CTA */} --}}
            <div>
                <h4 class="text-3xl font-semibold text-primary-dark mb-4">
                    Speak To Our SEO Experts
                </h4>
                <p class="text-lg text-primary-neutral mb-4">
                    Give us a call and discover how GetSEOLinks
                    could transform your SEO performance!
                </p>
                <a
                    href="#"
                    class="bg-primary hover:bg-primary-dark text-white text-base font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex justify-center items-center gap-2"
                >
                    <x-lucide-phone class="w-4 h-4"/> Call Us Now
                </a>
            </div>
        </div>
    </div>

    {{-- {/* Footer Bottom */} --}}
    <div class="container mx-auto px-6 md:px-10 border-t border-gray-200 mt-10 pt-4 text-sm text-primary-neutral text-center flex flex-col md:flex-row items-center justify-between gap-6 md:gap-4">
        <p>
            Copyright © <?php echo date("Y"); ?> GetSEOLinks. All
            Rights Reserved.
            <a href="#" class="text-primary hover:underline">
                Privacy Policy
            </a>
            |
            <a href="#" class="text-primary hover:underline">
                Terms & Conditions
            </a>
        </p>
        <div class="flex justify-center space-x-3">
            <a
                href="#"
                class="text-primary hover:text-primary-dark"
            >
                <x-lucide-youtube class="w-5 h-5" />
            </a>
            <a
                href="#"
                class="text-primary hover:text-primary-dark"
            >
                <x-lucide-instagram class="w-5 h-5" />
            </a>
            <a
                href="#"
                class="text-primary hover:text-primary-dark"
            >
                <x-lucide-linkedin class="w-5 h-5" />
            </a>
            <a
                href="#"
                class="text-primary hover:text-primary-dark"
            >
                <x-lucide-twitter class="w-5 h-5" />
            </a>
            <a
                href="#"
                class="text-primary hover:text-primary-dark"
            >
                <x-lucide-facebook class="w-5 h-5" />
            </a>
        </div>
    </div>
</footer>