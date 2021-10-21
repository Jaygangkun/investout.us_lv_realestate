

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
   .apply-button{
     background-color: #0b2a4a;
     color: white;
     font-family:unisansboldbold;
     border-radius: 6px;
     box-shadow: -3px 3px 3px 0px rgba(100,100,100,.24);
     border:none;
     width: 10%;
   }

   .apply-button:hover{
     color:white !important
   }

   .apply-button:focus{
     color: white;
   }


  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

      <div class="wrapper wrapper-content custom-container-a" style='width:100%;'>

              <div class="row animated fadeInRight allproperty_header">
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>Approved Proposals</b></h2>
                          </div>
                          <div class="ibox-content ">
                              <div class="row m-t-sm animated fadeInRight">
                                  <div class="panel blank-panel">


                                      <div class="panel-body">

                                          <div class="tab-content">

                                              <div class="tab-pane active" id="tab-1">
                                                  <table class="table table-striped">
                                                      <thead>
                                                          <tr>
                                                              <th>No</th>
                                                              <th>Proposal</th>
                                                              <th>Proposal Sender</th>
                                                              <th>Proposal Property ID</th>
                                                              <th>Created At</th>
                                                              <th>Delete</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                              <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <tr class="allproperty_row">
                                                                      <td class="text_center"><?php echo e($key+1); ?></td>
                                                                      <td  class="client-avatar">
                                                                        <a download href="<?php echo e(asset('proposal/'.$proposal->file)); ?>">
                                                                            <i style='font-size:4.4em' class='fa fa-folder-o'></i>
                                                                        </a>
                                                                      </td>
                                                                      <td><a href="<?php echo e(route('profile.show',$proposal->user_id)); ?>"> <?php echo e($proposal->user->name()); ?> </a></td>
                                                                      <td><a href="<?php echo e(route('admin.property.show',$proposal->property_id)); ?>"><?php echo e($proposal->property_id); ?> </a></td>
                                                                      <td><?php echo e(date('d-M-Y', strtotime($proposal->created_at))); ?></td>
                                                                      <td>
                                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.proposal.destroy',$proposal->id], 'class' => 'form-horizontal']); ?>

                                                                            <button type="submit" name="button" class=' btn btn-danger' style=''>
                                                                                <i class="fa fa-trash-o"></i>
                                                                            </button>
                                                                            <?php echo Form::close(); ?>

                                                                        </td>
                                                                  </tr>
                                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </tbody>
                                                  </table>

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

<?php $__env->startSection('script'); ?>
  <script type="text/javascript">
    $('body').on('click','.form-submit',function() {
        let ref = $(this).attr('ref');
        $(`#form${ref}`).submit();
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>