   
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
  .fa-download, .fa-upload{
    font-size: 18px;
  }
  .csv_file_error{
    color: red;
  }
  .d-none{
    display: none;
  }
  .align-left{
    text-align: left;
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
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Uploaded Date</th>
                            <th class="align-left">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $importRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $importRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr class="allproperty_row">
                            <td class="text_center"><?php echo e($importRequest->bulk_import_id); ?></td>
                            <td><?php echo e($importRequest->first_name." ".$importRequest->last_name); ?></td>
                            <td><?php echo e($importRequest->created_at); ?></td>
                            <td class="align-left">
                              <a href="<?php echo e(route('admin.downloadCSV',['filename'=> $importRequest->file_name])); ?>" target="_blank"><i class="fa fa-download"></i></a> 
                              &nbsp&nbsp&nbsp<a id="uploadCSVButton_<?php echo e($importRequest->bulk_import_id); ?>" data-id="<?php echo e($importRequest->bulk_import_id); ?>" data-old-file="<?php echo e($importRequest->admin_csv); ?>" data-toggle="modal" href=""><i class="fa fa-upload"> </i></a>
                              <?php if($importRequest->is_uploaded == 0 && $importRequest->admin_csv != null): ?>
                                &nbsp&nbsp&nbsp<a href="import/<?php echo $importRequest->bulk_import_id; ?>">Import</a>
                              <?php elseif($importRequest->is_uploaded != 0): ?>
                                <a onclick="deleteConf('import/revert/<?php echo $importRequest->bulk_import_id; ?>')">Revert</a>
                              <?php endif; ?>
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
            <div class="modal fade" id="uploadCSV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <div class="row">
                            <div class="col-md-10">
                              <h3 class="modal-title">Uplaod CSV</h3>
                            </div>
                            <div class="col-md-2">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="modal-body">
                            <div id="Details">
                              <form method="POST" id="uploadCSVForm" action="<?php echo e(route('admin.adminUploadCSV')); ?>" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                  <label for="exampleFormControlFile1">Upload CSV:</label>
                                  <input type="file" class="form-control-file" id="csv_file" name="csv_file">
                                  <div class="invalid-feedback csv_file_error d-none">
                                    You have uploaded an invalid file type. Upload only .csv files.
                                  </div>
                                  <input type="hidden" class="form-control" id="bulk_import_id" name="bulk_import_id">
                                  <input type="hidden" class="form-control" id="old_admin_csv" name="old_admin_csv">
                                </div>
                              </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" id="uplaod_csv">Upload CSV</button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center" style="display: none;">
  <!-- Button HTML (to Trigger Modal) -->
  <a href="#myModal" id="modalShow" class="trigger-btn" data-toggle="modal">Click to Open Confirm Modal</a>
</div>
  <div id="myModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header flex-column">
        <div class="icon-box">
          <i class="fa fa-trash"></i>
        </div>            
        <h4 class="modal-title w-100">Are you sure?</h4>  
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete all records? This process cannot be undone.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger" id="deleteButton" style="color: white;line-height: 26px;">Delete</a>
      </div>
    </div>
  </div>
</div> 
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('script'); ?>
  <script>
    $(document).on("click", "[id^='uploadCSVButton']", function(){
      console.log("yesyes", $(this).attr("data-id"));
      $("#bulk_import_id").val($(this).attr("data-id"));
      $("#old_admin_csv").val($(this).attr("data-old-file"));
      $('#uploadCSV').modal('show');
    });

    $(document).on("click", "#uplaod_csv", function(){
      console.log("bulk_import_id=", $("#bulk_import_id").val());
      var ext = $('#csv_file').val().split('.').pop().toLowerCase();
      if($.inArray(ext, ['csv']) == -1) {
          $(".csv_file_error").removeClass("d-none");
      }
      else
      {
        $(".csv_file_error").addClass("d-none");
        $("#uploadCSVForm").submit();
      }
    });

    $(document).on("hidden.bs.modal", "#uploadCSV", function () {
      $("#uploadCSVForm")[0].reset();
      $("#bulk_import_id").val("");
      $("#old_admin_csv").val("");
      $(".csv_file_error").addClass("d-none");
    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>