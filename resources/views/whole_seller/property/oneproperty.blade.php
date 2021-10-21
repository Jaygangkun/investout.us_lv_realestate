@extends(session('layout')) 
@section('style')
<link rel="stylesheet" href="{{asset('css/investor-index.css')}}">
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

    .tab-pane>img {
        width: 100%;
        height: 400px;
    }

    .tab-content {
        padding-top: 0px !important
    }

    .landing-main .row .body {
        min-height: 800px;
        box-shadow: none;
        padding: 0px
    }

    .ibox table tr>td:nth-child(2n+1) {
        font-weight: bold
    }

    .ibox .custom-color-green-bg {
        margin-top: -7px;
        margin-right: 10px;
    }

    .property-right-section {
        margin-top: 54px;
    }

    .property-right-section>.property-images {
        display: flex;
        justify-content: space-between
    }

    .property-right-section>.property-images img {
        width: 29.5%;
        height: 83px;
    }

    .product-desc {
        font-size: 1.15em;
        padding: 1em 0em;
    }

    .product-desc img {
        margin-right: 5px;
        margin-top: -8px;
    }

    .product-desc {
        min-height: 215px;
    }
</style>
@endsection
 
@section('body')
<section>
    <div class="landing-main landing-page">
        <div class="row">
            <div class="wrapper wrapper-content custom-container-a overfolw-hidden">
                <div class="row">
                    <div class='col-md-8'>
                        <br>
                        <h2 style="color:#0b2a4a;font-family:unisansboldbold;font-weight:100"><b style="font-weight:100">All Proposals</b></h2>
                        <div class="tab-content body">
                            <!-- OVERVIEW -->
                            <div class="tab-pane active" id="tab_default_1">
                                @if(isset($property->images()->first()->image))
                                <img alt="image" src="{{ asset('properties/'.$property->id.'/images/'.$property->images()->first()->image)}}">                                @else
                                <img alt="image" src="{{ asset('dashboard/seller/default-property.jpg')}}" /> @endif
                            </div>
                            <br>
                            <div class="p-t-md">
                                <div class="row" style='margin:0px'>
                                    <div class="ibox" style='padding:0px'>
                                        <hr>
                                        <h3>Property Details <a href="{{ route('seller.property.edit',$property->id) }}" class="btn color-white  pull-right custom-color-green-bg"
                                                id='formsubmit'>EDIT</a></h3>
                                        <hr>
                                        <div class="ibox-content " style="border:none;padding:0px">
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
                                                            <td style='padding-right: 30px;'>{{ date('d-M-Y', strtotime($property->detail->updated_at)) }}
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                            </td>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 property-right-section">
                        <h2 style="color:#0b2a4a;font-family:unisansboldbold;font-weight:100"><b style="font-weight:100">Photos</b></h2>
                        <div class='property-images'>
                            @php $counter = 0; 
@endphp @foreach ($property->images as $key => $image) @php $counter = $counter +1; 
@endphp @if($counter
                            <=3 ) <img src="{{asset('properties/'.$property->id.'/images/'.$image->image )}}"> @endif @endforeach
                        </div>
                        <div class="product-desc ">
                            <div class="m-t-xs" style='position:relative'>
                                <div class="" style="position:absolute;height: 10px;width: 10%;display:  inline-block;">
                                    <img src="{{ asset('dashboard/investor/address.png') }}" style='margin' alt="">
                                </div>
                                <div class="" style="position:relative;left:23px;display: inline-block;width: 90%;">
                                    Address: {{ $property->address }}, {{ $property->city }}, {{ $property->state }}, {{ $property->zip }}
                                </div>
                            </div>
                            <div class="m-t-xs">
                                <img src="{{ asset('dashboard/investor/city-512.png') }}" alt=""> Property Id: {{ $property->id
                                }}
                            </div>
                            <div class="m-t-xs">
                                <img src="{{ asset('dashboard/investor/Cal.png') }}" alt=""> List Date: {{ date('d-M-Y',strtotime($property->created_at))
                                }}
                            </div>
                            <div class="m-t-xs">
                                <img src="{{ asset('dashboard/investor/Cal.png') }}" alt=""> Days Listed: &nbsp;
                                <?php
                                      $datetime1 = new DateTime($property->created_at);
                                      $datetime2 = new DateTime('now');
                                      $interval = $datetime1->diff($datetime2);
                                      echo $interval->format('%a');?> day(s)

                            </div>
                            <div class="m-t-xs">
                                <img src="{{ asset('dashboard/investor/Money-2-icon.png') }}" alt=""> Est. BVR: &nbsp;${{
                                $property->detail->brv_price }}
                            </div>
                            <div class="m-t-xs">
                                <img src="{{ asset('dashboard/investor/Money-2-icon.png') }}" alt=""> Est. AVR: &nbsp;${{
                                $property->detail->brv_price }}
                            </div>
                            <div class="m-t-xs">
                                <img src="{{ asset('dashboard/investor/YPS__email_mail_mailbox_receive-512.png') }}" alt="">                                Proposals Received: &nbsp;0
                            </div>
                        </div>
                        @if($property->property_state == 0)
                        <div class="status" style="">
                            <button href="" class="btn-primary-01" style="border:none;background:none"><img style='width:18px' src="{{ asset('dashboard/investor/accepting.png') }}" alt=""></button>

                            <a class="ellipsis ng-binding ng-scope -user-role" style="max-width: 100%; min-width: 100%;" href=""> &nbsp;&nbsp;Accepting Proposals
                                    </a>
                        </div>
                        @elseif ($property->property_state == 1)
                        <div class="status" style="">
                            <button href="" class="btn-primary-01" style="border:none;background:none"><img style='width:18px' src="{{ asset('dashboard/investor/tags.png') }}" alt=""></button>

                            <a class="ellipsis ng-binding ng-scope -user-role" style="max-width: 100%; min-width: 100%;" href=""> &nbsp;&nbsp;Contracted
                                     </a>
                        </div>
                        @endif

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