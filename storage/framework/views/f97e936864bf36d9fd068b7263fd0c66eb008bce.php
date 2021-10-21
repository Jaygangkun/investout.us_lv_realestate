   
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
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <?php $__env->stopSection(); ?>
   
  <?php $__env->startSection('body'); ?>

  <div class="wrapper wrapper-content custom-container-a" style='width:100%;'>

    <div class="row animated fadeInRight allproperty_header">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>
              Contracted Prpoerties
            </h2>
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
                            <th>#</th>
                            <th>Owner Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Property Address</th>
                            <th>Property City</th>
                            <th>Property State</th>
                            <th>Property Zip</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $ContractedProperties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$contracted): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr class="allproperty_row">
                            <td style="font-size: 24px;font-weight: bold;" class="text_center"><a href="<?php echo e(route('investors.property.show',$contracted->property_id)); ?>"><?php echo e($contracted->property_id); ?></a></td>
                            <td><?php echo e($contracted->first_name." ".$contracted->last_name); ?></td>
                            <td><?php echo e($contracted->email); ?></td>
                            <td><?php echo e($contracted->phone); ?></td>
                            <td><?php echo e($contracted->address); ?></td>
                            <td><?php echo e($contracted->city); ?></td>
                            <td><?php echo e($contracted->state); ?></td>
                            <td><?php echo e($contracted->zip); ?></td>
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
  
<?php echo $__env->make(session('layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>