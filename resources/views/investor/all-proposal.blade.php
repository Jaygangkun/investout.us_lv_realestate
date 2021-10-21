@extends('layouts.investor-layout')

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
   .proposal-count-info .label{
    line-height: 12px;
    padding: 2px 5px;
    position: absolute;
    top: 2
  } 


  </style>
@endsection

@section('body')

      <div class="wrapper wrapper-content custom-container-a">

              <div class="row animated fadeInRight allproperty_header">
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100'>Sent Proposals</b></h2>
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
                                                              <th>Propert ID</th>
                                                              <th>Proposal Send To</th>
                                                              <!-- <th>Project Total Profit($)</th>
                                                              <th>BRV($)</th>
                                                              <th>Increased Profit($)</th> -->
                                                              <th>Investor Profit($)</th>
                                                              <th>Investor ROI(%)</th>
                                                              <th>Seller Profit Share(%)</th>
                                                              <th>Investor Profit Share(%)</th>
                                                              <!-- <th>Last Proposal At</th> -->
                                                              <!-- <th style='width:100px'>Accepted</th> -->
                                                              <!-- <th style='width:100px'>Deny</th> -->
                                                              <th>Action</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                              @foreach ($proposalsLists as $key=>$proposal )
                                                                  <tr class="allproperty_row">
                                                                      <td class="text_center">{{$key+1}}</td>
                                                                      <td>
                                                                        <a href="{{route('investors.property.show',$proposal->property_id)}}">
                                                                          {{$proposal->property_id}}
                                                                        </a>
                                                                      </td>
                                                                      <td>
                                                                        {{$proposal->fromUser->first_name}} {{$proposal->fromUser->last_name}}
                                                                      </td>
                                                                      <!-- <td>$ {{ number_format(round($proposal->total_projected_profit))}}</td>
                                                                      <td>$ {{ number_format(round($proposal->brv))}}</td>
                                                                      <td>$ {{ number_format(round($proposal->increased_profit))}}</td> -->
                                                                      <td>$ {{ number_format(round($proposal->investor_share_profit))}}</td>
                                                                      <td>{{ round($proposal->investor_roi, 2)}} %</td>
                                                                      <td>{{100 - $proposal->investor_share}} %</td>
                                                                      <td>{{$proposal->investor_share}} %</td>
                                                                      <!-- <td>
                                                                        {{$proposal->created_at}}
                                                                      </td> -->
                                                                      <!-- @if(isset($acceptedProposal) && ($acceptedProposal->from_user == $proposal->from_user || $acceptedProposal->to_user == $proposal->from_user))
                                                                      <td>Accepted</td>
                                                                      @else
                                                                      <td></td>
                                                                      @endif -->
                                                                      <!-- <td></td> -->
                                                                      <td>
                                                                      <a href="{{ route('investors.property.propertyProposals',$proposal->property_id) }}" class="proposal-count-info"><i class="fa fa-list-alt" style="font-size:21px;color: #36b394;" aria-hidden="true"></i><span class="label lab1 label-warning">{{$proposal->unread_proposals}}</span></a>
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
