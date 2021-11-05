@extends('layouts.realtor-layout')
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

            
            <div class="form-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 form-content">
                            <h2 class="text-capitalize pl-4"><span class="property-icon"></span><?php echo (app('request')->input('pid') !== null ? "Edit Property:".app('request')->input('pid') : "Add new property")  ?></h2>
                            <form action="{{ route('SellerStoreProerpty') }}" method="post" id="property-form" class="mt-4" enctype="multipart/form-data">
                            @csrf
                            <input type='hidden' name='phase' value='{{$redirect_var}}'>
                            <input type='hidden' name='is_edit' value="{{ app('request')->input('pid') ?? '-99' }}">
                                <div class="step-1">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="street_no_name">Street No. Street Name*</label>
                                            <input type="text" name='address' value='{{ $edit_properties->address ?? ""}}' class='form-control validate[required,maxSize[25]]'>
                                            <small class="text-danger">{{ $errors->first('address') }}</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="city">City*</label> <br>
                                            <input type="text" name='city' value='{{$edit_properties->city ?? ""}}' class='form-control validate[required,maxSize[25]]'>
                                            <small class="text-danger">{{ $errors->first('city') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="state">State*</label> <br>
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
                                        <div class="form-group col-md-6">
                                            <label for="zip_code">Zip Code*</label> <br>
                                            <input type="number" name='zip' value='{{$edit_properties->zip ?? ""}}' class='form-control validate[required,minSize[5],maxSize[5]]'>
                                            <small class="text-danger">{{ $errors->first('zip') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="floors">Floors*</label> <br>
                                            <input type="number" name='floors' value='{{$details->floors ?? ""}}' class='form-control validate[required,min[0],maxSize[2]]'>
                                            <small class="text-danger">{{ $errors->first('floors') }}</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="bedroom">Bed Rooms*</label> <br>
                                            <input type="number" name='bedroom' value='{{$details->bedroom ?? ""}}' class='form-control validate[required,min[0],maxSize[2]]'>
                                            <small class="text-danger">{{ $errors->first('bedroom') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="bathroom">Bathroom*</label> <br>
                                            <input type="number" step=".01" name='bathroom' value='{{$details->bathroom ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('bathroom') }}</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lot_size">Lot Size</label> <br>
                                            <input type="text" name='lot_size' value='{{$details->lot_size ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('lot_size') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Property Type*</label> <br>
                                            <select name="property_type" class='form-control validate[required]' id="">
                                            <?php
                                                $property_types = ["Single-family Home", "Multi-family Home", "Duplex", "Twin Home", "Townhome", "Row House", "Manufactured Home", "Prefab-Modular Home"];
                                                foreach($property_types as $property_type)
                                                {
                                                    if(isset($details) && $details->property_type == $property_type)
                                                    {
                                                        echo '<option selected value="'.$property_type.'">'.$property_type.'</option>';
                                                    }
                                                    else
                                                    {
                                                        echo '<option value="'.$property_type.'">'.$property_type.'</option>';
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Year Built*</label> <br>
                                            <input type="text" name='built' value='{{$details->built ?? ""}}' class='form-control validate[required,minSize[4],maxSize[4]]'>
                                            <small class="text-danger">{{ $errors->first('built') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Neighborhood</label> <br>
                                            <input type="text" name='neighborhood' value='{{$details->neighborhood ?? ""}}' class='form-control validate[maxSize[20]]'>
                                            <small class="text-danger">{{ $errors->first('neighborhood') }}</small>
                                        </div>
                                        <div class="form-group col-md-6">
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
                                    <div class="form-row hide">
                                        <div class="form-group col-md-6">
                                            <label for="">Mortgage <sub>(Monthly)</sub>*</label> <br>
                                            <input type="text" name='mortgage' value='{{$details->mortgage ?? ""}}' class='form-control amountComma validate[required,min[0]]' value="0">
                                            <small class="text-danger">{{ $errors->first('mortgage') }}</small>    
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Insurance <sub>(Monthly)</sub>*</label> <br>
                                            <input type="text" name='insurance' value='{{$details->insurance ?? ""}}' class='form-control amountComma validate[required,min[0]]' value="0">
                                            <small class="text-danger">{{ $errors->first('insurance') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 hide">
                                            <label for="">Tax <sub>(Monthly)</sub>*</label> <br>
                                            <input type="text" name='tax' value='{{$details->tax ?? ""}}' class='form-control amountComma validate[required,min[0]]' value="0">
                                            <small class="text-danger">{{ $errors->first('tax') }}</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Building Type</label> <br>
                                            <select name="building_type" class='form-control' id="">
                                            <?php
                                                $building_types = ["Residential Buildings", "Business Buildings", "Industrial Buildings", "Storage Buildings", "Mixed Land Use Buildings", "Detached Buildings", "Semi Detached"];
                                                foreach($building_types as $building_type)
                                                {
                                                    if(isset($details) && $details->building_type == $building_type)
                                                    {
                                                        echo '<option selected value="'.$building_type.'">'.$building_type.'</option>';
                                                    }
                                                    else
                                                    {
                                                        echo '<option value="'.$building_type.'">'.$building_type.'</option>';
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Phone Number</label> <br>
                                            <input type="number" name='phone' value='{{$details->phone ?? ""}}' class='form-control validate[minSize[10],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Email</label> <br>
                                            <input type="email" name='seller_email' value='{{$details->seller_email ?? ""}}' class='form-control validate[required]'>
                                            <small class="text-danger">{{ $errors->first('seller_email') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="">Description</label> <br>
                                            <textarea name='about' class='form-control'>{{$details->about ?? ""}}</textarea>
                                            <small class="text-danger">{{ $errors->first('about') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="">
                                                <label for="">For Sale</label> <br>
                                                <label class="radio-inline">
                                                @if(isset($details))
                                                    @if($details->for_sale == 1)                                    
                                                        <input type="radio" name="for_sale" id="for_sale_yes" checked value="1"> Yes
                                                    @else
                                                        <input type="radio" name="for_sale" id="for_sale_yes" value="1"> Yes
                                                    @endif
                                                @else
                                                    <input type="radio" name="for_sale" id="for_sale_yes" checked value="1"> Yes
                                                @endif
                                                </label>
                                                <label class="radio-inline">
                                                @if(isset($details))
                                                    @if($details->for_sale == 0)  
                                                        <input type="radio" name="for_sale" id="for_sale_no" checked value="0"> No
                                                    @else
                                                        <input type="radio" name="for_sale" id="for_sale_no" value="0"> No
                                                    @endif
                                                @else
                                                    <input type="radio" name="for_sale" id="for_sale_no" value="0"> No
                                                @endif
                                                </label>
                                                <small class="text-danger">{{ $errors->first('for_sale') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 for_sale_row">
                                            <label for="">Ask Price*</label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='investment_price' id='investment_price' value='{{$details->investment_price ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            </div>
                                            
                                            <small class="text-danger">{{ $errors->first('investment_price') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h3><b>Images</b></h3>
                                            <label class="filename_label" for="filename">Select Property Images</label>
                                            <input type="file" id="filename" name="filename[]" class="form-control" multiple>
                                            <small class="text-danger">{{ $errors->first('filename') }}</small>
                                            <div id="gallery-img"></div>
                                        </div>
                                    </div>
                                    <div class="form-row aminities">
                                        <div class="col-md-12">
                                            <h3><b>Amenities</b></h3>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="burglar_alarm">Burglar Alarm</label>
                                            <input type="checkbox" name='burglar_alarm' value="1" @isset($items) {{$items->burglar_alarm == 1 ? 'checked' : ''}} @endisset id="burglar_alarm">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="smoke_detector">Smoke Detector</label>
                                            <input type="checkbox" name='smoke_detector' value="1"  @isset($items) {{$items->smoke_detector == 1 ? 'checked' : ''}} @endisset id='smoke_detector'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="fire_alarm">Fire Alarm</label>
                                            <input type="checkbox" name='fire_alarm' value="1" @isset($items) {{$items->fire_alarm == 1 ? 'checked' : ''}} @endisset id='fire_alarm'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="central_air">Central Air</label>
                                            <input type="checkbox" name='central_air' value="1"  @isset($items) {{$items->central_air == 1 ? 'checked' : ''}} @endisset id='central_air'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="central_heating">Central Heating</label>
                                            <input type="checkbox" name='central_heating' value="1"  @isset($items) {{$items->central_heating == 1 ? 'checked' : ''}} @endisset id='central_heating'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="window_ac">Window AC</label>
                                            <input type="checkbox" name='window_ac' value="1"  @isset($items) {{$items->window_ac == 1 ? 'checked' : ''}} @endisset id='window_ac'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="dishwasher">Dishwasher</label>
                                            <input type="checkbox" name='dishwasher' value="1"  @isset($items) {{$items->dishwasher == 1 ? 'checked' : ''}} @endisset id='dishwasher'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="trash_compactor">Trash Compactor</label>
                                            <input type="checkbox" name='trash_compactor' value="1"  @isset($items) {{$items->trash_compactor == 1 ? 'checked' : ''}} @endisset id='trash_compactor'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="garbage_disposal">Garbage Disposal</label>
                                            <input type="checkbox" name='garbage_disposal' value="1"  @isset($items) {{$items->garbage_disposal == 1 ? 'checked' : ''}} @endisset id='garbage_disposal'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="oven">Oven</label>
                                            <input type="checkbox" name='oven' value="1"  @isset($items) {{$items->oven == 1 ? 'checked' : ''}} @endisset id='oven'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="microwave">Microwave</label>
                                            <input type="checkbox" name='microwave' value="1"  @isset($items) {{$items->microwave == 1 ? 'checked' : ''}} @endisset id='microwave'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="tv_antenna">TV Antenna</label>
                                            <input type="checkbox" name='tv_antenna' value="1"  @isset($items) {{$items->tv_antenna == 1 ? 'checked' : ''}} @endisset id='tv_antenna'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="satelite_dish">Satelite Dish</label>
                                            <input type="checkbox" name='satelite_dish' value="1"  @isset($items) {{$items->satelite_dish == 1 ? 'checked' : ''}} @endisset id='satelite_dish'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="intercom_system">Intercom System</label>
                                            <input type="checkbox" name='intercom_system' value="1"  @isset($items) {{$items->intercom_system == 1 ? 'checked' : ''}} @endisset id='intercom_system'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="pool">Pool</label>
                                            <input type="checkbox" name='pool' value="1"  @isset($items) {{$items->pool == 1 ? 'checked' : ''}} @endisset id='pool'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="washer_dryer">Washer Dryer</label>
                                            <input type="checkbox" name='washer_dryer' value="1"  @isset($items) {{$items->washer_dryer == 1 ? 'checked' : ''}} @endisset id='washer_dryer'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="hot_tub">Hot Tub</label>
                                            <input type="checkbox" name='hot_tub' value="1"  @isset($items) {{$items->hot_tub == 1 ? 'checked' : ''}} @endisset id='hot_tub'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="washer">Washer</label>
                                            <input type="checkbox" name='washer' value="1"  @isset($items) {{$items->washer == 1 ? 'checked' : ''}} @endisset id='washer'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="dryer">Dryer</label>
                                            <input type="checkbox" name='dryer' value="1"  @isset($items) {{$items->dryer == 1 ? 'checked' : ''}} @endisset id='dryer'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="refrigerator">Refrigerator</label>
                                            <input type="checkbox" name='refrigerator' value="1"  @isset($items) {{$items->refrigerator == 1 ? 'checked' : ''}} @endisset id='refrigerator'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="pool_barrier">Pool Barrier</label>
                                            <input type="checkbox" name='pool_barrier' value="1"  @isset($items) {{$items->pool_barrier == 1 ? 'checked' : ''}} @endisset id='pool_barrier'>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="amenities_label" for="safety_cover_hottub">Safety Cover Hottub</label>
                                            <input type="checkbox" name='safety_cover_hottub' value="1"  @isset($items) {{$items->safety_cover_hottub == 1 ? 'checked' : ''}} @endisset id='safety_cover_hottub'>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-2">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <div class="">
                                                <label for="" class="font-20">Partner Up</label> <br>
                                                <label class="radio-inline font-15">
                                                @if(isset($details))
                                                    @if($details->partner_up == 1)                                    
                                                        <input type="radio" name="partner_up" id="partner_up_yes" checked value="1"> Yes
                                                    @else
                                                        <input type="radio" name="partner_up" id="partner_up_yes" value="1"> Yes
                                                    @endif
                                                @else
                                                    <input type="radio" name="partner_up" id="partner_up_yes" checked value="1"> Yes
                                                @endif
                                                </label>
                                                <label class="radio-inline font-15">
                                                @if(isset($details))
                                                    @if($details->partner_up == 0)  
                                                        <input type="radio" name="partner_up" id="partner_up_no" checked value="0"> No
                                                    @else
                                                        <input type="radio" name="partner_up" id="partner_up_no" value="0"> No
                                                    @endif
                                                @else
                                                    <input type="radio" name="partner_up" id="partner_up_no" value="0"> No
                                                @endif
                                                </label>
                                                <small class="text-danger">{{ $errors->first('partner_up') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-6">
                                            <label for="">Sqr.Ft*</label> <br>
                                            <input type="text" step=".01" name='square_footage' id='square_footage' value='{{$details->square_footage ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]] erc-calc-trigger'>
                                            <small class="text-danger">{{ $errors->first('square_footage') }}</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Price Per Sqr.Ft*</label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" step=".01" name='price_per_sqft' id='price_per_sqft' value='{{$details->price_per_sqft ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]]' readOnly>
                                            </div>
                                            
                                            <small class="text-danger">{{ $errors->first('price_per_sqft') }}</small>
                                        </div>
                                        
                                    </div>
                                    <hr class="partner_up_row">
                                    <div class="form-row partner_up_row pr-md-0 d-flex align-items-center home-condition">
                                        <!-- <div class="col-md-12 pr-md-0 d-flex align-items-center home-condition">
                                            <div class="form-row"> -->
                                                <div class="form-group col-md-4">
                                                    <h4 class="text-capitalize">Home condition</h4>
                                                </div>
                                                @if(isset($details))
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Basic <br> Renovaction <i class="fa fa-info-circle home-condition-info" title="Improvements to the kitchen, bathrooms, flooring and paint with some minor drywall work. This can be performed for between $20 to $30 for each square foot of the home. We use $25."></i>
                                                            <input type="checkbox" name="home_condition" value="1" {{ $details->home_condition == 1 ? "checked" : "" ?? ""}} >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Advanced <br> Renovaction <i class="fa fa-info-circle" title="Improvement consisting of the basic renovation plus a potential roof, siding, Heating/AC and other systems upgrades . This can typically be estimated at $50. per square foot."></i>
                                                            <input type="checkbox" name="home_condition" value="2" {{ $details->home_condition == 2 ? "checked" : "" ?? ""}} >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Full <br> Renovaction <i class="fa fa-info-circle" title="A full property gut includes the activities/improvements made in both the basic and advanced rehab but will additionally include framing, foundation, insulation, drywall, doors, windows and trim. This can typically be estimated at about $75 per square foot."></i>
                                                            <input type="checkbox" name="home_condition" value="3" {{ $details->home_condition == 3 ? "checked" : "" ?? ""}} >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Other
                                                            <input type="checkbox" name="home_condition" value="4" {{ $details->home_condition == 4 ? "checked" : "" ?? ""}} >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    @if($details->home_condition == '4')
                                                        <div class="form-group col-md-offset-10 col-md-2 other_home_condition">
                                                            <input type="text" name='other_home_condition_value' id='other_home_condition_value' value='{{$details->other_home_condition_value ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]] erc-calc-trigger'>
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-offset-10 col-md-2 d-none other_home_condition">
                                                            <input type="text" name='other_home_condition_value' id='other_home_condition_value' value='0' class='form-control amountComma validate[min[0],maxSize[10]] erc-calc-trigger'>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Basic <br> Renovaction <i class="fa fa-info-circle" title="Improvements to the kitchen, bathrooms, flooring and paint with some minor drywall work. This can be performed for between $20 to $30 for each square foot of the home. We use $25."></i>
                                                            <input type="checkbox" name="home_condition" value="1" >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Advanced <br> Renovaction <i class="fa fa-info-circle" title="Improvement consisting of the basic renovation plus a potential roof, siding, Heating/AC and other systems upgrades . This can typically be estimated at $50. per square foot."></i>
                                                            <input type="checkbox" name="home_condition" value="2" >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Full <br> Renovaction <i class="fa fa-info-circle" title="A full property gut includes the activities/improvements made in both the basic and advanced rehab but will additionally include framing, foundation, insulation, drywall, doors, windows and trim. This can typically be estimated at about $75 per square foot."></i>
                                                            <input type="checkbox" name="home_condition" value="3" >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="container text-center ml-3">Other
                                                            <input type="checkbox" name="home_condition" value="4" >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-offset-10 col-md-2 d-none other_home_condition">
                                                        <input type="text" name='other_home_condition_value' id='other_home_condition_value' value="0" class='form-control amountComma validate[min[0],maxSize[10]] erc-calc-trigger'>
                                                    </div>
                                                @endif
                                            <!-- </div>
                                        </div> -->
                                    </div>
                                    <hr class="partner_up_row">
                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-6">
                                            <label for="">Estimated Repair Cost* <i class="fa fa-info-circle" title="Estimated cost of all of the repairs required to maximize the sale price of the home."></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='estimated_repair_cost' id='estimated_repair_cost' value='{{$details->estimated_repair_cost ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]] calc-trigger calc-trigger'>
                                            </div>
                                            <small class="text-danger">{{ $errors->first('estimated_repair_cost') }}</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Estimated After Renovation Value (ARV)* <i class="fa fa-info-circle" title="This the value the home could sell for once the home has been renovated to the expected level. This will be potentially the list price of the home."></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='arv_price' id='arv_price' value='{{$details->arv_price ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]] calc-trigger'>
                                            </div>
                                            <small class="text-danger">{{ $errors->first('arv_price') }}</small>
                                        </div>
                                    </div>

                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-6">
                                            <label for="">Before Renovation Value (BRV)* <i class="fa fa-info-circle" title="This the amount the homeowner is guaranteed to receive after the home has been renovated and sold. Regardless of how much additional value was created in the home due to the renovation, the homeowner will receive this, the BRV amount."></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" name='brv_price' id='brv_price' value='{{$details->brv_price ?? ""}}' class='form-control amountComma validate[min[0],maxSize[10]]' readonly>
                                            </div>
                                            
                                            <small class="text-danger">{{ $errors->first('brv_price') }}</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">70% Rule* <i class="fa fa-info-circle" title="This rule is used for valuation, choose a value between 50-80%"></i></label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                                <input type="number" min="50" max="80" name='rule_percentage' id='rule_percentage' value='{{$details->rule_percentage ?? "70"}}' class='form-control  validate[min[50],max[90]] calc-trigger'>
                                            </div>
                                            <small class="text-danger">{{ $errors->first('arv_price') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-6">
                                            <label for="">Total Profit </label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input readonly type="text" name='total_profit' id='total_profit' value='0' class='form-control amountComma validate[min[0],maxSize[10]]'>
                                            </div>
                                            
                                            <small class="text-danger">{{ $errors->first('brv_price') }}</small>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row seller_profit_share partner_up_row">
                                        <div class="col-md-12">
                                            <h3 class="text-capitalize"><b>%Profit Share</b></h3>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="seller">Seller*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                                <input type="text" name="partnership_seller" id="partnership_seller" value='{{$details->partnership_seller ?? "0"}}' id="partnership_seller" class="form-control validate[required,maxSize[2]] calc-trigger">
                                            </div>
                                            <small class="text-danger">{{ $errors->first('partnership_seller') }}</small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="investor">Investor*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                                <input type="text" name="partnership_investor" id="partnership_investor" value='{{$details->partnership_investor ?? "0"}}' id="partnership_investor" class="form-control validate[required,maxSize[2]] calc-trigger">
                                            </div>
                                            <small class="text-danger">{{ $errors->first('partnership_investor') }}</small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="investor">Total</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                                <input type="text" name="total_profit_share" id="total_profit_share" id="total_profit_share" class="form-control validate[required]" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-4">
                                            <label for="">Seller's Profit Increase </label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" id='seller_profit' name='seller_profit' value='0' class='form-control amountComma validate[maxSize[10]]' readOnly>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4"></div>
                                        <div class="form-group col-md-4">
                                            <label for="">Increasd ROI </label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">%</span>
                                                <input type="text" id='increased_roi' name='increased_roi' value='0' class='form-control amountComma validate[maxSize[10]]' readOnly>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-4">
                                            <label for="">Seller's Total Profit </label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" id='increased_profit' name='increased_profit' value='0' class='form-control amountComma validate[maxSize[10]]' readOnly>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="form-row partner_up_row">
                                        <div class="form-group col-md-3">
                                            <label for="">Realtor's Commission %</label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" id='realtors_commission_percent' name='realtors_commission_percent' value='0' class='form-control amountComma validate[maxSize[10]] calc-trigger'>
                                            </div>  
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Realtor's Commission</label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" id='realtors_commission' name='realtors_commission' value='0' class='form-control amountComma validate[maxSize[10]]' readOnly>
                                            </div>  
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Realtor's Non-Partner Commission</label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" id='realtors_non_partner_commission' name='realtors_non_partner_commission' value='0' class='form-control amountComma validate[maxSize[10]]' readOnly>
                                            </div>  
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Realtor's Increased Commission</label> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" id='realtors_increased_commission' name='realtors_increased_commission' value='0' class='form-control amountComma validate[maxSize[10]]' readOnly>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="navigation">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="prev-form-btn d-none"><span class="prev-icon btn-prev-form" data-current-active="1"></span></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="next-form-btn"><span class="next-icon btn-next-form" data-current-active="1"></span></div>
                                            <div class="submit-form-btn d-none"><button type="submit" class="btn btn-sumit-form"><?php echo app('request')->input('pid') !== null ? 'Update Property' : 'Add Property'; ?></button></div>
                                        </div>
                                    <div>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
<script src="{{ URL::asset('assets/front_end/js/Chart.bundle.js') }}"></script>
<script src="{{ URL::asset('assets/front_end/js/chartjs-gauge.js') }}"></script>
<script src="{{ URL::asset('assets/front_end/js/chartjs-plugin-datalabels.js') }}"></script>

    <script>

        $(".amountComma").on('keyup', function(){
            var num = $(this).val().replace(/,/g , '');
            num = num.replace(/[^0-9.]/g,'');
            var commaNum = numberWithCommas(num);
            $(this).val(commaNum);
        });

        $(document).ready(function() {

            let partnerUp = $('input[type=radio][name=partner_up]:checked').val();
            if(partnerUp == 0)
            {
                $('.partner_up_row').hide();
            }

            // calculations();
            calculationsRealtor();
        });  

        function calcERC() {
            // Get Square|_footage
            let sqr_ft_b4 = $("#square_footage").val() == "" ? "0" : $("#square_footage").val().replace(/,/g, ""); //Total sqare footage. 
            sqr_ft_b4 = str2Float(sqr_ft_b4);
            
            // Get Home Condition type.
            let home_condition = (typeof $('[name="home_condition"]:checked').val() == 'undefined' ? 0 : $('[name="home_condition"]:checked').val());
            console.log("home_condition", home_condition);

            // Get Home Condition Price
            let home_condition_price = (parseInt(home_condition) == 0 ? 0 : (parseInt(home_condition) == 1 ? 25 : (parseInt(home_condition) == 2 ? 50 : (parseInt(home_condition) == 3 ? 75 : parseFloat(Number($("#other_home_condition_value").val()).toFixed(2))))));

            if(sqr_ft_b4 != 0 && home_condition_price != 0) {
                let estimated_repair_cost_b10 = sqr_ft_b4 * home_condition_price;

                $("#estimated_repair_cost").val(numberWithCommas(estimated_repair_cost_b10));
                calculationsRealtor();
            }
        }

        $('.erc-calc-trigger').on("keyup", function(){
            calcERC();
        });

        $('.calc-trigger').on("keyup", function(){
            calculationsRealtor();
        });

        $(".btn-next-form").click(function(){
            console.log($(this).attr("data-current-active"));
            let active_form = parseInt($(this).attr("data-current-active")) + 1;
            let total_steps = $("[class^='step-']").length;
            console.log(active_form +"<="+ total_steps-1);
            if(active_form <= total_steps-1)
            {
                $(".step-"+$(this).attr("data-current-active")).addClass("d-none");
                $(".step-"+active_form).removeClass("d-none");
                $(".prev-form-btn").removeClass("d-none");
                $(".btn-prev-form").attr("data-current-active", active_form);
                $(".btn-next-form").attr("data-current-active", active_form);
            }
            else
            {
                $(".step-"+$(this).attr("data-current-active")).addClass("d-none");
                $(".step-"+active_form).removeClass("d-none");
                $(".next-form-btn").addClass("d-none");
                $(".prev-form-btn").removeClass("d-none");
                $(".submit-form-btn").removeClass("d-none");
                $(".btn-prev-form").attr("data-current-active", active_form);
                $(".btn-next-form").attr("data-current-active", active_form);
            }
        });

        $(".btn-prev-form").click(function(){
            console.log($(this).attr("data-current-active"));
            let active_form = parseInt($(this).attr("data-current-active")) - 1;
            if(active_form >= 1)
            {
                $(".step-"+$(this).attr("data-current-active")).addClass("d-none");
                $(".step-"+active_form).removeClass("d-none");
                $(".next-form-btn").removeClass("d-none");
                $(".submit-form-btn").addClass("d-none");
                $(".prev-form-btn").addClass("d-none");
                $(".btn-prev-form").attr("data-current-active", active_form);
                $(".btn-next-form").attr("data-current-active", active_form);
            }
            else
            {
                $(".step-"+$(this).attr("data-current-active")).addClass("d-none");
                $(".step-"+active_form).removeClass("d-none");
                $(".prev-form-btn").addClass("d-none");
                $(".btn-prev-form").attr("data-current-active", active_form);
                $(".btn-next-form").attr("data-current-active", active_form);
            }
        });

        $('input[type=radio][name=partner_up]').change(function(e) {
           
            if (this.value == 1) {
                $('.partner_up_row').show();
            }
            else {
                $('.partner_up_row').hide();
            }
        });

        $('input[type=radio][name=partner_up]').click(function(e) {
            let forSale = $('input[type=radio][name=for_sale]:checked').val();
            if(forSale == 0)
            {
                e.preventDefault();
            }
        });

        $('input[type=radio][name=for_sale]').change(function(e) {
            if (this.value == 1) {
                $('.for_sale_row').show();
            }
            else {
                $('.for_sale_row').hide();
            }
        });

        $('input[type=radio][name=for_sale]').click(function(e) {
            let partnerUp = $('input[type=radio][name=partner_up]:checked').val();
            if(partnerUp == 0)
            {
                e.preventDefault();
            }
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
                $(".display_partner_share").show();
                <?php
            }
            ?>

        <?php 
            if(isset($details)){
                if($details->for_sale == 0){
                ?>
                    $(".for_sale_row").hide();
                <?php
                }
                else{
                ?>
                    $(".for_sale_row").show();
                <?php
                }
            }
            else{
                ?>
                $(".for_sale_row").show();
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

    <script>
        $(".home-condition div .container input:checkbox").on('click', function() {
            var $box = $(this);
            if ($box.is(":checked")) {
                $group = $(".home-condition .container input:checkbox").prop("checked", false);
                $box.prop("checked", true);
                $(".other_home_condition").removeClass("d-none");
                if($(this).val() == "4")
                {
                    
                }
                else if($(this).val() == "3")
                {
                    $("#other_home_condition_value").val("75");
                }
                else if($(this).val() == "2")
                {
                    $("#other_home_condition_value").val("50");
                }
                else if($(this).val() == "1")
                {
                    $("#other_home_condition_value").val("25");
                }
                else
                {
                    $(".other_home_condition").addClass("d-none");
                    $("#other_home_condition_value").val("0");
                }
                // calculations();
                calcERC();
            }
        });
    </script>
<script src="{{ URL::asset('assets/front_end/js/global.js') }}"></script>
<script src="{{ URL::asset('assets/front_end/js/add-property-calculation.js') }}"></script>
      
@endsection