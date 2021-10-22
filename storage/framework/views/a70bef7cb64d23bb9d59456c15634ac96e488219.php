

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
  <style>
    
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

    .pagination>li{
        background: #fff !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
      <div class="wrapper wrapper-content custom-container-a">

              <div class="row animated fadeInRight allproperty_header">
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>Envoys</b></h2>
                          </div>
                          <div class="col-lg-12">
                              <?php if(session('success')): ?>
                                  <div class="alert alert-success alert-dismissible">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <?php echo e(session('success')); ?>

                                  </div>
                              <?php endif; ?>
                          </div>
                          <div class="ibox-content ">
                              <div class="row m-t-sm animated fadeInRight">
                                  <div class="panel blank-panel">
                                    <button type="button" class="btn btn-primary dim" data-toggle="modal" data-target="#newAdmin" style='float:right' >
                                            Add New Envoy
                                    </button>
                                      <div class="panel-body">

                                          <div class="tab-content">

                                              <div class="tab-pane active" id="tab-1">

                                                  <table class="table table-striped">
                                                      <thead>
                                                          <tr>
                                                              <th>No</th>
                                                              <th>First Name</th>
                                                              <th>Last Name</th>
                                                              <th>Email</th>
                                                              <th>Zipcode</th>
                                                              <th>Created At</th>
                                                              <th>Updated At</th>
                                                              <th>Action</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <tr class="allproperty_row">
                                                                      <td class="text_center"><?php echo e($key+1); ?></td>
                                                                      <td><?php echo e($user->first_name); ?></td>
                                                                      <td><?php echo e($user->last_name); ?></td>
                                                                      <td><?php echo e($user->email); ?></td>
                                                                      <td><?php echo e($user->assign_zip_code); ?></td>
                                                                      <td><?php echo e(date('d-M-Y', strtotime($user->created_at))); ?></td>
                                                                      <td><?php echo e($user->updated_at->diffForHumans()); ?></td>
                                                                      <td>
                                                                        <a href="<?php echo e(route('admin.users.edit_envoy', [$user->id])); ?>" class="btn btn-success" data-user_id="<?php echo e($user->id); ?>"><i class="fa fa-pencil"></i></a>&nbsp;
                                                                        <button type="submit" onclick="DeleteModal('<?php echo e(route("profile.delete", [$user->id])); ?>')" class="btn btn-danger btn-sm" name="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
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

          <div class="modal inmodal" id="newAdmin" tabindex="-1" role="dialog"  aria-hidden="true">
              <div class="modal-dialog adminRegistration">
                  <div class="modal-content animated fadeIn">
                      <div class="modal-header">
                          <h4 class="modal-title text_center">Envoy Registration</h4>
                      </div>
                      <div class="modal-body">
                          <form class="m-t" role="form" action="<?php echo e(route('admin.users.envoy-create')); ?>" id="adminRegistration" method="POST">
                              <?php echo e(csrf_field()); ?>

                              <div class="form-group">
                                  <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required="">
                              </div>
                              <div class="form-group">
                                  <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required="">
                              </div>
                              <div class="form-group">
                                  <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="">
                              </div>
                              <div class="form-group">
                                  <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                              </div>
                              <div class="form-group">
                                  <input type="password" name="confirm_password" id="password_confirmation" class="form-control" placeholder="Confirm Password" required="">
                              </div>
                              <div class="form-group">
                                  <input type="text" name="assign_zip_code" id="assign_zip_code" class="form-control" placeholder="Assign Zipcode" required="">
                              </div>
                              <div><h3>&nbsp;</h3></div>
                              <button type="submit" class="btn btn-primary block full-width m-b validateData">Register</button>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>

  <div id="deleteConf" class="modal fade" style="display: none;">
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

<?php $__env->startSection('script'); ?>
<script>
function DeleteModal(url){
    $("#deleteButton").attr('href',url);
    $("#deleteConf").modal('show');
  }

  $(document).ready(function() {

    $('#newAdmin').on('hidden.bs.modal', function () {
        // do something…
        $('.validationErrors').remove();
        $('form#adminRegistration')[0].reset();
    });

    $(document).on('click', '.validateData', function(e) {
      e.preventDefault();

      var $this = $(this);

      $('.validationErrors').remove();
      $this.val('Processing...').prop('disabled', true);

      $.ajax({
            type    : 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url     : '<?php echo e(route("admin.validateEmail")); ?>',
            data    : { 
              first_name: $('#first_name').val(),
              last_name: $('#last_name').val(),
              email: $('#email').val(),
              password: $('#password').val(),
              password_confirmation: $('#password_confirmation').val(),
            },
            success : function(response) {
              
              $('form#adminRegistration').submit();
            },
            error: function(response) {
              if( response.status === 422 ) {
                  response= response.responseJSON;
                  response.forEach(function(objErrors, key) {
                    for (var key in objErrors) {
                      $('<span>').addClass('text-danger validationErrors').text(objErrors[key]).insertAfter($('#' + key));
                    }
                  });

                  $this.val('Register').prop('disabled', false);
                  
                }
            }
        });

      return false;
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>