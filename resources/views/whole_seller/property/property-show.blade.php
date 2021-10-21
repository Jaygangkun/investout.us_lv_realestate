@extends(session('layout')) 
@section('style')
<style>
    @media only screen and (max-width: 1400px) {

        .tabbable-line .about_client {
            width: 0px;
            height: 0px;

        }
        .about_client_img {
            width: 0px;
            height: 0px;
        }
        .about_client_mail {
            padding-top: 10px;
            text-align: center;
            padding-left: 20px;
        }

    }

    @media only screen and (min-width: 1400px) {

        .tabbable-line .about_client {
            float: right;
            margin-top: -10%;
            margin-right: -10%;
            /*height: 200px;*/
            /*width:  400px;*/
            z-index: 3;

        }
        .about_client_img {
            float: right;
            margin-right: -85%;
            margin-top: 5%;
            width: 100px;
            height: 100px;
            z-index: 9;
            border-radius: 50%;
        }

        .about_client_mail {

            float: right;
            margin-right: 200px;
            margin-top: 85px;

        }
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-youtube {
        padding: 8px;
        font-size: 30px;
        width: 45px;
        text-align: center;
        text-decoration: none;
        margin: 2.5px 1px;
        background: #dd4b39;
        color: white;
    }

    .fa-vimeo {
        padding: 8px;
        font-size: 30px;
        width: 45px;
        text-align: center;
        text-decoration: none;
        margin: 2.5px 1px;
        background: #55ACEE;
        color: white;
    }

    .fa-imdb {
        padding: 8px;
        font-size: 30px;
        width: 45px;
        text-align: center;
        text-decoration: none;
        margin: 2.5px 1px;

        background: #ed5565;
        color: white;
    }

    .fa-instagram {
        padding: 8px;
        font-size: 30px;
        width: 45px;
        text-align: center;
        text-decoration: none;
        margin: 2.5px 1px;
        background: #007bb5;
        color: white;
    }

    .custom-container-a {
        width: 86%;
    }

    .fa-eye,
    .fa-star,
    .fa-pencil-square-o {
        font-size: 4em;
        color: darkgray
    }

    #detail-progress {
        padding-left: 2.6em;
    }

    .tab-pane {
        overflow: hidden
    }

    .ibox table tr>td:nth-child(2n+1) {
        font-weight: bold
    }

    .landing-main .row .body {
        padding-left: 0px !important;
    }
</style>
@endsection
 
@section('body')
<section>
    <div class="landing-main landing-page">
        <div class="row">
    @include('partials.property-breadcrumb')
            <div class="wrapper wrapper-content custom-container-a overfolw-hidden">

                <div class="row">
                    <div class='col-md-8'>
                        <div class="tab-content body">
                            <!-- OVERVIEW -->
                            <br><br>

                            <div class="tab-pane active" id="tab_default_1">
                                <div class="container-fluid">
                                    <div id="main_area">
                                        <!-- Slider -->
                                        <div class="row">
                                            <div class="col-xs-12" id="slider">
                                                <!-- Top part of the slider -->
                                                <div class="row">
                                                    <div class="col-sm-12" id="carousel-bounding-box">
                                                        <div class="carousel slide property-detail-carousel" id="myCarousel">
                                                            <!-- Carousel items -->
                                                            <div class="carousel-inner custom-slider-second-inner">
                                                                @if(isset($property->images()->first()->image)) @foreach ($property->images as $key => $image)
                                                                <div class="{{$key==0 ? " active item ":"item "}}" data-slide-number={{$key}}>
                                                                    <img src="{{asset('properties/'.$property->id.'/images/'.$image->image )}}"></div>
                                                                @endforeach @else
                                                                <div class="active item" data-slide-number="0">
                                                                    <img src="{{asset('dashboard/seller/default-property.jpg')}}"></div>
                                                                @endif
                                                            </div>
                                                            <!-- Carousel nav -->
                                                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                                              <span class="glyphicon glyphicon-chevron-left"></span>
                                                                          </a>
                                                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                                              <span class="glyphicon glyphicon-chevron-right"></span>
                                                                          </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--/Slider-->

                                        <div class="row hidden-xs" id="slider-thumbs">
                                            <!-- Bottom switcher of slider -->
                                            <ul class="hide-bullets">
                                                @if (isset($property->images)) @foreach ($property->images as $key => $image)
                                                <li class="col-sm-2 thumb-link" data-target="#myCarousel" data-slide-to="{{$key}}">
                                                    <a class="thumbnail "><img src="{{asset('properties/'.$property->id.'/images/'.$image->image )}}" class="thumbnail-height"></a>
                                                </li>
                                                @endforeach @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <br><br>

                                <div class="p-t-md">
                                    <div class="row">
                                        @if (auth()->user()->hasRole('seller'))
                                        <div class="col-sm-6">
                                            <div class="col-sm-5">
                                                <h3>Location</h3>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="ng-binding"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ $property->address }}</p>
                                            </div>
                                        </div>
                                        @elseif (auth()->user()->hasRole('admin'))
                                        <div class="col-sm-6">
                                            <div class="col-sm-5">
                                                <h3>Location</h3>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="ng-binding"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ $property->address}}, {{ $property->city
                                                    }}, {{ $property->state }}, {{ $property->zipCode }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-sm-6">
                                            <div class="col-sm-4">
                                                <h3>BRV</h3>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="ng-binding"><i class="fa fa-dollar"></i>&nbsp;&nbsp;{{ $property->detail->brv_price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="col-sm-5">
                                                <h3>ARV</h3>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="ng-binding"><i class="fa fa-dollar"></i>&nbsp;&nbsp;{{ $property->detail->arv_price }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style='padding:0px'>
                                            <div class="col-sm-4">
                                                <h3>List Date</h3>
                                            </div>
                                            <div class="col-sm-7" style='padding-left: 28px;'>
                                                <p class="ng-binding"><i class="fa fa-calendar"></i> &nbsp;{{ date('d-M-Y', strtotime($property->created_at))
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="col-sm-5" style="padding-right:  0px;">
                                                <h3>During Date</h3>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="ng-binding"><i class="fa fa-calendar"></i> {{ $property->detail->during_date }} Days</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-right" style='padding-right: 7.8em;font-size:.8em'>
                                            <h3><a style='color: #0b2a4a;' href="http://maps.google.com/maps?q={{ $property->lat }},{{ $property->long }}&t=k"
                                                    target="_blank">Check On Google Map</a></h3>
                                        </div>
                                    </div>
                                    <br>


                                    <div class="row">
                                        <div class="ibox">
                                            <hr>
                                            <h3>Property Details</h3>
                                            <div class="ibox-content " style="margin-right:15px;padding-left:0px">
                                                <div class="property-details custom-text-color">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td>Bedroom(s)</td>
                                                                <td>{{ $property->detail->bedroom }}</td>
                                                                <td>Property Type</td>
                                                                <td>{{ $property->detail->property_type }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bathroom(s)</td>
                                                                <td>{{ $property->detail->bathroom }}</td>
                                                                <td>Neighborhood</td>
                                                                <td>{{ $property->detail->neighborhood }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Square Footage</td>
                                                                <td>{{ $property->detail->square_footage }}</td>
                                                                <td>County</td>
                                                                <td>{{ $property->detail->county }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Price per SqrFt</td>
                                                                <td>${{ $property->detail->price_per_sqft }}</td>
                                                                <td>Monthly, Mortage</td>
                                                                <td>${{ $property->detail->mortgage }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lot Size</td>
                                                                <td>{{ $property->detail->lot_size }}</td>
                                                                <td>Monthly, Insurance</td>
                                                                <td>${{ $property->detail->insurance }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Stories</td>
                                                                <td>{{ $property->detail->stories }}</td>
                                                                <td>Monthly Property Tax</td>
                                                                <td>${{ $property->detail->tax }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Year Built</td>
                                                                <td>{{ $property->detail->built }}</td>
                                                                <td>Last Updated</td>
                                                                <td style='padding-right: 30px;'>{{ date('d-M-Y', strtotime($property->detail->updated_at))
                                                                    }} &nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Building Type</td>
                                                                <td>{{ $property->detail->building_type }}</td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="ibox">
                                            <hr>
                                            <h3>Property Documents</h3>
                                            <hr>
                                            <div class="ibox-content " style="margin-right:15px;padding-left:0px;border-top:0px">
                                                @foreach ($property->documents as $key => $doc)
                                                <div class="col-md-12 p-0" style="color:#0b2a4a;overflow:hidden;display:inline-block;width:83px;margin-right:10px">
                                                    <a href="{{ asset('properties/'.$property->id.'/documents/'.$doc->document) }}">
                                                              <i style='font-size:4.4em' class='fa fa-folder-o'></i>
                                                              <p><small>{{$doc->document}}</small> </p>
                                                            </a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <br><br> @if (isset($property->video))
                                    <div class="row">
                                        <div class="ibox float-e-margins" style='padding-right: 30px;'>
                                            <div class="ibox-title">
                                                <h5>Video</h5>
                                            </div>
                                            @foreach($property->videos as $key => $video)
                                            <div class="ibox-content">
                                                @if ($key == 0)
                                                <figure responsive-video="">
                                                    <iframe src="{{$video->video}}" frameborder="0" allowfullscreen="" data-aspectratio="0.8192488262910798" style="width: 100%; height: 450px;"></iframe>
                                                </figure>
                                                @else
                                                <figure responsive-video="">
                                                    <iframe src="{{$video->video}}" frameborder="0" allowfullscreen="" data-aspectratio="0.8192488262910798" style="width: 100%; height: 190px;"></iframe>
                                                </figure>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @if (auth()->user()->hasRole('seller'))
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="media-body text-center">

                                    <h3 class="col-md-6" style='color:#34a691 !important;font-weight:500'>Create Listing</h3>
                                    <a href="{{ route('seller.property.create') }}"><button style='background-color:#0b2a4a;font-weight:500' type="button" class="btn color-white">Create Listing</button></a>

                                </div>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <div class="feed-activity-list">
                                        <div class="feed-element">
                                            <div class="media-body text-center">
                                                <h3 class="col-md-6">Inspection Charge</h3>
                                                <span class="navy">Please create property for contract!.</span>
                                                <span class="navy">You already paid for inspection charge.</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        @endif

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>My Stats</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                                  <i class="fa fa-chevron-up"></i>
                                              </a>

                                    <a class="close-link">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div>
                                    <div class="feed-activity-list">

                                        <div class="feed-element">
                                            <div class="media-body ">
                                                <div class="">
                                                    <div class="row" style='margin:0px'>
                                                        <div class="my-stat" style='padding:0px'>
                                                            <div class="col-md-4" style='margin-top:-12px !important'>
                                                                <h1>00</h1>
                                                            </div>
                                                            <div class="col-md-4" style='padding:0px;color: #34a691;'>
                                                                <strong>Posts</strong>
                                                                <span>You have views</span>
                                                            </div>
                                                            <div class="col-md-4 text-right" style='padding:0px;padding-right:5px'>
                                                                <i class="fa fa-eye" aria-hidden="true" style='margin-top:-10px'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style='margin:0px;margin-top:15px'>
                                                        <div class="my-stat" style='padding:0px'>
                                                            <div class="col-md-4" style='margin-top:-10px !important'>
                                                                <h1>{{ $property->detail->proposal }}</h1>
                                                            </div>
                                                            <div class="col-md-5" style='padding:0px;color: #34a691;'>
                                                                <strong>Proposals</strong>
                                                                <span>You have recieved proposals</span>
                                                            </div>
                                                            <div class="col-md-3 text-right" style='padding:0px;padding-right:5px'>
                                                                <a href="/Dash/proposal">
                                                                         <i class="fa fa-pencil-square-o" aria-hidden="true" style='margin-top:-4px;'></i>
                                                                       </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style='margin:0px;margin-top:10px'>
                                                        <div class="my-stat" style='padding:0px'>
                                                            <div class="col-md-4" style='margin-top:-12px !important'>
                                                                <h1>00</h1>
                                                            </div>
                                                            <div class="col-md-5" style='padding:0px;color: #34a691;'>
                                                                <strong>Followings</strong>
                                                                <span>You have favorites</span>
                                                            </div>
                                                            <div class="col-md-3 text-right" style='padding:0px;padding-right:5px'>
                                                                <i class="fa fa-star" aria-hidden="true" style='margin-top:-4px'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--
                        <div class="ibox float-e-margins">
                            @if($awarderId>0)
                            <div class="ibox-content">
                                <div>
                                    <div class="feed-activity-list">
                                        <div class="feed-element">
                                            <div class="media-body ">
                                                <div class="feed-element property-submission-content">

                                                    <div class="awarded-text">
                                                        <a href="/{{$property_details->property_id}}/submission_detail/{{$awarderId}}" class="pull-left">
                                                                              <img alt="image" class="img-circle" src="{{$awarderPhoto}}" style="width: 58px; height: 58px;">
                                                                          </a>

                                                    </div>
                                                    <div class="awarded-photo">
                                                        <h4 class="text_left"><b>&nbsp;&nbsp;State : Awarded</b></h4>
                                                        <strong><b>&nbsp;&nbsp;Name : {{$awarderName}}</b></strong><br>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            @endif
                        </div> --}}

                        <div class="ibox float-e-margins" hidden>
                            <div class="ibox-title">
                                <h5>Recommended Investors</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                                  <i class="fa fa-chevron-up"></i>
                                              </a>

                                    <a class="close-link">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div>
                                    <div class="feed-activity-list">

                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                                          <img alt="image" class="img-circle" src="../assets/img/profile_img/a2.jpg">
                                                      </a>
                                            <div class="media-body ">
                                                <strong>We work Creators Award DETROIT</strong>
                                                <div class="well">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                    text ever since the 1500s. Over the years, sometimes by accident, sometimes
                                                    on purpose (injected humour and the like).
                                                </div>
                                                <div class="pull-right">
                                                    <a class="btn btn-xs btn-white"><i class="fa fa-plus"></i> Follow </a>
                                                    <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Message</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                                          <img alt="image" class="img-circle" src="../assets/img/profile_img/a2.jpg">
                                                      </a>
                                            <div class="media-body ">
                                                <strong>We work Creators Award DETROIT</strong>
                                                <div class="well">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                    text ever since the 1500s. Over the years, sometimes by accident, sometimes
                                                    on purpose (injected humour and the like).
                                                </div>
                                                <div class="pull-right">
                                                    <a class="btn btn-xs btn-white"><i class="fa fa-plus"></i> Follow </a>
                                                    <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Message</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
 
@section('script')
@endsection