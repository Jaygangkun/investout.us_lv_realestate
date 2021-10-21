   
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
  </style>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <?php $__env->stopSection(); ?>
   
  <?php $__env->startSection('body'); ?>

  <div class="wrapper wrapper-content custom-container-a" style='width:100%;'>

    <div class="row animated fadeInRight allproperty_header">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          
          <?php if(session('success')): ?>
              <div class="alert alert-success">
                  <?php echo e(session('success')); ?>

              </div>
          <?php endif; ?>
          
          <div class="ibox-content ">
            <div class="row m-t-sm animated fadeInRight">
              <div class="panel blank-panel">

                <div class="panel-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab-1">
                      <form action="<?php echo e(route('admin.importData')); ?>" method="post" id="property-form">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="file_name" value="<?php echo e($file_name); ?>">
                        <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>">
                        <input type="hidden" name="bulk_import_id" value="<?php echo e($id); ?>">
                        <table class="table table-striped">
                          <thead>
                            <?php if(isset($csv_header_fields)): ?>
                            <tr>
                                <?php $__currentLoopData = $csv_header_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $csv_header_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if(strtolower($csv_header_field) === "investment price"): ?>
                                    <th style="min-width: 150px;">Ask Price</th>
                                  <?php else: ?>
                                    <th style="min-width: 150px;"><?php echo e($csv_header_field); ?></th>
                                  <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <?php endif; ?>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $csv_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td width="20%"><?php echo e($value); ?></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                              <?php $__currentLoopData = $csv_data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td style="min-width: 150px;">
                                  <select class="form-control" name="fields[<?php echo e($key); ?>]">
                                    <?php $__currentLoopData = $db_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $db_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php 
                                        $arr = explode('.', $db_field); 
                                        $val = $arr[0];
                                        $val = str_replace("_"," ",$val);

                                      if(strtolower($csv_header_fields[$key]) === "brv")
                                      {
                                      ?>
                                        <option value="<?php echo e($loop->index); ?>" <?php echo ($val === "brv price" ? "selected" :"");?>><?php echo $val; ?></option>
                                      <?php
                                      }
                                      else if(strtolower($csv_header_fields[$key]) === "arv")
                                      {
                                      ?>
                                        <option value="<?php echo e($loop->index); ?>" <?php echo ($val === "arv price" ? "selected" :"");?>><?php echo $val; ?></option>
                                      <?php
                                      }
                                      else if(strtolower($csv_header_fields[$key]) === "seller share")
                                      {
                                      ?>
                                        <option value="<?php echo e($loop->index); ?>" <?php echo ($val === "partnership seller" ? "selected" :"");?>><?php echo $val; ?></option>
                                      <?php
                                      }
                                      else if(strtolower($csv_header_fields[$key]) === "investor share")
                                      {
                                      ?>
                                        <option value="<?php echo e($loop->index); ?>" <?php echo ($val === "partnership investor" ? "selected" :"");?>><?php echo $val; ?></option>
                                      <?php
                                      }
                                      else
                                      {
                                      ?>
                                        <option value="<?php echo e($loop->index); ?>" <?php echo ($val === strtolower($csv_header_fields[$key]) ? "selected" :"");?>><?php echo $val; ?></option>
                                      <?php
                                      }
                                      ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </td>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                          </tbody>
                        </table>
                        <div class="col-md-12">
                          <div class="form-group" style="text-align: center;">
                              <?php echo Form::submit("Import", ['class' => 'btn btn-success','style'=>'color:white;width:120px;padding:.8em']); ?>

                          </div>
                        </div>
                      </form>
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
      })
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
<?php echo $__env->make('layouts.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>