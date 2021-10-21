   
  <?php $__env->startSection('style'); ?>
  <style>
    table tr th,
    table tr td {
      text-align: center
    }

    .ibox-content {
      color: #0b2a4a !important
    }

    table thead tr th {
      font-family: unisansboldbold;
      font-weight: 100
    }

    table tbody tr td {
      font-family: unisansregularregular;
      font-weight: 100
    }

    .apply-button {
      background-color: #0b2a4a;
      color: white;
      font-family: unisansboldbold;
      border-radius: 6px;
      box-shadow: -3px 3px 3px 0px rgba(100, 100, 100, .24);
      border: none;
      width: 190px;
    }

    .apply-button:hover {
      color: white !important
    }

    .apply-button:focus {
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
            <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>
              Realtors</b></h2>
          </div>
          <div class="ibox-content ">
            <div class="row m-t-sm animated fadeInRight">
              <div class="col-md-12">
                <?php if(session('status')): ?>
                    <div class="alert">
                        <h3><?php echo e(session('status')); ?></h3>
                    </div>
                <?php endif; ?>
                <a href="<?php echo e(ENV('APP_URL')); ?>/brokeragehouse/add-realtor" class="btn btn-primary" ><i class="fa fa-plus"></i> Add</a>
              </div>
              <hr/>
              <div class="panel blank-panel">

                <div class="panel-body">

                  <div class="tab-content">

                    <div class="tab-pane active" id="tab-1">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Phone</th>
                            <th>Comapany</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $realtors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $realtor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($realtor->id); ?></td>
                            <td><?php echo e($realtor->first_name ." ".$realtor->last_name); ?></td>
                            <td><?php echo e($realtor->email); ?></td>
                            <td><?php echo e($realtor->location); ?></td>
                            <td><?php echo e($realtor->city); ?></td>
                            <td><?php echo e($realtor->state); ?></td>
                            <td><?php echo e($realtor->phone); ?></td>
                            <td><?php echo e($realtor->company); ?></td>
                            <td><a href="<?php echo e(ENV('APP_URL')); ?>/brokeragehouse/edit-realtor/<?php echo e($realtor->userid); ?>"><i class="fa fa-pencil-square-o" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                            <td><a href="<?php echo e(ENV('APP_URL')); ?>/brokeragehouse/delete-realtor/<?php echo e($realtor->userid); ?>"><i class="fa fa-trash" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>

                    </div>
                  </div>

                </div>

              </div>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLabel">Upload Gallery Image</h5>
                      </div>
                      <div class="modal-body">                        
                        <form class="form-inline" id="gallery-images-frm" action="<?php echo e(route('StoreProerptyImages')); ?>" enctype="multipart/form-data" method="post">
                        <?php echo e(csrf_field()); ?>

                              <div class="col-md-12">                                  
                              </div>
                              <div class="input-group control-group increment" >
                                <input type="file" required name="filename[]" class='form-control validate[required]' multiple>                                
                                <input type="hidden" name="pid" id="pid">
                              </div>

                              <button type="submit" id="upload-btn" class="btn btn-primary">Submit</button>
                        </form>   
                      </div>
                      <div class="modal-footer">
                        <div class="row" id="gallery-img">

                        </div>                        
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
  <button type="button" id="modalopenbutton" style="display:none;" class="btn btn-primary" data-toggle="modal" data-target="#reasonmodal">Open modal for @mdo</button>
  <div class="modal fade" id="reasonmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo e(route('brokeragehouse.property.RejectProperty')); ?>" id="modalform" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="dataid" name="id">
            <input type="hidden" id="realtor_id" name="realtor_id">
            <label for="message-text" class="col-form-label">Reason:</label>
            <textarea class="form-control" name="reason" id=""></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Reject Property</button>
        </div>
      </form>
    </div>
  </div>
</div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.brokeragehouse-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>