<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="Azenta, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Investout | Real Estate</title>
    <link rel="icon" href="{{asset('assets/front_end/img/favicon.ico') }}" type="image/gif" sizes="16x16">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('assets/front_end/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front_end/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front_end/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front_end/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front_end/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front_end/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front_end/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front_end/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front_end/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front_end/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front_end/css/plan_style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/validationEngine.jquery.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha512-KXkS7cFeWpYwcoXxyfOumLyRGXMp7BTMTjwrgjMg0+hls4thG2JGzRgQtRfnAuKTn2KWTDZX4UdPg+xTs8k80Q==" crossorigin="anonymous" />

    @if(isset($property))
    @php
    $ogurl = ENV('APP_URL')."dashboard/seller/default-property.jpg";
    $images = $property->images()->get();
    $title = $property->property_type;
    $cover = 0;
    @endphp
      @if(!empty($images))
        @foreach($images as $img)
          @if($img['is_cover_image'] == 1) 
            @php $cover = 1;  @endphp
               <?php $ogurl =  asset('properties/'.$property->id.'/images/'.$img->image); ?>
          @endif
        @endforeach
    @endif

    <?php
    $url = ENV('APP_URL')."property-lists/".$property->id."/property-details"; 
    $desc = "";
    if(isset($details) && !empty($details))
    {
        $desc = "Description: " . $details->about;
    }
    ?>

    <meta property="og:url"           content="<?php echo $url; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{(isset($details) && isset($details->property_type) && $details->property_type != '') ? $details->property_type : $title}}" />
    <meta property="og:description"   content="{{$desc}}" />
    <meta property="og:image"         content="<?php echo $ogurl; ?>" />
    @endif

    <style>
        .row{
            width: 100%;
        }
        .dropbtn {
          background-color: #4CAF50;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
        }

        .dropdown {
          position: relative;
          display: inline-block;
          color: #ffffff;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
          z-index: 999;
        }

        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135763349-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-135763349-4');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
     fbq('init', '350900722753467'); 
    fbq('track', 'PageView');
    </script>
    <noscript>
     <img height="1" width="1" 
    src="https://www.facebook.com/tr?id=350900722753467&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
    
    <!-- ManyChat -->
    <script src="//widget.manychat.com/1749358288687918.js" async="async"></script>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="language-bar">
            <div class="language-option">
                {{-- <img src="{{asset('assets/front_end/img/flag.png')}}" alt=""> --}}
                {{-- <span>English</span> --}}
                <!-- <i class="fa fa-angle-down"></i> -->
                <li id="home"><a href="{{ url('/') }}">Home</a></li>
                <li id="seller"><a href="{{ route('seller_index') }}">Seller</a></li>
                <li id="investor"><a href="{{ route('investor_index') }}">Investor</a></li>
                <li id="realtor"><a href="{{ route('realtor_index') }}">Realtor</a></li>
                <li id="realtor"><a href="{{ route('envoy.index') }}">Envoy</a></li>
                <!-- <li id="properties"><a href="{{ route('property_lists') }}">Properties</a></li> -->
                <li id="hiw"><a href="{{ route('how_it_works_index') }}">How it works</a></li>
                <li id="contact"><a href="{{ route('contact_index') }}">Contact</a></li>
                <!-- <li id="training"><a href="{{ route('training_index') }}">Training</a></li> -->
                {{-- <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">English</a></li>
                        <li><a href="#">Germany</a></li>
                        <li><a href="#">China</a></li>
                    </ul>
                </div> --}}
            </div>
            {{-- <div class="property-btn">
                <a href="#" class="property-sub">Submit Property</a>
            </div> --}}
        </div>
        <nav class="main-menu">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
            </ul>
        </nav>
        <div class="nav-logo-right">
            <ul>
                <!-- <li>
                    <i class="icon_phone"></i>
                    <div class="info-text">
                        <span>Phone:</span>
                        <p>+1 (800) 935-8220</p>
                    </div>
                </li>  -->
                <li>
                    <i class="icon_mail"></i>
                    <div class="info-text">
                        <span>Email:</span>
                        <p>Info.cololib@gmail.com</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->
    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="top-nav">
            <div class="top-nav-container">
                <style>
                .top-nav-container {
                    width: 90%;
                    margin: auto;
                }

                .top-nav-content {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }

                .top-nav-contact-wrap .nav-logo {
                    box-shadow: initial !important;
                }

                .top-nav .main-menu ul li a {
                    font-size: 16px;
                    color: #000000;
                }

                .top-nav {
                    background: #ffffff !important;
                    border-bottom: 1px solid black;
                }

                .top-nav-menu-wrap {
                    flex-grow: 1;
                    display: flex;
                    align-items: center;
                    justify-content: flex-end;
                }
                </style>
                <div class="top-nav-content">
                    <div class="top-nav-logo-wrap">
                        <a href="{{ url('/') }}"><img src="{{asset('assets/front_end/img/logo-new.png')}}" style="height:70px" alt=""></a>
                    </div>
                    <div class="top-nav-menu-wrap">
                        <nav class="main-menu">
                            <ul>
                                <li id="home"><a href="{{ url('/') }}">Home</a></li>
                                <li id="seller"><a href="{{ route('seller_index') }}">Seller</a></li>
                                <li id="investor"><a href="{{ route('investor_index') }}">Investor</a></li>
                                <li id="realtor"><a href="{{ route('realtor_index') }}">Realtor</a></li>
                                <li id="realtor"><a href="{{ route('envoy.index') }}">Envoy</a></li>
                                <!-- <li id="properties"><a href="{{ route('property_lists') }}">Properties</a></li> -->
                                <li id="hiw"><a href="{{ route('how_it_works_index') }}">How it works</a></li>
                                <li id="contact"><a href="{{ route('contact_index') }}">Contact</a></li>
                                <!-- <li id="training"><a href="{{ route('training_index') }}">Training</a></li> -->
                                
                            </ul> 
                        </nav>
                        <div class="top-nav-contact-wrap">
                            <div class="nav-logo">
                                <div class="nav-logo-right">
                                    <ul>
                                        <li>
                                            <i class="icon_mail"></i>
                                            <div class="info-text">
                                                <span>Email:</span>
                                                <p>info@investout.us</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
@yield('body')


    <!-- Footer Section Begin -->
    <footer class="footer-section set-bg" style="background-color:#1b2638;"> 
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-logo">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="{{asset('assets/front_end/img/logo2.png')}}" style="height:60px" alt=""></a>
                            </div>
                            <p>Subscribe our newsletter & get notification about new updates.</p>
                            <form action="#" id="frmNewsletterSubscription" class="newslatter-form">
                                <input type="text" id="subscriber_email" name="subscriber_email" placeholder="Enter your email..." maxlength="255" style="padding-right: 45px;" />
                                <button type="submit" id="subscribeToNewsLetter"><i class="fa fa-location-arrow"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="footer-widget">
                            <h4> Head Quarters</h4>
                            <ul>
                                <li style="color:#aaaab3;"><i class="fa fa-caret-right"></i> Philadelphia, PA</li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h4>Social</h4>
                            <ul class="social">
                                <li><i class="ti-facebook"></i> <a href="https://facebook.com/investout" target="_blank">Facebook</a></li>
                                <li><i class="ti-instagram"></i> <a href="https://instagram.com/investout" target="_blank">Instagram</a></li>
                                <li><i class="ti-linkedin"></i> <a href="https://www.linkedin.com/company/invest-out" target="_blank">Linkedin</a></li>
                                <li><i class="ti-youtube"></i> <a href="https://www.youtube.com/channel/UCOrY9BJsDNHfuDEKnJqXWaA" target="_blank">Youtube</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-widget">
                            <h4>Contact Us</h4>
                            <ul class="contact-option">
                                <!-- <li><i class="fa fa-phone"></i> +1 (800) 935-8220 </li> -->
                                <li><i class="fa fa-envelope"></i> info@investout.us </li>
                                <li><i class="fa fa-clock-o"></i> Mon - Sat, 08:00 AM - 06:00 PM</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-text">
                <p><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></p>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('assets/front_end/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/front_end/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('property/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/front_end/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/front_end/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/front_end/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('assets/front_end/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('property/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/front_end/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('property/assets/vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/front_end/js/main.js')}}"></script>
    <script src="{{asset('property/assets/js/main.js')}}"></script>    
    <script src="{{ asset('js/jquery.validationEngine.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validationEngine-en.min.js') }}"></script>
<script>
    $(document).on('click', '.moreless-button', function() {
        $('.moretext').slideToggle();
        if ( $(this).text().toLowerCase() == "read more") {
            $(this).text("Read Less");
        } else {
            $(this).text("Read More");
        }
        return false;
    });

    $(document).on('click', '.moreless-button1', function() {
        $('.moretext1').slideToggle();
        if ( $(this).text().toLowerCase() == "read more") {
            $(this).text("Read Less");
        } else {
            $(this).text("Read More");
        }
        return false;
    });

$('.faq-question').on('click',function () {
    console.log('ksdjfgkjsfd');
   $(this).siblings('.answer').slideToggle();
});
</script>
<!-- ajax call  -->
<script>
    function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField) == false) 
        {
            //alert('Invalid Email Address');
            return false;
        }

        return true;
    }
$(document).ready(function(){

    $(document).on('click', '#subscribeToNewsLetter', function() {
        var email = $('#subscriber_email').val();

        // remove error
        $('#subscription_error, #subscription_in_process, #subscription_notice').remove();

        if( email == '' ) {
            $('#subscriber_email').after('<span id="subscription_error" class="text-danger">Please enter email address</span>');
            return false;
        }

        if( !validateEmail( email ) ) {
            $('#subscriber_email').after('<span id="subscription_error" class="text-danger">Invalid email address</span>');
            return false;
        }

        // show processing text and disable submit button
        var $btn = $(this);
        $btn.prop('disable', true);


        $('#subscriber_email').after('<span id="subscription_in_process" class="text-danger">Please wait...</span>');

        $.ajax({
            url    : '{{ route("subscribeToMailchimp") }}',
            method : "POST",
            data : {
            email: email,
            _token:"{{csrf_token()}}"
            },
            success : function (response)
            {
                $btn.prop('disable', false);
                //var response = JSON.parse(response);
                cls = 'text-danger';
                if(response.flag === 1) {
                    cls = 'text-success';
                }
                $(document).find('#subscription_in_process').remove();
                $('#subscriber_email').after('<span id="subscription_notice" class="' + cls + '">' + response.message + '</span>');
                $('#frmNewsletterSubscription')[0].reset();
            },
        });
        return false;
    });
    
    $(document).on('click','.filter-data',function(){
        if($(this).hasClass('filter-button')){
            $('#load-data').html("");  
        }
        
        var id = $(this).data('id');
        var keyword = $('#keyword-val').val();
        var intvt_price = $( "#intvt_price" ).val();
        var arv_price = $( "#arv_price" ).val();
        var brv_price = $( "#brv_price" ).val();
        var latitude = $( "#Latitude" ).val();
        var longitude = $( "#Longitude" ).val();
        var rangeinkm = $( "#RangeInKM" ).val();

        $("#preloder").css({"display": "block", "opacity": "0.7"});
        $(".loader").css({"display": "block", "opacity": "0.7"});
        $.ajax({
           url    : '{{ route("keywordSearch") }}',
           method : "POST",
           data : {id:id,intvt_price:intvt_price,arv_price:arv_price,brv_price:brv_price,keyword:keyword,latitude:latitude,longitude:longitude,rangeinkm:rangeinkm, _token:"{{csrf_token()}}"},
           dataType : "text",
           success : function (responses)
           {
                var response = JSON.parse(responses);
                if(response.status == true) 
                {
                    $('#remove-row').remove();
                    if($(this).hasClass('filter-button')){
                        $('#load-data').html(response.data);
                    }
                    else{
                        $('#load-data').append(response.data);
                    }
                }
                else
                {
                    $("#remove-row").html("");
                    console.log("No Data Found");
                }
            },
            complete: function(){
                $("#preloder").css({"display": "none"});
                $(".loader").css({"display": "none"});
            }
        });
    });

    $( "#invtAmount" ).slider({
        range: true,
        min: 500,
        max: 500000,
        values: [ 500, 500000 ],
        slide: function( event, ui ) {
            $( "#intvt_price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
        
    $( "#intvt_price" ).val( "$" + $( "#invtAmount" ).slider( "values", 0 ) +
           " - $" + $( "#invtAmount" ).slider( "values", 1 ) );  

    // Filter on ARB, BRV Price  

    $( "#ArvSlider" ).slider({
        range: true,
        min: 500,
        max: 500000,
        values: [ 500, 500000 ],
        slide: function( event, ui ) {
            $( "#arv_price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        } 
    });
        
    $( "#arv_price" ).val( "$" + $( "#ArvSlider" ).slider( "values", 0 ) + " - $" + $( "#ArvSlider" ).slider( "values", 1 ) );  

    $( "#BrvSlider" ).slider({
        range: true,
        min: 500,
        max: 500000,
        values: [ 500, 500000 ],
        slide: function( event, ui ) {
            $( "#brv_price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        } 
    });
        
    $( "#brv_price" ).val( "$" + $( "#BrvSlider" ).slider( "values", 0 ) + " - $" + $( "#BrvSlider" ).slider( "values", 1 ) );  

}); 
</script>
<script>
$(document).ready(function($){
    $('.cd-filter-trigger').on('click', function(){
        triggerFilter(true);
    });
    $('.cd-filter .cd-close').on('click', function(){
        triggerFilter(false);
    });

    function triggerFilter($bool) {
        var elementsToTrigger = $([$('.cd-filter-trigger'), $('.cd-filter'), $('.cd-tab-filter'), $('#main .container')]);
        elementsToTrigger.each(function(){
            $(this).toggleClass('filter-is-visible', $bool);
        });
    }    
    
    //fix lateral filter and gallery on scrolling
    /*
    $(window).on('scroll', function(){
        (!window.requestAnimationFrame) ? fixGallery() : window.requestAnimationFrame(fixGallery);
    });

    function fixGallery() {
        var offsetTop = $('.cd-main-content').offset().top,
            scrollTop = $(window).scrollTop();
        ( scrollTop >= offsetTop ) ? $('.cd-main-content').addClass('is-fixed') : $('.cd-main-content').removeClass('is-fixed');
    }
    */
    $( ".priceNew" ).each(function( index ) {
        var newPrice = numberWithCommas($(this).html());
        $(this).html(newPrice);
    });
    function numberWithCommas(number) {
        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }
});
</script>
@yield('script')
</body>
</html>