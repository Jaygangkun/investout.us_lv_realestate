@extends('layouts.whole-seller-layout')

@section('style')
<style>
  .custom-container-a {
    width: 86%;
  }

  .fa-eye,
  .fa-star,
  .fa-pencil-square-o {
    font-size: 4em;
    color: darkgray
  }

  #page-wrapper {
    padding: 0px
  }

  .banner h2 {
    color: #0b2a4a;
  }

  .banner .text-container {
    margin-top: 4%;
  }

  .banner h2:first-of-type {
    margin-bottom: -10px;
    font-family: unisansboldbold;
    font-size: 3.3em;
  }

  .banner h2:last-of-type {
    margin: 0px;
    font-size: 3.6em;
    font-family: unisansthinregular;
    font-weight: 700;
  }

  .main-content .main-img {
    margin-left: 4em;
    margin-top: 10%
  }

  .main-content h3,
  p {
    color: #0b2a4a
  }

  .main-content h3 {
    font-family: unisansboldbold;
    font-weight: 100;
    font-size: 2em;
    margin-bottom: 5px;
  }

  .main-content p {
    font-family: unisansregularregular;
    font-size: 1.2em;
    line-height: 25px;
  }

  .outer {
    width: 1px;
    height: 440px;
    margin: auto;
    position: absolute;
    overflow: hidden;
    top: 7px;
    left: 0px
      /* left: 6%; */
  }

  .inner {
    position: absolute;
    width: 100%;
    height: 33.5%;
    background: black;
  }

  .main-body {
    margin-top: 4em;
  }

  @media (min-width:768px) {
    #page-wrapper {
      min-height: 1600px !important
    }
  }
</style>
@endsection

@section('body')
<div class="banner" style="">
  <div class='col-md-offset-2 col-md-6 text-container'>
    <div class="realtor-name text-left">
      <h2 style=''>Welcome To</h2>
      <h2 style=''>{{-- $user->roles()->first()->name --}} Account</h2>
    </div>
  </div>
</div>
<div class='main-content col-md-offset-1 col-md-10'>
  <div class='main-body row'>
    <div class='col-md-12'>
      <h1>How it works?</h1>
    </div>
    @if($hidevideo != '1') 
        <div class="col-md-12" style="margin-bottom: 20px;">
            <input type="checkbox" name="hide_video" value="1" id="hide_video">
            <label class="" for="hide_video">Hide Video</label>
        </div>
        
        <div class='col-md-12' id="video_wrap">
        <iframe width="100%" height="800px" src="//www.youtube.com/embed/ZenTfiMp1IQ?autoplay=1" style="box-shadow: 4px 4px 12px #181818; border: none;"></iframe>
        </div>
    @endif
  </div>
</div>
{{-- <div class='main-content col-md-offset-1 col-md-10'>
  <div class='main-body row'>
    <div class='col-md-6'><img class='main-img' src="{{ asset('/dashboard/seller/posting-property.png') }}" alt=""
        class=""></div>
    <div class='col-md-6' style='padding-right:0px'>
      <div class="outer">
        <div class="inner"></div>
      </div>
      <h3>Posting Properties</h3>
      <p>As a home owner or a Realtor, you now have the opportunity to post your property for review by area investors.

        As a home owner you can post your property for free simply by completing the on-line form that captures key
        information about the property which will assist the Investors in getting a good understanding of the
        opportunity you’re posting. Be as thorough as possible by posting both photos and videos of areas of great
        opportunity as well as those problem spots in the home because it will assist the Investors in understanding if
        the property’s needs are in alignment with the expertise of the investor. This is truly a relationship where a
        strong partnership comes from both transparency and honesty.
      </p>
    </div>
  </div>
  <div class='main-body row'>
    <div class='col-md-6'><img class='main-img' src="{{ asset('/dashboard/seller/sell-property.png') }}" alt=""
        class=""></div>
    <div class='col-md-6' style='padding-right:0px'>
      <div class="outer">
        <div class="inner"></div>
      </div>
      <h3>Proposal Submission</h3>
      <p>As Investors review and understand both the needs of the property as well as the market potential, be prepared
        to show the home in all of its glory. It’s important for an Investor to have a complete understanding before
        they submit a proposal.

        Proposals will include such information as their belief in the Before Renovation Value (BRV), a vision for what
        they plan on doing to increase the value of the property including potentially CAD designs, mockups video
        renderings as well as a proposed investment amount and the projected After Renovation Value (ARV).

        The Proposal will also include the Investor’s submission of what percentage they want from the increased value
        of the home. Your greatest opportunity for negotiations comes from both that BRV as well as their projected
        investment amount in both the components of their cost and labor.
        Remember however that even though their projection of the BRV may be lower than what you believe it’s actually
        worth, will the difference between the BRV and the ARV minus their cost, create a profit for you.
      </p>
    </div>
  </div>
  <div class='main-body row'>
    <div class='col-md-6'><img class='main-img' src="{{ asset('/dashboard/seller/write-proposal.png') }}" alt=""
        class=""></div>
    <div class='col-md-6' style='padding-right:0px'>
      <div class="outer">
        <div class="inner"></div>
      </div>
      <h3>Feedbacks</h3>
      <p>As a home seller everyone will want your thoughts on the process and the completed project. Be upfront and
        honest about your experience especially as it concerns the Invest Out experience as well as your involvement
        with the Investor. Your reviews will be made available and will follow the Investors throughout their
        involvement on the Invest Out website and your positive and negative reviews will assist future home sellers in
        their selection of an investor for their property. Your assessment has meaning to all other sellers so be sure
        to be positive about the positives and provide feedback on how the negatives can be improved.</p>
    </div>
  </div>
</div> --}}
@endsection

@section('script')
<script>
$(document).on('change', '#hide_video', function() {
    $('#video_wrap').slideUp();
    $.ajax({
        url    : '{{route('hidevideo')}}',
        method : "POST",
        data : {},
        dataType : "json",
        success : function (responses)
        {
            
        }
    });
})
</script>
@endsection