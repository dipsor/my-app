<?php $__env->startSection('content'); ?>
     <!--start container-->
        <div class="container">
            <div class="section">
                <users-form></users-form>
                <users-list :user-id="<?php echo e(Auth::user()->id); ?>"></users-list>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>