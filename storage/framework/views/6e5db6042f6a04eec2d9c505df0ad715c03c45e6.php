

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

    /* Delete Modal CSS */
    .modal-confirm {    
    color: #636363;
    width: 400px;
  }
  .modal-confirm .modal-content {
    padding: 20px;
    border-radius: 5px;
    border: none;
        text-align: center;
    font-size: 14px;
  }
  .modal-confirm .modal-header {
    border-bottom: none;   
        position: relative;
  }
  .modal-confirm h4 {
    text-align: center;
    font-size: 26px;
    margin: 30px 0 -10px;
  }
  .modal-confirm .close {
        position: absolute;
    top: -5px;
    right: -2px;
  }
  .modal-confirm .modal-body {
    color: #999;
  }
  .modal-confirm .modal-footer {
    border: none;
    text-align: center;   
    border-radius: 5px;
    font-size: 13px;
    padding: 10px 15px 25px;
  }
  .modal-confirm .modal-footer a {
    color: #999;
  }   
  .modal-confirm .icon-box {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    border-radius: 50%;
    z-index: 9;
    text-align: center;
    border: 3px solid #f15e5e;
  }
  .modal-confirm .icon-box i {
    color: #f15e5e;
    font-size: 46px;
    display: inline-block;
    margin-top: 13px;
  }
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
    background: #60c7c1;
    text-decoration: none;
    transition: all 0.4s;
        line-height: normal;
    min-width: 120px;
        border: none;
    min-height: 40px;
    border-radius: 3px;
    margin: 0 5px;
    outline: none !important;
    }
  .modal-confirm .btn-info {
        background: #c1c1c1;
    }
    .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
        background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
  .trigger-btn {
    display: inline-block;
    margin: 100px auto;
  }

  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

      <div class="wrapper wrapper-content custom-container-a">

              <div class="row animated fadeInRight allproperty_header">
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100'>All Proposals</b></h2>
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
                                                              <th>Sent At</th>
                                                              <th style='width:100px'>Accept</th>
                                                              <th style='width:100px'>Deny</th>
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
                                                                      <td><a href="<?php echo e(route('message.read',$proposal->user_id)); ?>"> <?php echo e($proposal->user->name()); ?> </a></td>
                                                                      <td><a href="<?php echo e(route('brokeragehouse.property.show',$proposal->property_id)); ?>"><?php echo e($proposal->property_id); ?> </a></td>
                                                                      <td><?php echo e(date('d-M-Y', strtotime($proposal->created_at))); ?></td>
                                                                      <td>
                                                                        <form action="<?php echo e(route('brokeragehouse.proposal.update')); ?>" method='post'>
                                                                            <?php echo csrf_field(); ?>
                                                                            <input type="hidden" name='pro_id' value=<?php echo e($proposal->id); ?>>
                                                                            <input type="hidden" name='pro_status' value='1'>
                                                                            <button type="submit" class='btn btn-primary form-submit' name="button" > Accept</button>
                                                                        </form>
                                                                        </td>
                                                                    <td>
                                                                        <?php echo Form::open(['method' => 'post', 'route' => ['brokeragehouse.proposal.update'], 'class' => 'form-horizontal denyForm']); ?>

                                                                            <input type="hidden" name='pro_id' value=<?php echo e($proposal->id); ?>>
                                                                            <input type="hidden" name='pro_status' value='2'>
                                                                            <button type="submit" name="button" class=' btn btn-danger' style=''> Deny</button>
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
  <a href="#deleteConf" id="DeleteModalButton" class="trigger-btn" style="display:none;" data-toggle="modal">Modal</a>
  <div id="deleteConf" class="modal fade">
    <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header">
          <div class="icon-box">
            <i class="fa fa-trash"></i>
          </div>        
          <h4 class="modal-title">Are you sure?</h4>  
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete these records? This process cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <a id="deleteButton" style="line-height: 30px;color:#fff;" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_script'); ?>
<script>
    var globvar = 0;
    var dis;
    $( ".denyForm" ).submit(function( event ) {
      dis = $(this);
      if(globvar == 0){
        $("#DeleteModalButton").click();
        event.preventDefault();
      }
    });
    
    $('#deleteButton').on('click',function() {
        globvar = 1;
        $(dis).submit();
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.brokeragehouse-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>