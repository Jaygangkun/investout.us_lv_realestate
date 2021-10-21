 
<?php $__env->startSection('style'); ?>
<link href="http://demo.expertphp.in/css/dropzone.css" rel="stylesheet">
<style media="screen">
</style>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('body'); ?>
<div class="wrapper wrapper-content">
    <div class="ibox float-e-margins custom-container-a padding-all white-bg">
        <div class="col-md-12">
            <p style="text-transform:capitalize"><a onclick="window.history.back();"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
        </div>
        <div class="col-lg-12">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-12">
            <h2><b>Update Envoy</b></h2>
        </div>
        <div class="col-md-6">
            <form id="userProfileInfo" enctype="multipart/form-data" action="<?php echo e(route('admin.users.update_envoy')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo e($user_info->first_name); ?>" class="form-control" placeholder="First Name" required="">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="<?php echo e($user_info->last_name); ?>" class="form-control" placeholder="Last Name" required="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" value="<?php echo e($user_info->email); ?>" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label>Assigned Zipcodes</label>
                    <input type="text" name="assign_zip_code" id="assign_zip_code" value="<?php echo e($user_info->assign_zip_code); ?>" class="form-control" placeholder="Assign Zipcode" required="">
                </div>
                <input type="hidden" name="hi_user_id" value="<?php echo e($user_info->id); ?>">
                <div class=""><button class="btn btn-primary dim" type="submit">Update</button></div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="http://demo.expertphp.in/js/dropzone.js"></script>
<script type="text/javascript">
    function readURL(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $('#pro_img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
              }
            }
            $("#profile-input").change(function() {
              readURL(this);
            });
            $('option').mousedown(function(e) {
          e.preventDefault();
          $(this).prop('selected', !$(this).prop('selected'));
          return false;
      });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(session('layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>