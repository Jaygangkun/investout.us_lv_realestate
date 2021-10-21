@extends('layouts.stripe-response-layout') 
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
<div class="response-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Thank you. Payment was successfull.</h3>
        <p>Transcation Details</p>
        <table>
          <tr>
            <td>Transaction ID: </td>
            <td>{{ $charge['id'] }} </td>
          </tr>
          <tr>
            <td>Amount: </td>
            <td><?php echo strtoupper($charge['currency']); ?> {{ $charge['amount']/100 }} </td>
          </tr>
          <tr>
            <td>Created: </td>
            <td><?php echo date('Y-m-d H:i:s', $charge['created']); ?> </td>
          </tr>
        </table>
        <?php 
          echo "<pre>";
          print_r($charge);
          echo "</pre>";
        ?>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('template_script')
@endsection
