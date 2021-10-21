@extends('front_end.parent')
@section('body')
<link rel="stylesheet" href="{{asset('property/assets/vendor/ionicons/css/ionicons.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{asset('property/assets/vendor/animate.css/animate.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{asset('property/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('property/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<style class="cp-pen-styles">

.cd-header {
  position: relative;
  height: 150px;
  background-color: #70e5cd;
}
.cd-header h1 {
  color: #ffffff;
  line-height: 150px;
  text-align: center;
}
@media only screen and (min-width: 1170px) {
  .cd-header {
    height: 180px;
  }
  .cd-header h1 {
    line-height: 180px;
  }
}

.cd-main-content {
  position: relative;
  min-height: 100vh;
}
.cd-main-content:after {
  content: "";
  display: table;
  clear: both;
}
.cd-main-content.is-fixed .cd-tab-filter-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
}
.cd-main-content.is-fixed .cd-gallery {
  padding-top: 76px;
}
.cd-main-content.is-fixed .cd-filter {
  position: fixed;
  height: 100vh;
  overflow: hidden;
  background: transparent;
  z-index: 0;
}
.footer-section.set-bg {
    position: relative;
}
.cd-main-content.is-fixed .cd-filter form {
  height: 100vh;
  overflow: auto;
  -webkit-overflow-scrolling: touch;
}
.cd-main-content.is-fixed .cd-filter-trigger {
  position: fixed;
}
@media only screen and (min-width: 768px) {
  .cd-main-content.is-fixed .cd-gallery {
    padding-top: 90px;
  }
}
@media only screen and (min-width: 1170px) {
  .cd-main-content.is-fixed .cd-gallery {
    padding-top: 100px;
  }
}

/* --------------------------------

xtab-filter

-------------------------------- */
.cd-tab-filter-wrapper {
  background-color: #ffffff;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
  z-index: 1;
}
.cd-tab-filter-wrapper:after {
  content: "";
  display: table;
  clear: both;
}

.cd-tab-filter {
  /* tabbed navigation style on mobile - dropdown */
  position: relative;
  height: 50px;
  width: 140px;
  margin: 0 auto;
  z-index: 1;
}
.cd-tab-filter::after {
  /* small arrow icon */
  content: '';
  position: absolute;
  right: 14px;
  top: 50%;
  bottom: auto;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  display: inline-block;
  width: 16px;
  height: 16px;
  background: url("https://entrusters.com/templates/yoo_moustache/html/com_entrusters_shop/products/ui-img/cd-icon-arrow.svg") no-repeat center center;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
  pointer-events: none;
}
.cd-tab-filter ul {
  position: absolute;
  top: 0;
  left: 0;
  background-color: #ffffff;
  box-shadow: inset 0 -2px 0 #f03d6c;
}
.cd-tab-filter li {
  display: none;
}
.cd-tab-filter li:first-child {
  /* this way the placehodler is alway visible */
  display: block;
}
.cd-tab-filter a {
  display: block;
  /* set same size of the .cd-tab-filter */
  height: 50px;
  width: 140px;
  line-height: 50px;
  padding-left: 14px;
}
.cd-tab-filter a.selected {
  background: #f03d6c;
  color: #ffffff;
}
.cd-tab-filter.is-open::after {
  /* small arrow rotation */
  -webkit-transform: translateY(-50%) rotate(-180deg);
  -moz-transform: translateY(-50%) rotate(-180deg);
  -ms-transform: translateY(-50%) rotate(-180deg);
  -o-transform: translateY(-50%) rotate(-180deg);
  transform: translateY(-50%) rotate(-180deg);
}
.cd-tab-filter.is-open ul {
  box-shadow: inset 0 -2px 0 #f03d6c, 0 2px 10px rgba(0, 0, 0, 0.2);
}
.cd-tab-filter.is-open ul li {
  display: block;
}
.cd-tab-filter.is-open .placeholder a {
  /* reduces the opacity of the placeholder on mobile when the menu is open */
  opacity: .4;
}
@media only screen and (min-width: 768px) {
  .cd-tab-filter {
    /* tabbed navigation style on medium devices */
    width: auto;
    cursor: auto;
  }
  .cd-tab-filter::after {
    /* hide the arrow */
    display: none;
  }
  .cd-tab-filter ul {
    background: transparent;
    position: static;
    box-shadow: none;
    text-align: right;
    padding: 5px;
  }
  .cd-tab-filter li {
    display: inline-block;
  }
  .cd-tab-filter li.placeholder {
    display: none !important;
  }
  .cd-tab-filter a {
    display: inline-block;
    padding: 0 1em;
    width: auto;
    color: #9a9a9a;
    text-transform: uppercase;
      }
  .no-touch .cd-tab-filter a:hover {
    color: #f03d6c;
  }
  .cd-tab-filter a.selected {
    background: transparent;
    color: #f03d6c;
    /* create border bottom using box-shadow property */
    box-shadow: inset 0 -2px 0 #f03d6c;
  }
  .cd-tab-filter.is-open ul li {
    display: inline-block;
  }
}
@media only screen and (min-width: 1170px) {
  .cd-tab-filter {
    /* tabbed navigation on big devices */
    width: 100%;
    float: right;
    margin: 0;
    -webkit-transition: width 0.3s;
    -moz-transition: width 0.3s;
    transition: width 0.3s;
    right: 6.3%;
  }
  .cd-tab-filter.filter-is-visible {
    /* reduce width when filter is visible */
    width: 80%;
  }
}

/* --------------------------------

xgallery

-------------------------------- */
.cd-gallery {
  padding: 26px 5%;
  width: 100%;
}
.cd-gallery li {
  margin-bottom: 1.6em;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
  display: none;
}
.cd-gallery li.gap {
  /* used in combination with text-align: justify to align gallery elements */
  opacity: 0;
  height: 0;
  display: inline-block;
}
.cd-gallery img {
  display: block;
  width: 100%;
}
.cd-gallery .cd-fail-message {
  display: none;
  text-align: center;
}
@media only screen and (min-width: 768px) {
  .cd-gallery {
    padding: 40px 3%;
  }
  .container div:after {
    content: "";
    display: table;
    clear: both;
  }
  .cd-gallery li {
    width: 48%;
    margin-bottom: 2em;
  }
}
@media only screen and (min-width: 1170px) {
  .cd-gallery {
    padding: 50px 2%;
    float: right;
    -webkit-transition: width 0.3s;
    -moz-transition: width 0.3s;
    transition: width 0.3s;
  }
  .cd-gallery li {
    width: 23%;
  }
  .cd-gallery.filter-is-visible {
    /* reduce width when filter is visible */
    width: 80%;
  }
}

/* --------------------------------

xfilter

-------------------------------- */
.cd-filter {
  position: absolute;
  top: 0;
  left: 0;
  width: 280px;
  height: 100%;
  background: #ffffff;
  box-shadow: 4px 4px 20px transparent;
  z-index: 2;
  /* Force Hardware Acceleration in WebKit */
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  -ms-transform: translateZ(0);
  -o-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transform: translateX(-100%);
  -moz-transform: translateX(-100%);
  -ms-transform: translateX(-100%);
  -o-transform: translateX(-100%);
  transform: translateX(-100%);
  -webkit-transition: -webkit-transform 0.3s, box-shadow 0.3s;
  -moz-transition: -moz-transform 0.3s, box-shadow 0.3s;
  transition: transform 0.3s, box-shadow 0.3s;
}
.cd-filter::before {
  /* top colored bar */
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  height: 50px;
  width: 100%;
  background-color: #444444;
  z-index: 2;
}
.cd-filter form {
  padding: 70px 20px;
}
.cd-filter .cd-close {
  position: absolute;
  top: 0;
  right: 0;
  height: 50px;
  line-height: 50px;
  width: 60px;
  color: #ffffff;
    text-align: center;
  background: #444444;
  opacity: 0;
  -webkit-transition: opacity 0.3s;
  -moz-transition: opacity 0.3s;
  transition: opacity 0.3s;
  z-index: 3;
}
.no-touch .cd-filter .cd-close:hover {
  background: #666666;
}
.cd-filter.filter-is-visible {
  -webkit-transform: translateX(0);
  -moz-transform: translateX(0);
  -ms-transform: translateX(0);
  -o-transform: translateX(0);
  transform: translateX(0);
  box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.2);
}
.cd-filter.filter-is-visible .cd-close {
  opacity: 1;
}

.cd-filter-trigger {
  position: absolute;
  top: 0;
  left: 0;
  height: 50px;
  line-height: 50px;
  width: 60px;
  /* image replacement */
  overflow: hidden;
  text-indent: 100%;
  color: transparent;
  white-space: nowrap;
  background: transparent url("https://entrusters.com/templates/yoo_moustache/html/com_entrusters_shop/products/ui-img/cd-icon-filter.svg") no-repeat center center;
  z-index: 3;
}
.cd-filter-trigger.filter-is-visible {
  pointer-events: none;
}
@media only screen and (min-width: 1170px) {
  .cd-filter-trigger {
    width: auto;
    left: 2%;
    text-indent: 0;
    color: #9a9a9a;
    text-transform: uppercase;
            padding-left: 24px;
    background-position: left center;
    -webkit-transition: color 0.3s;
    -moz-transition: color 0.3s;
    transition: color 0.3s;
  }
  .no-touch .cd-filter-trigger:hover {
    color: #f03d6c;
  }
  .cd-filter-trigger.filter-is-visible, .cd-filter-trigger.filter-is-visible:hover {
    color: #ffffff;
  }
}

/* --------------------------------

xcustom form elements

-------------------------------- */
.cd-filter-block {
  margin-bottom: 1.6em;
}
.cd-filter-block h4 {
  /* filter block title */
  position: relative;
  margin-bottom: .2em;
  padding: 10px 0 10px 20px;
  color: #9a9a9a;
  text-transform: uppercase;
      -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  cursor: pointer;
}
.no-touch .cd-filter-block h4:hover {
  color: #f03d6c;
}
.cd-filter-block h4::before {
  /* arrow */
  content: '';
  position: absolute;
  left: 0;
  top: 50%;
  width: 16px;
  height: 16px;
  background: url("https://entrusters.com/templates/yoo_moustache/html/com_entrusters_shop/products/ui-img/cd-icon-arrow.svg") no-repeat center center;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  -webkit-transition: -webkit-transform 0.3s;
  -moz-transition: -moz-transform 0.3s;
  transition: transform 0.3s;
}
.cd-filter-block h4.closed::before {
  -webkit-transform: translateY(-50%) rotate(-90deg);
  -moz-transform: translateY(-50%) rotate(-90deg);
  -ms-transform: translateY(-50%) rotate(-90deg);
  -o-transform: translateY(-50%) rotate(-90deg);
  transform: translateY(-50%) rotate(-90deg);
}
.cd-filter-block input, .cd-filter-block select,
.cd-filter-block .radio-label::before,
.cd-filter-block .checkbox-label::before {
  /* shared style for input elements */  border-radius: 0;
  background-color: #ffffff;
  border: 2px solid #e6e6e6;
}
.cd-filter-block input[type='search'],
.cd-filter-block input[type='text'],
.cd-filter-block select {
  width: 100%;
  padding: .8em;
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  box-shadow: none;
}
.cd-filter-block input[type='search']:focus,
.cd-filter-block input[type='text']:focus,
.cd-filter-block select:focus {
  outline: none;
  background-color: #ffffff;
  border-color: #f03d6c;
}
.cd-filter-block input[type='search'] {
  /* custom style for the search element */
  border-color: transparent;
  background-color: #e6e6e6;
  /* prevent jump - ios devices */
  font-size: 1rem !important;
}
.cd-filter-block input[type='search']::-webkit-search-cancel-button {
  display: none;
}
.cd-filter-block .cd-select {
  /* select element wrapper */
  position: relative;
}
.cd-filter-block .cd-select::after {
  /* switcher arrow for select element */
  content: '';
  position: absolute;
  z-index: 1;
  right: 14px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  display: block;
  width: 16px;
  height: 16px;
  background: url("https://entrusters.com/templates/yoo_moustache/html/com_entrusters_shop/products/ui-img/cd-icon-arrow.svg") no-repeat center center;
  pointer-events: none;
}
.cd-filter-block select {
  cursor: pointer;
}
.cd-filter-block select::-ms-expand {
  display: none;
}
.cd-filter-block .list li {
  position: relative;
  margin-bottom: .8em;
}
.cd-filter-block .list li:last-of-type {
  margin-bottom: 0;
}
.cd-filter-block input[type=radio],
.cd-filter-block input[type=checkbox] {
  /* hide original check and radio buttons */
  position: absolute;
  left: 0;
  top: 0;
  margin: 0;
  padding: 0;
  opacity: 0;
  z-index: 2;
}
.cd-filter-block .checkbox-label,
.cd-filter-block .radio-label {
  padding-left: 24px;

  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.cd-filter-block .checkbox-label::before, .cd-filter-block .checkbox-label::after,
.cd-filter-block .radio-label::before,
.cd-filter-block .radio-label::after {
  /* custom radio and check boxes */
  content: '';
  display: block;
  position: absolute;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
}
.cd-filter-block .checkbox-label::before,
.cd-filter-block .radio-label::before {
  width: 16px;
  height: 16px;
  left: 0;
}
.cd-filter-block .checkbox-label::after,
.cd-filter-block .radio-label::after {
  /* check mark - hidden */
  display: none;
}
.cd-filter-block .checkbox-label::after {
  /* check mark style for check boxes */
  width: 16px;
  height: 16px;
  background: url("https://entrusters.com/templates/yoo_moustache/html/com_entrusters_shop/products/ui-img/cd-icon-check.svg") no-repeat center center;
}
.cd-filter-block .radio-label::before,
.cd-filter-block .radio-label::after {
  border-radius: 50%;
}
.cd-filter-block .radio-label::after {
  /* check mark style for radio buttons */
  width: 6px;
  height: 6px;
  background-color: #ffffff;
  left: 5px;
}
.cd-filter-block input[type=radio]:checked + label::before,
.cd-filter-block input[type=checkbox]:checked + label::before {
  border-color: #f03d6c;
  background-color: #f03d6c;
}
.cd-filter-block input[type=radio]:checked + label::after,
.cd-filter-block input[type=checkbox]:checked + label::after {
  display: block;
}

@-moz-document url-prefix() {
  /* hide custom arrow on Firefox - select element */
  .cd-filter-block .cd-select::after {
    display: none;
  }
}
</style>
<style>
#preloder{
  text-align: center;
}
.m-b-sm {
  margin-bottom: 10px;
}
.rm-row {
    padding-left: 15px;
}
.cd-filters .filter .input-group-addon {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    background: #939598;
    color: white;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    padding: 12px 20px;
    text-align: center;
    display: table-cell;
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;
    border: 0px solid #E5E6E7;
    box-sizing: border-box;
}
.cd-filters .filter .form-control:focus{
    border-color: none;
    box-shadow: none;
}
.collapse .card.card-body {
    background: #ffffff;
    font-size: 25px;
    padding: 0px 10px;
    border: 0px;
    display: inline-block;
    color: #000;
    margin-top: 10px;
}
.btn-primary.FButton {
    background-color: #2cbdb8;
    border-color: #2cbdb8;
    font-size: 13px;
    padding: 10px 22px;
}
</style>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/hot-sneaks/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-2.1.3.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<style type="text/css" media="screen">
  .ui-slider-horizontal .ui-slider-handle{
    top: -.5em;
  }  
</style>
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h3>Property Listing</h3>
                        <div class="breadcrumb-option">
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Properties</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->

    <!-- ======= Property Grid ======= -->
<main id="main" class="cd-main-content">
    <section class="property-grid grid">
      <div class="fluid-container">
        <div class="row">
          <div class="col-sm-12 col-md-4 col-lg-3">
            
            <div class="cd-filter filter-is-visible">
                <a href="javaScript:void(0);" class="cd-filter-trigger filter-is-visible">Filters</a>
                <form id="search-by-keyword-form">
                  <input type="hidden" name="_token" value="5S6qz9UZrn53KnrqMQMqeSwxAkrzHwJMT4BzYEK2">
                  <div class="form-group">
                      <label for="intvt_price">Enter Term:</label>
                      <input class="form-control" name="keyword" id="keyword-val" type="search"
                        placeholder="Search by keywords">
                  </div>
                  <div class="form-group range-filter">
                      <label for="intvt_price">Investment Price Range:</label>
                      <input type="text" id="intvt_price" style="border:0; color:#fa4b2a; font-weight:bold;" readonly>
                    <div id="invtAmount" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                      <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                        style="left: 0%;"></span><span tabindex="0"
                        class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group range-filter">
                      <label for="arv_price">ARV Price Range:</label>
                      <input type="text" id="arv_price" style="border:0; color:#fa4b2a; font-weight:bold;" readonly>
                    <div id="ArvSlider" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                      <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                        style="left: 0%;"></span><span tabindex="0"
                        class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                    </div>
                  </div>
                  <div class="form-group range-filter">
                      <label for="brv_price">BRV Price Range:</label>
                      <input type="text" id="brv_price" style="border:0; color:#fa4b2a; font-weight:bold;" readonly>
                    <div id="BrvSlider" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                      <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                        style="left: 0%;"></span><span tabindex="0"
                        class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                    </div>
                  </div>
                  <div class="form-group range-filter">
                      <label for="rangeinkm">Distance(In KM):</label>
                      <input type="number" class="form-control" id="RangeInKM">
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary filter-data filter-button FButton" data-id="0"><span
                        class="input-group-addon"> <i class="fa fa-search"></i> Search </span></button>
                    <button type="button" style="float:right;" onclick="resetdata()" class="btn btn-primary FButton" data-id="0"><span
                        class="input-group-addon"> <i class="fa fa-refresh"></i> Reset </span></button>
                  </div>
                </form>
                <!--<a href="javaScript:void(0);" class="cd-close"><i class="icon ent-close"></i> close </a>-->
              </div>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-9">
          <div class="filter-is-visible"> 
            <div class="row" id="load-data">
                @foreach ($properties as $key=>$property )
                  @php $detail = $property->detail()->first(); @endphp
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                @if(isset($property->images()->first()->image))
                                  @php $image = $property->images()->first()->image; @endphp
                                    @foreach ($property->images()->get() as $img )
                                        @if($img->is_cover_image == 1)
                                          @php $image = $img->image; @endphp
                                        @endif
                                    @endforeach   
                                  <img src="{{ asset('properties/'.$property->id.'/images/'.$image)}}" alt="" style="object-fit:cover;height: 450px;" class="img-a img-fluid">                              
                                @else
                                    <img src="{{asset('property/assets/img/property-1.jpg')}}" alt="" style="height: 450px;" class="img-a img-fluid">
                                @endif                     
                              
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <!--<p>
                                          <a href="#" class="btn btn-primary" onclick="getOwnerDetails('{{$property->id}}'); return false;">
                                            <i class="fa fa-address-card" aria-hidden="true" title="View address"></i>
                                          </a>  
                                        </p>-->
                                        <div class="collapse" id="collapseExample{{$property->id}}">
                                          <div class="card card-body">
                                            {{ $property->address }}
                                          </div>
                                        </div>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">Investment Price | $ <span class="priceNew"><?php if(isset($detail) && $detail->investment_price != ''){echo $detail->investment_price;}else{ echo '0';} ?></span></span>
                                        </div>
                                        <a href="{{ route('property_single_page',['pid'=>$property->id]) }}" class="link-a">  Click here to view <span class="ion-ios-arrow-forward"></span> </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <!--<li>
                                                <h4 class="card-info-title">Bed</h4>
                                                <span>{{ $property->bedroom }}
                                                </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Floors</h4>
                                                <span>{{ $property->floors }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Sqr.Ft. </h4>
                                                <span>{{ $property->square_footage }}</span>
                                            </li>-->
                                            <li>
                                                <h4 class="card-info-title">ARV Price </h4>
                                                <span class="priceNew"><?php if(isset($detail) && $detail->arv_price != ''){echo $detail->arv_price;}else{ echo '0';} ?></span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">BRV Price </h4>
                                                <span class="priceNew"><?php if(isset($detail) && $detail->brv_price != ''){echo $detail->brv_price;}else{ echo '0';} ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach 
                <?php
                if(isset($property->id) && $property->id > 0 && count($properties) >= 3)
                {
                ?>
                  <div id="remove-row" class="rm-row col-md-12">
                      <button style="width: 15%;margin-bottom:40px;" data-id="{{ $property->id }}" class="filter-data btn site-btn m-b-sm nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>
                  </div>
                <?php
                }
                ?>
            </div>                        
          </div>
        </div>
        </div>
      </div>
    </div>
    </section><!-- End Property Grid Single-->
</main>
<button type="button" id="OwnerDetailModalButton" data-toggle="modal" data-target="#OwnerDetailModal" style="display:none;"></button>
<div class="modal fade" id="OwnerDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div id="Details">
          
        </div>
        <button type="button" class="btn btn-secondary" style="float:right;" data-dismiss="modal">Close</button>
      </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
getLocation();
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  }
}

function showPosition(position) {
  $("#Latitude").val(position.coords.latitude);
  $("#Longitude").val(position.coords.longitude);
}

function getOwnerDetails(id){
  $("#preloder").css({"display": "block", "opacity": "0.7"});
  $(".loader").css({"display": "block", "opacity": "0.7"});
  $("#Details").html("");
  $.ajax({
    url    : '{{ route("getOwnerDetails") }}',
    method : "POST",
    data : {id:id, _token:"{{csrf_token()}}"},
    dataType : "text",
    success : function (responses)
    {
      var response = JSON.parse(responses);
      $("#Details").html(response.data);
      $("#OwnerDetailModalButton").click();
    },
    complete: function(){
      $("#preloder").css({"display": "none"});
      $(".loader").css({"display": "none"});
    }
  });
}

$("#properties").addClass('active');

function resetdata(){
  var $slider = $("#invtAmount");
  $slider.slider("values", 0, 500);
  $slider.slider("values", 1, 500000);
  $( "#intvt_price" ).val( "$500 - $500000");  

  var $slider = $("#ArvSlider");
  $slider.slider("values", 0, 500);
  $slider.slider("values", 1, 500000);
  $( "#arv_price" ).val( "$500 - $500000");  
  
  var $slider = $("#BrvSlider");
  $slider.slider("values", 0, 500);
  $slider.slider("values", 1, 500000);
  $( "#brv_price" ).val( "$500 - $500000");  

  $("#keyword-val").val("");
  $("#RangeInKM").val("");
  $('.filter-data').click();
}
</script>
@endsection