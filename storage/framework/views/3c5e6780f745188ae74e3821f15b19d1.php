<?php $__env->startSection('content'); ?>
<?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/js/components/common/Home.jsx'); ?>
<div id="main-body"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github2\Link-MarketPlace\resources\views\common\main-body.blade.php ENDPATH**/ ?>