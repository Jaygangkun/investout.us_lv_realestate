


<?php $__env->startSection('title'); ?>
Training
<?php $__env->stopSection(); ?>


<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/blog.css')); ?>">

<style>
       .mainpic {
       background-size: cover;
       background-position: center;
       background-attachment: fixed;
       background-repeat: no-repeat;
       height: 75%;
       background-image: url(<?php echo e(asset('sitefront/Cover-inner.jpg')); ?>)
   }

   .vid-container{
       padding-left:0px;
       padding-right:10px;
   }
   .vid-container > a,.sidebar  a{
       color:#0b2a4a
   }

   .vid-container > a:hover,.sidebar  a:hover{
       text-decoration:none
   }

   .widget-recent p{
       height:100px;
   }

   .video-container {
  position: relative;
  padding-bottom: 56.25%;
  padding-top: 30px;
  height: 0;
  overflow: hidden;
}

.video-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}

@media (min-width: 768px) {
  .modal-dialog {
    width: 745px;
    margin: 10px auto;
  }
}

.modal-dialog{
    top:10%
}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>



  <div class="mainpic">
    <div class="container slider-main">
      <div class="main-text text-right col-lg-offset-6 col-lg-6">
        <div class="" style='line-height:54px;margin-bottom:-8px'>
            <h1 class='main-banner-text'>
                  Educate Yourself,<br>
                  <span style='color:#33a58e'>With our Tutorials</strong></span>
            </h1>
        </div>
      </div>
    </div>

  </div>
  <!-- Controls -->

  

  <div class="container-main container">
        <div class="col-md-9" style='padding:0px'>
            <h2>InvestOut Training</h2>


            <div class="row " style='margin:0px;'>
            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="vid-container col-md-3">
                    <a href="#" data-toggle="modal" data-target="#myModal<?php echo e($video->id); ?>">
                    <section class='widget widget-recent '>
                        <img src="<?php echo e(asset('training/img/'.$video->image)); ?>" alt="Training Video Image">
                        <p><?php echo e($video->description); ?></p>
                        <div class='recent-post-date'><span style='color:#2c977d'>Posted </span> : <?php echo e($video->created_at->diffForHumans()); ?></div>
                    </section>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal<?php echo e($video->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-body" style='padding:0px'>
                        <div class="video-container" style='padding-top:0px;'>
                           <?php if(str_contains($video->url,'youtube')): ?>
                                <iframe width="640" height="360"  frameborder="0" src='<?php echo e($video->url); ?>' allowfullscreen>
                                </iframe>
                            <?php else: ?>
                                <video style='width:100%;padding-bottom:22px' src="<?php echo e(asset('training/video/'.$video->url)); ?>" width="520" height="440" controls="controls" preload="metadata">
                                </video>
                            <?php endif; ?>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        </div>
        <div class="col-md-3 sidebar">
            <section class='widget widget-search'>
                <form action="<?php echo e(route('training.outer.search')); ?>" method='post'>
                <?php echo csrf_field(); ?>
                    <div class="input-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Search" aria-label="">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit" aria-label=""><i class='fa fa-search'></i> </button>
                            </span>
                            <input type="hidden" value='2' name='page'>
                    </div>
                </form>
                <span style='font-family:unisansregularregular' id='sea'>Search on the relevant words and phases. Enter a Search and <span style='font-family:unisansboldbold'>press Enter</span> or the <span style='font-family:unisansboldbold'>search icon</span> </span>
            </section>

        <?php if(count($allvideos) > 0): ?>
        <h3>Recent Post</h3>
            <?php
            $first = $allvideos;
            ?>

            <a href="#" data-toggle="modal" data-target="#myModal<?php echo e($first->id); ?>">
                <section class='widget widget-recent '>
                    <img src="<?php echo e(asset('blogpost/default-property.png')); ?>" alt="Training Video Image">
                    <p><?php echo e($first->description); ?></p>
                    <div class='recent-post-date'><span style='color:#2c977d'>Posted </span> : <?php echo e($first->created_at->diffForHumans()); ?></div>
                </section>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="myModal<?php echo e($first->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-body" style='padding:0px'>
                    <div class="video-container" style='padding-top:0px;'>
                    <?php if(str_contains($first->url,'youtube')): ?>
                            <iframe width="640" height="360"  frameborder="0" src='<?php echo e($first->url); ?>' allowfullscreen>
                            </iframe>
                        <?php else: ?>
                            <video style='width:100%;padding-bottom:22px' width="520" height="440" controls="controls" preload="metadata">
                                <source  src="<?php echo e(asset($first->url.'#t=141')); ?>" type="video/mp4">
                            </video>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
            </div>
            </div>
        <?php endif; ?>
        </div>


  </div>




<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>