
<?php $__env->startSection('style'); ?>

  <style media="screen">
    .padding-all{
      padding-bottom: 0px;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="wrapper wrapper-content">
        <div class="ibox float-e-margins custom-container-a padding-all white-bg" >
            <div class="edit-profile-title" >
                <H1>Personal Information</H1>
                <h3 class="widget style1 navy-bg" style="background-color:#1ab394;text-align:center;padding:7px 0px;background-color:#1ab394;text-align:center;padding:7px 0px;width:200px;margin: auto;"><i class="fa fa-user"></i>&nbsp;&nbsp;I am Brokeragehouse</h3>
            </div>
            <br>

            <h3 class="custom-color-green">Profile Photo</h3>
            <div class="ibox-content dropzone-content text_center">
                <img class="profile-img toggle-img media-object" src="<?php echo e(asset('profilepic/'.$member->profile->image)); ?>" width="250" height="250">
            </div>
            <br><br><br>

                <h3 class="custom-color-green">Personal Details:</h3>
                <br><br>
                <div class="p-group  col-md-12">
                    <div class="ibox-content profile-content">
                        <div class="p-group  col-md-12">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">First Name:</h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <p><?php echo e($member->first_name); ?></p>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Last Name:</h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <p><?php echo e($member->last_name); ?></>
                            </div>

                        </div>
                        <div class="p-group  col-md-12">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Location:</h3>
                            </div>
                            <div class="col-md-9 col-sm-6 m-b">
                                <p ><?php echo e($member->profile->location); ?></p>
                            </div>
                        </div>

                        <div class="p-group  col-md-12">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Phone Number:</h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <p><?php echo e($member->profile->phone); ?></p>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Email:</h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <p><?php echo e($member->email); ?></p>
                            </div>
                        </div>

                        <br><br>
                        <h3>&nbsp;</h3>
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">About me:</h3>
                            </div>
                            <p class="col-md-12 well" style="height:140px"><?php echo e($member->profile->aboutme); ?></p>
                        </div>
                        <br>
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Experience:</h3>
                            </div>
                            <p class="col-md-12 well" style="height:140px" ><?php echo e($member->profile->experience); ?></p>
                        </div>
                        <br>
                        <!-- Social media -->
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label">Social Media:</h3>
                            </div>

                        </div>
                        <div class="row padding-all">
                            <div class="col-md-2 col-md-offset-1">
                                <label class="ng-binding">facebook</label>
                            </div>
                            <div class="col-md-5">
                                <a href="<?php echo e(session('profile')->socialmedia); ?>" target="_blank"><?php echo e(session('profile')->socialmedia); ?></a>
                            </div>
                        </div>
                        <br>
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-2 col-sm-6 m-b">
                                <h3 class="control-label"> Video:</h3>
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-md-10 col-sm-6 m-b col-md-offset-1 padding-all">
                            <a href="<?php echo e(session('profile')->inputvideo); ?>" target="_blank"><?php echo e(session('profile')->inputvideo); ?></a>
                            </div>
                            <h3>&nbsp;</h3>
                            <div class="profile-video-view padding-all" style="text-align:center;">
                                <div class="container-fluid">
                                <?php
                                    $video_url = $member->profile->inputvideo;
                                    if (strlen($video_url) > 11) {
                                        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match)) {
                                            $video_url = "https://www.youtube.com/embed/".$match[1];
                                        }
                                    }
                                ?>
                                    <iframe class="mbr-embedded-video" src="<?php echo e($video_url); ?>" width="610px" height="350px" frameborder="0" allowfullscreen="" <?php echo e(isset($video_url)==true?'':'hidden'); ?>></iframe>
                                </div>
                            </div>
                        </div>
                        <br><br>

                    </div>
                </div>
                <?php
                    // $credits = DB::table('profile_credit')->where('user_id', $userid)->get();
                    // $portfolios = DB::table('profile_portfolio')->where('user_id', $userid)->get();
                ?>

            

            <br>
            <p>&nbsp;</p>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.brokeragehouse-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>