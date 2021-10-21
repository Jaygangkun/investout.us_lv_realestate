@extends('layouts.auth-layout')


@section('title')
Login To InvestOut
@endsection

@section('style')
  <style media="screen">
  .auth-left{
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
  }

  .card {
    overflow: hidden;
    position: relative;
  }

  .auth-right{
    margin-left: 43.8%;
  }

  .auth-right .dont-have-account{
    color:#808080;
  }

  .thank-you-pop{
  width:100%;
  padding:20px;
  text-align:center;
}
.thank-you-pop img{
  width:76px;
  height:auto;
  margin:0 auto;
  display:block;
  margin-bottom:25px;
}

.thank-you-pop h1{
  font-size: 42px;
    margin-bottom: 25px;
  color:#5C5C5C;
}
.thank-you-pop p{
  font-size: 20px;
    margin-bottom: 27px;
  color:#5C5C5C;
}
.thank-you-pop h3.cupon-pop{
  font-size: 25px;
    margin-bottom: 40px;
  color:#222;
  display:inline-block;
  text-align:center;
  padding:10px 20px;
  border:2px dashed #222;
  clear:both;
  font-weight:normal;
}
.thank-you-pop h3.cupon-pop span{
  color:#03A9F4;
}
.thank-you-pop a{
  display: inline-block;
    margin: 0 auto;
    padding: 9px 20px;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    background-color: #8BC34A;
    border-radius: 17px;
}
.thank-you-pop a i{
  margin-right:5px;
  color:#fff;
}
#ignismyModal .modal-header{
    border:0px;
}

#ignismyModal button:hover {
  box-shadow : 2px 2px 2px rgba(0, 0, 0, 0.15) !important; 
}

#ignismyModal .modal-dialog{
  width: 400px !important;
  margin-top: 60px;
}
.invalid-feedback{
  color: red;
}
.viewpassword{
  position: absolute;
  top: 15px;
  right: 10px;
  font-size: 18px;
  cursor: pointer;
}
  


  </style>
@endsection


@section('body')
<main class=''>
  <div class="container ">
    <div class="row">
      <div class="card col-md-8 col-md-offset-2">
        <div class="col-md-5 auth-left text-center">
          <img src="{{ asset('sitefront/auth-back.png') }}" alt="">
          <div class="">
            <h3 style='letter-spacing:3px;margin-bottom:0px'>WELCOME TO</h3>
            <h1 style='margin:6px;'><a href="{{ENV('APP_URL')}}" class='no-hover'>INVESTOUT</a></h1>
            <h3>For Yourself dosen't <br> mean BY Yourself </h3>
          </div>
        </div>

        <div class="col-md-7 auth-right">
            <div class="row text-center">
              <a href="{{ route('login') }}"><img src="{{ asset('sitefront/auth-logo.png') }}"  alt="Invest Out Logo"></a>
            </div>
            <div class="row text-center">
              <h4>Login  to <span class='site-brand'><a href="{{ route('login') }}" class='no-hover'>InvestOut </a></span> Dashboard</h4>
            </div>
            <div class="row">
              <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf

                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}"  data-validation-engine="validate[required,custom[email]]" autofocus>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                  <div style="position: relative;">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password"  data-validation-engine="validate[required]">
                    <span class="fa fa-eye viewpassword"></span>
                  </div>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                  <div class="row text-right" style='margin:0px'>
                     <a href="{{route('password.request')}}" >Forgot Password ?</a>
                  </div>
                  <div class="row">
                    <div class="col-md-5 text-left form-btn">
                      <button type="submit" name="button">Sign In</button>
                    </div>
                   <!--  <div class="col-md-7 dont-have-account">
                      <span>Do not have an account? <a href="{{ route('register') }}" class='signup-link'>Signup here</a></span>
                    </div> -->
                    <div class="col-md-7 dont-have-account" style="padding-top: 1em;">
                      <a href="{{ route('index') }}">Go to Homepage</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
      <div class="row">
          <a class="btn btn-primary" style="display:none;" id="successmodal" data-toggle="modal" href="#ignismyModal">open Popup</a>
          <div class="modal fade" id="ignismyModal" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="thank-you-pop">
                        <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                        <h3>Registration successful</h3>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label=""><span>Done</span></button>
                      </div>   
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

@endsection
@section('template_script')
  <script type="text/javascript">
    $("#loginForm").validationEngine();
  $(document).ready(function() {
    <?php 
    if(session('status') || session('success')){
    ?>

      $("#successmodal").click();
    <?php
    }
    ?>
  });
  </script>

  <script type="text/javascript" >
    function preventBack()
    {
      window.history.forward();
    }
    preventBack();

    $(".viewpassword").click(function(){
      var type = $("#password").attr('type');
      if(type == 'password'){
        $("#password").attr('type','text');
        $(".viewpassword").removeClass('fa-eye');
        $(".viewpassword").addClass('fa-eye-slash');
      }
      else{
        $("#password").attr('type','password');
        $(".viewpassword").removeClass('fa-eye-slash');
        $(".viewpassword").addClass('fa-eye');
      }
    });
</script>
@endsection
