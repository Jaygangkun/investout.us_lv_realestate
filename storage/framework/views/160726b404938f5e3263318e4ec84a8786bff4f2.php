

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
  <?php echo $__env->make('partials.investor_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
  <?php echo $__env->make('partials.investor_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_script'); ?>
  <!-- Mainly scripts -->
  <script src="<?php echo e(asset('js/plugins/metisMenu/jquery.metisMenu.js')); ?>" ></script>
  <script src="<?php echo e(asset('js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>" ></script>

  <!-- Custom and plugin javascript -->
  <script src="<?php echo e(asset('js/inspinia.js')); ?>" ></script>
  <script src="<?php echo e(asset('js/plugins/pace/pace.min.js')); ?>" ></script>
    <script type='text/javascript'>
    <?php if(Session::has('newmsg')): ?>
          alert("<?php echo e(Session::get('newmsg')); ?>")
                  <?php echo e(Session::forget('newmsg')); ?>

    <?php endif; ?>

    <?php if(Session::has('member')): ?>
          alert("<?php echo e(Session::get('member')); ?>")
        <?php echo e(Session::forget('member')); ?>

    <?php endif; ?>

    </script>

  <?php echo $__env->yieldContent('script'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>