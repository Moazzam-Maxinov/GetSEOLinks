<?php $__env->startSection('content'); ?>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/admin/websites/index.jsx'); ?>
    <div id="websites-app" data-categories='<?php echo json_encode($categories, 15, 512) ?>' class="px-6"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github2\Link-MarketPlace\resources\views\admin\view-websites.blade.php ENDPATH**/ ?>