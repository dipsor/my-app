<?php $__env->startSection('content'); ?>
    <!--start container-->
    <div class="container">
        <div class="section">
            <div class="row">
                <!-- Form with validation -->
                <div class="col s12 m12 l12">
                    <div class="card-panel custom-card-panel">
                        <users-profile :user-id="<?php echo e(Auth::user()->id); ?>"></users-profile>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>