
<?php $__env->startSection('body'); ?>
    <!-- Slider Section Begin -->
    <style>
        .sr .feature-section.spad .owl-carousel .owl-item .feature-item img.rounded-circle {
            object-fit: cover;
            object-position: top;
        }
        .getMore{
            font-size: 80px !important;
            color : #2cbdb8 !important;
        }
    </style>
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-item set-bg" data-setbg="<?php echo e(asset('assets/front_end/img/slider/slider_2.jpg')); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="hero-text">
                                <h2>Why settle for less,<br>when you can</h2>
                                <div class="room-price">
                                    <h2 class="getMore"> GET MORE </h2>
                                </div>
                                <ul class="room-features">
                                    <li>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>seller">
                                            <i class="fa fa-home"></i>
                                            <p>Your House</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>realtor">
                                            <i class="fa fa-handshake-o"></i>
                                            <p>Realtor</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-item set-bg" data-setbg="<?php echo e(asset('assets/front_end/img/slider/slider_1.jpg')); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="hero-text">
                                <h2>Why settle for less,<br>when you can</h2>
                                <div class="room-price">
                                    <h2 class="getMore"> GET MORE </h2>
                                </div>
                                <ul class="room-features">
                                    <li>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>seller">
                                            <i class="fa fa-home"></i>
                                            <p>Your House</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>realtor">
                                            <i class="fa fa-handshake-o"></i>
                                            <p>Realtor</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-item set-bg" data-setbg="<?php echo e(asset('assets/front_end/img/slider/slider_3.jpg')); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="hero-text">
                                <h2>Why settle for less,<br>when you can</h2>
                                <div class="room-price">
                                    <h2 class="getMore"> GET MORE </h2>
                                </div>
                                <ul class="room-features">
                                    <li>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>seller">
                                            <i class="fa fa-home"></i>
                                            <p>Your House</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>realtor">
                                            <i class="fa fa-handshake-o"></i>
                                            <p>Realtor</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="thumbnail-pic">
            <div class="thumbs owl-carousel" style="display: none;">
                
            </div>
        </div>
    </section>
    <!-- Slider Section End -->

    <!-- Writing Section Begin -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Hello! Welcome to Invest Out<span>.</span></h2>
                        <p>Whether you are a homeowner trying to get more for your home or an investor looking for a steady stream of homes to invest in, a partnership between the homeowner and investor offers a better alternative than the traditional buy fix and sell model.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Writing Section End -->
    <!-- About Investment Begin -->
    <div class="top-properties-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="properties-title">
                        <div class="section-title">
                            <span>If you can Dream it, You can Do it</span>
                            <h2>About Investment</h2>
                        </div>
                        <!-- <a href="<?php echo e(route('property_lists')); ?>" class="top-property-all">View All Properties</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="top-properties-carousel owl-carousel">
                <?php /*<div class="single-top-properties">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="stp-pic">
                                <img src="{{asset('assets/front_end/img/old/about_data.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="stp-text">
                                <h5>Home Owner</h5>
                                <p>At InvestOut we know that your home is one of your most valued asset. You may have lived in the community long before the neghborhood was trendy. Now everyone wants to live in your town which is driving up the value. Don’t you believe you deserve more of that value when it comes time to sell it, regardless of its current condition?.</p>
                                <h5>Home Owner</h5>
                                <p>Invest Out was conceived with the idea of enabling the pairing of homeowners with investors to Partner, Renovate, Sell and Share the profits of the home once sold. 
                                Many homeowners, however, would prefer to simply sell their homes with a limited commitment in time. 
                                We’ve created a market place where homeowners and investors can connect and decide – together. 
                                </p>

                            </div>
                        </div>
                    </div>
                </div>*/ ?>
                <div class="single-top-properties">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="stp-pic">
                                <img src="<?php echo e(asset('assets/front_end/img/old/about_data.jpg')); ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="stp-text">
                                <h5>Home Owner</h5>
                                <p>At InvestOut we know that your home is one of your most valued assets. You may have lived in the community long before the neighborhood was trendy. Now everyone wants to live in your town which is driving up the value. Don’t you believe you deserve more of that value when it comes time to sell it, regardless of its current condition?.</p>
                                <h5>Investor</h5>
                                 <p>Invest Out was conceived with the idea of enabling the pairing of homeowners with investors to Partner, Renovate, Sell and Share the profits of the home once sold. 
                                Many homeowners, however, would prefer to simply sell their homes with a limited commitment in time. 
                                We’ve created a market place where homeowners and investors can connect and decide – together. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Investment End -->  
   
    <!-- Video Section Begin -->
    <div class="video-section set-bg" data-setbg="<?php echo e(asset('assets/front_end/img/slider.jpg')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <a href="https://www.youtube.com/watch?v=2UR0QqCsVtM" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        <!--<a href="https://www.youtube.com/watch?v=U-v2lc2Mxvs" class="play-btn video-popup"><i class="fa fa-play"></i></a>-->
                        <h4>WE CREATE NEW WORLD SOLUTIONS</h4>
                        <h2>Increase your Investing IQ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Section End -->
    <br>
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
                                <img src="<?php echo e(asset('assets/front_end/img/Testimonials/RamonaPark.jpg')); ?>" class="rounded-circle mx-auto d-block" style="height: 160px; width: 160px;" alt="">
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
                                <img src="<?php echo e(asset('assets/front_end/img/Testimonials/dioneFisher.jpg')); ?>" class="rounded-circle mx-auto d-block" style="height: 160px; width: 160px;" alt="">
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
                                <img src="<?php echo e(asset('assets/front_end/img/Testimonials/TraceyReyes.jpg')); ?>" class="rounded-circle mx-auto d-block" style="height: 160px; width: 160px;" alt="">
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
                                <img src="<?php echo e(asset('assets/front_end/img/Testimonials/TrentBowman.jpg')); ?>" class="rounded-circle mx-auto d-block" style="height: 160px; width: 160px;" alt="">
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">$("#home").addClass('active');</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front_end.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>