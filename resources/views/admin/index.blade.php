@extends('layouts.admin-layout')

@section('style')
  <link href="{{ asset('css/circle.css') }}" rel="stylesheet">

  <style media="screen">
    .main-cont{
      padding:4em;
    }

    #inner-container{
      padding:2em;
      box-shadow: 5px 5px 16px 0px rgba(0,0,0,.28);
      border: 1px solid rgba(0,0,0,.28);
    }

    .statistics{
      padding: 2em 1em;
      border-bottom: 2px solid #e6e7e8;
    }

    .innerhead{
      font-family: unisansboldbold;
      font-size: 1.7em;
      color:#0b2a4a
    }

    .flot-base{
      height: 430px !important;
    }

    .flot-text{
      top: 105px !important;
    }

    .flot-x-axis{
      color: white !important;
      font-family: unisansregularregular !important;
    }
    .flot-y-axis{
      color: #34a691 !important;
      font-family: unisansboldbold !important;
      font-weight: 100 !important;
    }

    .search-form input{
      border-radius: 10px;
      border-top-right-radius: 0px;
      border-bottom-right-radius: 0px;
    }

    .search-form .input-group-addon{
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
      background: #939598;
      color: white;
    }

    .ibox-title{
      border:none;
      padding:22px 15px 20px;
    }

    .ibox-title h5{
      color: #0b2a4a;
      font-size: 1.5em;
      font-family: unisansboldbold;
      font-weight: 100;
    }

    .ibox{
      box-shadow: 0px 7px 7px 0px rgba(0,0,0,.35);
      height:263px;
      margin-bottom: 50px;
      /* overflow-y: scroll; */
    }

    .ibox-content{
      border:none
    }

    .chat_box{
      height:102px
    }

    .porperty-state{

    }

    .prolist{
      padding: 0px;
    }

    .proitem{
      padding:.8em .5em !important
    }
    .proitem:nth-child(2n+1){
      background-color: #e6e7e8
    }
    .head-row{
      color:#0b2a4a;
      font-family: unisansboldbold;
      font-weight: 100;
      margin:0px;
    }

    .head-row div{
      text-align: left;
      padding:5px 10px;
      font-size: 1.1em;
    }

    .data-row{
      margin:0px;
    }

    .data-row div{
      color:#34a691;
      font-family: unisansboldbold;
      text-align: left;
      padding:5px 10px;
      font-size: 1em;
    }

    .c100 .bar{
      border-color: #34a691 !important;
      display: block !important;
    }

    .c100{
      font-size: 140px;
      background-color: #58595b !important;
    }

    .c100:after{
      background-color: white;
      top: 0.04em;
      left: 0.04em;
      width: 0.92em;
      height: 0.92em;
    }
    .c100 > span{
      color:#0b2a4a;
      font-weight:100;
      font-family: unisansboldbold;
    }
    .head1,.text1{
      color:#0b2a4a;
      font-weight:100;
      font-family: unisansboldbold;
      font-size: 2em;
    }
    .text1{
      font-size: 1.3em;
      line-height: 10px;
    }

    .stats{
      width: 28%;
    }

    .stats:first-child{
      margin-left: 9%;
    }

    .c100 .fa{
      font-size: .8em !important;
    }

    .statistics .fa{
      color:#34a691 !important
    }
    .pagination>li{
      background: #fff !important
    }
  </style>


@endsection

@section('body')
  <div id="wrapper" class='main-cont'>

      <div class="row top-row">
        <div class="col-md-6 text-left">
          <h2 style='font-size:2.2em;font-family:unisansboldbold;color:#0b2a4a'>Admin Panel</h2>
        </div>
        <div class="col-md-6 text-right">
          <!-- <div class="form-group search-form">
            <div class="col-md-offset-4 col-md-2 text-center" style='padding-top:6px;padding-right:0px'>
              <label for="" class='text-muted' style='font-weight: 100;font-size: 1.4em;font-family:unisansregularregular'>Search</label>
            </div>
            <div class="col-md-6" style='padding-right:0px'>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="">
                <span class="input-group-addon"> <i class='fa fa-search'></i> </span>
              </div>
            </div>
          </div> -->
        </div>
      </div>

      <div id="inner-container" class="">
              <?php
                  $total_user = App\User::count();
                  $total_properties = App\Property::count();
                  // $total_completedCount = DB::table('property_lists')->select('id')->where('state', 3)->count();
                  // $total_active = DB::table('property_lists')->select('id')->where('state', '<', 3)->count();
                  $total_completedCount = 1;
                  $total_active = 2;
              ?>
              <div class="row">
                <div class="col-lg-9">
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                    </div>
                </div>
                <div class="col-lg-3" style='padding-left:0px'>
                  <div class="col-lg-12 statistics">
                      <div class="">
                          <div class="row vertical-align">
                              <div class="col-xs-3">
                                  <i class="fa fa-users fa-3x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <h2 class="innerhead">Total User <br> {{$total_user}}</h2>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-12 statistics">
                      <div class="">
                          <div class="row vertical-align">
                              <div class="col-xs-3">
                                  <i class="fa fa-home fa-3x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <h2 class="innerhead">Total Property <br> {{$total_properties}}</h2>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-12 statistics">
                      <div class="">
                          <div class="row vertical-align">
                              <div class="col-xs-3">
                                  <i class="fa fa-check fa-3x"></i>
                              </div>
                              <div class="col-xs-9 text-right" style='padding-left:0px'>
                                  <h2 class="innerhead">Total Completed <br> {{$total_completedCount}}</h2>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-12 statistics">
                      <div class="">
                          <div class="row vertical-align">
                              <div class="col-xs-3">
                                  <i class="fa fa fa-refresh fa-3x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <h2 class="innerhead">Processing <br> {{$total_active}}</h2>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <?php
                  $date = date('m', strtotime('-1 month'));
                  if ($date==12) {
                      $date=0;
                  }
                  // $month_totalproperty = DB::table('property_lists')->select('id')->whereMonth('created_at', '>', $date)->whereMonth('created_at', '<=', $date+1)->count();
                  // $month_totalcomplete = DB::table('property_lists')->select('id')->whereMonth('created_at', '>', $date)->whereMonth('created_at', '<=', $date+1)->where('state', 3)->count();
                  // $month_totalactivity = DB::table('activations')->select('id')->whereMonth('created_at', '>', $date)->whereMonth('created_at', '<=', $date+1)->count();
                  $month_totalproperty = 1;
                  $month_totalcomplete = 2;
                  $month_totalactivity = 3;
              ?>

              <div class="row" style='margin-bottom:4em;margin-top:4em'>
                <div class="col-lg-12">
                  <div class="col-md-4 stats" style='padding:0px'>
                    <div class="col-md-8" style='padding:0px;width:auto'>
                      <div class="c100 p30">
                        <span>30%<i class="fa fa-level-up " style='color:green'></i></span>
                        <div class="slice">
                          <div class="bar"></div>
                          <div class="fill"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5" style='padding:0px;padding-top:3em;'>
                      <h2 class='head1 no-margins'>{{$month_totalproperty}}</h2>
                      <small class='text1'>Properties in this month</small>
                    </div>
                  </div>
                  <div class="col-md-4 stats" style='padding:0px'>
                    <div class="col-md-8" style='padding:0px;width:auto'>
                      <div class="c100 p50">
                        <span>60%<i class="fa fa-level-down " style='color:green'></i></span>
                        <div class="slice">
                          <div class="bar"></div>
                          <div class="fill"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5" style='padding:0px;padding-top:3em;'>
                      <h2 class='head1 no-margins'>{{$month_totalcomplete}}</h2>
                      <small class='text1'>Completed Properties in this month</small>
                    </div>
                  </div>
                  <div class="col-md-4 stats" style='padding:0px'>
                    <div class="col-md-8" style='padding:0px;width:auto'>
                      <div class="c100 p22">
                        <span>22%<i class="fa fa-bolt " style='color:gold'></i></span>
                        <div class="slice">
                          <div class="bar"></div>
                          <div class="fill"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5" style='padding:0px;padding-top:3em;'>
                      <h2 class='head1 no-margins'>{{$month_totalactivity}}</h2>
                      <small class='text1'>User Activity in this month</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style='margin-bottom:1em'>
                  {{--  ---------------      Message ------------------  --}}

                  <div class="col-lg-4">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                              <h5>Messages</h5>
                              <div class="ibox-tools">
                                  <a class="collapse-link">
                                      <i class="fa fa-chevron-up"></i>
                                  </a>
                                  <a class="close-link">
                                      <i class="fa fa-times"></i>
                                  </a>
                              </div>
                          </div>
                          <div class="ibox-content ibox-heading">
                              <h3><i class="fa fa-envelope-o"></i> New messages</h3>
                              <small><i class="fa fa-tim"></i> You have &nbsp;new messages.</small>
                          </div>
                          <div class="ibox-content chat_box" >
                              <div class="feed-activity-list">
                                      {{-- <div class="feed-element">
                                          <div>
                                              <a class="pull-left" style="padding-right: 12px">
                                                  <img alt="image" class="img-circle" src="{{url($owner_photo)}}">
                                              </a>
                                                  <small class="pull-right text-navy">{{$diffDate}}</small>
                                                  <strong>{{$userInfo->first_name}} {{$userInfo->last_name}}</strong>
                                                  <div style="color:grey">{{$msg->message_content}}</div>
                                                  <small class="text-muted">{{$msg->created_at}} - {{$msg->updated_at}}</small>

                                          </div> --}}
                                      </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-8">

                          <div class="row">
                              {{--  -------------------- Property List --------------------  --}}
                              <div class="col-lg-12">
                                  <div class="ibox float-e-margins">
                                      <div class="ibox-title">
                                          <h5>User project list</h5>
                                          <div class="ibox-tools">
                                              <a class="collapse-link">
                                                  <i class="fa fa-chevron-up"></i>
                                              </a>
                                              <a class="close-link">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                          </div>
                                      </div>
                                      <div class="ibox-content row prolist" style='margin:0px '>
                                              <div class="proitem col-md-12" style='padding:0px'>
                                                <div class="row head-row">
                                                  <div style='display:inline-block;width:50px'>Status</div>
                                                  <div style='display:inline-block;width:140px'>Date</div>
                                                  <div style='display:inline-block;width:100px'>User</div>
                                                  <div style='display:inline-block;width:70px'>ZipCode</div>
                                                  <div style='display:inline-block;width:160px'>Address</div>
                                                  <div style='display:inline-block;width:70px'>City</div>
                                                </div>
                                                <div class="row data-row">
                                                  <div style='display:inline-block;width:50px;text-align:center'><span><i class="fa fa-clock-o"></i></span></div>
                                                  <div style='display:inline-block;width:138px' class="">nothing</div>
                                                  <div style='display:inline-block;width:100px' class="">nothing</div>
                                                  <div style='display:inline-block;width:70px' class="">nothing</div>
                                                  <div style='display:inline-block;width:160px' class="">nothing</div>
                                                  <div style='display:inline-block;width:70px' class="">nothing</div>
                                                </div>
                                              </div>
                                      </div>
                                  </div>
                              </div>

                          </div>

                      </div>
                  </div>
          </div>

          <div class="row">
              <div class="col-lg-12" style="height:600px">

                  <iframe src="https://www.google.com/maps/embed/v1/place?q=Harrods,Brompton%20Rd,%20UK
                      &zoom=3
                      &key=AIzaSyCnkuO2_QDKMY126ou-phm06p4_iEjuBNI" style="width:100%;height:100%;border: 2px solid;">
                  </iframe>

              </div>
          </div>
      </div>
  </div>

@endsection


@section('script')

@endsection
