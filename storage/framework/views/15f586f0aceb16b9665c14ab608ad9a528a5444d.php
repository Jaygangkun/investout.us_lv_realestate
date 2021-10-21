

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
  <?php echo $__env->make('partials.admin_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
  <?php echo $__env->make('partials.admin_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_script'); ?>

  <?php echo $__env->yieldContent('script'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>