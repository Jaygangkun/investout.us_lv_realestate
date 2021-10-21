@extends('layouts.investor-layout') 
@section('style')
<link rel="stylesheet" href="{{asset('css/investor-property.css')}}">
@endsection
 
@section('body')

<div class="" style='padding:4em 3em'>
  <div class="row" style='margin-left:58px;margin-bottom:12px'>
    <h2 style='margin:0px;color:#0b2a4a;font-size:2.7em;font-family:unisansboldbold'>Overview</h2>
    <h3 style='margin:0px;color:#67bbab;font-size:1.4em;font-family:unisansregularregular'>By {{ $property->seller->name() }}</h3>
  </div>
  <br>
  <br>
  <div class="row" style='margin:0px;box-shadow:5px 5px 16px 0px rgba(0,0,0,0.28)'>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-sm-8 body" style='padding:0px'>
          <div class="tab-content">
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
                          <div class="carousel slide" id="myCarousel">
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
                  <div class="col-sm-6">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Location</h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon"><i class="fa fa-map-marker"></i></div>
                      <div class="detailinfo">{{ $property->address }}, {{ $property->city }}, {{ $property->state }}, {{ $property->zip }}</div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Property Id</h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon" style='top:0px;width:7%'>
                        <i class="fa fa-home"></i>
                      </div>
                      <div class="detailinfo">{{$property->id}}</div>
                    </div>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>BVR</h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon">
                        <i class="fa fa-dollar"></i>
                      </div>
                      <div class="detailinfo">
                        ${{ $property->detail->brv_price }}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>AVR</h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon">
                        <i class="fa fa-dollar"></i>
                      </div>
                      <div class="detailinfo">
                        ${{ $property->detail->arv_price }}
                      </div>
                    </div>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>List Date</h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon" style='width:7%'>
                        <i class="fa fa-calendar"></i>
                      </div>
                      <div class="detailinfo">
                        {{ date('d-M-Y',strtotime($property->created_at)) }}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Days Listed</h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <div class="detailinfo">
                        <?php
                                                      $datetime1 = new DateTime($property->created_at);
                                                      $datetime2 = new DateTime('now');
                                                      $interval = $datetime1->diff($datetime2);
                                                      echo $interval->format('%a');?> day(s)
                      </div>
                    </div>
                  </div>
                </div>

                <br>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Proposal Received</h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="detailinfo">
                        <i class="fa fa-home"></i> 0
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 text-right" style='padding-right: 7.8em;font-size:.8em'>
                    <h3><a style='color: #0b2a4a;' href="https://www.google.com/maps/search/?api=1&query={{ $property->lat }},{{ $property->long }}&t=k"
                        target="_blank">Check On Google Map</a></h3>
                  </div>
                </div>

                <hr class='desc-row'>
                <div class="row">
                  <div class="col-sm-12">
                    <h3>Description</h3>
                    <p>{{ $property->detail->about }}</p>
                  </div>

                </div>
                <br>
                <hr class='desc-row'>
                <div class="row">
                  <div class="ibox">
                    <h3>Property Details</h3>
                    <div class="ibox-content ">
                      <div class="property-details custom-text-color">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <td>Bedroom(s)</td>
                              <td>{{ $property->detail->bedroom }}</td>
                              <td>MLS</td>
                              <td>{{ $property->detail->mls }}</td>
                            </tr>
                            <tr>
                              <td>Bathroom(s)</td>
                              <td>{{ $property->detail->bathroom }}</td>
                              <td>City</td>
                              <td>{{ $property->city }}</td>
                            </tr>
                            <tr>
                              <td>Square Footage</td>
                              <td>{{ $property->detail->square_footage }}</td>
                              <td>County</td>
                              <td>{{ $property->detail->county }}</td>
                            </tr>
                            <tr>
                              <td>Price per SqFt</td>
                              <td>{{ $property->detail->price_per_sqft }}</td>
                              <td>Monthly Mortgage</td>
                              <td>{{ $property->detail->mortgage }}</td>
                            </tr>
                            <tr>
                              <td>Lot Size</td>
                              <td>{{ $property->detail->lot_size }}</td>
                              <td>Monthly Insurance</td>
                              <td>{{ $property->detail->insurance }}</td>
                            </tr>
                            <tr>
                              <td>Stories</td>
                              <td>{{ $property->detail->stories }}</td>
                              <td>Monthly Tax</td>
                              <td>{{ $property->detail->tax }}</td>
                            </tr>
                            <tr>
                              @php $arr = ['Tri-Plex','DuPlex','Multi-Family Home','CoOp','Townhouse','Single-Family Home','Condominium']; $buildtype =
                              ['TypeLog Cabin','Cape Cod','Art Deco','Craftsman','Contempory','Colonial','Georgian Colonial','Federal
                              Colonial','Mid-Century Modern', 'French Provincial','Greek Revival','Italianate','Mediterranean','Modern','Neoclassical','Prairie','Pueblo
                              Revival','Ranch', 'Townhouse','Tudor','Spanish','Victorian','Cottage','Farmhouse','Oriental'];
                              
@endphp
                              <td>Property Type</td>
                              <td>{{ isset($property->detail->property_type) ? $arr[$property->detail->property_type] : ' ' }}</td>
                              <td>Last Updated</td>
                              <td>{{ date('d-M-Y', strtotime($property->detail->updated_at)) }}</td>
                            </tr>
                            <tr>
                              <td>Year Built</td>
                              <td>{{ $property->detail->built }}</td>
                              <td>Building Type</td>
                              <td>{{ isset($property->detail->building_type) ? $buildtype[$property->detail->building_type] :
                                ' ' }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <br><br>

                <hr style='' class='desc-row'>
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
                <br><br> @if (isset($property->videos))
                <hr class='desc-row' style='margin:0px 15px'>
                <div class="" style='padding:2em 20px'>
                  <h5 style='font-weight:100;font-family:unisansboldbold;font-size:1.2em;color:#0b2a4a;margin:0px'>Video</h5>
                </div>
                <hr class='desc-row' style='margin:0px 15px'>
                <div class="row video-container">
                  <div class="col-sm-12" style='padding-right:0px'>
                    <div class="ibox float-e-margins">
                      <div class="ibox-content">
                        @php $count = 0; 
@endphp @foreach ($property->videos as $key => $video) @php $count = $count + 1; 
@endphp @if ($count ==
                        1)
                        <div class="col-sm-12" style='padding:0px'>
                          <figure responsive-video="">
                            <iframe src="{{$video->video}}" frameborder="0" allowfullscreen="" data-aspectratio="0.8192488262910798" style="width: 100%; height: 450px;"></iframe>
                          </figure>
                        </div>
                        @else
                        <div class="col-sm-3" class='ex-thumb' style='padding:0px;height:120px;border-radius:0px;border:3px solid #319c89;'>
                          <figure responsive-video="">
                            <iframe src="{{$video->video}}" frameborder="0" allowfullscreen="" data-aspectratio="0.8192488262910798" style="width: 100%; height: 114px;"></iframe>
                          </figure>
                        </div>
                        @endif @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <br><br> @endif

              </div>
            </div>
          </div>
        </div>



        <div class="col-md-4 col-sm-4">
          <div class="row">
            <div class="col-md-12 col-sm-12 left-top" style="height:auto;">
              <br>
              <hr style='margin-bottom:0px'>
              <div class="col-md-12 col-sm-12" style="text-align:center;">
                <h2 style='font-family:unisansboldbold;font-size:2em;color:#0b2a4a'><img src="{{ asset('dashboard/investor/docsearch.png') }}" alt="" style='display:inline-block;padding-right:5px;margin-top:-10px'>Overview</h2>
              </div>
              <br>
              <div class="row" style='font-family:unisansregularregular !important'>
                <h3 class="col-md-offset-2 col-md-4 col-sm-3 text-right">Open</h3>
                <h3 class="col-md-4 col-sm-3 text-right" style='color:#34a691'>pro 0</h3>
              </div>

              <div class="row" style='font-family:unisansregularregular !important'>
                <h3 class="col-md-offset-2 col-md-4 text-right col-sm-3">Status</h3>
                @if ($property->property_state == 0)
                <h3 class="col-md-4 col-sm-3 text-right" style='color:#34a691'>Available</h3>
                @elseif ($property->property_state == 1)
                <h3 class="col-md-4 col-sm-3 text-right" style='color:#34a691'>Contracted</h3>
                @endif
              </div>
              <br><br>
              <div class="row">
                <div class="col-md-12 col-sm-12 custom-social-button-group" style="text-align: center;margin-bottom:0px">
                  <img src="{{ asset('dashboard/investor/vimeo.png') }}" alt="" style='display:inline-block;padding-left:5px;width:30px'>
                  <img src="{{ asset('dashboard/investor/fb.png') }}" alt="" style='display:inline-block;padding-left:5px;width:30px'>
                  <img src="{{ asset('dashboard/investor/youtube.png') }}" alt="" style='display:inline-block;padding-left:5px;width:30px'>
                  <img src="{{ asset('dashboard/investor/twitter.png') }}" alt="" style='display:inline-block;padding-left:5px;width:30px'>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <h4 style="text-align:center;font-family:unisansregularregular;font-size:1.5em">Share on activity stream</h4>
                </div>
              </div>


            </div>
          </div>
          <br>
          <div class="ibox credis">
            <div class="ibox-title">
              <h3 style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100;font-size:1.8em'>Credits</h3>
            </div>
            <div class="ibox-content top-right-section">
              <div class="row">
                <div class="col-md-9 " style='padding-right:0px'>
                  <p class="custom-text-color">
                    <strong>El pasajero</strong><br>
                    <span>Director,Comercial(2008)</span>
                  </p>
                </div>
                <div class="col-md-3 text-right">
                  <img style='width:30px' src="{{ asset('dashboard/investor/fb.png') }}" alt="">
                </div>
                <div class="col-md-9" style='padding-right:0px'>
                  <p class="custom-text-color">
                    <strong>Lies</strong><br>
                    <span>Director,Documentary Feature(2014)</span>
                  </p>
                </div>
                <div class="col-md-3 text-right">
                  <img style='width:30px' src="{{ asset('dashboard/investor/fb.png') }}" alt="">
                </div>
                <div class="col-md-9" style='padding-right:0px'>
                  <p class="custom-text-color">
                    <strong>Seer</strong><br>
                    <span>Director/Editor, Document Feature(2015)</span>
                  </p>
                </div>
                <div class="col-md-3 text-right">
                  <img style='width:30px' src="{{ asset('dashboard/investor/fb.png') }}" alt="">
                </div>
                <div class="col-md-9 " style='padding-right:0px'>
                  <p class="custom-text-color">
                    <strong>For Spacious Sky</strong><br>
                    <span>Editor, Commercial(2012)</span>
                  </p>
                </div>
                <div class="col-md-3 text-right">
                  <img style='width:30px' src="{{ asset('dashboard/investor/fb.png') }}" alt="">
                </div>
                <div class="col-md-offset-1 col-md-10">
                  <a href='{{route("message.read",$property->seller->id)}}' type="button" class="btn btn-sm btn-primary-01 apply-button">Get In Touch</a>
                </div>
                <div class="col-md-offset-1 col-md-10">
                  <a href='#' data-toggle='modal' data-target='#bidmodal' type="button" class="btn btn-sm btn-primary-01 apply-button">Apply</a>
                </div>
                <div class="col-md-offset-1 col-md-10">
                  <a href='{{route("investor.index")}}' type="button" class="btn btn-sm btn-primary-01 apply-button">Cancel</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
  <div class="row landing-main-bottom">

  </div>

</div>
{{-- bid posting popoup --}}
<div class="modal fade" id="bidmodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" style='width:74%;margin-right:3em;margin-top:5em'>
    <div class="modal-content container p-0" style='width:100%;border-radius:0px'>
      <div class="modal-body" style='padding:0px'>
        <div class="col-md-6 left-section">
          <h2 class='type-1-heading'>Project Details</h2>
          <hr style='margin-left:0px'>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'><i class='fa fa-calender'></i>Dates</h3>
            <span class='type-1-text'>Nov 13, 2017 - Nov 20, 2017</span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'>$ Pay</h3>
            <span class='type-1-text'>$600.00</span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'><i class='fa fa-map-marker'></i>Location</h3>
            <span class='type-1-text'>{{ $property->address }}, {{ $property->city }}, {{ $property->state }}, {{ $property->zip }}</span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'><i class='fa fa-home'></i>Property Id</h3>
            <span class='type-1-text'>{{$property->id}}</span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'>$ BRV</h3>
            <span class='type-1-text'>{{$property->detail->brv_price}}</span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'>$ ARV</h3>
            <span class='type-1-text'>{{$property->detail->arv_price}}</span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'><i class='fa fa-calender'></i>List Date</h3>
            <span class='type-1-text'>{{ date('d-M-Y',strtotime($property->created_at)) }}</span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'><i class='fa fa-home'></i>Proposal Received</h3>
            <span class='type-1-text'>0</span>
          </div>
          <div class="col-md-12 p-0">
            <hr style='margin-left:0px;margin-bottom:35px'>
            <h3 class='type-2-heading' style='margin-bottom:10px'>Description</h3>
            <p class='type-1-text lh'>{{$property->detail->about}}</p>
          </div>
          <br>
          <br>
          <hr style='margin-left:0px'>
        </div>


        <div class="col-md-6 right-section">
          <div class="col-md-12 p-0" style='border-bottom:2px solid #adadae'>
            <h2 class='type-1-heading' style='margin-bottom:35px;font-size:1.7em'>Interested in this investment opportunity?<br> Apply Here
            </h2>
          </div>
          <div class="col-md-12 p-0" style='border-bottom:2px solid #adadae;padding:1.5em 0px;'>
            <div class="col-md-6 p-0 " style='padding-left:10px'>
              <h3 class='type-2-heading'>$ BRV</h3>
              <span class='type-1-text'>{{$property->detail->brv_price}}</span>
            </div>
            <div class="col-md-6 p-0 " style='padding-left:10px'>
              <h3 class='type-2-heading'>$ ARV</h3>
              <span class='type-1-text'>{{$property->detail->arv_price}}</span>
            </div>
            <div class="col-md-6 p-0 " style='padding-left:10px'>
              <h3 class='type-2-heading'><i class='fa fa-calender'></i>List Date</h3>
              <span class='type-1-text'>{{ date('d-M-Y',strtotime($property->created_at)) }}</span>
            </div>
            <div class="col-md-6 p-0 " style='padding-left:10px'>
              <h3 class='type-2-heading'><i class='fa fa-home'></i>Proposal Received</h3>
              <span class='type-1-text'>0</span>
            </div>
          </div>
          <div class="col-md-12 p-0" style='border-bottom:2px solid #adadae;padding:1.5em 0px;'>
            <div class="col-md-12 p-0 ">
              <h3 class='type-2-heading' style='margin-top:0px;font-size:20px;margin-bottom:14px'>Send Proposal</h3>
              @if(auth()->user()->isEnterprise())
              <p class='type-1-text lh'>In order to Submit a proposal for this investment, download proposal template from Admin Documents, fill in
                all the necessary information and post it here</p>
              <form action="{{route('investor.proposal.create')}}" method='post' enctype="multipart/form-data">
                @csrf
                <input type="file" class='form=control' name='proposal'>
                <input type="hidden" value={{$property->id}} name='pro_id'>
                <span class='text-danger'>{{$errors->first()}}</span>
                <div class="col-md-offset-10 col-md-4" style='margin-top:1.5em'>
                  <button type="submit" class="btn btn-sm btn-primary-01 apply-button">Post</button>
                </div>
              </form>
              @else
              <p class='type-1-text lh'>You need to be an Enterprise Member in order to send Proposals, Click on the button below to buy a subscription</p>
              <a href="{{ route('membership.show',$user->roles()->first()->slug) }}" class="btn btn-sm btn-primary-01 apply-button">Buy Membership</a>              @endif
            </div>
          </div>
          <div class="col-md-12 p-0" style='border-bottom:2px solid #adadae;padding:1.5em 0px;'>
            <div class="col-md-12 p-0 ">
              <h3 class='type-2-heading' style='margin-top:0px;font-size:19px;margin-bottom:14px'>Added Additional Media (images or video).</h3>
              @foreach ($property->images as $key => $image)
              <div class="additonal-media">
                <img src="{{asset('properties/'.$property->id.'/images/'.$image->image )}}" style='width:100%;height:100%' alt="">
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-md-12 p-0" style='padding:1.5em 0px;'>
            <div class="col-md-12 p-0 ">
              <h3 class='type-2-heading' style='margin-top:0px;font-size:19px;margin-bottom:14px'>Added Supporting Document</h3>
              @foreach ($property->documents as $key => $doc)
              <div class="col-md-12 p-0 pro-doc" style="">
                <a download href="{{ asset('properties/'.$property->id.'/documents/'.$doc->document) }}">
                  <i style='font-size:4.4em' class='fa fa-folder-o'></i>
                  <p><small>{{$doc->document}}</small> </p>
                </a>
              </div>
              @endforeach
              <div class="col-md-offset-10 col-md-4" style='margin-top:2em'>
                <a href='#' type="button" data-dismiss='modal' class="btn btn-sm btn-primary-01 apply-button">Cancel</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('script')
<script>
  @if($errors->first())
        $("#bidmodal").modal('show');
    @endif

    $(document).ready(function(){
        @if(session('success'))
            alert('Your Proposal has been submitted and is awaiting Admin Approval. You will be notified when it is approved')
        @endif
    })

    function popupCenter(url, title, w, h) {
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    }

</script>
@endsection