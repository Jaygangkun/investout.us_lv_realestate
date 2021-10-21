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
                               <h2 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100'><b style='font-weight:100'>All Proposals</b></h2>
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
                                                        <th>Seller's Guaranteed Profit</th>
                                                        <th>Seller's Gross Profit</th>
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
                                                                  <a href="{{ route('profile.show',['user',$proposal->fromUser->id]) }}">{{$proposal->fromUser->first_name}} {{$proposal->fromUser->last_name}}</a>
                                                                </td>
                                                                <!-- <td>$ {{ number_format(round($proposal->total_projected_profit))}}</td>
                                                                <td>$ {{ number_format(round($proposal->brv))}}</td>
                                                                <td>$ {{ number_format(round($proposal->increased_profit))}}</td> -->
                                                                <td>$ {{ number_format(round($proposal->seller_share_profit))}}</td>
                                                                <td>$ {{ number_format(round($proposal->seller_gross_profit))}}</td>
                                                                <td>{{$proposal->seller_share}} %</td>
                                                                <td>{{100 - $proposal->seller_share}} %</td>
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
                                                                <a href="{{ route('whole-seller.investorProposals.view',['property_id'=>$proposal->property_id, 'investor_id'=>$proposal->from_user]) }}" class="proposal-count-info"><i class="fa fa-list-alt" style="font-size:21px;color: #36b394;" aria-hidden="true"></i><span class="label lab1 label-warning">{{$proposal->unread_proposals}}</span></a>
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

@section('template_script')
<script>
    var globvar = 0;
    var dis;
    $( ".denyForm" ).submit(function( event ) {
      dis = $(this);
      if(globvar == 0){
        $("#DeleteModalButton").click();
        event.preventDefault();
      }
    });
    
    $('#deleteButton').on('click',function() {
        globvar = 1;
        $(dis).submit();
    });

</script>
@endsection
