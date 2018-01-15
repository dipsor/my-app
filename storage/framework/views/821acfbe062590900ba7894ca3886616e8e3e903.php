<?php $__env->startSection('content'); ?>
    <!--start container-->
    <div class="container">
        <div class="section">
            <div class="row">
                <!-- Form with validation -->
                <div class="col s12 m12 l12">
                    <div class="card-panel custom-card-panel">
                        <div class="custom-loader-wrapper">
                            <div class="preloader-wrapper big active custom-loader">
                                <div class="spinner-layer spinner-blue-only">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <users-profile :user-id="<?php echo e(Auth::user()->id); ?>"></users-profile>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>