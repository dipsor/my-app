<?php echo $__env->make('layouts.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        
        <left-sidebar url-path="<?php echo e(url('/')); ?>" logged-user="<?php echo e(Auth::user()); ?>" is-admin="<?php echo e(Auth::user()->hasRole('admin')); ?>"></left-sidebar>
        <!-- START CONTENT -->
        <section id="content">

            <?php echo $__env->make('layouts.partials.breadcrumbs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->yieldContent('content'); ?>
        </section>
        <!-- END CONTENT -->
       <?php echo $__env->make('layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
<?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>