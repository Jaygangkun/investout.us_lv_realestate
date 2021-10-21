@extends('layouts.admin-layout')

@section('body')
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
<div class="full-height-scroll padding-all" full-scroll>
    <div class="row table-responsive">
        <div class="col-md-12">
            <p style="text-transform:capitalize"><a href="{{ URL::previous() }}"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
        </div>
        <div class="col-md-10">
            <h2 class="userlist_title" style="text-transform:capitalize"><b>Users</b></h2>
        </div>
        <table class="table table-striped table-hover" id="users">
            <thead>
                <tr>
                    <th>Photo</td>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Location</th>
                    <th>ZipCode</th>
                    <th>Phone</th>
                    <th>Last Login</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>View Plan</th>
                    <!--<th>Document</th>-->
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key=>$user )
                        <tr id="{{$user->profile }}">
                        <td class="client-avatar"><a href ="{{ route('profile.show',['user',$user->id]) }}"><img alt="image" src="{{ asset('profilepic/'.$user->profile['image']) }} "> </a></td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->profile['location']}}</td>
                        <td>{{$user->profile['zipCode']}}</td>
                        <td>{{$user->profile['phone']}}</td>
                    
                        @if ($user->last_login_at)
                          <td>{{$user->last_login_at->diffForHumans()}}</td>
                        @else
                          <td></td>
                        @endif
                        <td>{{ date('d-M-Y', strtotime($user->created_at)) }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                        <td  style="text-align: center;"><a href='#' onclick="getPackage( {{$user->id }} ); return false;"  class=""><i class = "fa fa-eye"></i></a></td>
                        <!--@if(file_exists('signed_documents/'.$user->id.'.pdf'))
                            <td><a style="font-size:16px" target="_blank" href="{{ENV('APP_URL').'signed_documents/'.$user->id.'.pdf'}}"><i class="fa fa-file-pdf-o"></i> View</a></td>
                        @else
                            <td>Not Signed</td>
                        @endif-->
                        @if ($user->status == 0)
                            <td>Deleted</td>
                            <td></td>
                        @else
                            <td>Active</td>
                            <td>
                                  <button type="submit" onclick="DeleteModal('{{ route('profile.delete',$user->id) }}')" class='btn btn-danger btn-sm' name="button">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        @endif
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
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
            <div class="row">
                <div class="form-group clearfix">
                    <label class="control-label col-sm-4">Role:</label>
                    <div class="col-sm-8">
                        <span class="view-role rolename"></span>
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
@endsection

@section('script')
<script type="text/javascript">

    $('#users').DataTable();

    function DeleteModal(url){
      $("#deleteButton").attr('href',url);
      $("#DeleteModalButton").click();
    }
    function getPackage(userid){
        $('.ViewFeatures').html("");
        $(".planname").html("");
        $('.ViewFeatures').html("");
        $.ajax({
            url: "{{ENV('APP_URL')}}/admin/stripe/get-user-plan-detail?userid="+userid,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                $(".rolename").html(res.role_name);
                valueinput = '';
                var rolefeatures = "";
                if(res.details.length > 0){
                    for(var i = 0; i < res.details.length; i++){
                        var plan_name = res.details[i].plan_name;
                        if(res.details[i].feature_id == 1 || res.details[i].feature_id == 3){
                            if(res.details[i].value == 0){
                                valueinput = 'Unlimited';
                            }
                            else{
                                valueinput = res.details[i].value;
                            }

                        }
                        else if(res.details[i].feature_id == 2){
                            valueinput = "No";
                            if(res.details[i].value == '1'){
                                valueinput = "Yes";   
                            }   
                        }
                        else if(res.details[i].feature_id == 4){
                            valueinput = res.details[i].value;  
                        }
                        rolefeatures += '<div class="row modal-create-realtors"><div class="form-group required clearfix"><label class="control-label col-sm-4">'+res.details[i].feature_name+'</label><div class="col-sm-8">'+valueinput+'</div></div></div>';

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
