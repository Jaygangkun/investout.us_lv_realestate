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
                        <h3>How it Works</h3>
                        <div class="breadcrumb-option">
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                            <span>How it works</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->
    <!-- Writing Section Begin -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <p> Invest Out gives more choices to both the property seller and the investor because people have different goals and objectives. Whether you are trying to sell your home as is or get more money when it sells, as a property owner you deserve choices.Investors have different needs and finding quality properties in which to invest is right up at the top of the list. Find more homes, scale your business faster and know more about the properties before you invest.  
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Writing Section End -->
   <!-- How It Works Section Begin -->
    <section class="howit-works spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Follow the Process</h2>
                        <img src="{{asset('assets/front_end/img/old/how_it_works.png')}}" alt="How it Works">
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
    <!-- How It Works Section End -->
   <!-- Testimonial Begin -->
    <!--<section class="feature-section spad">
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

@endsection
@section('script')
<script type="text/javascript">$("#hiw").addClass('active');</script>
@endsection
