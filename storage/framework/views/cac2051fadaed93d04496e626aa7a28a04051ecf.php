

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
   .proposal-count-info .label{
    line-height: 12px;
    padding: 2px 5px;
    position: absolute;
    top: 2
  } 


  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

      <div class="wrapper wrapper-content custom-container-a">

              <div class="row animated fadeInRight allproperty_header">
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100'>Sent Proposals</b></h2>
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
                                                              <th>Propert ID</th>
                                                              <th>Proposal Send To</th>
                                                              <!-- <th>Project Total Profit($)</th>
                                                              <th>BRV($)</th>
                                                              <th>Increased Profit($)</th> -->
                                                              <th>Investor Profit($)</th>
                                                              <th>Investor ROI(%)</th>
                                                              <th>Seller Profit Share(%)</th>
                                                              <th>Investor Profit Share(%)</th>
                                                              <!-- <th>Last Proposal At</th> -->
                                                              <!-- <th style='width:100px'>Accepted</th> -->
                                                              <!-- <th style='width:100px'>Deny</th> -->
                                                              <th>Action</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                              <?php $__currentLoopData = $proposalsLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <tr class="allproperty_row">
                                                                      <td class="text_center"><?php echo e($key+1); ?></td>
                                                                      <td>
                                                                        <a href="<?php echo e(route('investors.property.show',$proposal->property_id)); ?>">
                                                                          <?php echo e($proposal->property_id); ?>

                                                                        </a>
                                                                      </td>
                                                                      <td>
                                                                        <?php echo e($proposal->fromUser->first_name); ?> <?php echo e($proposal->fromUser->last_name); ?>

                                                                      </td>
                                                                      <!-- <td>$ <?php echo e(number_format(round($proposal->total_projected_profit))); ?></td>
                                                                      <td>$ <?php echo e(number_format(round($proposal->brv))); ?></td>
                                                                      <td>$ <?php echo e(number_format(round($proposal->increased_profit))); ?></td> -->
                                                                      <td>$ <?php echo e(number_format(round($proposal->investor_share_profit))); ?></td>
                                                                      <td><?php echo e(round($proposal->investor_roi, 2)); ?> %</td>
                                                                      <td><?php echo e(100 - $proposal->investor_share); ?> %</td>
                                                                      <td><?php echo e($proposal->investor_share); ?> %</td>
                                                                      <!-- <td>
                                                                        <?php echo e($proposal->created_at); ?>

                                                                      </td> -->
                                                                      <!-- <?php if(isset($acceptedProposal) && ($acceptedProposal->from_user == $proposal->from_user || $acceptedProposal->to_user == $proposal->from_user)): ?>
                                                                      <td>Accepted</td>
                                                                      <?php else: ?>
                                                                      <td></td>
                                                                      <?php endif; ?> -->
                                                                      <!-- <td></td> -->
                                                                      <td>
                                                                      <a href="<?php echo e(route('investors.property.propertyProposals',$proposal->property_id)); ?>" class="proposal-count-info"><i class="fa fa-list-alt" style="font-size:21px;color: #36b394;" aria-hidden="true"></i><span class="label lab1 label-warning"><?php echo e($proposal->unread_proposals); ?></span></a>
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

<?php $__env->startSection('template_script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.investor-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>