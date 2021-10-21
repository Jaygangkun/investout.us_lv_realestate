@extends('layouts.whole-seller-layout') 
@section('style')
<link href="http://demo.expertphp.in/css/dropzone.css" rel="stylesheet">
<style media="screen">
    #page-wrapper {
        background: rgb(243, 243, 244);
    }

    .control-label {
        margin-top: 0px !important;
    }

    @media (min-width:1240px) {
        .container-main {
            max-width: 1150px
        }
    }
</style>
@endsection
 
@section('body')
<section>
    <div class="wrapper wrapper-content custom-container-a" style='width:96%'>
        <div>
    @include('partials.property-breadcrumb')
            <div>
                <div class="row">
                    <!-- <div id="page-wrapper"> -->
                    <div class="row animated fadeInRight custom-ibox" style='margin-right: -44px;margin-left: -44px;'>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="ibox float-e-margins">
                                {!! Form::open(['method' => 'PATCH', 'route' => ['seller.property.update',$property->id], 'class' => 'form-horizontal','id'=>'mainform'])
                                !!}
                                <div class="ibox-content profile-content">
                                    <div class="ibox-content no-padding border-left-right">
                                        <img alt="image" class="create_detail_image img-responsive img-responsive-width-100" src="{{ asset('dashboard/seller/default-property.jpg') }}">
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <h2 class="custom-color-green">About This Property:</h2>&nbsp;
                                    <div class="input-group">
                                        <textarea class="create_detail_description col-md-12 well" placeholder="Tell us about your property. What makes it desirable and ideal for an investor. This is your opportunity to present your home in the most favorable light. "
                                            id="about" name="about" maxlength=600 autofocus>{{ $property->detail->about or old('about') }}</textarea>
                                        <div class="col-md-2 text-center col-sm-6 m-b">
                                            <h3 class="control-label text-center" style='margin-top: -5px !important;'>Before Renovation Value($)</h3>
                                        </div>
                                        <div class="col-md-3 col-sm-6 m-b">
                                            <span class="rgt_span">$</span><input type="text" maxlength=10 class="form-control avr_price commas-input"
                                                id="brv_price" name="brv_price" value="{{ $property->detail->brv_price or old('brv_price') }}">
                                        </div>
                                        <div class="col-md-2 text-center col-sm-6 m-b">
                                            <h3 class="control-label text-center" maxlength=10 style='margin-top: -5px !important;'>Requested Investment($)</h3>
                                        </div>
                                        <div class="col-md-3 col-sm-6 m-b">
                                            <span class="rgt_span">$</span><input type="text" maxlength=10 class="form-control commas-input"
                                                id="investment_price" name="investment_price" value='{{ $property->detail->investment_price or old('
                                                investment_price ') }}'>
                                        </div>
                                        <div class="col-md-12">
                                        </div>
                                        <div class="col-md-2 text-center col-sm-6 m-b">
                                            <h3 class="control-label text-center">After Renovation Value($)</h3>
                                        </div>
                                        <div class="col-md-3 col-sm-6 m-b">
                                            <span class="rgt_span">$</span><input maxlength=10 type="text" class="form-control commas-input"
                                                id="arv_price" name="arv_price" value='{{ $property->detail->arv_price or old('
                                                arv_price ') }}'>
                                        </div>
                                        <div class="col-md-2 text-center col-sm-6 m-b">
                                            <h3 class="control-label text-center">Listing Duration(D)</h3>
                                        </div>
                                        <div class="col-md-3 col-sm-6 m-b">
                                            <input type="text" class="form-control" maxlength=4 id="during_date" name="during_date" value='{{ $property->detail->during_date or old('
                                                during_date ') }}'>
                                        </div>
                                        <div class="col-md-6 col-sm-12 m-b">
                                            <h3 class="control-label text-center">&nbsp;</h3>&nbsp;
                                        </div>
                                    </div>
                                    <h2 class="custom-color-green">Property Details:</h2>
                                    <div class="ibox-content profile-content" style="padding-left:  0px;padding-right: 0px;">
                                        <div class="input-group  col-md-12">
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Lot Size</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <input type="text" class="form-control" id="lot_size" maxlength=10 name="lot_size" value='{{ $property->detail->lot_size or old('
                                                    lot_size ') }}'>
                                            </div>
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Property Type</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <select name="property_type" class="form-control zipcode-select" style="width:100%;" tabindex="4">
                                                          @php
                                                            $arr = ['Tri-Plex','DuPlex','Multi-Family Home','CoOp','Townhouse','Single-Family Home','Condominium'];
                                                          


@endphp
                                                          @foreach ($arr as $pk => $label)
                                                            <option value="{{ $pk }}"  {{ $pk == $property->detail->property_type ? 'selected="selected"' : '' }}>{{ $label }}</option>
                                                          @endforeach
                                                      </select>
                                            </div>
                                        </div>
                                        <div class="input-group col-md-12">
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Bathroom(s)</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <input type="text" class="form-control" maxlength=4 id="bathroom" name="bathroom" value='{{ $property->detail->bathroom or old('
                                                    bathroom ') }}'>
                                            </div>
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Bedroom(s)</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <input type="text" class="form-control" maxlength=4 id="bedrooms" name="bedroom" value='{{ $property->detail->bedroom or old('
                                                    bedroom ') }}'>
                                            </div>
                                        </div>
                                        <div class="input-group  col-md-12">
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">City</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <input type="text" class="form-control" maxlength=30 id="neighborhood" name="neighborhood" value='{{ $property->detail->neighborhood or old('
                                                    neighborhood ') }}'>
                                            </div>
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Square Footage</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <input type="text" class="form-control sqrFt" maxlength=20 id="square_footage" name="square_footage" value='{{ $property->detail->square_footage or old('
                                                    square_footage ') }}'>
                                            </div>
                                        </div>
                                        <div class="input-group  col-md-12">
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">County</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <input type="text" class="form-control" maxlength=25 id="country" name="county" value='{{ $property->detail->county or old('
                                                    county ') }}'>
                                            </div>
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Price per SqrFt</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <span class="rgt_span">$</span><input type="text" maxlength=20 class="form-control"
                                                    id="price_per_sqft" name="price_per_sqft" value='{{ $property->detail->price_per_sqft or old('
                                                    price_per_sqft ') }}'>
                                            </div>
                                        </div>
                                        <div class="input-group  col-md-12">
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Mortage (Monthly)</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <span class="rgt_span">$</span><input type="text" maxlength=10 class="form-control  commas-input"
                                                    id="mortgage" name="mortgage" value='{{ $property->detail->mortgage or old('
                                                    mortgage ') }}'>
                                            </div>
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Building Type</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <select name="building_type" class="form-control zipcode-select" style="width:100%;" tabindex="4">
                                                        @php
                                                          $arr = ['TypeLog Cabin','Cape Cod','Art Deco','Craftsman','Contempory','Colonial','Georgian Colonial','Federal Colonial','Mid-Century Modern',
                                                                  'French Provincial','Greek Revival','Italianate','Mediterranean','Modern','Neoclassical','Prairie','Pueblo Revival','Ranch',
                                                                  'Townhouse','Tudor','Spanish','Victorian','Cottage','Farmhouse','Oriental'];
                                                        


@endphp
                                                        @foreach ($arr as $bk => $label)
                                                          <option value="{{ $bk }}"  {{ $bk == $property->detail->building_type ? 'selected="selected"' : '' }}>{{ $label }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            {{--
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Property State</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <select name="property_state" class="form-control zipcode-select" style="width:100%;" tabindex="4">
                                                        @php
                                                          $arr = ['Available for bidding','Mark as Contracted','Mark as Closed'];
                                                        


@endphp
                                                        @foreach ($arr as $k => $label)
                                                          <option value="{{ $k }}"  {{ $k==$property->property_state ? 'selected="selected"' : '' }}>{{ $label }}</option>
                                                        @endforeach
                                                    </select>
                                            </div> --}}
                                        </div>
                                        <div class="input-group  col-md-12">
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Insurance (Monthly)</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <span class="rgt_span">$</span><input type="text" maxlength=10 class="form-control commas-input"
                                                    id="insurance" name="insurance" value='{{ $property->detail->insurance or old('
                                                    insurance ') }}'>
                                            </div>
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Stories</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <input type="text" class="form-control" id="stories" maxlength=5 name="stories" value='{{ $property->detail->stories or old('
                                                    stories ') }}'>
                                            </div>
                                        </div>
                                        <div class="input-group  col-md-12">
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Property Tax (Monthly)</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <span class="rgt_span">$</span><input type="text" maxlength=10 class="form-control commas-input"
                                                    id="tax" name="tax" value='{{ $property->detail->tax or old(' tax ') }}'>
                                            </div>
                                            <div class="col-md-2 text-center col-sm-6 m-b">
                                                <h3 class="control-label text-center">Year Built</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-6 m-b">
                                                <input type="text" maxlength=4 name="built" class="form-control pull-right" id="last_updated" value='{{ $property->detail->built or old('
                                                    built ') }}'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br> {!! Form::close() !!}
                                <div class="ibox-content dropzone-content">
                                    <div class="dropzone-previews">
                                        <h3>Property Documents and Images upload</h3>
                                        {!! Form::open([ 'route' => [ 'seller.property.contentUpload',$property->id ], 'files' => true, 'class' => 'dropzone','id'=>"image_upload"])
                                        !!}
                                        <div class="dz-message" data-dz-message><span>
                                         <i class="fa fa-upload" aria-hidden="true"></i> <br>
                                         Drop files here to upload</span></div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="ibox-content dropzone-content">
                                    <div class="input-group col-md-12">
                                        <div class="ibox-content profile-content" style='padding-left: 0px;padding-right: 0px;   '>
                                            <h3>Product Video upload</h3>
                                            {{--
                                            <div>
                                                <input type="url" placeholder="https://youtu.be/rfUngkalcN0" class="col-md-12 well" name="videoid" id="video_url" value="">
                                            </div> --}}
                                            <div class="proposal-video">
                                                <div class="input-group m-b">
                                                    <input type="url" class="form-control" name="video[]" placeholder="Input video URL to add!">
                                                    <span class="input-group-addon input-add"><i class="fa fa-plus"></i></span>
                                                </div>
                                            </div>
                                            <button class="btn color-white  pull-right custom-color-green-bg" id='formsubmit' type="submit" type="button">SAVE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </div>
                </div>
                {{--
                <div class="footer">
                    <div>
                        <!-- <strong>Copyright</strong> Example Company &copy; 2014-2010 -->
                        <a href="/terms-of-use" target="_blank">Terms Of Use</a> | <a href="/privacy-policy" target="_blank">Privacy Policy</a>                        | <a href="/service-terms" target="_blank">Service Terms</a> | <a href="/faq" target="_blank">FAQ</a>                        | Colaborator © Copyright 2014-2017
                    </div>
                </div> --}}
</section>
@endsection
 
@section('template_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script>
    $('input.commas-input').keyup(function(event) {
    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40) return;
    // format number
    $(this).val(function(index, value) {
      return value
      .replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  	.replace(/^0+/, '');
      ;
    });
  });

</script>
<script type="text/javascript">
    // to change price per square footage with respect to change in arv price and square footage
    $("#square_footage").change(function(){
        var arv_price = $('#arv_price').val();
        arv_price = (arv_price + "").replace(',', '');
        var square_footage = $('#square_footage').val();
        square_footage = (square_footage + "").replace(',', '');
        if(arv_price && square_footage){
            var price_per_sqft = arv_price/square_footage;
            $('#price_per_sqft').val(price_per_sqft);
        }else{
            $('#price_per_sqft').val('');
        }
    });
      // var i=0;
      $(".input-add").click(function(){
          // i++;
          $(".proposal-video").append("<div class=\"input-group m-b\"><input type=\"text\" class=\"form-control\" name=\"video[]\" placeholder=\"video url...\"><span class=\"input-group-addon input-add\">URL</span></div>");
          $(".videoCount").val(i);
      });
      $("#formsubmit").click(function(event) {
        $(".proposal-video input").appendTo('#mainform');
        alert('Your Property Details have been Updated.')
        $("#mainform").submit();
      });
              Dropzone.autoDiscover = false;
        window.onload = function () {
            var dropzoneOptions = {
                uploadMultiple: false,
                acceptedFiles: "image/*,.pdf,.docx,.txt,.xlx,.csv,.rtf",
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                    },
                paramName: "file",
                maxFilesize: 20, // MB
                addRemoveLinks: true,
                init: function () {
                    this.on("success", function (file) {
//                        console.log("success > ");
                    });
                    this.on('error', function( e ){
  //                      console.log('erors and stuff');
                    });
                }
            };
            var uploader = document.querySelector('#image_upload');
            var newDropzone = new Dropzone(uploader, dropzoneOptions);
        };

</script>
@endsection