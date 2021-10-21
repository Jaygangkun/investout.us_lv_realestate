@extends('layouts.seller-layout')

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
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100'>{{$title}} Proposals</b></h2>
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
                                                              <!-- <th>Proposal</th> -->
                                                              <th>Proposal Sender</th>
                                                              <th>Proposal Property ID</th>
                                                              <th>Sent At</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                              @foreach ($proposals as $key=>$proposal )
                                                                  <tr class="allproperty_row">
                                                                      <td class="text_center">{{$key+1}}</td>
                                                                      <!-- <td  class="client-avatar">
                                                                        <a download href="{{ asset('proposal/'.$proposal->file) }}">
                                                                            <i style='font-size:4.4em' class='fa fa-folder-o'></i>
                                                                        </a>
                                                                      </td> -->
                                                                      <td><a href="{{route('message.read',$proposal->user_id)}}"> {{$proposal->user->name()}} </a></td>
                                                                      <td><a href="{{route('seller.property.show',$proposal->property_id)}}">{{$proposal->property_id}} </a></td>
                                                                      <td>{{ date('M-D-Y', strtotime($proposal->created_at)) }}</td>
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
