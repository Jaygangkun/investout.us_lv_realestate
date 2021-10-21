@extends('layouts.app-layout') 
@section('title') InvestOut
@endsection
 
@section('style')
<style media="screen">
  .main-carousel-1 {
    background-image: url({{ asset('sitefront/Cover3.jpg')}});
  }

  .main-carousel-2 {
    background-image: url({{ asset('sitefront/Cover2.jpg')}});
  }

  .main-carousel-3 {
    background-image: url({{ asset('sitefront/Cover1.jpg')}});
  }

  .seller-realtor-investor {
    margin-bottom: 0px
  }

  @keyframes animateBox {
    0% {
      opacity: 0;
    }
    /* 50% {opacity:0.5; top: 0%} */
    100% {
      opacity: 1;
    }
  }


  .signin-box {
    background: url("{{ asset('sitefront/back.jpg')}}");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
    text-align: center;
    padding: 4.5em 0;
    box-shadow: -8px 19px 35px 0px rgba(0, 0, 0, 0.6);
    width:100%;
    height:100%;
    color:#0b2a4a
}

  .img-logo {
    width: 35%;
    min-width: 240px;
  }

  .signup-heading {
    font-size: 65px;
    margin-bottom: 0;
  }

  .signup-details {
    font-size: 32px;
    font-family: "unisansbookregular";
  }

  .signup-details strong{
    font-family: "unisanssemiboldbold";
  }

  .signup-emailbox {
    width: 90%;
    max-width: 387px;
    position: relative;
    margin: auto;
  }

  .signup-email {
    width: calc(100% - 32px);
    border: none;
    padding: 18px;
    box-shadow: 4px 3px 3px 0px rgba(0, 0, 0, 0.14);
    color: #828385;
  }

  .signup-email:focus {
    outline: none;
  }

  .signin-button {
    position: absolute;
    right: 24px;
    top: 7px;
    color: white;
    background: #0b2a4a;
    border: none;
    outline: none;
    padding: 10px 15px;
    font-weight: bold;
    border-radius: 5px;
    box-shadow: -4px 4px 3px 0px rgba(0, 0, 0, 0.28);
    cursor: pointer;
  }

  input.has-error{border: 1px solid red;}

  .error-div {
    text-align: left;
    padding-left: 16px;
    padding-top: 2px;
    color: red;

  }
</style>
@endsection
 
@section('body')

<div id="carousel-generic" style='height:100%' class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-generic" data-slide-to="1"></li>
    <li data-target="#carousel-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" style='height:100%'>
    <div class="item active" style='height:100%'>
      <div class="mainpic main-carousel-3">
	    <div class="container slider-main">
          <div class="main-text text-left col-lg-6">
            <div class="" style='margin-bottom:-10px;line-height:55px'>
              <span style='font-family:unisansregularregular'>Maximize the <br>
                            Value of your Home <br>
                </span>
              <span style='color:#33a58e'>
                  You Deserve <br>
                  Everything you can Get</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="item " style='height:100%'>
      <div class="mainpic main-carousel-2">
        <div class="container slider-main">
          <div class="main-text text-left col-lg-6">
            <div class="" style='margin-bottom:-10px;line-height:55px'>
              <span style='color:#33a58e'>Increase Values</span> <br>
              <span style='font-family:unisansregularregular;display:block;margin-top:-10px'>Through Investment.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="item" style='height:100%'>
      <div class="mainpic main-carousel-1">
        <div class="container slider-main">
          <div class="main-text text-right col-lg-offset-6 col-lg-6">
            <div class="" style='margin-bottom:-10px;line-height:55px'>
              <span>Why go for less,</span><br>
              <span>when you can</span><br>
              <span style='color:#33a58e'>Get More!</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Controls -->

</div>

{{-- about invest out --}}
<div class="container about-invest-out">

  <div class="col-lg-offset-2 col-lg-8 col-sm-12">
    <h1 class='text-center'>WHETHER YOU ARE A HOMEOWNER TRYING TO GET MORE FOR YOUR HOME OR AN INVESTOR LOOKING FOR A STEADY STREAM OF HOMES TO INVEST IN, A PARTNERSHIPS BETWEEN THE HOMEOWNER AND INVESTOR OFFERS A BETTER ALTERNATIVE THAN THE TRADITIONAL BUY FIX AND SELL MODEL.</h1>
    <h1 class='text-center'>THE <span style='color:#2f9784;font-weight: bold;'>INVEST OUT</span> PARTNERING MODEL DELIVERS ON BOTH OF YOUR NEEDS</h1>
  </div>

  <div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-12 " id="ab-wrap">
    <div class="col-lg-6 about-invest-text col-sm-6 col-xs-6" id="ab-text">
      <h2><span style='color:#2f9784;font-weight: bold;'>About InvestOut</span></h2>
      <h2><span style='color:#5E17B4;font-weight: bold;'>Home owner</span></h2>
      <p class="">
        At Invest Out we know that your home is one of your most valued asset. You may have lived in the community long before the neighborhood was trendy. Now everyone wants to live in your town which is driving up the value. Don’t you believe you deserve more of that value when it comes time to sell it, regardless of its current condition? 
      </p>
      <h2><span style='color:#5E17B4;font-weight: bold;'>Investor</span></h2>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6" id="ab-image">
      <img class='img' src="{{ asset('sitefront/about-invest-image.jpg') }}" alt="About InvestOut">
    </div>
    <div class="col-lg-12 about-invest-text col-sm-12 col-xs-6" id="ab-text">
      <p class="">
       As a Buy Fix and Sell investor, you know the value of a great property in the right location but why would you ever buy and pay for the short term ownership of the home where there’s another way.
      </p>
      <p class="">
          With the Invest Out Partnering model the Investor engages the homeowner, submits a proposal for the renovation and if selected, you never have to buy the home.
      </p>
      <p class="">
          You perform the renovation<br/>
          The homeowner sells the home and you share the increased profits created from the renovation.
      </p>
      <h1 class='text-center'><span style='color:#2f9784;font-weight: bold;'>It’s that simple.</span></h1>
    </div>
  </div>

</div>
{{-- about invest out finish --}}
  @include('partials.seller-investor-realtor-part') {{--
<div class="container progress-maid">
  <div class="col-lg-offset-1 col-lg-10">
    <div class="col-lg-3 text-center">
      <h2 class='progress-numbers'>58</h2>
      <span class='progress-desc'>Home Sold</span>
    </div>
    <div class="col-lg-3 text-center">
      <h2 class='progress-numbers'>72</h2>
      <span class='progress-desc'>Under Rennovation</span>
    </div>
    <div class="col-lg-3 text-center">
      <h2 class='progress-numbers'>45</h2>
      <span class='progress-desc'>Realtors</span>
    </div>
    <div class="col-lg-3 text-center">
      <h2 class='progress-numbers'>62</h2>
      <span class='progress-desc'>Investors Lined Up</span>
    </div>
  </div>
</div> --}}

<div class="container home-rev text-center">
  <span>
      There is no place like home <br>
      Maximize its value!
    </span>
</div>

<div class="overlaybox">
  <div class="overbox">
    <div class="signin-box">
      <img src="{{asset('sitefront/auth-logo.png')}}" alt="" class="img-logo">
      <h1 class="signup-heading">Sign up</h1>
      <h2 class="signup-details">today to know how <br>to <strong>InvestOut</strong></h2>
      <div class="signup-emailbox">
        <form id="overlaybox_signin_frm">
          {!! Form::token() !!}
        <input type="text" placeholder="Email" class="signup-email" name="overlaybox_email" id="overlaybox_email">
        <button class="signin-button" id="overlaybox_signin" type="submit">Submit</button>
        </form>
      </div>
    </div>  
  </div>  
</div>
@endsection
 
@section('template_script')
<script src="{{ asset('js/parallax.min.js') }}"></script>
<script type="text/javascript">
  $('.home-rev').parallax({imageSrc: "{{ asset('sitefront/home-rev1.jpg') }}"});
  setTimeout(() => {
    $('.overlaybox').fadeIn(500)
  }, 10000);

$(document).click(function(event) {
  //if you click on anything except the modal itself or the "open modal" link, close the modal
  if (!$(event.target).closest(".overbox").length) {
    $("body").find(".overlaybox").fadeOut(300);
  }
});

$(document).ready(function(){
  $('#overlaybox_signin_frm').submit(function(){
    var pattern = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm);

    var email = $('#overlaybox_email').val();
    $('#overlaybox_email').removeClass('has-error');    
    $('.error-div').remove();

    if(email == ''){
      $('#overlaybox_email').addClass('has-error');
      $('#overlaybox_email').after('<div class="error-div">Please enter email address.</div>');
      return false;

    } else if(!pattern.test(email)) {
      $('#overlaybox_email').addClass('has-error');
      $('#overlaybox_email').after('<div class="error-div">Please enter valid email address.</div>');
      return false;

    } else {
      var send_data = $(this).serialize();
      $('#overlaybox_signin').text('Loading...');
      $.post('{{ route('signin') }}', send_data, function(data) {
            if($.trim(data) == 'SUCCESS') {
              $('#overlaybox_signin_frm')[0].reset();
              $("body").find(".overlaybox").fadeOut(300);
              $('#overlaybox_signin').text('Submit');

            } else {

            }
            
      });
    }

    return false;
  })
})
</script>
@endsection
