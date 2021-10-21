<div class="people-list" id="people-list">
    <div class="search" style="text-align: center">
        <a href="<?php echo e(url('/message/new')); ?>" style="font-size:16px; text-decoration:none; color: white;"><i class="fa fa-user"></i> <?php echo e(auth()->user()->name()); ?></a>
    </div>
    <ul class="list">
        <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inbox): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!is_null($inbox->thread)): ?>
        <li class="clearfix">
            <a href="<?php echo e(route('message.read', ['id'=>$inbox->withUser->id])); ?>">
            <img src="<?php echo e($inbox->withUser->avatar); ?>" alt="avatar" />
            <div class="about">
                <div class="name"><?php echo e($inbox->withUser->name()); ?></div>
                <div class="status">
                    <?php if(auth()->user()->id == $inbox->thread->sender->id): ?>
                        <span class="fa fa-reply"></span>
                    <?php endif; ?>
                    <span><?php echo e(substr($inbox->thread->message, 0, 20)); ?></span>
                </div>
            </div>
            </a>
        </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
</div>
