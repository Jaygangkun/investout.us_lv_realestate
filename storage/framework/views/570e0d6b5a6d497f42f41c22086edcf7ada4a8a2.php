
<?php $__env->startSection('style'); ?>

  <style media="screen">
    .padding-all{
      padding-bottom: 0px;
    }
    #page-wrapper, .pad0{
        padding: 0px;
    }
    .wrapper.wrapper-content{
        float: left;
        padding: 0;
    }
    .col-md-6 h5{
        margin: 0px;
    }
    .graybg{
        background: #E6E7E9;
    }
    .storyImage{
        object-fit: cover;
        width: 100%;
        max-height: 300px;
    }
    .storyDiv{
        height: 300px;
    }
    .bodyWorkImage{
        object-fit: cover;
        width: 100%;
        height: 160px;
    }
    .bodyWorkTitle{
        padding: 10px 0px;
    }
    .colorDarkBlue{
        color: #0B2A4A;
    }
    .colorWhite{
        color: #FFF;
    }
    .bgDarkBlue{
        background: #0B2A4A;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="wrapper wrapper-content">
        <?php if($member->hasRole('investor')): ?>
            <div class="col-md-12 pad0">
                <div class="col-md-9">
                    <div class="col-md-12">
                        <h1 class="colorDarkBlue">Meet your Partner</h1>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo e(asset('profilepic/'.session('profile')->image)); ?>" width="100%">
                    </div>
                    <div class="col-md-8">
                        <h3 class="colorDarkBlue">My Name is <?php echo e($member->first_name); ?> <?php echo e($member->last_name); ?></h3>
                        <p style="text-align: justify;"><?php echo e(($member->profile->aboutme) ? $member->profile->aboutme : 'About me not added yet!!'); ?></p>
                    </div>
                </div>
                <div class="col-md-3 graybg" style="padding-bottom:30px;">
                    <div class="col-md-12">
                        <div style="text-align: center;">
                            <h1>Partner Level</h1>
                            <img src="<?php echo e(asset('profilepic//level1.png')); ?>" width="100%">
                        </div>
                        <h4><b>Joined in <?php echo date('F Y',explode(" ",strtotime($member->created_at))[0]);?> </b></h4>
                    </div>
                    <div class="col-md-12 pad0">
                        <div class="col-md-6">
                            <h5><b>Languages:</b></h5>
                        </div>
                        <div class="col-md-6">
                            <?php echo e(($member->profile->languages) ? $member->profile->languages : '-'); ?>

                        </div>
                    </div>
                    <div class="col-md-12 pad0">
                        <div class="col-md-6">
                            <h5><b>Response Rate:</b></h5>
                        </div>
                        <div class="col-md-6">
                            100%
                        </div>
                    </div>
                    <div class="col-md-12 pad0">
                        <div class="col-md-6">
                            <h5><b>Response Time:</b></h5>
                        </div>
                        <div class="col-md-6">
                            Within one hour
                        </div>
                    </div>
                    <div class="col-md-12 pad0">
                        <div class="col-md-6">
                            <h5><b>Licence No:</b></h5>
                        </div>
                        <div class="col-md-6">
                            <?php echo e(($member->profile->licence_number) ? $member->profile->licence_number : '-'); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 pad0">
                <div class="col-md-4 graybg storyDiv" style="padding: 15px 30px;">
                    <h1 class="colorDarkBlue">My Story</h1>
                    <h4 class="colorDarkBlue"><?php echo e($member->profile->my_story_heading); ?></h4>
                    <p style="text-align: justify;"><?php echo e(($member->profile->my_story) ? $member->profile->my_story : 'Not added yet!!'); ?></p>
                </div>
                <div class="col-md-8 pad0" style="text-align: center;">
                    <?php if($member->profile->my_story_image != '' && file_exists(public_path('upload/'.$member->profile->my_story_image))): ?>
                        <img class="storyImage" src="<?php echo e(asset('upload/'.$member->profile->my_story_image)); ?>">
                    <?php else: ?>
                        <img class="storyImage" src="<?php echo e(asset('profilepic/no_image_available.jpg')); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-12">
                <h1 class="colorDarkBlue">My Body Of Work</h1>
                <div class="col-md-12 height150">
                    <?php
                    $arr = array();
                    $i = 0;
                    ?>
                    <?php if($profileDetails->count() > 0): ?>
                        <?php $__currentLoopData = $profileDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profileDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $catName = preg_replace('/\s*/', '', $profileDetail->name);
                                $catName = strtolower($catName);
                                ?>
                                <?php if(!in_array($profileDetail->work_category_id, $arr)): ?>
                                    <?php array_push($arr, $profileDetail->work_category_id);  ?>
                                    <div class="col-md-3">
                                        <a href="<?php echo e(asset('upload/'.$profileDetail->image_url)); ?>" data-lightbox="<?php echo $catName; ?>" data-title="<?php echo $profileDetail->name; ?>">
                                            <img class="bodyWorkImage" src="<?php echo e(asset('upload/'.$profileDetail->image_url)); ?>">
                                            <h3 class="bodyWorkTitle colorDarkBlue"><?php echo $profileDetail->name; ?></h3>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php echo e(asset('upload/'.$profileDetail->image_url)); ?>" data-lightbox="<?php echo $catName; ?>" data-title="<?php echo $profileDetail->name; ?>"></a>
                                <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <h2>No work uploaded yet!!</h2>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-12 bgDarkBlue">
                <h1 class="colorWhite">My Speciality</h1>
                <p class="colorWhite">Areas Where I Truly Excel Everyday</p>
                <?php if(!empty($users_specialities)): ?>
                <?php $__currentLoopData = $users_specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users_speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-2">
                        <img class="bodyWorkImage" src="<?php echo e(asset('upload/'.$users_speciality->image_url)); ?>">
                        <h3 class="bodyWorkTitle colorWhite"><?php echo e($users_speciality->title); ?></h3>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="col-md-12">
                    <h2>No specialities uploaded yet!!</h2>
                </div>
            <?php endif; ?>
            </div>
        <?php else: ?>
        <div class="col-md-12">
            <p style="text-transform:capitalize"><a onclick="window.history.back();"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
        </div>
        <div class="ibox float-e-margins custom-container-a padding-all white-bg" >
            <div class="edit-profile-title" >
                <H1>Personal Information</H1>
                  <?php if(!$adminview): ?>
                    <?php
                    if(auth()->user()->assign_zip_code == '' ){
                    ?>
                        <h3 class="widget style1 navy-bg" style="background-color:#1ab394;text-align:center;padding:7px 0px;width:200px;margin:auto;"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo e(session('userTxt')); ?></h3>
                    <?php
                    }
                    else
                    {
                    ?>
                        <h3 class="widget style1 navy-bg" style="background-color:#1ab394;text-align:center;padding:7px 0px;width:200px;margin:auto;"><i class="fa fa-user"></i>&nbsp;&nbsp;I am an Envoy</h3>
                    <?php
                    }
                    ?>
                  <?php elseif($member->hasRole('seller')): ?>
                    <h3 class="widget style1 navy-bg" style="background-color:#1ab394;text-align:center;padding:7px 0px;width:200px;margin:auto;"><i class="fa fa-user"></i>&nbsp;&nbsp;I am a Seller</h3>
                  <?php elseif($member->hasRole('investor')): ?>
                    <h3 class="widget style1 navy-bg" style="background-color:#1ab394;text-align:center;padding:7px 0px;width:200px;margin:auto;"><i class="fa fa-user"></i>&nbsp;&nbsp;I am an Investor</h3>
                  <?php endif; ?>

                <?php if(!$user->hasRole('admin')): ?>
                  <a href="<?php echo e(route('profile.edit',$user->roles()->first()->slug)); ?>"><h3 class="widget style1 navy-bg" style="background-color:#1ab394;text-align:center;padding:7px 0px;width:200px;margin: 10px auto;"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit Profile</h3></a>
                <?php endif; ?>
            </div>
            <br>

            <h3 class="custom-color-green">Profile Photo</h3>
            <div class="ibox-content dropzone-content text_center">
                <img class="profile-img toggle-img media-object" src="<?php echo e(asset('profilepic/'.$member->profile->image)); ?>" width="250" height="250">
            </div>
            <br><br><br>

                <h3 class="custom-color-green">Personal Details:</h3></h3>
                <br><br>
                <div class="p-group  col-md-12">
                    <div class="ibox-content profile-content">
                        <div class="p-group  col-md-12">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label"><b>First Name:</b></h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3><?php echo e($member->first_name); ?></h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label"><b>Last Name:</b></h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3><?php echo e($member->last_name); ?></>
                            </div>

                        </div>
                        <div class="p-group  col-md-12">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label"><b>Location:</b></h3>
                            </div>
                            <div class="col-md-9 col-sm-6 m-b">
                                <h3><?php echo e($member->profile->location); ?></h3>
                            </div>
                        </div>

                        <div class="p-group  col-md-12">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label"><b>Phone Number:</b></h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3><?php echo e($member->profile->phone); ?></h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label"><b>Email:</b></h3>
                            </div>
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3><?php echo e($member->email); ?></h3>
                            </div>
                        </div>

                        <br><br>
                        <h3>&nbsp;</h3>
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label"><b>About me:</b></h3>
                            </div>
                            <p class="col-md-12 well" style="height:140px"><?php echo e($member->profile->aboutme); ?></h3>
                        </div>
                        <br>
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label"><b>Experience:</b></h3>
                            </div>
                            <p class="col-md-12 well" style="height:140px" ><?php echo e($member->profile->experience); ?></h3>
                        </div>
                        <br>
                        <!-- Social media -->
                        <div class="p-group  col-md-12 padding-all">
                            <div class="col-md-3 col-sm-6 m-b">
                                <h3 class="control-label"><b>Social Media:</b></h3>
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
                                <h3 class="control-label"><b> Video:</b></h3>
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
            <h3>&nbsp;</h3>

        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(session('layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>