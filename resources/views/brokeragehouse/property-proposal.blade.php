@extends('layouts.brokeragehouse-layout') 
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
</style>
@endsection
 
@section('body')

<div class="wrapper wrapper-content custom-container-a">

    <div class="row animated fadeInRight allproperty_header">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100'>All Properties</b></h2>
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
                                                    <th>Property ID</th>
                                                    <th>Address</th>
                                                    <th>Date Listed</th>
                                                    <th>Date Approved</th>
                                                    <th>Listing Duration</th>
                                                    <th>Days Listed</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($properties as $key=>$property )
                                                <tr class="allproperty_row">
                                                    <td class="text_center">{{$key+1}}</td>

                                                    @if($property->images->count() > 0)
                                                    <td class="client-avatar"><a href="{{ route('investor.property.show',$property->id) }}"><img alt="image" src="{{ asset('properties/'.$property->id.'/images/'.$property->images->first()->image)}}"> </a>                                                        @else
                                                        <td class="client-avatar"><a href="{{ route('investor.property.show',$property->id) }}"><img alt="image" src="{{ asset('dashboard/seller/default-property.png')}}"> </a>                                                            @endif
                                                        </td>
                                                        <td>{{$property->id}}</td>
                                                        <td>{{ $property->address }}</td>
                                                        <td>{{ date('d-M-Y', strtotime($property->created_at)) }}</td>
                                                        <td>{{$property->approved_date or ' '}}</td>
                                                        <td>{{ $property->detail->during_date }} Days</td>
                                                        <td>
                                                            <?php
                                                                      $datetime1 = new DateTime($property->created_at);
                                                                      $datetime2 = new DateTime('now');
                                                                      $interval = $datetime1->diff($datetime2);
                                                                      $interval = $interval->format('%a');
                                                                      if ($interval == 0) {
                                                                          $interval = 1;
                                                                      }
                                                                      echo $interval.' Day(s)';
                                                                      ?>
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
 
@section('template_script')
@endsection