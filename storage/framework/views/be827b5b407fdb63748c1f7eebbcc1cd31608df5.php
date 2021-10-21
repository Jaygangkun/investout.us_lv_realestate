<li class=''>
    <div class='noti-link'>
        <div class="col-md-3 text-left msg-alert-pic" style='padding:0px'>
            <img src="<?php echo e(asset('profilepic/'.$notify->fromImage)); ?>" style='width:55px;display:inline' class='img-rounded img-responsive'
                alt="">
        </div>
        <div class="col-md-9 nav-msg-item">
            <a href="<?php echo e($notify->link); ?>">
                <h3><?php echo e($notify->fromName); ?></h3>
                <div><?php echo $notify->text; ?></div>
                <span><?php echo e($notify->created_at->diffForHumans()); ?></span>
            </a>
        </div>
        </a>
</li>