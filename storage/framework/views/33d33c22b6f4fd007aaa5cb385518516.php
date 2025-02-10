<?php $__env->startSection('content'); ?>
    <h2>Welcome to the Admin Dashboard!</h2>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/admin/AdminDashboard.jsx'); ?>
    <div id="admin-dashboard" class="px-6"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github2\Link-MarketPlace\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>