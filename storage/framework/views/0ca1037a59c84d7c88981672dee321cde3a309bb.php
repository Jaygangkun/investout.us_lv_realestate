<li id="message-<?php echo e($message->id); ?>">
    <div class="message-data">
        <span class="message-data-name"> <a href="#" class="talkDeleteMessage" data-message-id="<?php echo e($message->id); ?>" title="Delete Messag"><i class="fa fa-close" style="margin-right: 3px;"></i></a><?php echo e($message->sender->name()); ?></span>
        <span class="message-data-time"><?php echo e($message->humans_time); ?> ago</span>
    </div>
    <div class="message my-message">
        <?php echo e($message->message); ?>

        <?php if($message->filename): ?>
            <br>
            <a download href="<?php echo e(asset('messagedoc/'.$message->filename)); ?>"><small><?php echo e($message->filename); ?></small></a>
        <?php endif; ?>
    </div>
</li>
