<html>
    <head>
        <?php $__env->startSection('head'); ?>
        <title> Ewind - <?php echo $__env->yieldContent('title'); ?></title>

        <script>
            const BASE_URL = "<?php echo e(url('/')); ?>/";
        </script>
        <script src="<?php echo e(url('scripts/common.js')); ?>" defer></script>
        <link rel='stylesheet' href="<?php echo e(url('style/common.css')); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="<?php echo e(url('assets/e.png')); ?>">
        <meta charset="utf-8">
        <?php echo $__env->yieldSection(); ?>
    </head>

    <body>
        <header>
            <nav>
                <div class="l_nav">
                    <div class="logo" style="background-image: url(<?php echo e('assets/ee.png'); ?>)"></div>
                    <a href="<?php echo e(url('home')); ?>" class="link1">Home</a>
                    <a href="<?php echo e(url('add-event')); ?>" class="link2">Aggiungi evento</a>
                    <a href="<?php echo e(url('spotify')); ?>" class="link3">Spotify</a>
                    <a href="<?php echo e(url('preferiti')); ?>" class="link4">Preferiti</a>
                    <a href="<?php echo e(url('logout')); ?>">Logout</a><br><br>
                </div>

                <div class="hide_nav">
                        <div></div>
                        <div></div>
                        <div></div>
                </div>

                <div class="r_nav">
                        <div class="username">
                            Benvenuto <?php echo e($user['username']); ?>

                        </div>

                        <div class="profilo" style="background-image: url(<?php echo e($user['propic']); ?>)">
                        </div>
                </div>
            </nav>
        </header>

        <?php echo $__env->yieldContent('content'); ?>

        <section class="mobileMod">
            <div> DOVE VUOI ANDARE?</div>
            <div><a href="<?php echo e(url('home')); ?>"  class="navlink1">Home</a></div>
            <div><a href="<?php echo e(url('add-event')); ?>" class="navlink2">Aggiungi evento</a></div>
            <div><a href="<?php echo e(url('spotify')); ?>" class="navlink3">Spotify</a></div>
            <div><a href="<?php echo e(url('preferiti')); ?>" class="navlink4">Preferiti</a></div>
            <div><a href="<?php echo e(url('logout')); ?>">Logout</a></div>
        </section> 

        <footer>
            <p> Eterno Luca - Matricola: O46002092 </p>
        </footer>
    </body>
</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/layout.blade.php ENDPATH**/ ?>