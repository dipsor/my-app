<?php $__env->startSection('content'); ?>
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="input-field col s12 center">
                    
                    <p class="center login-form-text">Skeleton Dashboard</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
                    <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                    <label for="email" class="center-align">Email</label>
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input id="password" type="password" name="password" required>
                    <label for="password">Password</label>
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12  login-text">
                    <input name="remember" type="checkbox" id="remember-me" <?php echo e(old('remember') ? 'checked' : ''); ?> />
                    <label for="remember-me">Remember me</label>
                </div>
            </div>
            <div class="row login-row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light col s12">Login</button>
                </div>
            </div>
            <div class="row facebook-row">
                <div class="input-field col s12">
                    <div class="social-wrap a">
                        <a href="<?php echo e(route('facebook.login')); ?>" id="facebook">Sign in with Facebook</a>
                    </div>
                </div>
            </div>

            <div class="row google-row">
                <div class="input-field col s12">
                    <div class="social-wrap a">
                        <a href="<?php echo e(route('google.login')); ?>" id="googleplus">Sign in with Google</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="<?php echo e(route('home')); ?>">Home</a></p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="<?php echo e(route('register')); ?>">Register Now!</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="<?php echo e(route('password.request')); ?>">Forgot password ?</a></p>
                </div>
            </div>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('auth.custom.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>