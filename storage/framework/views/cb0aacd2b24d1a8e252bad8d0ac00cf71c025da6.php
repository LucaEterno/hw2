

<?php $__env->startSection('title', 'Add event'); ?>

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
    <link rel='stylesheet' href="<?php echo e(url('style/add_event.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <section>
            <h1>Aggiungi evento:</h1>
            <div>
                <?php if($error == 'empty_fields'): ?>
                <span class='error'>Riempire tutti i campi.</span>
                <?php elseif($error == 'past'): ?>
                <span class='error'>Non puoi tornare indietro nel tempo, inserire data valida.</span>
                <?php elseif($error == 'future'): ?>
                <span class='error'>Programma il tuo evento entro un anno, inserire data valida.</span>
                <?php endif; ?>

                <form name='event' method='post'>
                <?php echo csrf_field(); ?>
                    <div><label for='type'>Tipologia evento:</label></div>
                    <div>
                        <select name='type' id='type'>
                            <option value='Evento sociale' selected>Evento sociale</option>
                            <option value='Evento musicale' <?php if(old('type') == 'Evento musicale'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Evento musicale</option>
                            <option value='Spettacolo' <?php if(old('type') == 'Spettacolo'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Spettacolo</option>
                            <option value='Evento sportivo' <?php if(old('type') == 'Evento sportivo'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Evento sportivo</option>
                            <option value='Conferenza' <?php if(old('type') == 'Conferenza'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Conferenza</option>
                        </select>
                    </div>
                        
                    <div><label for='descr'>Descrizione dell'evento:</label></div>
                    <div><input type='text' name='descr' id='descr' value='<?php echo e(old("descr")); ?>'></div>

                    <div><label for='data'>Data: </label></div>
                    <div><input type='date' name='data' id='data' value='<?php echo e(old("data")); ?>'></div>

                    <div><input type='submit' value="Aggiungi evento" id="submit"> </div>
                </form>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/event.blade.php ENDPATH**/ ?>