@extends('layouts.app-layout')


@section('title')
Realtor
@endsection


@section('style')

  <style media="screen">

  .mainpic
  {
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  background-repeat: no-repeat;
  height: 75%;
  background-image: url({{ asset('cms/'.$page->topimage) }});
  }
  .overlay{
    height: 75%;
    opacity: .2;
  }

  .about-invest-out h1{
    margin-bottom: .4em;
  }
  .investor-part-main{
  background-image: url("{{ asset('sitefront/inv-image.jpg') }}");
  }
  .slider-main{
        top: 55%;
  }
  </style>

@endsection

@section('body')

@php
    $middle = strrpos(substr($page->topheading, 0, floor(strlen($page->topheading) / 2)), ' ') + 1;

    $string1 = substr($page->topheading, 0, $middle);  // "The Quick : Brown Fox "
    $string2 = substr($page->topheading, $middle);  // "Jumped Over The Lazy / Dog"
@endphp


{{-- main front image and call to action --}}
<div class="mainpic">
  <div class="container slider-main">
    <div class="main-text text-right col-lg-offset-6 col-lg-6" style='line-height:54px'>
        Wise
        <span style='color:#33a58e'>
            Investments
        </span><br>
            Wise <span style='color:#33a58e'>
                    Profits
                    </span>
            <br>
    </div>
  </div>
</div>
<!-- Controls -->



{{-- about invest out  --}}
  <div class="container about-invest-out">

    <div class="col-lg-offset-2 col-lg-8 col-sm-12 text-center" style="margin-bottom: 7em;">
        <h1 class='' style="text-transform:uppercase">{!!$page->textbelow!!}
        </h1>
    </div>

    <div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-12 " id="ab-wrap">
    <div class="col-lg-12 about-invest-text col-sm-6 col-xs-6" id="ab-text"><span style='color:#2f9784' id='page-head'>{!!$page->headingcontent!!}</span>
            <p class="ab-content">
               <img class='img ab-image' src="{{ asset('cms/'.$page->contentimage) }}" alt="About Invest Out Image">
                {!!$page->content!!}
            </p>

          </div>
          <div class="col-lg-6 col-sm-6 col-xs-6" id="ab-image">
          </div>
        </h1>
    </div>
    <div class="col-sm-12 text-center" style="margin-bottom: 7em;">
      @foreach ($plans as $plan)
        <div class="col-md-4">
            <ul class="price">
              <li class="header">{{$plan->plan_name}}</li>
              <li class="grey">INR <?php echo number_format($plan->amount,2);?> / {{$plan->interval}}</li>
              <li>Lorem Ipsum</li>
              <li>Lorem Ipsum</li>
              <li>Lorem Ipsum</li>
              <li>Lorem Ipsum</li>
              <li class="grey"><a href="/register?plan={{$plan->plan_id}}" class="btn btn-primary btn-block">Sign Up</a></li>
            </ul>
        </div>
      @endforeach
    </div>

  </div>
{{-- about invest out finish --}}



@include('partials.seller-investor-realtor-part')


@endsection


@section('template_script')
  <script src="{{ asset('js/parallax.min.js') }}"></script>
  <script type="text/javascript">

  </script>
@endsection
