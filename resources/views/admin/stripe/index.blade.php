@extends('layouts.admin-layout') 
@section('style')
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
@endsection
 
@section('body')

<div class="wrapper wrapper-content custom-container-a">

    <div class="row animated fadeInRight allproperty_header">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>Plans</b></h2>
                </div>
                <div class="ibox-content ">
                    <div class="row m-t-sm animated fadeInRight">
                        <div class="panel blank-panel">


                            <div class="panel-body">

                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab-1">

                                        <table class="table table-striped" id="plans">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Plan ID</th>
                                                    <th>Name</th>
                                                    <th>Interval</th>
                                                    <th>Amount</th>
                                                    <th>Date Created</th>
                                                    <th>Plan Role</th>
                                                    <th>Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($plans as $plan )
                                                <tr class="allproperty_row">
                                                    <td>{{$plan->id}}</td>
                                                    <td>{{$plan->plan_id}}</td>
                                                    <td>{{$plan->plan_name}}</td>
                                                    <td>{{$plan->interval."ly"}}</td>
                                                    <td>{{$plan->amount}}</td>
                                                    <td>{{$plan->created_at}}</td>
                                                    <td>
                                                        <form action="{{ route('admin.stripe.plan-update',$plan->id) }}" method="post" id='form{{ $plan->id }}'>
                                                            {{ csrf_field() }}
                                                            <select class="form-control" name="plan_role">
                                                                <option value="0">Select Role</option>
                                                              @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}" {{ $role->id==$plan->role ? 'selected="selected"' : '' }}>{{ $role->name }}</option>
                                                              @endforeach
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <button type="button" class='btn btn-primary form-submit' name="button" ref='{{ $plan->id }}'><i class='fa fa-save'></i></button>
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
    $('#plans').DataTable();
    $('body').on('click','.form-submit',function() {
        let ref = $(this).attr('ref');
        $(`#form${ref}`).submit();
    })
  </script>
@endsection