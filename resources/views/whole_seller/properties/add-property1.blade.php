@extends('layouts.whole-seller-layout')
@section('style')
  <style media="screen">
    .seller_detail{
      padding: 2em;
      background: white !important;
      color: #0b2a4a;
    }
    .ibox-title{
      padding: 0px;
      border: none;
      margin-left: 1em;
      font-family: unisansboldbold
      }

      .ibox-title h2{
        font-weight: 100;
        font-size: 2.5em;
      }

    .ibox-content{
      margin: 1em;
      margin-top:1em;
      padding: 0px;
      color: #0b2a4a !important;
    }
    .table{
      font-size: 1.1em;
    }
    .table thead tr th{
      padding-bottom: 23px;
    }
    .table tr th,.table tr td{
      text-align: center !important;
      font-family: unisansboldbold;
      font-weight: 100 !important;
    }

    .table tbody tr td{
      font-family: unisansregularregular;
      font-weight: 100 !important;
    }

    .table tr td{
        color: #34a691
    }
    .table-striped>tbody>tr:nth-of-type(odd){
      background-color: #dbddde
    }
    .button.dim{
      margin:0px !important
    }
    .fa-eye{
      color: #34a691 !important;
      font-size: 1.5em;
    }
    .fa-trash-o{
      color: #34a691 !important;
    }

    .input-group{
        display: inline-block
    }
    .frm-grp{
        margin-bottom: 15px;
    }
    input[type=checkbox]{
        height: 20px;
        width: 20px;
        margin: 0px;
        float: left;
    }
    .amenities_label{
        vertical-align: top;
        margin-left: 5px;
    }

    .deleteImage i{
        position: absolute;
        right: 25px;
        font-size: 22px;
        background: rgba(0,0,0,0.5);
        padding: 5px;
        color: rgba(255,0,0,0.8);
        cursor: pointer;
        border-radius: 5px;
    }
    #gallery-img{
        margin-top: 10px;
    }
    .radio{
        display: none;
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
  .modal-footer{
    text-align: left;
  }
    .input-group-append{
        display: -ms-flexbox;
        display: flex;
        position: absolute;
        z-index: 9;
        right: 16px;
        top: 1px;
    }
    .input-group-text {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding: .375rem .75rem;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        text-align: center;
        white-space: nowrap;
        background-color: #e9ecef;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        padding: 7.5px;
    }
    .input-group-append {
        margin-left: -1px;
    }
  
  </style>

@endsection
@section('body')
<div id="" class="seller_detail min_height_974px">
    <div class="wrapper wrapper-content custom-container-a">
        <div class="row animated fadeInRight allproperty_header">
            <div class="col-md-12">
                <p style="text-transform:capitalize"><a href="{{ URL::previous() }}"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
            </div>

            <?php
            if(isset($edit_properties)) {
                $details = $edit_properties->detail()->first();
                $items = $edit_properties->items()->first();
                $images = $edit_properties->images()->get();
            }
            ?>

            
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h2>
                            @if(app('request')->input('pid'))         
                                Edit Property
                            @else
                                Add New Property
                            @endif
                        </h2>
                        @if (session('status'))
                            <div class="alert">
                                <h3>{{ session('status') }}</h3>
                            </div>
                        @endif
                    </div>
                    <div class="ibox-content text-left" style='padding:2em'>
                        <div class="col-md-8">
                            <form action="{{ route('StoreProerpty') }}" method="post" id="property-form" enctype="multipart/form-data">
                                @csrf
                                <input type='hidden' name='phase' value='{{$redirect_var}}'>
                                <input type='hidden' name='is_edit' value='{{ app('request')->input('pid') ?? '-99' }}'>
                                <div class="row">                                
                                    <div class="col-xs-12">
                                        <div class="frm-grp{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label for="">Street No, Street Name*</label> <br>
                                            <input type="text" name='address' value='{{ $edit_properties->address ?? ""}}' class='form-control validate[required,maxSize[25]]'>
                                            <small class="text-danger">{{ $errors->first('address') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('city') ? ' has-error' : '' }}">
                                            <label for="">City*</label> <br>
                                            <input type="text" name='city' value='{{$edit_properties->city ?? ""}}' class='form-control validate[required,maxSize[25]]'>
                                            <small class="text-danger">{{ $errors->first('city') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('state') ? ' has-error' : '' }}">
                                            <label for="">State*</label> <br>
                                            <select name="state" class='form-control validate[required]' id="">
                                                @foreach($state as $zip)
                                                    @if(isset($edit_properties) && $edit_properties->state == $zip->state)
                                                        <option value='{{$zip->state}}' selected>{{$zip->state}}</option>
                                                    @else
                                                        <option value='{{$zip->state}}'>{{$zip->state}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <small class="text-danger">{{ $errors->first('state') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('zip') ? ' has-error' : '' }}">
                                            <label for="">Zip Code*</label> <br>
                                            <input type="number" name='zip' value='{{$edit_properties->zip ?? ""}}' class='form-control validate[required,minSize[5],maxSize[5]]'>
                                            <small class="text-danger">{{ $errors->first('zip') }}</small>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name='lat' value='' class='form-control'>
                                    <input type="hidden" name='long' value='' class='form-control'>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('floors') ? ' has-error' : '' }}">
                                            <label for="">Floors*</label> <br>
                                            <input type="number" name='floors' value='{{$details->floors ?? ""}}' class='form-control validate[required,min[0],maxSize[2]]'>
                                            <small class="text-danger">{{ $errors->first('floors') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('bedroom') ? ' has-error' : '' }}">
                                            <label for="">Bed Rooms*</label> <br>
                                            <input type="number" name='bedroom' value='{{$details->bedroom ?? ""}}' class='form-control validate[required,min[0],maxSize[2]]'>
                                            <small class="text-danger">{{ $errors->first('bedroom') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('bathroom') ? ' has-error' : '' }}">
                                            <label for="">Bathroom*</label> <br>
                                            <input type="number" step=".01" name='bathroom' value='{{$details->bathroom ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('bathroom') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('square_footage') ? ' has-error' : '' }}">
                                            <label for="">Sqr. Ft</label> <br>
                                            <input type="text" step=".01" name='square_footage' value='{{$details->square_footage ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('square_footage') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('price_per_sqft') ? ' has-error' : '' }}">
                                            <label for="">Price Per Sqft</label> <br>
                                            <input type="number" step=".01" name='price_per_sqft' value='{{$details->price_per_sqft ?? ""}}' class='form-control validate[min[0],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('price_per_sqft') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('lot_size') ? ' has-error' : '' }}">
                                            <label for="">Lot Size</label> <br>
                                            <input type="text" name='lot_size' value='{{$details->lot_size ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('lot_size') }}</small>
                                        </div>
                                    </div>
                                    <input type="hidden" name='stories' value='0'>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('property_type') ? ' has-error' : '' }}">
                                            <label for="">Property Type*</label> <br>
                                            <select name="property_type" class='form-control validate[required]' id="">
                                                @if(isset($details) && $details->property_type == 'Single-family Home')
                                                    <option selected value="Single-family Home">Single-family Home</option>
                                                @else
                                                    <option  value="Single-family Home">Single-family Home</option>
                                                @endif
                                                @if(isset($details) && $details->property_type == 'Multi-family Home')
                                                    <option selected value="Multi-family Home">Multi-family Home</option>
                                                @else
                                                    <option  value="Multi-family Home">Multi-family Home</option>
                                                @endif
                                                @if(isset($details) && $details->property_type == 'Duplex')
                                                    <option selected value="Duplex">Duplex</option>
                                                @else
                                                    <option  value="Duplex">Duplex</option>
                                                @endif
                                                @if(isset($details) && $details->property_type == 'Twin Home')
                                                    <option selected value="Twin Home">Twin Home</option>
                                                @else
                                                    <option  value="Twin Home">Twin Home</option>
                                                @endif
                                                @if(isset($details) && $details->property_type == 'Townhome')
                                                    <option selected value="Townhome">Townhome</option>
                                                @else
                                                    <option  value="Townhome">Townhome</option>
                                                @endif
                                                @if(isset($details) && $details->property_type == 'Row House')
                                                    <option selected value="Row House">Row House</option>
                                                @else
                                                    <option  value="Row House">Row House</option>
                                                @endif
                                                @if(isset($details) && $details->property_type == 'Manufactured Home')
                                                    <option selected value="Manufactured Home">Manufactured Home</option>
                                                @else
                                                    <option  value="Manufactured Home">Manufactured Home</option>
                                                @endif
                                                @if(isset($details) && $details->property_type == 'Prefab-Modular Home')
                                                    <option selected value="Prefab-Modular Home">Prefab-Modular Home</option>
                                                @else
                                                    <option  value="Prefab-Modular Home">Prefab-Modular Home</option>
                                                @endif
                                            </select>
                                            <small class="text-danger">{{ $errors->first('property_type') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('built') ? ' has-error' : '' }}">
                                            <label for="">Year Built*</label> <br>
                                            <input type="text" name='built' value='{{$details->built ?? ""}}' class='form-control validate[minSize[4],maxSize[4]]'>
                                            <small class="text-danger">{{ $errors->first('built') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('neighborhood') ? ' has-error' : '' }}">
                                            <label for="">Neighborhood</label> <br>
                                            <input type="text" name='neighborhood' value='{{$details->neighborhood ?? ""}}' class='form-control validate[maxSize[20]]'>
                                            <small class="text-danger">{{ $errors->first('neighborhood') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('county') ? ' has-error' : '' }}">
                                            <label for="">County*</label> <br>
                                            <select name="county" class='form-control validate[required]' id="">
                                                <option value="">Select County</option>
                                                @foreach($county as $zip)
                                                    @if(isset($details) && $details->county == $zip->county)
                                                        <option value='{{$zip->county}}' selected>{{$zip->county}}</option>
                                                    @else
                                                        <option value='{{$zip->county}}'>{{$zip->county}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <small class="text-danger">{{ $errors->first('county') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('mortgage') ? ' has-error' : '' }}">
                                            <label for="">Mortgage*</label> <br>
                                            <input type="text" name='mortgage' value='{{$details->mortgage ?? ""}}' class='form-control amountComma validate[required,min[0]]'>
                                            <small class="text-danger">{{ $errors->first('mortgage') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('insurance') ? ' has-error' : '' }}">
                                            <label for="">Insurance*</label> <br>
                                            <input type="text" name='insurance' value='{{$details->insurance ?? ""}}' class='form-control amountComma validate[required,min[0]]'>
                                            <small class="text-danger">{{ $errors->first('insurance') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('tax') ? ' has-error' : '' }}">
                                            <label for="">Tax*</label> <br>
                                            <input type="text" name='tax' value='{{$details->tax ?? ""}}' class='form-control amountComma validate[required,min[0]]'>
                                            <small class="text-danger">{{ $errors->first('tax') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('building_type') ? ' has-error' : '' }}">
                                            <label for="">Building Type</label> <br>
                                            <select name="building_type" class='form-control' id="">
                                                @if(isset($details) && $details->building_type == 'Residential Buildings')
                                                    <option selected value="Residential Buildings">Residential Buildings</option>
                                                @else
                                                    <option  value="Residential Buildings">Residential Buildings</option>
                                                @endif
                                                @if(isset($details) && $details->building_type == 'Business Buildings')
                                                    <option selected value="Business Buildings">Business Buildings</option>
                                                @else
                                                    <option  value="Business Buildings">Business Buildings</option>
                                                @endif
                                                @if(isset($details) && $details->building_type == 'Industrial Buildings')
                                                    <option selected value="Industrial Buildings">Industrial Buildings</option>
                                                @else
                                                    <option  value="Industrial Buildings">Industrial Buildings</option>
                                                @endif
                                                @if(isset($details) && $details->building_type == 'Storage Buildings')
                                                    <option selected value="Storage Buildings">Storage Buildings</option>
                                                @else
                                                    <option  value="Storage Buildings">Storage Buildings</option>
                                                @endif
                                                @if(isset($details) && $details->building_type == 'Mixed Land Use Buildings')
                                                    <option selected value="Mixed Land Use Buildings">Mixed Land Use Buildings</option>
                                                @else
                                                    <option  value="Mixed Land Use Buildings">Mixed Land Use Buildings</option>
                                                @endif
                                                @if(isset($details) && $details->building_type == 'Detached Buildings')
                                                    <option selected value="Detached Buildings">Detached Buildings</option>
                                                @else
                                                    <option  value="Detached Buildings">Detached Buildings</option>
                                                @endif
                                                @if(isset($details) && $details->building_type == 'Semi Detached')
                                                    <option selected value="Semi Detached">Semi Detached</option>
                                                @else
                                                    <option  value="Semi Detached">Semi Detached</option>
                                                @endif
                                            </select>
                                            <small class="text-danger">{{ $errors->first('building_type') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('investment_price') ? ' has-error' : '' }}">
                                            <label for="">Ask Price</label> <br>
                                            <input type="text" name='investment_price' value='{{$details->investment_price ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('investment_price') }}</small>
                                        </div>
                                    </div>
                                    <!--<div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('during_date') ? ' has-error' : '' }}">
                                            <label for="">During Date*</label> <br>
                                            <input type="text" name='during_date' value='{{$edit_properties->during_date ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('during_date') }}</small>
                                        </div>
                                    </div>-->
                                    <input type="hidden" name='during_date' value='{{$details->during_date ?? ""}}'>
                                    <input type="hidden" name='about' value="">
                                    
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label for="">Phone Number</label> <br>
                                            <input type="number" name='phone' value='{{$details->phone ?? ""}}' class='form-control validate[minSize[10],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        </div>
                                    </diV>                                    
                                    <div class="col-xs-12">
                                        <div class="frm-grp{{ $errors->has('for_sale') ? ' has-error' : '' }}">
                                            <label for="">For Sale</label> <br>
                                            <label class="radio-inline">
                                            @if(isset($details))
                                                @if($details->for_sale == 1)                                    
                                                    <input type="radio" name="for_sale" id="inlineRadio1" checked value="1"> Yes
                                                @else
                                                    <input type="radio" name="for_sale" id="inlineRadio1" value="1"> Yes
                                                @endif
                                            @else
                                                <input type="radio" name="for_sale" id="inlineRadio1" checked value="1"> Yes
                                            @endif
                                            </label>
                                            <label class="radio-inline">
                                            @if(isset($details))
                                                @if($details->for_sale == 0)  
                                                    <input type="radio" name="for_sale" id="inlineRadio2" checked value="0"> No
                                                @else
                                                    <input type="radio" name="for_sale" id="inlineRadio2" value="0"> No
                                                @endif
                                            @else
                                                <input type="radio" name="for_sale" id="inlineRadio2" value="0"> No
                                            @endif
                                            </label>
                                            <small class="text-danger">{{ $errors->first('for_sale') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="frm-grp{{ $errors->has('partner_up') ? ' has-error' : '' }}">
                                            <label for="">Partner Up</label> <br>
                                            <label class="radio-inline">
                                            @if(isset($details))
                                                @if($details->partner_up == 1) 
                                                    <input type="radio" checked name="partner_up" class="partner_up" value="1">Yes    
                                                @else
                                                    <input type="radio" name="partner_up" class="partner_up" value="1">Yes
                                                @endif
                                            @else
                                                <input type="radio" name="partner_up" class="partner_up" value="1">Yes
                                            @endif
                                            </label>
                                            <label class="radio-inline">
                                            @if(isset($details))
                                                @if($details->partner_up == 0) 
                                                    <input type="radio" name="partner_up" class="partner_up" checked value="0"> No
                                                @else
                                                    <input type="radio" name="partner_up" class="partner_up" value="0"> No
                                                @endif
                                            @else
                                                <input type="radio" name="partner_up" class="partner_up" checked value="0"> No
                                            @endif
                                            </label>
                                            <small class="text-danger">{{ $errors->first('partner_up') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="frm-grp{{ $errors->has('partner_up') ? ' has-error' : '' }}">
                                            <label for="">Partner Up</label> <br>
                                            <label class="radio-inline">
                                            @if(isset($details))
                                                @if($details->partner_up == 1) 
                                                    <input type="radio" checked name="partner_up" class="partner_up" value="1">Yes    
                                                @else
                                                    <input type="radio" name="partner_up" class="partner_up" value="1">Yes
                                                @endif
                                            @else
                                                <input type="radio" name="partner_up" class="partner_up" value="1">Yes
                                            @endif
                                            </label>
                                            <label class="radio-inline">
                                            @if(isset($details))
                                                @if($details->partner_up == 0) 
                                                    <input type="radio" name="partner_up" class="partner_up" checked value="0"> No
                                                @else
                                                    <input type="radio" name="partner_up" class="partner_up" value="0"> No
                                                @endif
                                            @else
                                                <input type="radio" name="partner_up" class="partner_up" checked value="0"> No
                                            @endif
                                            </label>
                                            <small class="text-danger">{{ $errors->first('partner_up') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('brv_price') ? ' has-error' : '' }}">
                                            <label for="">Before Renovation Value (BRV) <i class="fa fa-info-circle" title="Before Renovation Value"></i></label> <br>
                                            <input type="text" name='brv_price' value='{{$details->brv_price ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('brv_price') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('estimated_repair_cost') ? ' has-error' : '' }}">
                                            <label for="">Estimated Repair Cost <i class="fa fa-info-circle" title="Estimated Repair Cost"></i></label> <br>
                                            <input type="text" name='estimated_repair_cost' value='{{$details->estimated_repair_cost ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('estimated_repair_cost') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="frm-grp{{ $errors->has('arv_price') ? ' has-error' : '' }}">
                                            <label for="">Estimated After Renovation Value (ARV) <i class="fa fa-info-circle" title="After Renovation Value"></i></label> <br>
                                            <input type="text" name='arv_price' value='{{$details->arv_price ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('arv_price') }}</small>
                                        </div>
                                    </div>
                                    <div class="display_partner_share">
                                        <div class="col-xs-12">
                                            <label for="">Partnership % Share</label>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="frm-grp{{ $errors->has('partnership_seller') ? ' has-error' : '' }}">
                                                <input type="number" name='partnership_seller' value='{{$details->partnership_seller ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Seller %</span>
                                                </div>
                                                <small class="text-danger">{{ $errors->first('partnership_seller') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="frm-grp{{ $errors->has('partnership_investor') ? ' has-error' : '' }}">
                                                <input type="number" name='partnership_investor' value='{{$details->partnership_investor ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]' >
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Investor %</span>
                                                </div>
                                                <small class="text-danger">{{ $errors->first('partnership_investor') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <h2><b>Images</b></h2>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;margin-bottom: 15px;">
                                        <div class="col-xs-12">
                                            <label class="filename_label" for="filename">Select Property Images</label>
                                            <input type="file" id="filename" name="filename[]" class="form-control" multiple>
                                            <small class="text-danger">{{ $errors->first('filename') }}</small>
                                            <div id="gallery-img"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <h2><b>Amenities</b></h2>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="burglar_alarm">Burglar Alarm</label>
                                            <input type="checkbox" name='burglar_alarm' value="1" @isset($items) {{$items->burglar_alarm == 1 ? 'checked' : ''}} @endisset id="burglar_alarm">
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="smoke_detector">Smoke Detector</label>
                                            <input type="checkbox" name='smoke_detector' value="1"  @isset($items) {{$items->smoke_detector == 1 ? 'checked' : ''}} @endisset id='smoke_detector'>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="fire_alarm">Fire Alarm</label>
                                            <input type="checkbox" name='fire_alarm' value="1" @isset($items) {{$items->fire_alarm == 1 ? 'checked' : ''}} @endisset id='fire_alarm'>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="central_air">Central Air</label>
                                            <input type="checkbox" name='central_air' value="1"  @isset($items) {{$items->central_air == 1 ? 'checked' : ''}} @endisset id='central_air'>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="central_heating">Central Heating</label>
                                            <input type="checkbox" name='central_heating' value="1"  @isset($items) {{$items->central_heating == 1 ? 'checked' : ''}} @endisset id='central_heating'>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="window_ac">Window AC</label>
                                            <input type="checkbox" name='window_ac' value="1"  @isset($items) {{$items->window_ac == 1 ? 'checked' : ''}} @endisset id='window_ac'>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="dishwasher">Dishwasher</label>
                                            <input type="checkbox" name='dishwasher' value="1"  @isset($items) {{$items->dishwasher == 1 ? 'checked' : ''}} @endisset id='dishwasher'>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="trash_compactor">Trash Compactor</label>
                                            <input type="checkbox" name='trash_compactor' value="1"  @isset($items) {{$items->trash_compactor == 1 ? 'checked' : ''}} @endisset id='trash_compactor'>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="garbage_disposal">Garbage Disposal</label>
                                            <input type="checkbox" name='garbage_disposal' value="1"  @isset($items) {{$items->garbage_disposal == 1 ? 'checked' : ''}} @endisset id='garbage_disposal'>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="oven">Oven</label>
                                            <input type="checkbox" name='oven' value="1"  @isset($items) {{$items->oven == 1 ? 'checked' : ''}} @endisset id='oven'>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="microwave">Microwave</label>
                                            <input type="checkbox" name='microwave' value="1"  @isset($items) {{$items->microwave == 1 ? 'checked' : ''}} @endisset id='microwave'>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="tv_antenna">TV Antenna</label>
                                            <input type="checkbox" name='tv_antenna' value="1"  @isset($items) {{$items->tv_antenna == 1 ? 'checked' : ''}} @endisset id='tv_antenna'>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="satelite_dish">Satelite Dish</label>
                                            <input type="checkbox" name='satelite_dish' value="1"  @isset($items) {{$items->satelite_dish == 1 ? 'checked' : ''}} @endisset id='satelite_dish'>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="intercom_system">Intercom System</label>
                                            <input type="checkbox" name='intercom_system' value="1"  @isset($items) {{$items->intercom_system == 1 ? 'checked' : ''}} @endisset id='intercom_system'>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="pool">Pool</label>
                                            <input type="checkbox" name='pool' value="1"  @isset($items) {{$items->pool == 1 ? 'checked' : ''}} @endisset id='pool'>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="washer_dryer">Washer Dryer</label>
                                            <input type="checkbox" name='washer_dryer' value="1"  @isset($items) {{$items->washer_dryer == 1 ? 'checked' : ''}} @endisset id='washer_dryer'>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="hot_tub">Hot Tub</label>
                                            <input type="checkbox" name='hot_tub' value="1"  @isset($items) {{$items->hot_tub == 1 ? 'checked' : ''}} @endisset id='hot_tub'>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="washer">Washer</label>
                                            <input type="checkbox" name='washer' value="1"  @isset($items) {{$items->washer == 1 ? 'checked' : ''}} @endisset id='washer'>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="dryer">Dryer</label>
                                            <input type="checkbox" name='dryer' value="1"  @isset($items) {{$items->dryer == 1 ? 'checked' : ''}} @endisset id='dryer'>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="refrigerator">Refrigerator</label>
                                            <input type="checkbox" name='refrigerator' value="1"  @isset($items) {{$items->refrigerator == 1 ? 'checked' : ''}} @endisset id='refrigerator'>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="padding:0px;">
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="pool_barrier">Pool Barrier</label>
                                            <input type="checkbox" name='pool_barrier' value="1"  @isset($items) {{$items->pool_barrier == 1 ? 'checked' : ''}} @endisset id='pool_barrier'>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="amenities_label" for="safety_cover_hottub">Safety Cover Hottub</label>
                                            <input type="checkbox" name='safety_cover_hottub' value="1"  @isset($items) {{$items->safety_cover_hottub == 1 ? 'checked' : ''}} @endisset id='safety_cover_hottub'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::submit("Post", ['class' => 'btn btn-success','style'=>'color:white;width:120px;padding:.8em']) !!}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#deleteImageConf" id="DeleteImageButton" class="trigger-btn" style="display:none;" data-toggle="modal">Modal</a>
<div id="deleteImageConf" class="modal fade">
    <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header">
          <div class="icon-box">
            <i class="fa fa-trash"></i>
          </div>        
          <h4 class="modal-title">Are you sure?</h4>  
          <button type="button" class="close closeDeleteModal" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete these image? This process cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <a id="delImageButton" style="line-height: 30px;color:#fff;" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
</div>


@endsection
@section('script')
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>

        function numberWithCommas(number) {
            var parts = number.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }
        $(".amountComma").on('keyup', function(){
            var num = $(this).val().replace(/,/g , '');
            num = num.replace(/[^0-9.]/g,'');
            var commaNum = numberWithCommas(num);
            $(this).val(commaNum);
        });

        $(document).ready(function() {
            $(".amountComma").each(function() {
                var num = $(this).val();
                var commaNum = numberWithCommas(num);
                $(this).val(commaNum);
            });

            $('.content').summernote();
            $('.textbelow').summernote(); +
            // $.validator.addMethod('latCoord', function(value, element) {
            //     return this.optional(element) ||
            //     value.length >= 4 && /^(?=.)-?((8[0-5]?)|([0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/.test(value);
            // }, 'Your Latitude format has error.')

            // $.validator.addMethod('longCoord', function(value, element) {
            //     return this.optional(element) ||
            //     value.length >= 4 && /^(?=.)-?((0?[8-9][0-9])|180|([0-1]?[0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/.test(value);
            // }, 'Your Longitude format has error.')
            $("#property-form").validationEngine('attach', {
                promptPosition : "inline", 
                scroll: false
            });
        });    

        
        $("select[name=state]").on('change', function(){
            state_name = $(this).find("option:selected").text();
            $.ajax({
                url    : '{{ ENV('APP_URL') }}/getCounty',
                method : "POST",
                data : {state_name:state_name, _token:"{{csrf_token()}}"},
                dataType : "text",
                success : function (responses)
                {
                    $("select[name=county]").html(responses);
                }
            });
        });

        <?php
        if(isset($edit_properties)) {
        ?>
        $('#gallery-img').html("Loading Images..");
        $.ajax({
            type    : 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url     : '{{ route("getProerptyImages") }}',
            data    : {pid: parseInt(<?php echo app('request')->input('pid'); ?>)},
            success : function(response) {
              if (response.status == true) {
                $('#gallery-img').html(response.data);
              }
              else{
                $('#gallery-img').html("No Images found");
              }
            }
        });
        <?php
        }
        ?>
        $(document).on("click", ".deleteImage", function(){
            $("#DeleteImageButton").click();
            var id = $(this).data('id');
            var dis = $(this);
            $('#delImageButton').attr('data-id',id);
        });


        $(document).on("click", "#delImageButton", function(){
            var id = $(this).data('id');
            var dis = $(this);

            $.ajax({
                type    : 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url     : '{{ route("deletePropertyImg") }}',
                data    : {id: id},
                success : function(response) {
                    $(".close").click();
                    $('.deleteImage[data-id="'+id+'"]').parent().parent().remove();
                }
            });

        }); 

        <?php 
            if(isset($details)){
                if($details->partner_up == 0){
                ?>
                    $(".display_partner_share").hide();
                <?php
                }
                else{
                ?>
                    $(".display_partner_share").show();
                <?php
                }
            }
            else{
                ?>
                $(".display_partner_share").hide();
                <?php
            }
            ?>

        $(".partner_up").change(function (){
            var val = $(this).val();
            if(val == 1){
                $(".display_partner_share").show();
            }
            else{
                $(".display_partner_share").hide();
            }
        });
    </script>

@endsection