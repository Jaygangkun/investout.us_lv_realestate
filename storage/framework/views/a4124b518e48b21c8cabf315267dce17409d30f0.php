 
<?php $__env->startSection('style'); ?>
<link href="http://demo.expertphp.in/css/dropzone.css" rel="stylesheet">
<style media="screen">
</style>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('body'); ?>
<div class="wrapper wrapper-content">
    <div class="ibox float-e-margins custom-container-a padding-all white-bg">
        <form id="change-pass" action="<?php echo e(route('change.password')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <h3 class="custom-color-green">Change Password</h3>
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <div class="ibox-content dropzone-content text_center">
                         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="text-danger"><?php echo e($error); ?></p>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control validate[required]" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control validate[required,minSize[6],maxSize[20]]" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control validate[required,equals[new_password]]" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
   
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>                
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $("#change-pass").validationEngine('attach', {
            promptPosition : "bottomLeft", 
            scroll: false
        });
    });    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(session('layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>