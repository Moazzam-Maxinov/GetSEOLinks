<?php $__env->startSection('content'); ?>
    <input type="hidden" id="orderId" name="orderId" value=<?php echo e($order->id); ?>>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/user/ManageOrder.jsx'); ?>
    <div id="manage-order" class="px-6"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github2\Link-MarketPlace\resources\views\user\manage-order.blade.php ENDPATH**/ ?>