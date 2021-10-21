<?php if(count($errors->all()) > 0): ?>
    <div class="alert alert-danger alert-block">
        <i class="fa fa-ban"></i>
        <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
        <strong><?php echo trans('admin/common.error'); ?></strong>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($message); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if($message = Session::get('success_message')): ?>
    <div class="alert alert-success alert-block session-box">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
        <strong><?php echo trans('admin/common.success'); ?></strong>
        <?php if(is_array($message)): ?>
            <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($m); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo e($message); ?>

        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if($message = Session::get('error_message')): ?>
    <div class="alert alert-danger alert-block session-box">
        <i class="fa fa-ban"></i>
        <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
        <strong><?php echo trans('admin/common.error'); ?></strong>
        <?php if(is_array($message)): ?>
            <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($m); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo e($message); ?>

        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if($message = Session::get('warning_message')): ?>
    <div class="alert alert-warning alert-block session-box">
        <i class="fa fa-warning"></i>
        <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
        <strong><?php echo trans('admin/common.warning'); ?></strong>
        <?php if(is_array($message)): ?>
            <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($m); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo e($message); ?>

        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if($message = Session::get('info_message')): ?>
    <div class="alert alert-info alert-block session-box">
        <i class="fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
        <strong><?php echo trans('admin/common.info'); ?></strong>
        <?php if(is_array($message)): ?>
            <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($m); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo e($message); ?>

        <?php endif; ?>
    </div>
<?php endif; ?>

<!--ajax response message-->
<div class="alert alert-danger hide">
    <i class="fa fa-ban"></i>
    <button type="button" aria-hidden="true" class="close"><i class="glyphicon glyphicon-remove"></i></button>
    <span class="msg-content"></span>
</div>
<div class="alert alert-success hide">
    <i class="fa fa-check"></i>
    <button type="button" aria-hidden="true" class="close"><i class="glyphicon glyphicon-remove"></i></button>
    <span class="msg-content"></span>
</div>
<div class="alert alert-info hide">
    <i class="fa fa-info"></i>
    <button type="button" aria-hidden="true" class="close"><i class="glyphicon glyphicon-remove"></i></button>
    <span class="msg-content"></span>
</div>
<div class="alert alert-warning hide">
    <i class="fa fa-warning"></i>
    <button type="button" aria-hidden="true" class="close"><i class="glyphicon glyphicon-remove"></i></button>
    <span class="msg-content"></span>
</div>