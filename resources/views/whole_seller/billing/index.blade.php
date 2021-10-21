@extends('layouts.whole-seller-layout')

@section('style')
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
@endsection

@section('body')

      <div class="wrapper wrapper-content custom-container-a">

              <div class="row animated fadeInRight allproperty_header">
                  <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100'>Subscription</b></h2>
                          </div>
                          <div class="ibox-content ">
                              <div class="row m-t-sm animated fadeInRight">
                                  <div class="panel blank-panel">


                                      <div class="panel-body">

                                          <div class="tab-content">

                                              <div class="tab-pane active" id="tab-1">
                                                <?php if($active_subscription){
                                                    $plan_name = $active_subscription->plan_name;
                                                    $renewal_date = date('d M Y',$active_subscription->renewal_date);
                                                    $plan_amt = env('APP_CURRRENCY').' '.number_format($active_subscription->plan_amt,2);
                                                    $expiry_date = date('d M Y',$active_subscription->expiry_date);
                                                }else{
                                                    $plan_name = "-";
                                                    $renewal_date = "-";
                                                    $plan_amt = "-";
                                                    $expiry_date = "-";
                                                }    
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <b>Your Current Plan</b>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                :
                                                            </div>
                                                            <div class="col-md-7">
                                                                <?php echo auth()->user()->roles()->first()->slug; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <b>Next Billing Date</b>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                :
                                                            </div>
                                                            <div class="col-md-7">
                                                            <?php echo $renewal_date; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <b>Billing Amount</b>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                :
                                                            </div>
                                                            <div class="col-md-7">
                                                            <?php echo $plan_amt; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <b>Expiry Date</b>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                :
                                                            </div>
                                                            <div class="col-md-4">
                                                            <?php echo $expiry_date; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12" style="margin-top: 30px;text-align: center;">
                                                                <?php if($subscription_status == "active"){ ?>
                                                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#cancelSubscriptionModal">Cancel Subscription</a>
                                                                <?php }else if($subscription_status == "-"){ ?>
                                                                    <a href="javascript:void(0)" class="btn btn-primary" disabled>Cancel Subscription</a>
                                                                <?php }else{ ?>
                                                                    <p>Subscription Cancelled ends at <?php echo $subscription_status;?>.</p>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <b>Digital Document Status</b>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                :
                                                            </div>
                                                            <div class="col-md-7">
                                                                <?php //echo $docuSignStatus; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>-->
                                              </div>

                                          </div>

                                      </div>

                                  </div>
                              </div>
                          <div class="hr-line-dashed"></div>
                          <div class="ibox-title">
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100'>History</b></h2>
                          </div>
                          <div class="ibox-content ">
                              <div class="row m-t-sm animated fadeInRight">
                                  <div class="panel blank-panel">


                                      <div class="panel-body">

                                          <div class="tab-content">

                                              <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Plan</th>
                                                        <th>Amount</th>
                                                        <th>Transaction Date</th>
                                                        <th>Expiry Date</th>
                                                        <th>Status</th>
                                                        <th>Plan Details</th>
                                                        <th>View Invoice</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($subscriptions as $subscriptions ) { ?>
                                                    <tr>
                                                        <td><?php echo auth()->user()->roles()->first()->slug; ?>
                                                        <?php /* echo $subscriptions->plan_name; */ ?></td>
                                                        <td><?php echo env('APP_CURRRENCY').' '.number_format($subscriptions->plan_amt,2); ?></td>
                                                        <td><?php echo date('d M Y', $subscriptions->transaction_date); ?></td>
                                                        <td><?php echo date('d M Y', $subscriptions->expiry_date); ?></td>
                                                        <td><?php echo $subscriptions->status; ?></td>
                                                        <td><a href="#" onclick="getPackage('{{$subscriptions->plan_id}}')"><i class="fa fa-eye"></i></a></td>
                                                        <td><a href="{{$subscriptions->pdf_link}}" target="_blank">View Invoice</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>

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

          <div id="cancelSubscriptionModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Are you sure to cancel the subscription?</h4>
                </div>
                <div class="modal-body">
                    <a href="{{ route('seller.cancelSubscription') }}" class="btn btn-primary">Cancel Subscription</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
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
                    <div class="row stripeplan">
                        <div class="form-group clearfix">
                            <label class="control-label col-sm-4">Stripe Plan:</label>
                            <div class="col-sm-8">
                                <span class="view-stripe-plan planname"></span>
                            </div>
                        </div>
                    </div>
                    <div class="ViewFeatures"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
          </div>
        </div>
@endsection

@section('template_script')
<script type="text/javascript">
    function getPackage(planid){
        $('.ViewFeatures').html("");
        $(".planname").html("");
        $('.ViewFeatures').html("");
        $.ajax({
            url: "{{ENV('APP_URL')}}/get-user-plan-detail-by-plan-id?planid="+planid,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                valueinput = '';
                var rolefeatures = "";
                if(res.length > 0){
                    for(var i = 0; i < res.length; i++){
                        var plan_name = res[i].plan_name;
                        if(res[i].feature_id == 1 || res[i].feature_id == 3){
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
                        else if(res[i].feature_id == 4){
                            valueinput = res[i].value;  
                        }
                        rolefeatures += '<div class="row modal-create-realtors"><div class="form-group required clearfix"><label class="control-label col-sm-4">'+res[i].feature_name+'</label><div class="col-sm-8">'+valueinput+'</div></div></div>';

                        $(".stripeplan").css("display","block");
                        $(".planname").html(plan_name);
                        $('.ViewFeatures').html(rolefeatures);
                    }
                }
                else{
                    $(".stripeplan").css("display","none");
                    $('.ViewFeatures').html("<h4>Plan Features data not available!</h4>");
                }
                $('#viewUserPlan').modal('show');
            }
        });
    }
</script>
@endsection
