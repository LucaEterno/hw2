

<?php $__env->startSection('title', 'Preferiti'); ?>

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
    <link rel='stylesheet' href="<?php echo e(url('style/preferiti.css')); ?>">
    <script src="<?php echo e(url('scripts/preferiti.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class='column'>
            <h1>I tuoi brani preferiti:</h1>
            <div class='preferiti'>

            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/preferiti.blade.php ENDPATH**/ ?>