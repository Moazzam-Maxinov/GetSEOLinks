<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $__env->yieldContent('title', 'Write for us - Buy SEO Backlinks - GetSEOLinks'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Write for us and buy high-quality SEO backlinks at Get SEO Links. We offer guest posts, link insertions, and SEO content writing on trusted niche sites.'); ?>">
    

    <!-- Open Graph Meta Tags -->
    

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo $__env->yieldContent('canonical_url', url()->current()); ?>">

    <!--Index and Follow-->
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    
    <!--Google Search Console Verfication Code-->
    <meta name="google-site-verification" content="r2Mcp80LlD4VTVVTW_u6gD3iWAlt518pJ26wsXavK88" />

    <!-- Fonts -->
    

    <!-- Flowbite and Select2 Styles -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- App CSS -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <?php echo $__env->yieldContent('styles'); ?> <!-- Include custom styles here -->
</head>

<body class="bg-gray-100">
    <!-- Header Section -->
    <?php echo $__env->make('layouts.common.common-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main Content -->
    <main class="min-h-screen">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer Section -->
    <?php echo $__env->make('layouts.common.common-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?> <!-- Include custom scripts here -->
</body>

</html>
<?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github2\Link-MarketPlace\resources\views\layouts\common\home.blade.php ENDPATH**/ ?>