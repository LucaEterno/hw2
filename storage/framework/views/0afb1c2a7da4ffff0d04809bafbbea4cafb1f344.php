

<?php $__env->startSection('title', 'Spotify'); ?>

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
    <script>
        const csrf_token = '<?php echo e(csrf_token()); ?>';
    </script>
    <link rel='stylesheet' href="<?php echo e(url('style/spotify.css')); ?>">
    <script src="<?php echo e(url('scripts/spotify.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class='api'>
        <div class='contenitor'>
            <h2>Spotify</h2>
            <div>
                <form>
                <?php echo csrf_field(); ?>
                    <div><input type='text' name='track' id='track'></div>
                    <div><input type='submit' value="Cerca"></div>
                </form>
                <input type='button' id='playlist' value='Ewind Playlist'>
            </div>
        </div>
    </main>

    <section class="playlistMod">
    </section> 

    <section class="trackMod">
        <div class='box'></div>
        <div>
            <input type='button' id='aggiungi' value='Aggiungi ai preferiti' class='hide'>
            <input type='button' id='rimuovi' value='Rimuovi dai preferiti' class='hide'>
            <input type='button' id='close' value='Chiudi'>
        </div>
    </section> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/spotify.blade.php ENDPATH**/ ?>