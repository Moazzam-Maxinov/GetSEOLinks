<?php $__env->startSection('content'); ?>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/user/WebsitesTable.jsx'); ?>
    <div id="all-websites" class="px-6" data-categories="<?php echo e(json_encode($initialCategories)); ?>"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github2\Link-MarketPlace\resources\views\user\all-websites.blade.php ENDPATH**/ ?>