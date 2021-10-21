


<?php $__env->startSection('title'); ?>
Reset Password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<main class=''>
  <div class="container ">
    <div class="row">
      <div class="card col-md-8 col-md-offset-2">
        <div class="col-md-5 auth-left text-center">
          <img src="<?php echo e(asset('sitefront/auth-back.png')); ?>" alt="">
          <div class="">
            <h3 style='letter-spacing:3px;margin-bottom:0px'>WELCOME TO</h3>
            <h1 style='margin:6px;'><a href="<?php echo e(ENV('APP_URL')); ?>" class='no-hover'>INVESTOUT</a></h1>
            <h3>For yourself dosen't <br> mean BY youself </h3>
          </div>
        </div>

        <div class="col-md-7 auth-right">
            <div class="row text-center">
              <a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset('sitefront/auth-logo.png')); ?>"  alt=""></a>
            </div>
            <div class="row text-center">
              <h4>Reset <span class='site-brand'>InvestOut</span> Password</h4>
            </div>
            <div class="row">
              <div class="col-md-12">
                <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('password.email')); ?>" id="resetPasswordForm">
                    <?php echo csrf_field(); ?>

                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email Address" data-validation-engine="validate[required, custom[email]]">

                    <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>

                  <div class="row">
                    <div class="col-md-12 text-left ">
                      <button type="submit" name="button"><?php echo e(__('Send Password Reset Link')); ?></button>
                    </div>
                  </div>
                    <div class="col-md-12 dont-have-account" style='text-align:left !important'>
                      <span><a href="<?php echo e(route('login')); ?>" class='signup-link'>Log In</a></span>
                    </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('template_script'); ?>
<script type="text/javascript">
  $("#resetPasswordForm").validationEngine();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>