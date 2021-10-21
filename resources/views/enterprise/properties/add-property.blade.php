@extends('layouts.enterprise-layout')
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
  </style>

@endsection

@section('body')
<div id="" class="seller_detail min_height_974px">
    <div class="wrapper wrapper-content custom-container-a">
        <div class="row animated fadeInRight allproperty_header">
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
                        <div class="col-md-6">
                            <form action="{{ route('StoreProerpty') }}" method="post" id="property-form">
                                @csrf
                                <input type='hidden' name='phase' value='{{$redirect_var}}'>
                                <input type='hidden' name='is_edit' value='{{ app('request')->input('pid') ?? '-99' }}'>
                                <div class="row">                                
                                    <div class="col-xs-12">
                                        <div class="frm-grp{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label for="">Address*</label> <br>
                                            <input type="text" name='address' value='{{$edit_properties->address ?? ""}}' class='form-control validate[required]'>
                                            <small class="text-danger">{{ $errors->first('address') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('city') ? ' has-error' : '' }}">
                                            <label for="">City*</label> <br>
                                            <input type="text" name='city' value='{{$edit_properties->city ?? ""}}' class='form-control validate[required]'>
                                            <small class="text-danger">{{ $errors->first('city') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('state') ? ' has-error' : '' }}">
                                            <label for="">State*</label> <br>
                                            <input type="text" name='state' value='{{$edit_properties->state ?? ""}}' class='form-control validate[required]'>
                                            <small class="text-danger">{{ $errors->first('state') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('zip') ? ' has-error' : '' }}">
                                            <label for="">Zip Code*</label> <br>
                                            <input type="number" name='zip' value='{{$edit_properties->zip ?? ""}}' class='form-control validate[required,minSize[6],maxSize[6]]'>
                                            <small class="text-danger">{{ $errors->first('zip') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('lat') ? ' has-error' : '' }}">
                                            <label for="">Latitude*</label> <br>
                                            <input type="text" name='lat' value='{{$edit_properties->lat ?? ""}}' class='form-control validate[required]'>
                                            <small class="text-danger">{{ $errors->first('lat') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('long') ? ' has-error' : '' }}">
                                            <label for="">Longitude*</label> <br>
                                            <input type="text" name='long' value='{{$edit_properties->long ?? ""}}' class='form-control validate[required]'>
                                            <small class="text-danger">{{ $errors->first('long') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('floors') ? ' has-error' : '' }}">
                                            <label for="">Floors*</label> <br>
                                            <input type="number" name='floors' value='{{$edit_properties->floors ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('floors') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('bedroom') ? ' has-error' : '' }}">
                                            <label for="">Bed Rooms*</label> <br>
                                            <input type="number" name='bedroom' value='{{$edit_properties->bedroom ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('bedroom') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('bathroom') ? ' has-error' : '' }}">
                                            <label for="">Bathroom*</label> <br>
                                            <input type="number" name='bathroom' value='{{$edit_properties->bathroom ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('bathroom') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('square_footage') ? ' has-error' : '' }}">
                                            <label for="">Sqr. Ft*</label> <br>
                                            <input type="text" name='square_footage' value='{{$edit_properties->square_footage ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('square_footage') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('price_per_sqft') ? ' has-error' : '' }}">
                                            <label for="">Price Per Sqft*</label> <br>
                                            <input type="text" name='price_per_sqft' value='{{$edit_properties->price_per_sqft ?? ""}}' class='form-control validate[required,min[0],maxSize[4]]'>
                                            <small class="text-danger">{{ $errors->first('price_per_sqft') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('lot_size') ? ' has-error' : '' }}">
                                            <label for="">Lot Size*</label> <br>
                                            <input type="text" name='lot_size' value='{{$edit_properties->lot_size ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('lot_size') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('stories') ? ' has-error' : '' }}">
                                            <label for="">Stories*</label> <br>
                                            <input type="text" name='stories' value='{{$edit_properties->stories ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('stories') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('property_type') ? ' has-error' : '' }}">
                                            <label for="">Property Type*</label> <br>
                                            <input type="text" name='property_type' value='{{$edit_properties->property_type ?? ""}}' class='form-control validate[required,min[0],maxSize[2]]'>
                                            <small class="text-danger">{{ $errors->first('property_type') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('built') ? ' has-error' : '' }}">
                                            <label for="">Built*</label> <br>
                                            <input type="text" name='built' value='{{$edit_properties->built ?? ""}}' class='form-control validate[required,minSize[4],maxSize[4]]'>
                                            <small class="text-danger">{{ $errors->first('built') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('neighborhood') ? ' has-error' : '' }}">
                                            <label for="">Neighborhood*</label> <br>
                                            <input type="text" name='neighborhood' value='{{$edit_properties->neighborhood ?? ""}}' class='form-control validate[required]'>
                                            <small class="text-danger">{{ $errors->first('neighborhood') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('county') ? ' has-error' : '' }}">
                                            <label for="">Country*</label> <br>
                                            <input type="text" name='county' value='{{$edit_properties->county ?? ""}}' class='form-control validate[required]'>
                                            <small class="text-danger">{{ $errors->first('county') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('mortgage') ? ' has-error' : '' }}">
                                            <label for="">Mortgage*</label> <br>
                                            <input type="text" name='mortgage' value='{{$edit_properties->mortgage ?? ""}}' class='form-control validate[required,min[0],maxSize[5]]'>
                                            <small class="text-danger">{{ $errors->first('mortgage') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('insurance') ? ' has-error' : '' }}">
                                            <label for="">Insurance*</label> <br>
                                            <input type="text" name='insurance' value='{{$edit_properties->insurance ?? ""}}' class='form-control validate[required,min[0],maxSize[5]]'>
                                            <small class="text-danger">{{ $errors->first('insurance') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('tax') ? ' has-error' : '' }}">
                                            <label for="">Tax*</label> <br>
                                            <input type="text" name='tax' value='{{$edit_properties->tax ?? ""}}' class='form-control validate[required,min[0],maxSize[5]]'>
                                            <small class="text-danger">{{ $errors->first('tax') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('building_type') ? ' has-error' : '' }}">
                                            <label for="">Building Type*</label> <br>
                                            <input type="text" name='building_type' value='{{$edit_properties->building_type ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('building_type') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('investment_price') ? ' has-error' : '' }}">
                                            <label for="">Ask Price*</label> <br>
                                            <input type="text" name='investment_price' value='{{$edit_properties->investment_price ?? ""}}' class='form-control validate[required,min[0],maxSize[15]]'>
                                            <small class="text-danger">{{ $errors->first('investment_price') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('during_date') ? ' has-error' : '' }}">
                                            <label for="">During Date*</label> <br>
                                            <input type="text" name='during_date' value='{{$edit_properties->during_date ?? ""}}' class='form-control validate[required,min[0],maxSize[3]]'>
                                            <small class="text-danger">{{ $errors->first('during_date') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="frm-grp{{ $errors->has('about') ? ' has-error' : '' }}">
                                            <label for="">About*</label> <br>
                                            <textarea type="text" name='about' rows='5' class='form-control about validate[required]'>{{$edit_properties->about ?? ""}}</textarea>
                                            <small class="text-danger">{{ $errors->first('about') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="frm-grp{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label for="">Phone Number*</label> <br>
                                            <input type="text" name='phone' value='{{$edit_properties->phone ?? ""}}' class='form-control validate[required,minSize[10],maxSize[10]]'>
                                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        </div>
                                    </diV>                                    
                                    <div class="col-xs-12">
                                        <div class="frm-grp{{ $errors->has('for_sale') ? ' has-error' : '' }}">
                                            <label for="">For Sale</label> <br>
                                            <label class="radio-inline">                                       
                                                <input type="radio" name="for_sale" id="inlineRadio1" checked value="0"> Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="for_sale" id="inlineRadio2" value="1"> No
                                            </label>
                                            <small class="text-danger">{{ $errors->first('for_sale') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="frm-grp{{ $errors->has('partner_up') ? ' has-error' : '' }}">
                                            <label for="">Partner Up</label> <br>
                                            <label class="radio-inline">
                                                <input type="radio" name="partner_up" id="  inlineRadio3" value="1">Yes                                        
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="partner_up" id="inlineRadio4" checked value="0"> No
                                            </label>
                                            <small class="text-danger">{{ $errors->first('partner_up') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('brv_price') ? ' has-error' : '' }}">
                                            <label for="">Estimated Current Value*</label> <br>
                                            <input type="text" name='brv_price' value='{{$edit_properties->brv_price ?? ""}}' class='form-control validate[required,min[0],maxSize[15]]'>
                                            <small class="text-danger">{{ $errors->first('brv_price') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="frm-grp{{ $errors->has('arv_price') ? ' has-error' : '' }}">
                                            <label for="">Estimated Repair Cost*</label> <br>
                                            <input type="text" name='arv_price' value='{{$edit_properties->arv_price ?? ""}}' class='form-control validate[required,min[0],maxSize[15]]'>
                                            <small class="text-danger">{{ $errors->first('arv_price') }}</small>
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


@endsection
@section('script')
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
        $(document).ready(function() {
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
    </script>

@endsection