@extends('front_end.parent')
@section('body')
<link rel="stylesheet" href="{{asset('property/assets/vendor/ionicons/css/ionicons.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{asset('property/assets/vendor/animate.css/animate.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{asset('property/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('property/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<style>
  .quicksummary{
    background: #f6f6f6;
    padding: 15px;
    border: 1px solid #e5e5e5;
  }
  .OwnerDetailsClass{
    border-top: 1px solid #e5e5e5;
    padding-top: 15px;
    margin-top: 15px;
  }

  .btn.btn-primary{
    background-color: #2cbdb8;
    border-color: #2cbdb8;
  }
  .btn.btn-primary:hover{
    background-color: #2cbdb8;
    border-color: #2cbdb8;
  }
  .lbl_partnership{

    position: absolute;
    right: 22px;
    top: 0;
    font-weight: bold;
  }
</style>

<main id="main">
    @php $details = $property->detail()->first(); @endphp

    <!-- ======= Intro Single ======= -->
    <div class="container" style="padding-top: 10px;">
      <div class="row">
        <div class="col-md-8">
          <p style="text-transform:capitalize"><a href="{{ URL::previous() }}"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
        </div>
      </div>
    </div>
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <?php
              $title = '';
              // if(isset($details) && $details->bedroom != '')
              // {
              //   $title .= $details->bedroom."BHK ";
              // }
              if(isset($details) && $details->property_type != '')
              {
                $title .= $details->property_type;
              }
              ?>
              <h1 class="title-single">{{$title}}</h1>
              <span class="color-text-a"><h5>{{ $property->address ?? '-' }}{{ $property->city ?? '-' }}, {{ $property->state ?? '-' }} {{ $property->zip ?? '-' }}</h5></span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <div class="property-price d-flex justify-content-center foo">
              <div class="card-header-c d-flex">
                <div class="card-title-c align-self-center">
                  <h5>Asking Price</h5>
                  <h5 class="title-c">$ <span class="priceNew">{{ $details->investment_price ?? '0' }}</span></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">

                @php
                $images = $property->images()->get();

                $cover = 0;
                @endphp
                  @if(!empty($images))
                    @foreach($images as $img)
                      @if($img['is_cover_image'] == 1) 
                        @php $cover = 1;  @endphp
                        <div class="carousel-item-b">
                          <img src="{{ asset('properties/'.$property->id.'/images/'.$img->image)}}" alt="">
                        </div>
                      @endif
                    @endforeach
                    @if($cover == 0)
                      @if(isset($property->images()->first()['image']) && $property->images()->first()['image'] != '')
                        <div class="carousel-item-b">
                          <img src="{{ asset('properties/'.$property->id.'/images/'.$img->image)}}" alt="">
                        </div>
                      @else
                        <img alt="image" src="{{ asset('dashboard/seller/default-property.jpg')}}"/>
                      @endif
                    @endif
                  @else
                    <img alt="image" src="{{ asset('dashboard/seller/default-property.jpg')}}"/>
                  @endif
                
                  <!-- <div class="carousel-item-b">
                    <img src="{{asset('property/assets/img/slide-2.jpg')}}" alt="">
                </div>
                <div class="carousel-item-b">
                  <img src="{{asset('property/assets/img/slide-3.jpg')}}" alt="">
                </div>
                <div class="carousel-item-b">
                  <img src="{{asset('property/assets/img/slide-1.jpg')}}" alt="">
                </div> -->
              
            </div>
            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4 quicksummary">
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Property ID:</strong>
                        <span>{{ $property->id ?? '-' }}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Location:</strong>
                        <span>{{ $property->city ?? '-' }}, {{ $property->state ?? '-' }} {{ $property->zip ?? '-' }}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Property Type:</strong>
                        <span>{{$details['property_type']}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Bedroom:</strong>
                        <span>{{ $details->bedroom ?? '-' }}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Bathroom:</strong>
                        <span>{{ $details->bathroom ?? '-' }}
                        </span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>SqarFt.</strong>
                        <span><span class="priceNew">{{ $details->square_footage ?? '-' }}</span></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>BRV Price</strong>
                        <span>$ <span class="priceNew">{{ $details->brv_price ?? '-' }}</span></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>ARV Price :</strong>
                        <span>$ <span class="priceNew">{{ $details->arv_price  ?? '-' }}</span></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>For Sale :</strong>
                        <span>{{ (isset($details->for_sale) && $details->for_sale == 1)  ? 'Yes' : 'No' }}</span>
                      </li>
                      <?php
                      if(isset($details->for_sale) && $details->for_sale == 1){
                      ?>
                        <li class="d-flex justify-content-between" style="position: relative;">
                          <strong>Ask Price :</strong>
                          <span>$ <span class="priceNew">{{ $details->investment_price }}</span></span>
                        </li>
                      <?php
                      }
                      ?>
                      <li class="d-flex justify-content-between">
                        <strong>Partner Up :</strong>
                        <span>{{ (isset($details->partner_up) && $details->partner_up == 1)  ? 'Yes' : 'No' }}</span>
                      </li>
                      <?php
                      if(isset($details->partner_up) && $details->partner_up == 1){
                      ?>
                        <li class="d-flex justify-content-between" style="position: relative;padding-top: 25px;">
                          <strong>Requested Partnership % Share :</strong>
                          <span class="lbl_partnership">S/I</span>
                          <span>{{ $details->partnership_seller }}/{{$details->partnership_investor}}%</span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Estimated Repair Cost</strong>
                          <span>$ <span class="priceNew">{{ $details->estimated_repair_cost ?? '-' }}</span></span>
                        </li>
                      <?php
                      }
                      ?>
                      <!--<li class="d-flex justify-content-between OwnerDetailsClass">
                        <strong>Owner Details :</strong>
                        <a class="btn btn-primary" href="#" onclick="getOwnerDetails('{{$property->id}}'); return false;"><i class="fa fa-address-card" aria-hidden="true" title="Owner Details"></i></a>
                      </li>-->
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="col-sm-12 description color-text-a">
                    {{ $details->about  ?? '-' }}
                  </p>                  
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Amenities</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">

                  <ul class="list-a no-margin">
                    @if($property->items()->first()['burglar_alarm'] == 1)
                      <li>Burglar Alarm</li>
                    @endif
                    @if($property->items()->first()['smoke_detector'] == 1)
                      <li>Smoke Detector</li>
                    @endif
                    @if($property->items()->first()['fire_alarm'] == 1)
                      <li>Fire Alarm</li>
                    @endif
                    @if($property->items()->first()['central_air'] == 1)
                      <li>Central Air</li>
                    @endif
                    @if($property->items()->first()['central_heating'] == 1)
                      <li>Central Heating</li>
                    @endif
                    @if($property->items()->first()['window_ac'] == 1)
                      <li>Window AC</li>
                    @endif
                    @if($property->items()->first()['dishwasher'] == 1)
                      <li>Dishwasher</li>
                    @endif
                    @if($property->items()->first()['trash_compactor'] == 1)
                      <li>Trash Compactor</li>
                    @endif
                    @if($property->items()->first()['garbage_disposal'] == 1)
                      <li>Garbage Disposal</li>
                    @endif
                    @if($property->items()->first()['oven'] == 1)
                      <li>Oven</li>
                    @endif
                    @if($property->items()->first()['microwave'] == 1)
                      <li>Microwave</li>
                    @endif
                    @if($property->items()->first()['tv_antenna'] == 1)
                      <li>TV Antenna</li>
                    @endif
                    @if($property->items()->first()['satelite_dish'] == 1)
                      <li>Satelite Dish</li>
                    @endif
                    @if($property->items()->first()['intercom_system'] == 1)
                      <li>Intercom System</li>
                    @endif
                    @if($property->items()->first()['pool'] == 1)
                      <li>Pool</li>
                    @endif
                    @if($property->items()->first()['washer_dryer'] == 1)
                      <li>Washer Dryer</li>
                    @endif
                    @if($property->items()->first()['hot_tub'] == 1)
                      <li>Hot Tub</li>
                    @endif
                    @if($property->items()->first()['washer'] == 1)
                      <li>Washer</li>
                    @endif
                    @if($property->items()->first()['dryer'] == 1)
                      <li>Dryer</li>
                    @endif
                    @if($property->items()->first()['refrigerator'] == 1)
                      <li>Refrigerator</li>
                    @endif
                    @if($property->items()->first()['pool_barrier'] == 1)
                      <li>Pool Barrier</li>
                    @endif
                    @if($property->items()->first()['safety_cover_hottub'] == 1)
                      <li>Safety Cover Hottub</li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-10 offset-md-1">
            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <!--<li class="nav-item">
                <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
              </li>-->
              <li class="nav-item">
                <a class="nav-link active" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Map</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent" style="padding-bottom: 3rem;">
              <!--<div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>-->
              <div class="tab-pane fade  show active" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                <img src="{{asset('property/assets/img/plan2.jpg')}}" alt="" class="img-fluid">
              </div>
              <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                <div id="map" style="height: 450px;"></div>
                
                <!--<iframe width="100%" height="460" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={{$property->address}},{{$property->city}},{{$property->state}}&amp;output=embed"></iframe><br />-->

                <!--<iframe src="https://www.google.com/maps/embed/v1/place?q={{$property->lat}},{{$property->long}}&amp;key=AIzaSyBIwzALxUPNbatRBj3Xi1Uhp0fFzwWNBkE" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen>-->
              </div>
            </div>
          </div>          
        </div>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->

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
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7yZbRv_jMqu_BRVZQHbUMFKe8C3jQ2DE&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
<script>
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
      console.log(responses)
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
</script>
<script>
      // In this example, we center the map, and add a marker, using a LatLng object
      // literal instead of a google.maps.LatLng object. LatLng object literals are
      // a convenient way to add a LatLng coordinate and, in most cases, can be used
      // in place of a google.maps.LatLng object.
      let map;

      function initMap() {
        const mapOptions = {
          zoom: 12,
          center: { lat: {{$property->lat}}, lng: {{$property->long}} },
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        const marker = new google.maps.Marker({
          // The below line is equivalent to writing:
          // position: new google.maps.LatLng({{$property->lat}}, {{$property->long}})
          position: { lat: {{$property->lat}}, lng: {{$property->long}} },
          map: map,
        });
        // You can use a LatLng literal in place of a google.maps.LatLng object when
        // creating the Marker object. Once the Marker object is instantiated, its
        // position will be available as a google.maps.LatLng object. In this case,
        // we retrieve the marker's position using the
        // google.maps.LatLng.getPosition() method.
        const infowindow = new google.maps.InfoWindow({
          content: "<p>Marker Location:" + marker.getPosition() + "</p>",
        });
        google.maps.event.addListener(marker, "click", () => {
          infowindow.open(map, marker);
        });
      }
    </script>
@endsection