<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $__env->yieldContent('title', 'GetSEOLinks - Admin Dashboard'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Default description for your admin dashboard'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', 'admin, dashboard, link market'); ?>">
    <meta name="author" content="<?php echo $__env->yieldContent('meta_author', 'Your Name or Company'); ?>">

    <!-- Open Graph Meta Tags -->
    

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo $__env->yieldContent('canonical_url', url()->current()); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Flowbite and Select2 Styles -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- App CSS -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <?php echo $__env->yieldContent('styles'); ?> <!-- Include custom styles here -->
</head>

<body class="bg-gray-100">
    <!-- Header Section -->
    <?php echo $__env->make('layouts.admin.admin-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main Content -->
    <main class="p-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer Section -->
    

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?> <!-- Include custom scripts here -->
</body>

</html>
<?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github2\Link-MarketPlace\resources\views\layouts\admin\admin.blade.php ENDPATH**/ ?>