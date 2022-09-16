@extends('front_end.parent')
@section('body')
<!-- Breadcrumb Section Begin -->
    <style>
    .sr .feature-section.spad .owl-carousel .owl-item .feature-item img.rounded-circle {
        object-fit: cover;
        object-position: top;
    }

    </style>
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h3>Home Owner</h3>
                        <div class="breadcrumb-option">
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Home Owner</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->

    <!-- Seller Image Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-item set-bg" data-setbg="{{asset('assets/front_end/img/seller/seller.jpg')}}">
            </div>
            </div>
        </div>
        <div class="thumbnail-pic">
            <div class="thumbs owl-carousel" style="display: none;">
                
            </div>
        </div>
    </section>
    <!-- Seller Image Section End -->
    <br>
    <!-- Video Section Begin -->
    <div class="video-section set-bg" data-setbg="{{asset('assets/front_end/img/slider.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <a href="https://www.youtube.com/watch?v=yd9eL_Me1i8" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        <h4>WE CREATE NEW WORLD SOLUTIONS</h4>
                        <h2>Increase your Investing IQ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Section End -->
    <!-- Writing Section Begin -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>You deserve more options.</h2><h2>Renovate your home at no cost to you.</h2><h2>Sell it at maximum value and share the profits with the investor.</h2>
                        <h5>Home Owner’s Dilemma</h5> <br>
                        <ul style="margin-left:50px;">
                            <li> Roughly 51 million American seniors live in poverty.</li>
                            <li> Half of all people on Medicare have incomes of less than $26,000 per year.</li>
                            <li> Pensions are a thing of the past and social security doesn’t provide enough money to live on.</li>
                        </ul> 
                        <br>
                        <p>For most, their homes are their most valued assets but when it needs improvements or remodeling in order to sell it at its best price, far too many people are selling their home for pennies on the dollar because they have no other options.</p>
                        <ul style="margin-left:50px;">
                            <li> Don't give your home away. You deserve as much money as you can get when you sell.</li>
                            <li> Partner with an investor and let them renovate your home at no cost to you.</li>
                            <li> And if you would rather just sell, find interested investors who will create a deal that’s right for you.</li> 
                         </ul> 
                         <br>
                        <p>It's a natural fit, and it creates a win-win solution that can leave you with more money when your home sells.</p>
                        <dd>Opportunity for Investors</dd>
                        <p>The two things  investors want most are a steady supply of good homes, and strong profits. Invest Out understands this which is why we wanted to create a meeting place for homeowners and investors which:</p>
                        <ul style="margin-left:50px;">
                            <li> Creates a space where wholesalers can come and advertise their homes</li>
                        </ul>
                            <br>
                        <p>Which means both the homeowners and investors can make more money while wholesalers can move more homes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Writing Section End -->

    <section class="howit-works spad">
        <div class="row">
            <div class="col-lg-12" style="padding: 0px;">
                <div class="section-title">
                    <img src="{{asset('affiliate/1.png')}}" alt="How it Works">
                    <a class="btn btn-primary btn-block" href="https://investout.leaddyno.com/" style="padding: 10px 30px">Apply Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="howit-works spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Process</h2>
                        <img src="{{asset('assets/front_end/img/old/Infographics_ b.png')}}" alt="How it Works">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Begin -->
    <!--<section class="feature-section spad d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What people say about us ?</span>
                        <h2>Testimonials</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="feature-carousel owl-carousel">
                    <div class="col-lg-4">
                        <div class="feature-item">
                            <div>
                                <img src="{{asset('assets/front_end/img/Testimonials/RamonaPark.jpg')}}" class="rounded-circle mx-auto d-block" style="height: 160px; width: 160px;" alt="">
                            </div>
                            <div class="fi-text">
                                <div class="inside-text">
                                    <h5>" I’m a relatively new Realtor® sand while I was well aware of the cost and fail rates of being a Realtor, I could never figure out how to get more clients and grow my business. Invest Out showed me a way to offer more services to my new clients…services that translates to additional profits so the efforts are well worth while. Thank you Invest Out. "
                                </h5>
                                </div>
                                <ul class="room-features">
                                    <li>
                                        <i class="fa fa-female"></i>
                                        <p>Ramona Park </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature-item">
                            <div>
                                <img src="{{asset('assets/front_end/img/Testimonials/dioneFisher.jpg')}}" class="rounded-circle mx-auto d-block" style="height: 160px; width: 160px;" alt="">
                            </div>
                            <div class="fi-text">
                                <div class="inside-text">
                                    <h5>" I have been in the real estate market buying, renovating and selling properties for over 10 years. When I first learned about the Invest Out concept I saw right away how appealing it would be for home sellers that need to make repairs before their homes. It is such a simple concept that I should have thought of it myself. " 
                                </h5>
                                </div>
                                <ul class="room-features">
                                    <li>
                                        <i class="fa fa-male"></i>
                                        <p>Dionne Fisher</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature-item">
                            <div>
                                <img src="{{asset('assets/front_end/img/Testimonials/TraceyReyes.jpg')}}" class="rounded-circle mx-auto d-block" style="height: 160px; width: 160px;" alt="">
                            </div>
                            <div class="fi-text">
                                <div class="inside-text">
                                    <h5>"I took the Partnering class because I was fascinated by the opportunity of growing my real estate business. I’ve been flipping homes since 2016 and my greatest issue has been securing low cost financing and a good supply of homes. Love the class. Very well taught. " 
                                </h5>
                                </div>
                                <ul class="room-features">
                                    <li>
                                        <i class="fa fa-male"></i>
                                        <p>Tracey Reyes</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature-item">
                            <div>
                                <img src="{{asset('assets/front_end/img/Testimonials/TrentBowman.jpg')}}" class="rounded-circle mx-auto d-block" style="height: 160px; width: 160px;" alt="">
                            </div>
                            <div class="fi-text">
                                <div class="inside-text">
                                    <h5>" This created a path for me into real estate. My big thing was that I didn’t be over extended on my credit and by not having to buy the homes, I am able to make better use of the limited cash I actually have – Great concept whose time has definitely come. " 
                                </h5>
                                </div>
                                <ul class="room-features">
                                    <li>
                                        <i class="fa fa-male"></i>
                                        <p>Trent Bowman</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- Testimonial End -->
    <div class="container text-center">
        <img src="{{asset('assets/front_end/img/BeforeAfterSeller.png')}}">
    </div>
    <div class="container text-center">
        <h4 class="text-center pb-1 pt-3">Patent Pending</h4>
        <h4 class="text-center pb-1 pt-3">
            Membership 
            <a href="#" class="terms_and_conditions_link" data-toggle="modal" data-target="#termsAndConditionsModal">
                Terms & Conditions.
            </a>
        </h4>
        <h3 class="text-center pb-1 pt-3">Membership Plan</h3>
        @if(count($plans) > 0)
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope=" row "> <h5>Check out our Membership plan for the home owners </h5></th>
                    <?php $i = 0; ?>
                    @foreach($plans as $plan)
                    <td colspan="0" class="tableheading" style="text-align: center;">
                        @if($i == 0)
                            <b>Home Owner</b>
                        @else
                            <b>Wholesaler</b>
                        @endif
                    </td>
                    <?php $i++; ?>
                    @endforeach
                </tr>
                <tr>
                    <th></th>
                    @foreach($plans as $plan)
                    <td class="table-data">
                        <b><font size="5">{{$plan->amount}}</font>/{{$plan->interval}}</b>
                    </td>
                    <?php $i++; ?>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row ">Wholesalers can list their contracted home for investment and renovation or sell the home directly to investors AS IS.
                    <br><br>Homeowners can additionally list their home to sell it As Is, or partner with an Investor to have it renovated. If the home is “Investible” meaning you would like to potentially, have it renovated before selling it and if an Investor is interested, they will be able to review the home and present offers for either the renovation or purchase of the home.</td>
                    <?php $i = 0; ?>
                    @foreach($plans as $plan)
                    <td>
                        <h3>✓ <?php if($i == 2){echo "*";} ?></h3>
                    </td>
                    <?php $i++; ?>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row ">As a wholesaler you can List multiple properties for sale.
                    <br><br>Home sellers who have completed their 1 home allowance, can convert to an Investor’s account and list any number of homes for sale or Partnership and additionally review the available homes that have been added into the website. </td>
                    <?php $i = 0; ?>
                    @foreach($plans as $plan)
                    <td>
                        @if($i == 0 || $plan->amount == 0)
                            <h3></h3>
                        @else
                            <h3>✓</h3>
                        @endif
                    <?php $i++; ?>
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row ">Wholesaler can chat with and engage investors who have expressed interest in their contracted homes.</td>
                    <?php $i = 0; ?>
                    @foreach($plans as $plan)
                    <td>
                        @if($i == 0 || $plan->amount == 0)
                            <h3></h3>
                        @else
                            <h3>✓</h3>
                        @endif
                    </td>
                    <?php $i++; ?>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row ">* Wholesalers cannot take part in the Partnering process with investors at this time. </td>
                    @foreach($plans as $plan)
                    <td style="min-width: 140px;"></td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        @else
            <h5 style="margin-bottom: 30px;">No plans found!</h5>
        @endif
    </div>
    <div class="text-center">
        <img src="{{asset('assets/front_end/img/seller/seller.png')}}">
    </div>
    <div class="modal fade" id="termsAndConditionsModal" tabindex="-1" role="dialog" aria-labelledby="termsAndConditionsModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Membership Terms & Conditions </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>These free trial terms and conditions govern the free trial of the InvestOut web portal:</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul id="tandcList">
                            <li>After signing up for the free trial, you will have access to the complete functionality of
                                the InvestOut web portal for a period of 30 days, beginning from the moment you
                                complete the registration process.</li>
                            <li>You may use this free trial only once.</li>
                            <li>You have the option to cancel your membership anytime during this trial period.</li>
                            <li>You will not be charged any membership fee before this 30 days trial period ends.</li>
                            <li>At the end of the trial period, you will be charged the monthly membership fee on the
                                31st day from the time of your registration and your subscription will be renewed
                                automatically.</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>See InvestOut help center for more information.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default tandcButton" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">$("#seller").addClass('active');</script>
@endsection
