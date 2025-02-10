<?php $__env->startSection('content'); ?>
    

    <?php if($role == 'publisher'): ?>
        <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/user/PublisherDashboard.jsx'); ?>
        <div id="publisher-dashboard" class="px-6"></div>
    <?php else: ?>
        <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/user/VendorDashboard.jsx'); ?>
        <div id="vendor-dashboard" class="px-6"></div>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github2\Link-MarketPlace\resources\views\user\dashboard.blade.php ENDPATH**/ ?>