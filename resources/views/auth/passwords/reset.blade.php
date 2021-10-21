@extends('layouts.auth-layout')


@section('title')

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
            <h1 style='margin:6px;'>INVESTOUT</h1>
            <h3>For yourself dosen't <br> mean BY youself </h3>
          </div>
        </div>

        <div class="col-md-7 auth-right">
            <div class="row text-center">
              <img src="{{ asset('sitefront/auth-logo.png') }}"  alt="">
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
                @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif


                <form method="POST" action="{{ route('password.request') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">


                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('E-Mail Address') }}"  required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif

                  <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>

                  @if ($errors->has('password_confirmation'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                  @endif
                  <div class="row">
                    <div class="col-md-12 text-left ">
                      <button type="submit" name="button">
                        {{ __('Reset Password') }}
                      </button>
                    </div>
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
