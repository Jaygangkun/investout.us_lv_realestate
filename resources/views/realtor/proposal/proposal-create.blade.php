@extends('layouts.realtor-layout')

@section('style')

  <link href="http://demo.expertphp.in/css/dropzone.css" rel="stylesheet">

  <style media="screen">
    /* .ibox-content{
      color: #0b2a4a !important
    } */

    .ibox-content input{
       box-shadow: 4px 4px 5px -2px rgba(100,100,100,.4) !important;
    }
    .ibox-content input[type=checkbox]{
       box-shadow: none !important;
    }
    #page-wrapper{
      padding-right: 0px !important;
      padding-left: 0px !important;
    }
    #page-wrapper .ibox-title{
      padding-left: 50px;
    }

    #page-wrapper .ibox-content{
      padding-left: 40px;
      padding-right: 40px;
    }

    .dropzone-content{
      padding: 0px !important
    }

    .city-input{
      margin-left: 6%;
    }
  </style>
@endsection

@section('body')
    <div id="inSlider" class="carousel carousel-fade" data-ride="carousel" style='height:400px'>

        <div class="carousel-inner" role="listbox" style='height:400px'>

            <div class="item active">
                <div class="container ">
                    <div class="row">
                         <div class="realtor-image  col-md-6 ">
                            <div class="col-md-4">
                              <img alt="image" style='width:100%;height:151px;margin-top: 30px;' class="img-circle" src="{{ asset('profilepic/'.session('profile')->image) }}">
                            </div>
                            <div class='col-md-6' style='padding-top: 1.2em;'>
                              <div class="realtor-name text-left">
                                  <h2 style='font-family:unisansboldbold;font-size:3em'>{{$user->name()}}</h2>
                                  <h2 style='margin:0px;font-family:unisansregularregular'>{{ucfirst($user->roles()->first()->slug)}},</h2>
                                    <h2 style='margin:0px;font-family:unisansregularregular'>{{session('profile')->company}}</h2>
                              </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Set background for slide in css -->
                <div class="header-back banner" style="background: url('{{ asset("dashboard/seller/new-list-back.png") }}')  50% 50% no-repeat;  background-size: cover;height:400px">
                </div>
            </div>

        </div>

    <section  class="container features" id="how-it-works" style='margin-bottom:0px'>
        </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title top-btns-new-listing">
                              <a href="#personal-info-doc">
                                <button id="button" class='btn clicked-btn'>Personal Information</button>
                              </a>
                              <a href="#detail-doc">
                                <button id="button" class='btn '>Detail</button>
                              </a>
                              <a href="#checked-doc">
                                <button id="button" class='btn'>Checked Items</button>
                              </a>
                            </div>
                            <div class="ibox-content" style='border:none'>
                                <form id ="submitform" class="submitform form-horizontal create-property-input" action="{{ route('seller.property.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div id='personal-info-doc' class="personal-info-doc">
                                      <h1 class='part-headings'>Personal Information</h1>
                                      <div class="b-bottom"></div>
                                      <div class="form-group"><h3 class="col-sm-2 control-label">Street Address</h3>
                                          <div class="col-sm-10"><input type="text" value='{{ old('address') }}' class="form-control" id="property_address" name="address" >
                                            <small class='text-danger'><strong>{{ $errors->first('address') }}</strong></small>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <h3 class="col-sm-2 control-label">CITY</h3>
                                          <div class="city-input col-sm-4">
                                              <input type="text" class="form-control" value='{{ old('city') }}' id="city" name="city">
                                              <small class='text-danger'><strong>{{ $errors->first('city') }}</strong></small>
                                          </div>
                                          <h3 class="col-sm-1 control-label">STATE</h3>
                                          <div class="col-sm-2">
                                              <input type="text" class="form-control" value='{{ old('state') }}' id="state" name="state">
                                              <small class='text-danger'><strong>{{ $errors->first('state') }}</strong></small>
                                          </div>
                                          <h3 class="col-sm-1 control-label">ZIP</h3>
                                          <div class="col-sm-2">
                                              <input type="text" class="form-control" value='{{ old('zip') }}' id="zip" name="zip">
                                              <small class='text-danger'><strong>{{ $errors->first('zip') }}</strong></small>
                                          </div>
                                      </div>
                                    </div>
                                    <div id='detail-doc' class="detail-doc">
                                      <h1 class='part-headings'>Details</h1>
                                      <div class="b-bottom"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Does anyone claim an easement on or a right to use all or some of the property?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control" id="question_04" value="{{old('easement_claim')}}" name="easement_claim">
                                            @if ($errors->has('easement_claim'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> If not, when did seller last occupy property?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_02" value='{{old("occupy_last")}}' name="occupy_last">
                                            @if ($errors->has('occupy_last'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is any part of the property leased?</label></label>
                                          <div class="col-sm-8">
                                            <input class="form-control" id="question_03" name="leased" value="{{old('leased')}}">
                                            @if ($errors->has('leased'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>

                                  <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Does seller currently occupy property?</label></label>
                                      <div class="col-sm-8">
                                        <input class="form-control" id="question_01" name="occupy_current" value="{{old('occupy_current')}}">
                                        @if ($errors->has('occupy_current'))
                                          <small><strong class='text-danger'>Please answer this question</strong> </small>
                                        @endif
                                      </div>
                                  </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Does property rest on a landfill?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_05" name="landfill" value='{{old("landfill")}}'>
                                            @if ($errors->has('landfill'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is the property in a designated flood plain?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_06" name="flood_plain" value="{{old('flood_plain')}}">
                                            @if ($errors->has('flood_plain'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                        </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is the property in a designated fire danger zone?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_07" name="danger_zone" value="{{old('danger_zone')}}">
                                            @if ($errors->has('danger_zone'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is the property in a designated earthquake danger zone?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_08" name="earthquake_zone" value="{{old('earthquake_zone')}}">
                                            @if ($errors->has('earthquake_zone'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are  you aware of any settling/earth movement?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_09" name="earth_movement_zone" value="{{old('earth_movement_zone')}}">
                                            @if ($errors->has('earth_movement_zone'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any encroachments, boundary line disputes, or unrecorded easements?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_10" name="unrecorded_easements" value="{{old('unrecorded_easements')}}">
                                            @if ($errors->has('unrecorded_easements'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> How old is the structure?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_11" name="old" value="{{old('old')}}">
                                            @if ($errors->has('old'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any problems, past or present, with roof, gutters, or downspouts?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_12" name="problem" value="{{old('problem')}}">
                                            @if ($errors->has('problem'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any past or present damage caused by infiltrating pests,termites, dry rot,or other wood-boring insects?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_13" name="pest_damage" value="{{old('pest_damage')}}">
                                            @if ($errors->has('pest_damage'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is your property currently under warranty by a licensed pest control company?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_14" name="pest_license" value="{{old('pest_license')}}">
                                            @if ($errors->has('pest_license'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any past or present movement or other structural problems with floors, walls, or foundations?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_15" name="structure_problem" value="{{old('structure_problem')}}">
                                            @if ($errors->has('structure_problem'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Has there been fire, wind, or flood damage that required repair?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control" id="question_16" name="repair" value="{{old('repair')}}">
                                            @if ($errors->has('repair'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Has there ever been water leakage or dampness within the basement or crawl space?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_17" name="water_leakage" value="{{old('water_leakage')}}">
                                            @if ($errors->has('water_leakage'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Have there been any additions, structural changes, or alterations to the property?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control" id="question_19" name="structure_changes"  value="{{old('structure_changes')}}">
                                            @if ($errors->has('structure_changes'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Was work done with the necessary permits and approvals in compliance with building codes and zoning regulations?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_20" name="zone_regulataion" value="{{old('zone_regulataion')}}">
                                            @if ($errors->has('zone_regulataion'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is drinking water source public or private?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_21" name="water_source" value="{{old('water_source')}}">
                                            @if ($errors->has('water_source'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is sewer system public or private?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_22" name="sewer_system" value="{{old('sewer_system')}}">
                                            @if ($errors->has('sewer_system'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any past or present leaks, backups, etc. relating to water and/or sewer?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_23" name="water_sewer_leaks" value="{{old('water_sewer_leaks')}}">
                                            @if ($errors->has('water_sewer_leaks'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is there polybutylene plumbing (other than the primary service line) on the property?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_24" name="plumbing" value="{{old('plumbing')}}">
                                            @if ($errors->has('plumbing'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any toxic substances on the property?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_25" name="toxic_substance" value="{{old('toxic_substance')}}">
                                            @if ($errors->has('toxic_substance'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Has the property been tested for radon?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_26" name="radon_tested" value="{{old('radon_tested')}}">
                                            @if ($errors->has('radon_tested'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are there or have there ever been fuel storage tanks below ground on the property?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_27" name="fuel_storage" value="{{old('fuel_storage')}}">
                                            @if ($errors->has('fuel_storage'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is property subject to covenants and restrictions?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_28" name="restrictions" value="{{old('restrictions')}}">
                                            @if ($errors->has('restrictions'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is there a mandatory association fee?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_30" name="association_fee_condition" value="{{old('association_fee_condition')}}">
                                            @if ($errors->has('association_fee_condition'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> If so, how much monthly/yearly? </label></label>
                                          <div class="input-group m-b col-sm-8" style="padding-left:15px;padding-right:15px;">
                                              <span class="input-group-addon">$</span>
                                              <input type="text" class="form-control"  placeholder="" name="association_fee" id="question_29" value="{{old('association_fee')}}">
                                              <span class="input-group-addon">
                                                  <select style="font-size:10.9px" name='association_fee_unit'>
                                                      <option value="monthly">monthly</option>
                                                      <option value="yearly">yearly</option>
                                                  </select>
                                              </span>
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is there an initiation fee?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_31" name="initiation_fee" value="{{old('initiation_fee')}}">
                                            @if ($errors->has('initiation_fee'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are special assessments approved by the association?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control" id="question_32" name="assessments_approved"  value="{{old('assessments_approved')}}">
                                            @if ($errors->has('assessments_approved'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Has the property ever been the subject of litigation?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_33" name="litigation" value="{{old('litigation')}}">
                                            @if ($errors->has('litigation'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Do you know of any violations of local, state, or federal laws, codes, or regulations with respect to the property?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_34" name="laws_violation" value="{{old('laws_violation')}}">
                                            @if ($errors->has('laws_violation'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are any equipment/appliances/systems included in sale of property in need of repair or replacement?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_35" name="equipment_repair" value="{{old('equipment_repair')}}">
                                            @if ($errors->has('equipment_repair'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Does the property contain asbestos?</label></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control"  id="question_35" name="asbestos" value="{{old('asbestos')}}">
                                            @if ($errors->has('asbestos'))
                                              <small><strong class='text-danger'>Please answer this question</strong> </small>
                                            @endif
                                          </div>
                                      </div>
                                      <div class="hr-line-dashed"></div>
                                    </div>
                                    <div id='checked-doc' class='checked-doc'>
                                      <h1 class='part-headings'>Checked Items</h1>
                                      <div class="b-bottom"></div>
                                      <div class="form-group">
                                          <h3 class="col-sm-12 text-left"><strong>The following checked items are currently on the property and will be included in the sale:</strong></h3>
                                      </div>




                                      <div class="form-group">
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="burglar_alarm"><span>Burglar Alarms</span>
                                                  </label>
                                              </div>
                                          </div>
                                           <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="smoke_detector"><span>Smoke Detectors</span>
                                                  </label>
                                              </div>
                                          </div>
                                           <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="fire_alarm"><span>Fire Alarm</span>
                                                  </label>
                                              </div>
                                          </div>
                                           <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="central_air"><span>Central Air</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox"  name="central_heating"><span>Central Heating</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="window_ac" ><span>Window A/C Unit</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="dishwasher" ><span>Dishwasher</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="trash_compactor"  ><span>TrashCompactor</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="garbage_disposal" ><span>Garbage Disposa</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="oven" ><span>Oven</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="microwave" ><span>Microwave</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="tv_antenna" ><span>TV Antenna</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="satelite_dish"><span>Satellite Dish</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="intercom_system"><span>Intercom System</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="pool"><span>Pool</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="washer_dryer"><span>Washer/DryerHookup</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="hot_tub"><span>Hot Tub/Jacuzzi</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="washer"><span>Washer</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="dryer"><span>Dryer</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="refrigerator"><span>Refrigerator</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="pool_barrier"><span>Pool Barrier</span>
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-sm-2 col-xs-6 sale-check-item">
                                              <div>
                                                  <label>
                                                      <input type="checkbox" name="safety_cover_hottub"><span>SafetyCoverforHotTub</span>
                                                  </label>
                                              </div>
                                          </div>
                                    </div>
                                    </div>

                                    <div class="header-back banner text-center" style="margin-top: 4em !important;padding:2em !important;margin-left:-3.1em;margin-right:-3.1em;background: url('{{ asset("dashboard/seller/new-list-back.png") }}')  50% 50% no-repeat;  background-size: cover;height:315px;padding:0px;">
                                      <img alt="image" style='width:125px;height:118px' class="img-circle" src="{{ asset('profilepic/'.session('profile')->image) }}">
                                      <h3 style='color:white;font-family:unisansboldbold;font-weight:100;font-size:1.5em;margin-top:.8em'>SELLER'S REPRESENTATION</h3>
                                      <p style='font-family:unisansregularregular;color:white;font-size:1.2em;height:70px'>{{auth()->user()->aboutme}}</p>
                                    </div>


                                    <div class="form-group">
                                        <div class="p-t-60">
                                            {{-- <div class="row">
                                                <div class="col-sm-6" style="padding-top:27px">
                                                    <label class="col-sm-2 control-label" style='font-weight: 100;font-family: unisanssemiboldbold !important;'>SELLER</label>
                                                    <div class="col-sm-4" ><input type="text" class="form-control" name="name" id="name" style="width:250px;"></div>
                                                </div>
                                            </div> --}}
                                            <br><br>
                                            <div class="row" style='font-family:unisanssemiboldbold'>
                                                <div class="col-md-6">
                                                    {{-- <label class="col-sm-2 control-label" style='font-weight: 100;font-family: unisanssemiboldbold !important;'>DATE</label>
                                                    <div class="col-sm-3"><input type="date" class="form-control" name="sign_date" id="sign_date" value="{{ date('Y-m-d')}}" style="width:250px"></div>
                                                    <div class="col-sm-1">&nbsp;</div> --}}
                                                </div>
                                                <div class="col-md-12 text-right" style='padding-right: 3em;'>
                                                  <button class="btn cancel-btn" type="submit" style='margin-right:3px'>Cancel</button>
                                                  <button class="btn save-btn" type="submit" >Save</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
@endsection

@section('template_script')

@endsection
