


<?php $__env->startSection('title'); ?>

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
            <h1 style='margin:6px;'>INVESTOUT</h1>
            <h3>For yourself dosen't <br> mean BY youself </h3>
          </div>
        </div>

        <div class="col-md-7 auth-right">
            <div class="row text-center">
              <img src="<?php echo e(asset('sitefront/auth-logo.png')); ?>"  alt="">
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
                <?php if(session('warning')): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session('warning')); ?>

                    </div>
                <?php endif; ?>


                <form method="POST" action="<?php echo e(route('password.request')); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="token" value="<?php echo e($token); ?>">


                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" placeholder="<?php echo e(__('E-Mail Address')); ?>"  required autofocus>

                    <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                  <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="<?php echo e(__('Password')); ?>" required>

                  <?php if($errors->has('password')): ?>
                      <span class="invalid-feedback">
                          <strong><?php echo e($errors->first('password')); ?></strong>
                      </span>
                  <?php endif; ?>

                  <input id="password-confirm" type="password" class="form-control<?php echo e($errors->has('password_confirmation') ? ' is-invalid' : ''); ?>" name="password_confirmation" placeholder="<?php echo e(__('Confirm Password')); ?>" required>

                  <?php if($errors->has('password_confirmation')): ?>
                      <span class="invalid-feedback">
                          <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                      </span>
                  <?php endif; ?>
                  <div class="row">
                    <div class="col-md-12 text-left ">
                      <button type="submit" name="button">
                        <?php echo e(__('Reset Password')); ?>

                      </button>
                    </div>
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

<?php echo $__env->make('layouts.auth-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>