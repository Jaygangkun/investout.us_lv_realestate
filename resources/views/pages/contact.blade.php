@extends('layouts.app-layout')


@section('title')
Contact Us
@endsection


@section('style')

  <style media="screen">

.product-show-button>.mainbtnshow{
  margin-left: 0px !important;
  font-family: unisansboldbold;
  font-size: .4em;
  border-radius: 9px;
  border: 1px solid white !important;
  background-color: rgba(43, 61, 81, 0.59) !important;
  padding: .5em 1.5em;
  color: white;
}

.product-show-button:hover{
  text-decoration:none
}

.how-it-works,
.h-works {
    display: none;
}

.mainpic {
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    height: 75%;
    background-image: url('sitefront/Cover-inner.jpg')
}

.overlay {
    height: 75%;
    opacity: .2;
}

.contact-main {
    margin-top: 4em;
    margin-bottom: 4em;
}

.contact-main>div:first-of-type {
    text-align: right;
    padding-right: 0px;
}

.contact-main>div:nth-of-type(2) {
    text-align: left;
}

.contact-main {
    color: #0b2a4a
}

.contact-main input,
.contact-main textarea {
    background-color: #cccccc;
    color: #516479;
    padding: 1.6em;
    font-size: 1.3em;
    border-radius: 8px;
    text-align: right;
    font-family: unisansregularregular !important;
}

.contact-main input::placeholder,
.contact-main textarea::placeholder {
    color: #516479;
}

.contact-main textarea {
    padding-top: 1em;
}

.contact-main h2 {
    margin-bottom: .9em;
    font-family: unisansregularregular;
    font-size: 2.6em;
}

.form-group {
    margin-bottom: 1.5em;
}

.contact-main input {
    height: 50px;
    border: none;
}

.contact-main>div {
    padding: 3em;
}

.contact-main button {
    background-color: #0b2a4a;
    color: #a7b2be;
    border: none;
    border-radius: 5px;
    padding: .9em 1em;
    font-size: 1.2em;
    font-family: unisansregularregular !important;
}

.outer {
    width: 1px;
    height: 40em;
    margin: auto;
    margin: 0px;
    position: relative;
    overflow: hidden;
}

.inner {
    position: absolute;
    width: 100%;
    height: 70%;
    background: grey;
    top: 6%;
    box-shadow: 0px 0px 30px 20px grey;
}

.contact-main>div:nth-of-type(2) input {
    text-align: left;
}

.contact-main button:hover {
    box-shadow: 0px 2px 15px 3px rgba(0, 0, 0, .3) !important;
}

.slider-main {
    top: 55%;
}

@media (max-width:768px) {
    .contact-main>div {
        padding-left: 0px
    }
    .contact-main>div>div:last-of-type {
        display: none
    }
}


  </style>

@endsection

@section('body')


{{-- main front image and call to action --}}
  <div class="mainpic">
    <div class="container slider-main">
      <div class="main-text text-right col-lg-offset-6 col-lg-6">
        <div class="" style='line-height:54px;margin-bottom:-8px'>
          <h1 class='main-banner-text'>          Get in touch to<br>
          <span style='color:#33a58e'>Learn More</strong></span></h1>
        </div>
      </div>
    </div>

  </div>
  <!-- Controls -->

  {{-- contact forms start --}}

  <div class="contact-main container">
    <div class="col-md-offset-1 col-md-5">
    <form id="" action="{{ route('contact.send') }}" method="post">
      {{ csrf_field() }}
      <div class="col-md-10" style="padding:0px">
        <h2>Contact Us</h2>
        <div class="form-group">
          <input required type="text" class="form-control" id=""  name='name' placeholder="Name" aria-label="Name">
          @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
            <input required type="email" class="form-control" id="" name='email' placeholder="Email" aria-label="Email">
          @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          <textarea required  name="message" class='form-control' id="" cols="30" rows="6" aria-label="Contact Message">Message</textarea>
          @if ($errors->has('message'))
            <span class="help-block">
                <strong>{{ $errors->first('message') }}</strong>
            </span>
          @endif
        </div>
        <button type="submit" name="button">Get in Touch</button>
      </div>
    </form>
      <div class="col-md-offset-1 col-md-1">
        <div class="outer">
            <div class="inner"></div>
        </div>
      </div>
    </div>
    {{-- <div class="col-md-5">
      <div class="col-md-10" style="padding:0px">
        <h2>Sign Up / Login</h2>
        <div class="form-group">
          <input type="text" class="form-control" id="" placeholder="Name">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="" placeholder="Email">
        </div>
        <button type="button" name="button">Sign Up</button>
      </div>
    </div> --}}
  </div>


@endsection


@section('template_script')
  <script src="{{ asset('js/parallax.min.js') }}"></script>
  <script type="text/javascript">
    var sent = {{Session::has('contact-send')}}
    if(sent){
        alert('Your Message has been sent')
        let suc = {{Session::remove('contact-send')}}
    }else{
        alert('Unable to send your message at the moment');
    }
  </script>
@endsection
