<li class="clearfix" id="message-<?php echo e($message->id); ?>">
    <div class="message-data align-right">
        <span class="message-data-time" ><?php echo e($message->humans_time); ?> ago</span> &nbsp; &nbsp;
        <span class="message-data-name" ><?php echo e($message->sender->name()); ?></span>
        <a href="#" class="talkDeleteMessage" data-message-id="<?php echo e($message->id); ?>" title="Delete Message"><i class="fa fa-close"></i></a>
    </div>
    <div class="message other-message float-right">
        <?php echo e($message->message); ?>

        <?php if($message->filename): ?>
            <br>
            <a download href="<?php echo e(asset('messagedoc/'.$message->filename)); ?>"><small><?php echo e($message->filename); ?></small></a>
        <?php endif; ?>
    </div>
</li>
