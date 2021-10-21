
<?php $__env->startSection('style'); ?>
  <style media="screen">
    .seller_detail{
      padding: 2em;
      background: white !important;
      color: #0b2a4a;
    }
    .ibox-title{
      padding: 0px;
      border: none;
      margin-left: 1em;
      font-family: unisansboldbold
      }

      .ibox-title h2{
        font-weight: 100;
        font-size: 2.5em;
      }

    .ibox-content{
      margin: 1em;
      margin-top:1em;
      padding: 0px;
      color: #0b2a4a !important;
    }
    .table{
      font-size: 1.1em;
    }
    .table thead tr th{
      padding-bottom: 23px;
    }
    .table tr th,.table tr td{
      text-align: center !important;
      font-family: unisansboldbold;
      font-weight: 100 !important;
    }

    .table tbody tr td{
      font-family: unisansregularregular;
      font-weight: 100 !important;
    }

    .table tr td{
        color: #34a691
    }
    .table-striped>tbody>tr:nth-of-type(odd){
      background-color: #dbddde
    }
    .button.dim{
      margin:0px !important
    }
    .fa-eye{
      color: #34a691 !important;
      font-size: 1.5em;
    }
    .fa-trash-o{
      color: #34a691 !important;
    }

    .post-img{
      width: 50px;
      height: 50px;
      border-radius: 50%
    }

  </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
  <div id="" class="seller_detail min_height_974px">

      <div class="wrapper wrapper-content custom-container-a">

              <div class="row animated fadeInRight allproperty_header">
                <div class="col-md-12">
                    <p style="text-transform:capitalize"><a href="<?php echo e(URL::previous()); ?>"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
                </div>
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2>Realtor</h2>
                          </div>
                          <div class="col-lg-12">
                            <?php if(session('success')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(session('error')): ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo e(session('error')); ?>

                                </div>
                            <?php endif; ?>
                          </div>
                          <div class="ibox-content text-left" style='padding:2em'>
                              <form action="<?php echo e(route('brokeragehouse.storeRealtor')); ?>" method="post" id="realtor-form">
                                <div class="col-md-6">
                                  <?php echo e(csrf_field()); ?>

                                  <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                                      <label for="">First Name</label> <br>
                                      <input required type="text" name='first_name' class='form-control validate[required]'>
                                      <small class="text-danger"><?php echo e($errors->first('first_name')); ?></small>
                                  </div>
                                  <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                      <label for="">Email</label> <br>
                                      <input required type="email" name='email' class='form-control validate[required,custom[email]]'>
                                      <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
                                  </div>
                                  <div class="form-group<?php echo e($errors->has('location') ? ' has-error' : ''); ?>">
                                      <label for="">Location</label> <br>
                                      <input required type="text" name='location' class='form-control validate[required]'>
                                      <small class="text-danger"><?php echo e($errors->first('location')); ?></small>
                                  </div>
                                  <!--<div class="form-group<?php echo e($errors->has('zipCode') ? ' has-error' : ''); ?>">
                                      <label for="">ZipCode</label> <br>
                                      <input required type="text" name='zipCode' class='form-control validate[required]'>
                                      <small class="text-danger"><?php echo e($errors->first('zipCode')); ?></small>
                                  </div>-->
                                  <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                                      <label for="">State</label> <br>
                                      <input required type="text" name='state' class='form-control validate[required]'>
                                      <small class="text-danger"><?php echo e($errors->first('state')); ?></small>
                                  </div>
                                  <div class="form-group<?php echo e($errors->has('company') ? ' has-error' : ''); ?>">
                                      <label for="">Company</label> <br>
                                      <input required type="text" name='company' class='form-control validate[required]'>
                                      <small class="text-danger"><?php echo e($errors->first('company')); ?></small>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                                      <label for="">Last Name</label> <br>
                                      <input required type="text" name='last_name' class='form-control validate[required]'>
                                      <small class="text-danger"><?php echo e($errors->first('last_name')); ?></small>
                                  </div>
                                  <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                      <label for="">Password</label> <br>
                                      <input required type="password" name='password' class='form-control validate[required]'>
                                      <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
                                  </div>
                                  <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                                      <label for="">City</label> <br>
                                      <input required type="text" name='city' class='form-control validate[required]'>
                                      <small class="text-danger"><?php echo e($errors->first('city')); ?></small>
                                  </div>
                                  <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                                      <label for="">Phone</label> <br>
                                      <input required type="number" name='phone' class='form-control validate[required]'>
                                      <small class="text-danger"><?php echo e($errors->first('phone')); ?></small>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                      <?php echo Form::submit("Save", ['class' => 'btn btn-success','style'=>'color:white;width:120px;padding:.8em']); ?>

                                  </div>
                                </div>
                              </form>
                        </div>
                  </div>

              </div>

            </div>
          </div>
    </div>
}
}


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
      $("#realtor-form").validationEngine();

        $(document).ready(function() {
            $('.content').summernote();
            $('.description').summernote(); 
        });    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.brokeragehouse-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>