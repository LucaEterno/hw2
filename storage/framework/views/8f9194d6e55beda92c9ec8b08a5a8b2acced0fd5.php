

<?php $__env->startSection('title', 'Home_test'); ?>

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
    <link rel='stylesheet' href="<?php echo e(url('style/home.css')); ?>">
    <script src="<?php echo e(url('scripts/home.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class='column'>
            <h1>Eventi in programma:</h1>
            <div class='futuri'>

            </div>
        </div>
        <div class='column'>
            <h1>Eventi passati:</h1>
            <div class='passati'>
            
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/home_test.blade.php ENDPATH**/ ?>