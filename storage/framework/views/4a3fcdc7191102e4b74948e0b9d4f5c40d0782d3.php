
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

    .input-group{
        display: inline-block
    }
    .frm-grp{
        margin-bottom: 15px;
    }
    input[type=checkbox]{
        height: 20px;
        width: 20px;
        margin: 0px;
        float: left;
    }
    .amenities_label{
        vertical-align: top;
        margin-left: 5px;
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
                        <h2>Bulk Import</h2>
                        <?php if(session('status')): ?>
                            <div class="alert">
                                <h3><?php echo e(session('status')); ?></h3>
                            </div>
                        <?php endif; ?>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ibox-content text-left" style='padding:2em'>
                        <div class="col-md-8">
                            <form action="<?php echo e(route('realtors.uploadCSV')); ?>" method="post" id="property-form" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="">Select CSV*</label> <br>
                                        <input type="file" name='csv_file' class='form-control validate[required]'>
                                        <small class="text-danger"><?php echo e($errors->first('csv_file')); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding: 0px;padding-top: 10px;">
                                    <div class="form-group">
                                        <?php echo Form::submit("Post", ['class' => 'btn btn-success','style'=>'color:white;width:120px;padding:.8em']); ?>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>

        $("#property-form").validationEngine('attach', {
            promptPosition : "inline", 
            scroll: false
        });

        
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.realtor-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>