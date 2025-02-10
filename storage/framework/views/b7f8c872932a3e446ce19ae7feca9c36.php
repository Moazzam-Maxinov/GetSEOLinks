<?php $__env->startSection('content'); ?>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <?php if(session('success')): ?>
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('info')): ?>
                <div class="mb-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                    <?php echo e(session('info')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <!-- Review Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-blue-500 to-indigo-500 px-6 py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h1 class="text-2xl font-bold text-white">Review Order #<?php echo e($order->id); ?></h1>
                        </div>
                    </div>
                </div>

                <!-- Order Details -->
                <div class="px-6 py-4">
                    <!-- Validation Errors -->
                    <?php if($errors->any()): ?>
                        <div class="mb-4 p-4 bg-red-50 rounded-lg">
                            <ul class="list-disc pl-5">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="text-red-600"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Order ID -->
                    <div class="flex items-center p-4 bg-gray-50 rounded-lg mb-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 flex items-center justify-center rounded-full bg-purple-100">
                                <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Order ID</p>
                            <p class="text-lg font-bold text-gray-900">#<?php echo e($order->id); ?></p>
                        </div>
                    </div>

                    <!-- URL Section -->
                    <div class="mb-4 p-4 bg-blue-50 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">Requested URL</p>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                            <a href="<?php echo e($order->requested_url); ?>" class="text-blue-600 hover:text-blue-800 break-all"
                                target="_blank">
                                <?php echo e($order->requested_url); ?>

                            </a>
                        </div>
                    </div>
                    <!-- Link Text -->
                    <div class="mb-4 p-4 bg-yellow-50 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">Link Text</p>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-yellow-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            <p class="text-gray-900 font-medium"><?php echo e($order->link_text ?? 'N/A'); ?></p>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="mb-4 p-4 bg-green-50 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">Price</p>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-green-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-lg font-bold text-green-600">$<?php echo e(number_format($order->price, 2)); ?></p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div
                        class="mb-4 p-4 <?php echo e($order->status === 'pending' ? 'bg-orange-50' : ($order->status === 'completed' ? 'bg-green-50' : 'bg-red-50')); ?> rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">Status</p>
                        <div class="flex items-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                <?php echo e($order->status === 'pending'
                                    ? 'bg-orange-100 text-orange-800'
                                    : ($order->status === 'completed'
                                        ? 'bg-green-100 text-green-800'
                                        : 'bg-red-100 text-red-800')); ?>">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="<?php echo e($order->status === 'pending'
                                            ? 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                                            : ($order->status === 'completed'
                                                ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
                                                : 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z')); ?>" />
                                </svg>
                                <?php echo e(ucfirst($order->status)); ?>

                            </span>
                        </div>
                    </div>

                    <!-- Published Link Section (Only visible when status is completed) -->
                    <?php if($order->status === 'completed' && $order->published_link): ?>
                        <div class="mb-4 p-4 bg-green-50 rounded-lg">
                            <p class="text-sm font-medium text-gray-500 mb-1">Published Link</p>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-green-600 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                                <a href="<?php echo e($order->published_link); ?>" class="text-blue-600 hover:text-blue-800 break-all"
                                    target="_blank">
                                    <?php echo e($order->published_link); ?>

                                </a>
                            </div>

                            <!-- Review Form -->
                            <form action="<?php echo e(route('user.review-order-post')); ?>" method="POST" class="mt-4"
                                id="reviewForm">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Review Decision</label>
                                        <div class="mt-2 space-y-2">
                                            <div class="flex items-center">
                                                <input type="radio" name="review_decision" value="approve"
                                                    id="approve" required
                                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                                <label for="approve" class="ml-2 text-sm text-gray-700">Approve</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="radio" name="review_decision" value="reject"
                                                    id="reject"
                                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                                <label for="reject" class="ml-2 text-sm text-gray-700">Reject</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="rejection_reason_container" class="hidden">
                                        <label for="rejection_reason" class="block text-sm font-medium text-gray-700">
                                            Rejection Reason
                                        </label>
                                        <textarea name="rejection_reason" id="rejection_reason"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 <?php $__errorArgs = ['rejection_reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>
                                        <?php $__errorArgs = ['rejection_reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <button type="submit"
                                        class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Submit Review
                                    </button>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>

                    <!-- Rejection Reason (Only visible when status is rejected) -->
                    <?php if($order->status === 'rejected' && $order->rejected_by_publisher_reason): ?>
                        <div class="mb-4 p-4 bg-red-50 rounded-lg">
                            <p class="text-sm font-medium text-gray-500 mb-1">Rejection Reason</p>
                            <div class="mt-2 text-red-700">
                                <?php echo e($order->rejected_by_publisher_reason); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Footer -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    <div class="flex justify-center">
                        <a href="<?php echo e(url('/vendor/orders')); ?>"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            View All Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to toggle rejection reason textarea -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('reviewForm');
            const rejectRadio = document.getElementById('reject');
            const approveRadio = document.getElementById('approve');
            const rejectionContainer = document.getElementById('rejection_reason_container');
            const rejectionReason = document.getElementById('rejection_reason');

            function toggleRejectionReason() {
                rejectionContainer.classList.toggle('hidden', !rejectRadio.checked);
                if (rejectRadio.checked) {
                    rejectionReason.setAttribute('required', 'required');
                } else {
                    rejectionReason.removeAttribute('required');
                }
            }

            if (rejectRadio && approveRadio) {
                rejectRadio.addEventListener('change', toggleRejectionReason);
                approveRadio.addEventListener('change', toggleRejectionReason);
            }

            // Add form validation
            form.addEventListener('submit', function(e) {
                if (!approveRadio.checked && !rejectRadio.checked) {
                    e.preventDefault();
                    alert('Please select either Approve or Reject');
                    return false;
                }

                if (rejectRadio.checked && !rejectionReason.value.trim()) {
                    e.preventDefault();
                    alert('Please provide a reason for rejection');
                    return false;
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github2\Link-MarketPlace\resources\views\user\review-order-vendor.blade.php ENDPATH**/ ?>