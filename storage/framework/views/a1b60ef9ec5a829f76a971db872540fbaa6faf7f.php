

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
    <link rel='stylesheet' href="<?php echo e(url('style/home.css')); ?>">
    <script src="<?php echo e(url('scripts/home.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class='column'>
            <h1>Eventi in programma: 
                <select name='filter' id='filter'>
                    <option value='Tutti' selected>Tutti</option>
                    <option value='Followed'>Followed</option>
                    <option value='Evento sociale'>Eventi sociale</option>
                    <option value='Evento musicale'>Eventi musicale</option>
                    <option value='Spettacolo'>Spettacoli</option>
                    <option value='Evento sportivo'>Eventi sportivo</option>
                    <option value='Conferenza'>Conferenze</option>
                </select>
            </h1>
            <div class='futuri'>

            </div>
        </div>
        <div class='column'>
            <h1>Eventi passati:</h1>
            <div class='passati'>
            
            </div>
        </div>
    </main>

    <section class="infoMod">
        <div class='infobox'>
            
        </div>
    </section> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/home.blade.php ENDPATH**/ ?>