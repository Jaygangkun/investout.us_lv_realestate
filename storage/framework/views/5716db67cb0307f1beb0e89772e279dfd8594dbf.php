

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('chat/css/reset.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('chat/css/style.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="container clearfix body">
   <?php echo $__env->make('partials.peoplelist', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="chat">
      <div class="chat-header clearfix">
        <?php if(isset($msguser)): ?>
            <img src="<?php echo e($msguser->avatar); ?>" alt="avatar" />
        <?php endif; ?>
        <div class="chat-about">

            <?php if(isset($msguser)): ?>
                <div class="chat-with"><?php echo e('Chat with ' .$msguser->name()); ?></div>
            <?php else: ?>
                <div class="chat-with">No Thread Selected</div>
            <?php endif; ?>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->

      <div class="chat-history">
        <ul id="talkMessages">

            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($message->sender->id == auth()->user()->id): ?>
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
                <?php else: ?>
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
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </ul>

    </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">
      <form action="" method="post" id="talkSendMessage" enctype="multipart/form-data">
            <textarea name="message-data" <?php echo e(isset($msguser) ? '' : 'disabled'); ?> id="message-data" placeholder ="Type your message" rows="4"></textarea>
            <input type="hidden" name="_id" <?php echo e(isset($msguser) ? '' : 'disabled'); ?> value="<?php echo e(@request()->route('id')); ?>">
            <div class='sending-msg-btn'>
                <button type="submit">Send</button>
                <input type="file" name="file" id="file" <?php echo e(isset($msguser) ? '' : 'disabled'); ?> class="inputfile" data-multiple-caption="{count} files selected"   />
                <label for="file">Choose a file</label>
            </div>
      </form>

      </div> <!-- end chat-message -->

    </div> <!-- end chat -->

  </div> <!-- end container -->

<?php $__env->stopSection(); ?>

    


<?php $__env->startSection('script'); ?>
      <script>
          var __baseUrl = "<?php echo e(url('/')); ?>"
      </script>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js'></script>


    <script src="<?php echo e(asset('chat/js/talk.js')); ?>"></script>
    

    <script>
        // var show = function(data) {
        //     alert(data.sender.name + " - '" + data.message + "'");
        // }

        // var msgshow = function(data) {
        //     let filename = ''
        //     if(data.filename)
        //         filename = data.filename
        //     var html = '<li id="message-' + data.id + '">' +
        //     '<div class="message-data">' +
        //     '<span class="message-data-name"> <a href="#" class="talkDeleteMessage" data-message-id="' + data.id + '" title="Delete Messag"><i class="fa fa-close" style="margin-right: 3px;"></i></a>' + data.sender.name + '</span>' +
        //     '<span class="message-data-time">1 Second ago</span>' +
        //     '</div>' +
        //     '<div class="message my-message">' +
        //     data.message +'<br>'+
        //     '<a download href="messagedoc/$message->filename"'+filename +'""><small>'+filename+'</small></a>'
        //     +
        //     '</div>' +
        //     '</li>';

        //     $('#talkMessages').append(html);
        // }

        var inputs = document.querySelectorAll( '.inputfile' );
        Array.prototype.forEach.call( inputs, function( input )
        {
            var label    = input.nextElementSibling,
                labelVal = label.innerHTML;


            input.addEventListener( 'change', function( e )
            {
                var fileName = '';
                if( this.files && this.files.length > 1 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\\' ).pop();

                if( fileName )
                    $(label).text(fileName);
                else
                    label.innerHTML = labelVal;
            });
        });

    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.whole-seller-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>