@extends('layouts.auth-layout')


@section('title')
Reset Password
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
            <h3>For yourself dosen't <br> mean BY youself </h3>
          </div>
        </div>

        <div class="col-md-7 auth-right">
            <div class="row text-center">
              <a href="{{ route('index') }}"><img src="{{ asset('sitefront/auth-logo.png') }}"  alt=""></a>
            </div>
            <div class="row text-center">
              <h4>Reset <span class='site-brand'>InvestOut</span> Password</h4>
            </div>
            <div class="row">
              <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" id="resetPasswordForm">
                    @csrf

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" data-validation-engine="validate[required, custom[email]]">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                  <div class="row">
                    <div class="col-md-12 text-left ">
                      <button type="submit" name="button">{{ __('Send Password Reset Link') }}</button>
                    </div>
                  </div>
                    <div class="col-md-12 dont-have-account" style='text-align:left !important'>
                      <span><a href="{{ route('login') }}" class='signup-link'>Log In</a></span>
                    </div>
                </form>
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
  $("#resetPasswordForm").validationEngine();
</script>
@endsection