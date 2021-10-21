@extends('layouts.investor-layout') 
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

    .apply-button {
        background-color: #0b2a4a;
        color: white;
        font-family: unisansboldbold;
        border-radius: 6px;
        box-shadow: -3px 3px 3px 0px rgba(100, 100, 100, .24);
        border: none;
        width: 10%;
    }

    .apply-button:hover {
        color: white !important
    }

    .apply-button:focus {
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
                    <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100;text-transform:capitalize'>Contracted Properties</b></h2>
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
                                                    <th>Photo</th>
                                                    <th>User Name</th>
                                                    <th>Property ID</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>Zip Code</th>
                                                    <th>Budget</th>
                                                    <th>Date Listed</th>
                                                    <th>Listing Duration</th>
                                                    <th>Date Approved</th>
                                                    <th>Updated At</th>
                                                    <th>Property State</th>
                                                    <th>Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($properties as $key=>$property )
                                                <tr class="allproperty_row">
                                                    <td class="text_center">{{$key+1}}</td>
                                                    @if(isset($property->images()->first()->image))
                                                    <td class="client-avatar"><a href="{{ route('admin.property.show',$property->id) }}"><img alt="image" src="{{ asset('properties/'.$property->id.'/images/'.$property->images()->first()->image)}}"> </a>
                                                    </td>
                                                    @else
                                                    <td class="client-avatar"><a href="{{ route('admin.property.show',$property->id) }}"><img alt="image" src="{{ asset('dashboard/seller/default-property.jpg')}}"/> </td>
                                                                      @endif                                                                                                                  
                                                                      <td>{{ null != $property->seller->name() ? $property->seller->name() : ' ' }}</td>
                                                                      <td>{{$property->id}}</td>
                                                                      <td>{{ $property->address }}</td>
                                                                      <td>{{ $property->city }}</td>
                                                                      <td>{{ $property->zip }}</td>
                                                                      <td>{{ isset($property->details->brv_price) ? $property->details->brv_price : 'Not Entered' }}</td>
                                                                      <td>{{ date('d-M-Y', strtotime($property->created_at)) }}</td>
                                                                      <td>{{ isset($property->details->during_date) ? $property->details->during_date : 'Not Entered' }}</td>
                                                                      <td>{{ date('d-M-Y', strtotime($property->approved_date)) }}</td>
                                                                      <td>{{ date('d-M-Y', strtotime($property->updated_at)) }}</td>
                                                                      <td>
                                                                        <form action="{{ route('admin.property.state-update',$property->id) }}" method="post" id='form{{ $key }}'>
                                                                          {{ csrf_field() }}
                                                                          <select class="form-control" name="property_state">
                                                                            <?php
                                                                            $select_label = array("Approved","Mark as Contracted","Mark as Closed");
                                                                            ?>
                                                                            @foreach ($select_label as $k => $label)
                                                                              <option value="{{ $k }}" {{ $k==$property->property_state ? 'selected="selected"' : '' }}>{{ $label }}</option>
                                                                            @endforeach
                                                                          </select>
                                                                        </form>
                                                                      </td>
                                                                      <td><button type="button" class='btn btn-primary form-submit' name="button" ref='{{ $key }}'><i class='fa fa-save'></i></button></td>
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