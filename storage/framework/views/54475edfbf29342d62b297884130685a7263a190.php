   
  <?php $__env->startSection('style'); ?>
  <style>
    table tr th,
    table tr td {
      text-align: center;
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
  .modal-footer{
    text-align: left;
  }
  .deleteImage i{
    position: absolute;
    right: 25px;
    font-size: 22px;
    background: rgba(0,0,0,0.5);
    padding: 5px;
    color: rgba(255,0,0,0.8);
    cursor: pointer;
    border-radius: 5px;
  }
  .proposal-count-info .label{
    line-height: 12px;
    padding: 2px 5px;
    position: absolute;
    top: 2
  }

  .approved-property {
    background-color: #63ecd052 !important;
  }

  .approved-property i {
    color: #0b2a4a !important;
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
            <div class="row">
              <div class="col-md-10">
                <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>
                  <?php if($phase == 1): ?>
                  Seller Validation
                  <?php elseif($phase == 2): ?>
                  Evaluation
                  <?php elseif($phase == 3): ?>
                  Title & lines Search
                  <?php elseif($phase == 4): ?>
                  Property Market Evaluation
                  <?php else: ?>
                  All
                  <?php endif; ?>
                  Properties</b></h2>
              </div>
              <div class="col-md-2 <?php echo e($add_property_allowance); ?>">
                <?php if($add_property_allowance == true): ?>
                  <a href="<?php echo e(route('AddProperty',['id'=>$phasenum])); ?>" class="btn btn-primary dim">Add New Property</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php if(session('success')): ?>
              <div class="alert alert-success">
                  <?php echo e(session('success')); ?>

              </div>
          <?php endif; ?>
          <?php if(session('add_property_exception')): ?>
            <div class="alert alert-info">
              <?php echo e(session('add_property_exception')); ?>

            </div>
          <?php endif; ?>
          <?php if($add_property_allowance == false): ?>
            <div class="alert alert-danger">
                    You can not add property, your property quota is over.
            </div>
          <?php endif; ?>
          <div class="ibox-content ">
            <div class="row m-t-sm animated fadeInRight">
              <div class="col-md-12">
                
              </div>
              <div class="panel blank-panel">

                <div class="panel-body">

                  <div class="tab-content">

                    <div class="tab-pane active" id="tab-1">
                      <!-- <a href="<?php echo e(route('seller.property.phase-index',0)); ?>"><button type="button" class='btn apply-button' <?php if($phase == 0): ?> style='background: #1ab394;border: 1px solid #1ab394;' <?php endif; ?> name="button">New Properties</button></a>
                      <a href="<?php echo e(route('seller.property.phase-index',1)); ?>"><button type="button" class='btn apply-button' <?php if($phase == 1): ?> style='background: #1ab394;border: 1px solid #1ab394;' <?php endif; ?> name="button">Seller Validation</button></a>
                      <a href="<?php echo e(route('seller.property.phase-index',2)); ?>"><button type="button" class='btn apply-button' <?php if($phase == 2): ?> style='background: #1ab394;border: 1px solid #1ab394;' <?php endif; ?> name="button">Evaluation</button></a>
                      <a href="<?php echo e(route('seller.property.phase-index',3)); ?>"><button type="button" class='btn apply-button' <?php if($phase == 3): ?> style='background: #1ab394;border: 1px solid #1ab394;' <?php endif; ?> name="button">Title & lines Search</button></a>
                      <a href="<?php echo e(route('seller.property.phase-index',4)); ?>"><button type="button" class='btn apply-button' <?php if($phase == 4): ?> style='background: #1ab394;border: 1px solid #1ab394;' <?php endif; ?> name="button">Property Market Evaluation</button></a>
                      <a href="<?php echo e(route('seller.property.phase-index',5)); ?>"><button type="button" class='btn apply-button' <?php if($phase == 5): ?> style='background: #1ab394;border: 1px solid #1ab394;' <?php endif; ?> name="button">Approved</button></a> -->
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Share</th>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Property ID</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Zip Code</th>
                            <th>Budget</th>
                            <th>Date Listed</th>
                            <th>Listing Duration</th>
                            <th>Building Type</th>
                            <th>Acceptance</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr class="allproperty_row <?php echo e($property->acceptance_level == 5 ? 'approved-property' : ''); ?>">
                            <?php
                              $url = ENV('APP_URL')."property-lists/".$property->id."/property-details"; 
                            ?>
                            <td><a  class='btn btn-primary' href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($url); ?>" target="_blank">Share on Facebook</a></td>
                            <td class="text_center"><?php echo e($key+1); ?></td>
                            <td class="client-avatar">
                              <a href="<?php echo e(route('seller.property.show',$property->propertiesID)); ?>">
                                <?php
                                $images = $property->images()->get();

                                $cover = 0;
                                ?>
                                  <?php if(!empty($images)): ?>
                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($img['is_cover_image'] == 1): ?> 
                                        <?php $cover = 1;  ?>
                                        <img alt="image" src="<?php echo e(asset('properties/'.$property->propertiesID.'/images/'.$img['image'])); ?>"> 
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cover == 0): ?>
                                      <?php if(isset($property->images()->first()['image']) && $property->images()->first()['image'] != ''): ?>
                                        <img alt="image" src="<?php echo e(asset('properties/'.$property->propertiesID.'/images/'.$property->images()->first()['image'])); ?>">
                                      <?php else: ?>
                                        <img alt="image" src="<?php echo e(asset('dashboard/seller/default-property.jpg')); ?>"/>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                  <?php else: ?>
                                    <img alt="image" src="<?php echo e(asset('dashboard/seller/default-property.jpg')); ?>"/>
                                  <?php endif; ?>
                              </a>
                            </td>
                            <td><?php echo e($property->propertiesID); ?></td>
                            <td><?php echo e($property->address); ?></td>
                            <td><?php echo e($property->city); ?></td>
                            <td><?php echo e($property->zip); ?></td>
                            <td><?php echo e(isset($property->details->brv_price) ? $property->details->brv_price : 'Not Entered'); ?></td>
                            <td><?php echo e(date('d-M-Y', strtotime($property->created_at))); ?></td>
                            <td><?php echo e(isset($property->details->during_date) ? $property->details->during_date : 'Not Entered'); ?></td>
                            <td><?php echo e($property->building_type); ?></td>
                              <?php if($property->approved == 0): ?>
                                <td>Pending</td>
                              <?php elseif($property->approved == 1): ?>
                                  <td>Approved</td>
                              <?php endif; ?>
                            <!--<td><button type="button" class='btn btn-primary form-submit' name="button" ref='<?php echo e($key); ?>'><i class='fa fa-save'></i> Save</button></td>-->
                            <td><a target="_blank" href="<?php echo e(route('property_single_page',['pid'=>$property->propertiesID])); ?>"><i class="fa fa-eye" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                            
                            <td><a href="javascript:void(0);" tooltip="Upload gallery image" id='upload-gallery-images' data-id="<?php echo e($property->propertiesID); ?>"><i class="fa fa-upload"  data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>

                            <td><a href="<?php echo e(route('EditProperty',['id'=>$phasenum, 'pid'=>$property->propertiesID])); ?>"><i class="fa fa-pencil-square-o" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
                            <td><a href="<?php echo e(route('seller.proposal.list',['property_id'=>$property->propertiesID])); ?>" class="proposal-count-info"><i class="fa fa-list-alt" style="font-size:21px;color: #36b394;" aria-hidden="true"></i><span class="label lab1 label-warning"><?php echo e($property->unread_proposals); ?></span></a></td>
                            <td><a  onclick="DeleteModal('<?php echo e(route('DeleteProperty',['id'=>$phasenum, 'pid'=>$property->propertiesID])); ?>');return false;" href="#" id="delProperty"><i class="fa fa-trash" style="font-size:21px;color: #36b394;" aria-hidden="true"></i></a></td>
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
                        <div id="makecoverstatus"></div>
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

  <a href="#deleteImageConf" id="DeleteImageButton" class="trigger-btn" style="display:none;" data-toggle="modal">Modal</a>
  <div id="deleteImageConf" class="modal fade">
    <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header">
          <div class="icon-box">
            <i class="fa fa-trash"></i>
          </div>        
          <h4 class="modal-title">Are you sure?</h4>  
          <button type="button" class="close closeDeleteModal" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete these image? This process cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <a id="delImageButton" style="line-height: 30px;color:#fff;" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>


  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('script'); ?>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script type="text/javascript">
    function DeleteModal(url){
      $("#deleteButton").attr('href',url);
      $("#DeleteModalButton").click();
    }
    $('body').on('click','.form-submit',function() {
          let ref = $(this).attr('ref');
          $(`#form${ref}`).submit();
      })
    $(document).ready(function() {
      var pro_id = '';
      $(document).on("click", "#upload-gallery-images", function(){
          $('#gallery-img').empty();
          var propertyId = $(this).attr('data-id');
          $("#pid").val(propertyId);
          if ($('.alert-danger')) {
            $(".alert-danger").remove();
          }
          $("#makecoverstatus").html('');
          // get all property images
          $.ajax({
            type    : 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url     : '<?php echo e(route("getProerptyImages")); ?>',
            data    : {pid: parseInt(propertyId)},
            success : function(response) {
              if (response.status == true) {
                $('#gallery-img').append(response.data);
              }
              else{
                console.log(response.data);  
              }
            }    
        });
      });

      $(document).on("change", "#is-active", function(){
        var pid  = parseInt($(this).attr('data-style'));
        var is_active_val = '';
        if ($(this).prop('checked') == true) {
          is_active_val = 0;
        }
        else{
          is_active_val = 1;
        }
        $.ajax({
            type    : 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url     : '<?php echo e(route("IsActiveProerpty")); ?>',
            data    : {pid:JSON.stringify(pid), is_active_val:JSON.stringify(is_active_val)},
            success : function(response) {
              if (response == true) {
                console.log("upated");
              }
              else{
                console.log("error");
              }
            }    
        });
      });
      
      $(document).on("click", ".cover-img", function(){
        $("#makecoverstatus").html('Updating...').delay(3000);
        $.ajax({
            type    : 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url     : '<?php echo e(route("makeCoverImg")); ?>',
            data    : {id: parseInt($(this).val()), pid: parseInt($(this).attr('data-id'))},
            success : function(response) {
              if (response.status == true) {
                $("#makecoverstatus").html('<div class="alert alert-success">'+response.data+'</div>');
              }
              else{
                console.log("error");  
              }
            }    
        });
      });

      $(document).on("click", ".deleteImage", function(){
        $("#DeleteImageButton").click();
        var id = $(this).data('id');
        var dis = $(this);
        $('#delImageButton').attr('data-id',id);
      });


      $(document).on("click", "#delImageButton", function(){
        var id = $(this).data('id');
        var dis = $(this);
        $.ajax({
          type    : 'POST',
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url     : '<?php echo e(route("deletePropertyImg")); ?>',
          data    : {id: id},
          success : function(response) {
            $(".close").click();
            $("#makecoverstatus").html('<div class="alert alert-success">Image removed successfully</div>');
          }
        });
        
      });

      


    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.seller-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>