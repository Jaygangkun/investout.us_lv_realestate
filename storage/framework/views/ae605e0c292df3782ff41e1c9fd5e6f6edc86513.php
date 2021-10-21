 
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
    .paginate_button{
        background-color:transparent;
    }
</style>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('body'); ?>

<div class="wrapper wrapper-content custom-container-a">

    <div class="row animated fadeInRight allproperty_header">
        <div class="col-lg-12">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>Plans</b></h2>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="javascrit:void(0)" onclick="clearOldData()" class="btn btn-primary" data-toggle="modal" data-target="#addUserPlan"><i class="fa fa-plus"></i> Add</a>
                            <a href="<?php echo e(ENV('APP_URL')); ?>/admin/stripe/sync-stripe-plans" class="btn btn-primary"><i class="fa fa-retweet"></i> Sync with stripe</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-content ">
                    <div class="row m-t-sm animated fadeInRight">
                        <div class="panel blank-panel">


                            <div class="panel-body">

                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab-1">

                                        <table class="table" id="plans">
                                            <thead>
                                                <tr>
                                                    <th>Plan ID</th>
                                                    <th>Name</th>
                                                    <th>Role Assigned</th>
                                                    <th>Interval</th>
                                                    <th>Price</th>
                                                    <th>Date Created</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $user_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="allproperty_row">
                                                    <td><?php echo e($plan->stripe_plan_id); ?></td>
                                                    <td><?php echo e($plan->plan_name); ?></td>
                                                    <td><?php echo e($plan->name); ?></td>
                                                    <td><?php echo ucfirst($plan->interval); ?></td>
                                                    <td><?php echo env('APP_CURRRENCY').' ';?> <?php echo e($plan->amount); ?></td>
                                                    <td><?php echo e(date('d-M-Y',strtotime($plan->created_at))); ?></td>
                                                    <td>
                                                        <?php if($plan->limitations == 0){
                                                            $limitation = "Unlimited";
                                                        }else{
                                                            $limitation = "Limited";
                                                        }?>
                                                        <a href="javascript:void(0)" class="btn btn-info viewplan" data-stripeplan="<?php echo e($plan->plan_name); ?>" data-planid="<?php echo e($plan->plan_id); ?>" data-role="<?php echo e($plan->name); ?>" data-roleid="<?php echo e($plan->role_id); ?>" data-limitation="<?php echo e($limitation); ?>" data-createproperty="<?php echo e($plan->create_property); ?>" data-viewproperty="<?php echo e($plan->view_property); ?>" data-createrealtors="<?php echo e($plan->create_realtors); ?>"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-success editplan" data-id="<?php echo e($plan->id); ?>" data-planid="<?php echo e($plan->plan_id); ?>" data-planName="<?php echo e($plan->plan_name); ?>" data-roleid="<?php echo e($plan->role_id); ?>" data-limitation="<?php echo e($plan->limitations); ?>" data-createproperty="<?php echo e($plan->create_property); ?>" data-viewproperty="<?php echo e($plan->view_property); ?>" data-createrealtors="<?php echo e($plan->create_realtors); ?>"><i class="fa fa-pencil"></i></a>
                                                        <label class="toggle-switch">
                                                            <input type="checkbox" <?php if($plan->status == 1){echo "checked";}?> data-id="<?php echo e($plan->id); ?>" class="plan_status">
                                                            <span class="toggle-slider toggle-round"></span>
                                                        </label>
                                                        <div class="processicons">
                                                            <i class="fa fa-spinner fa-spin fa-2x hidden"></i>
                                                            <i class="fa fa-check fa-2x hidden"></i>
                                                        </div>
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


<div id="syncedWithStripe" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Stripe sync status</h4>
      </div>
        
        <div class="modal-body">
            <div class="row">
                <h3><?php echo e(session('syncSuccess')); ?></h3>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
    </div>
  </div>
</div>

<div id="addUserPlan" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Plan</h4>
      </div>
        <form action="<?php echo e(route('admin.stripe.addUserPlans')); ?>" method="post" id="addUserPlanForm">
        <?php echo e(csrf_field()); ?>

        <div class="modal-body">
            <div class="row">
                <div class="form-group clearfix">
                    <label class="control-label col-sm-4">Stripe Plan:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="stripe_plan" id="select_stripe_plan" data-validation-engine="validate[required]">
                            <option disabled value="" selected hidden>Select Plan</option>
                            <?php $__currentLoopData = $stripe_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($plan->id); ?>"><?php echo e($plan->plan_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group clearfix" id="customPlanName" style="display: none;">
                    <label class="control-label col-sm-4">Plan name:</label>
                    <div class="col-sm-8">
                        <input type="text" name="stripe_plan_name" id="stripe_plan_name" class="form-control" data-validation-engine="validate[required]" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group clearfix">
                    <label class="control-label col-sm-4">Role:</label>
                    <div class="col-sm-8">
                        <select class="form-control plan_role" name="plan_role" data-validation-engine="validate[required]">
                            <option value="">Select role</option>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="limitation" value="1">
            <!--<div class="row">
                <div class="form-group clearfix">
                    <label class="control-label col-sm-4">Limitation:</label>
                    <div class="col-sm-8">
                        <select class="form-control limitations" name="limitation" data-validation-engine="validate[required]">
                            <option value="1">Limited</option>
                            <option value="0">Unlimited</option>
                        </select>
                    </div>
                </div>
            </div>-->

            <div class="RoleFeatures">
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class='btn btn-primary'><i class='fa fa-save'></i> Create Plan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
  </div>
</div>

<div id="viewUserPlan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Plan</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group clearfix">
                    <label class="control-label col-sm-4">Stripe Plan:</label>
                    <div class="col-sm-8">
                        <span class="view-stripe-plan"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group clearfix">
                    <label class="control-label col-sm-4">Role:</label>
                    <div class="col-sm-8">
                        <span class="view-role"></span>
                    </div>
                </div>
            </div>
            <!--<div class="row">
                <div class="form-group clearfix">
                    <label class="control-label col-sm-4">Limitation:</label>
                    <div class="col-sm-8">
                        <span class="view-limitations"></span>
                    </div>
                </div>
            </div>-->
            <div class="ViewFeatures"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<div id="editUserPlan" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Plan</h4>
      </div>
        <form action="<?php echo e(route('admin.stripe.updateUserPlan')); ?>" method="post" id="editUserPlanForm">
        <?php echo e(csrf_field()); ?>

        <div class="modal-body">
            <div class="row loadingmodal">
                <div class="col-sm-12 text-center">
                    <i class="fa fa-spinner fa-spin fa-4x"></i>
                </div>                                        
            </div>                                        
            <div class="loadedmodal hidden">
                <div class="row">
                    <div class="form-group clearfix">
                        <label class="control-label col-sm-4">Stripe Plan:</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="id" id="id" required value="0">
                            <select class="form-control stripe_plans_options" disabled data-validation-engine="validate[required]">
                            </select>
                            <input type="hidden" id="stripe_plan" name="stripe_plan" value="">
                        </div>
                    </div>

                    <div class="form-group clearfix" id="customPlanNameEdit" style="display: none;">
                        <label class="control-label col-sm-4">Plan name:</label>
                        <div class="col-sm-8">
                            <input type="text" name="stripe_plan_name" id="stripe_plan_name_edit" class="form-control" data-validation-engine="validate[required]" />
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group clearfix">
                        <label class="control-label col-sm-4">Role:</label>
                        <div class="col-sm-8">
                            <select class="form-control plan_role" disabled data-validation-engine="validate[required]">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <input type="hidden" id="plan_role" name="plan_role" value="">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="limitation" value="1">
                <!--<div class="row">
                    <div class="form-group clearfix">
                        <label class="control-label col-sm-4">Limitation:</label>
                        <div class="col-sm-8">
                            <select class="form-control limitations" name="limitation" data-validation-engine="validate[required]">
                                <option value="1">Limited</option>
                                <option value="0">Unlimited</option>
                            </select>
                        </div>
                    </div>
                </div>-->
                <div class="RoleFeatures">
                    
                </div>
            </div>
        </div>
        <div class="modal-footer hidden">
            <button type="submit" class='btn btn-primary'><i class='fa fa-save'></i> Update Plan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php if(session('syncSuccess')): ?>
<script>
$(document).ready(function() {
    $('#syncedWithStripe').modal('show');
});
</script>
<?php endif; ?>

  <script type="text/javascript">
    $('#plans').DataTable();
    $("#addUserPlanForm").validationEngine();
    $("#editUserPlanForm").validationEngine();
    $(document).ready(function(){
        $('.plan_role').change(function(){
            var plan_id = $(this).closest('.loadedmodal').find('.stripe_plans_options').val();
            updateview($(this).val(),plan_id);
        })

        $('.viewplan').click(function(){
            var planid = $(this).data('planid');
            var stripeplan = $(this).data('stripeplan');
            var role = $(this).data('role');
            var limitation = $(this).data('limitation');
            var createproperty = $(this).data('createproperty');
            var viewproperty = $(this).data('viewproperty');
            var createrealtors = $(this).data('createrealtors');
            var roleid =  $(this).data('roleid');
            $('.view-stripe-plan').html(stripeplan);
            $('.view-role').html(role);
            $('.view-limitations').html(limitation);

            displayview(roleid,planid);
            
            $('#viewUserPlan').modal('show');
        });

        $('.plan_status').change(function(){
            var currentPlan = $(this);
            currentPlan.parent().parent().find('.fa-spinner').removeClass('hidden');
            var id = $(this).data('id');
            var conf = 1;
            var status = '0';
            if($(this).prop('checked') == true){
                var status = "1";
            }
            if(status == 0){
                var a = confirm("Are you sure you want to Inactive this plan?");
                if(a){
                    conf = 1;
                }
            }
            if(conf == 1){
                $.ajax({
                    url: "<?php echo e(ENV('APP_URL')); ?>/admin/stripe/update-user-plan-status?id="+id+"&status="+status,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        currentPlan.parent().parent().find('.fa-spinner').addClass('hidden');
                        currentPlan.parent().parent().find('.fa-check').removeClass('hidden');
                        setTimeout(function() {
                            currentPlan.parent().parent().find('.fa-check').addClass('hidden');
                        }, 1000);
                    }
                });
            }
            else{
                currentPlan.parent().parent().find('.fa-spinner').addClass('hidden');
                currentPlan.parent().parent().find('.fa-check').removeClass('hidden');
                setTimeout(function() {
                    currentPlan.parent().parent().find('.fa-check').addClass('hidden');
                }, 1000);
            }
        });

        $(document).on('change', '#select_stripe_plan', function() {
            $('#customPlanName').show();
        });
    
        $('.editplan').click(function(){
            $('.loadingmodal').removeClass('hidden');
            $('.loadedmodal,#editUserPlan .modal-footer').addClass('hidden');
            $('#editUserPlan').modal('show');
            var role = $(this).data('role');
            var id = $(this).data('id');
            var planid = $(this).data('planid');
            var viewproperty = $(this).data('viewproperty');
            var current_plan = $(this);

            $.ajax({
                url: "<?php echo e(ENV('APP_URL')); ?>/admin/stripe/get-user-plan?id="+planid,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    stripeOptions = "";
                    for(var i = 0; i < res.length; i++){
                        if(res[i].id == planid){
                            stripeOptions += "<option selected value="+res[i].id+">"+res[i].plan_name+"</option>";
                        }else{
                            stripeOptions += "<option value="+res[i].id+">"+res[i].plan_name+"</option>";
                        }
                    }
                    $('.stripe_plans_options').html(stripeOptions);
                    $('#id').val(id);
                    $("#stripe_plan").val(planid);

                    // show custom plan input
                    $('#customPlanNameEdit').show();
                    $('#customPlanNameEdit input#stripe_plan_name_edit').val(current_plan.data('planname'));
                    
                    var roleid = current_plan.data('roleid');

                    //var createproperty=' data-viewproperty="" data-createrealtors'
                    $('#editUserPlan .plan_role').val(roleid);
                    $('#editUserPlan #plan_role').val(roleid);
                    
                    $('.RoleFeatures').html("");
                    updateview(roleid,planid);
                    $('.loadingmodal').addClass('hidden');
                    $('.loadedmodal,#editUserPlan .modal-footer').removeClass('hidden');
                }
            });
        })
    });

    function updateview(roleid,planid){
        var role = roleid;
        var limitations = $('.limitations').val();
        $.ajax({
            url: "<?php echo e(ENV('APP_URL')); ?>/admin/stripe/get-role-features?id="+role+"&planid="+planid,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                var rolefeatures = "";
                for(var i = 0; i < res.length; i++){
                    if(res[i].feature_id == 1){
                        valueinput = '<input type="number" class="form-control" name="value['+res[i].feature_id+'][]" placeholder="Number of properties upload?" min="0" value="'+res[i].value+'"><small>0 defines unlimited uploads.</small>';
                    }
                    else if(res[i].feature_id == 2){
                        if(res[i].value == 1){
                            valueinput = '<select class="form-control" name="value['+res[i].feature_id+'][]"><option value="1" selected>Yes</option><option value="0">No</option></select>';
                        }
                        else{
                            valueinput = '<select class="form-control" name="value['+res[i].feature_id+'][]"><option value="1">Yes</option><option value="0" selected>No</option></select>';
                        }
                    }
                    else if(res[i].feature_id == 3){
                        valueinput = '<input type="number" class="form-control" name="value['+res[i].feature_id+'][]" placeholder="Number of properties contact info?" min="0" value="'+res[i].value+'"><small>0 defines unlimited property views.</small>';
                    }
                    else if(res[i].feature_id == 4){
                        valueinput = '<input type="number" class="form-control" name="value['+res[i].feature_id+'][]" placeholder="Number of properties contact info?" min="0" value="'+res[i].value+'"><small>0 defines unlimited realtors creation.</small>';
                    }
                    rolefeatures += '<div class="row"><div class="form-group required clearfix"><label class="control-label col-sm-4">'+res[i].name+':</label><div class="col-sm-8">'+valueinput+'</div></div></div>';

                }
                $('.RoleFeatures').html(rolefeatures);
            }
        });
    }

    function displayview(roleid,planid){
        var role = roleid;
        $('.ViewFeatures').html("");
        $.ajax({
            url: "<?php echo e(ENV('APP_URL')); ?>/admin/stripe/get-role-features?id="+role+"&planid="+planid,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                var rolefeatures = "";
                for(var i = 0; i < res.length; i++){
                    if(res[i].feature_id == 1 || res[i].feature_id == 3 || res[i].feature_id == 4){
                        if(res[i].value == 0){
                            valueinput = 'Unlimited';
                        }
                        else{
                            valueinput = res[i].value;
                        }

                    }
                    else if(res[i].feature_id == 2){
                        valueinput = "No";
                        if(res[i].value == '1'){
                            valueinput = "Yes";   
                        }   
                    }
                    rolefeatures += '<div class="row modal-create-realtors"><div class="form-group clearfix"><label class="control-label col-sm-4">'+res[i].name+':</label><div class="col-sm-8">'+valueinput+'</div></div></div>';
                }
                $('.ViewFeatures').html(rolefeatures);
            }
        });
    }

    $("input").on('change',function (){
        var val = $(this).val();
        if(val < 0){
            $(this).val('0');
        }
    });

    function clearOldData(){
        $(".RoleFeatures").html("");
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>