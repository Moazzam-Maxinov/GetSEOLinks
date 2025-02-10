<nav class="bg-white border-gray-200 dark:bg-gray-900 border-b-2">
    <div class="container mx-auto px-6 lg:px-10 py-6 flex flex-wrap items-center justify-between">
        <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lucide-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
            <h6 class="text-3xl font-semibold whitespace-nowrap text-primary-dark dark:text-white">GetSEOLinks</h6>
        </a>
        <div class="flex md:hidden items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Link Insertions</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Guest Posts</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Packages</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Contact</a>
                </li>
            </ul>
            <div class="mt-4 flex flex-col md:hidden gap-y-3">
                <a href="/register" class="bg-primary hover:bg-primary-dark text-white text-base font-medium py-2 px-6 border-2 border-primary hover:border-primary-dark rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                    Create Account
                </a>
                <a href="/login" class="bg-transparent hover:bg-primary-dark text-primary-dark hover:text-white text-base font-medium py-2 px-6 border-2 border-primary-dark rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                    Login
                </a>
    
            </div>
        </div>
        <div class="hidden md:flex items-center gap-x-3">
            <a href="/login" class="bg-primary hover:bg-primary-dark text-white text-base font-medium py-2 px-6 border-2 border-primary hover:border-primary-dark rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                Login
            </a>
            <a href="/register" class="bg-transparent hover:bg-primary-dark text-primary-dark hover:text-white text-base font-medium py-2 px-6 border-2 border-primary-dark rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                Sign Up
            </a>

        </div>
    </div>
</nav>
<?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github2\Link-MarketPlace\resources\views\layouts\common\common-header.blade.php ENDPATH**/ ?>