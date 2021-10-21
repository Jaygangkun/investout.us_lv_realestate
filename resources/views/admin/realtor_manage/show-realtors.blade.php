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
    
  .form-group {
    margin-bottom: 0px !important;
  }
</style>
<div class="full-height-scroll padding-all" full-scroll>
    <div class="row table-responsive">
        <div class="col-md-12">
          <div class="alert alert-success" id="alertSuccess" style="display:none;">
            
          </div>
          <div class="alert alert-danger" id="alertDanger" style="display:none;">
            
          </div>
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
                    <th>Phone</th>
                    <th>Last Login</th>
                    <th>Assign ZipCode</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($realtors as $key=>$realtor )
                        <tr id="{{$realtor->profile }}">
                        <td class="client-avatar"><a href ="{{ route('profile.show',['user',$realtor->id]) }}"><img alt="image" src="{{ asset('profilepic/'.$user->profile['image']) }} "> </a></td>
                        <td>{{$realtor->first_name}}</td>
                        <td>{{$realtor->last_name}}</td>
                        <td>{{$realtor->phone}}</td>
                    
                        @if ($realtor->last_login_at)
                          <td>{{$realtor->last_login_at->diffForHumans()}}</td>
                        @else
                          <td></td>
                        @endif

                        <td>
                              <!-- <button type="submit" onclick="DeleteModal('{{ route('profile.delete',$realtor->id) }}')" class='btn btn-danger btn-sm' name="button">Delete <i class="fa fa-trash" aria-hidden="true"></i></button> -->
                              <div class="form-group row">
                                <div class="col-md-6">
                                  <input type="text" class="form-control" id="assign_zip_code_{{$realtor->id}}" name="assign_zip_code" value="{{($realtor->assign_zip_code == 0 ? '' : $realtor->assign_zip_code)}}" />
                                </div>
                                <div class="col-md-4">
                                  <button class="btn btn-success" id="btn_assign_zip_code_{{$realtor->id}}" data-id="{{$realtor->id}}">Assign</button>
                                </div>
                              </div>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
<script>
  $("button[id^='btn_assign_zip_code_']").click(function(){
    console.log($(this).attr("data-id"));
    console.log($(this).attr("id"));
    let id = $(this).attr("data-id");
    let split_id = $(this).attr("id").split('_');
    console.log($("#assign_zip_code_"+split_id[4]).val());
    let zip_code = $("#assign_zip_code_"+split_id[4]).val();

    $.ajax({
      url: "{{ENV('APP_URL')}}/admin/realtors/assign-zip-code",
      type: "post",
      data: { assignZipCode: zip_code, id: id },
      dataType: "json",
      success: function(res) {
        if(res.status)
        {
          console.log("Response True:", res.message);
          $("#alertSuccess").empty();
          $("#alertSuccess").prepend("<strong>Success: </strong>"+res.message);
          $('#alertSuccess').fadeIn(1000);
          setTimeout(function() { 
              $('#alertSuccess').fadeOut(1000); 
          }, 5000);
        }
        else
        {
          console.log("Response False:", res.message);
          $("#alertDanger").empty();
          $("#alertDanger").prepend("<strong>Error: </strong>"+res.message);
          $('#alertDanger').fadeIn(1000);
          setTimeout(function() { 
              $('#alertDanger').fadeOut(1000); 
          }, 5000);
        }
      }
    });
  });
</script>


@endsection
