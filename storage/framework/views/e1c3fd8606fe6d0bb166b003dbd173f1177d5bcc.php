

<?php $__env->startSection('style'); ?>
  <style>
    table tr th,table tr td{
     text-align:center
   }
   .ibox-content{
    color:#0b2a4a !important
  }
   table thead tr th{
           font-family:unisansboldbold;
           font-weight:100
   }

    table tbody tr td{
           font-family:unisansregularregular;
           font-weight:100
   }


  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

      <div class="wrapper wrapper-content custom-container-a">

              <div class="row animated fadeInRight allproperty_header">
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100'>Signed Document</b></h2>
                          </div>
                          <div class="ibox-content ">
                              <div class="row m-t-sm animated fadeInRight">
                                  <div class="panel blank-panel">


                                      <div class="panel-body">

                                          <div class="tab-content">

                                              <div class="tab-pane active" id="tab-1">

                                                    <?php if(file_exists('signed_documents/'.Auth::user()->id.'.pdf')): ?>
                                                        <iframe src="<?php echo e(ENV('APP_URL').'signed_documents/'.Auth::user()->id.'.pdf'); ?>" width="100%;" height="800px;" style="border:none;"></iframe>
                                                    <?php else: ?>
                                                        <p>Please check your mail and sign digital document.</p>
                                                    <?php endif; ?>

                                              </div>
                                          </div>

                                      </div>

                                  </div>
                              </div>
                          <div class="hr-line-dashed"></div>

                      </div>

                  </div>

              </div>

          </div>
          </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.realtor-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>