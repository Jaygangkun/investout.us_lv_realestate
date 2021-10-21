@extends('layouts.admin-layout')

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
   .apply-button{
     background-color: #0b2a4a;
     color: white;
     font-family:unisansboldbold;
     border-radius: 6px;
     box-shadow: -3px 3px 3px 0px rgba(100,100,100,.24);
     border:none;
     width: 10%;
   }

   .apply-button:hover{
     color:white !important
   }

   .apply-button:focus{
     color: white;
   }


  </style>
@endsection

@section('body')

      <div class="wrapper wrapper-content custom-container-a" style='width:100%;'>

              <div class="row animated fadeInRight allproperty_header">
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>New Membership Requests</b></h2>
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
                                                              <th>User Name</th>
                                                              <th>User Email Id</th>
                                                              <th>Transaction Id</th>
                                                              <th>Created At</th>
                                                              <th>Approve</th>
                                                              <th>Deny</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                              @foreach ($memberships as $key=>$membership )
                                                                  <tr class="allproperty_row">
                                                                      <td class="text_center">{{$key+1}}</td>
                                                                      <td><a href="{{route('profile.show',$membership->user_id)}}"> {{$membership->user->name()}} </a></td>
                                                                      <td><a href="{{route('profile.show',$membership->user_id)}}"> {{$membership->user->email}} </a></td>
                                                                      <td><a> {{$membership->trans_id}} </a></td>
                                                                      <td>{{ date('d-M-Y', strtotime($membership->created_at)) }}</td>
                                                                      <td>
                                                                        <form action="{{route('admin.membership.approve')}}" method='post'>
                                                                            @csrf
                                                                            <input type="hidden" name='pro_id' value={{$membership->id}}>
                                                                            <button type="submit" class='btn btn-primary form-submit' name="button" >Approve</button>
                                                                        </form>
                                                                        </td>
                                                                        <td>
                                                                            {!! Form::open(['method' => 'post', 'route' => 'admin.membership.deny', 'class' => 'form-horizontal']) !!}
                                                                                <input type="hidden" name='pro_id' value={{$membership->id}}>
                                                                                <button type="submit" name="button" class=' btn btn-danger' style=''>
                                                                                    Deny
                                                                                </button>
                                                                            {!! Form::close() !!}
                                                                        </td>
                                                                  </tr>
                                                              @endforeach
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
@endsection

@section('script')
  <script type="text/javascript">
    $('body').on('click','.form-submit',function() {
        let ref = $(this).attr('ref');
        $(`#form${ref}`).submit();
    })
  </script>
@endsection
