<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('font/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/validationEngine.jquery.css') }}">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
    html,body{
      height: 100%;
    }
      body{
        background-image: url({{ asset('sitefront/logba.jpg') }});
        background-position:center;
        background-repeat:no-repeat;
        background-attachment: fixed;
        background-size:cover;
        padding:6em 3em;
      }

      .card{
        background-color: white;
        padding-left: 0px;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        color: #0b2a4a;
        margin-bottom: 6em;
      }

      .row-eq-height{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display:         flex;
      }

      .card h1{
          font-family: unisansboldbold;
           font-size: 2.9em;
           letter-spacing: 2px;
           margin-bottom: 0px;
      }

      .card h3{
            font-family: unisansbookregular;
           font-size: 1.4em;
           letter-spacing: 1px;
           margin-top:0px
      }

      .auth-left{
        padding:0px;
        min-height:535px;
        padding-top:25%;
      }

      .auth-left img{
        position: absolute;
        top: -3px;
        left: -3px;
        z-index: 1;
        width: 100%;
        height: 102.4%;
      }

      .auth-left div{
        z-index: 10;
        position: relative;
      }

      .auth-right{
        padding:7em 3em;
        margin-left: 2.8%;
      }
      .auth-right img{
        height:65px;
      }

      .auth-right h4{
        margin-top: 15px;
        font-size: 1.5em;
        margin-bottom: 1em;
        font-family: unisansregularregular;
        font-weight: 100;
        letter-spacing: 1px;
      }

      .auth-right h4 .site-brand{
        font-family: unisansboldbold;
      }

      .auth-right input,.auth-right select{
        font-family: unisansregularregular;
        background-color: #f1f2f2;
        /* color: #c7c8ca; */
        border-radius: 0px;
        border: 1px solid #c7c8ca;
        padding: 1.7em .9em;
        margin-bottom: .8em;
        box-shadow: 4px 3px 3px 0px rgba(100,100,100,.14);
        font-weight: 100;
      }
      .auth-right select{
        height: 53px;
        padding: .5em;
        }

      .auth-right input:hover,.auth-right input:focus,.auth-right select:hover,.auth-right select:focus{
        border: 1px solid #c7c8ca;
        box-shadow: 4px 3px 3px 0px rgba(100,100,100,.14);
      }
      .auth-right input:last-of-type{
        margin-bottom: 1.1em;
      }

      .auth-right .forgot-link{
        text-decoration: none;
        color: blue;
        font-family: unisansregularregular;
        font-size: 1em;
        margin-bottom: 1.6em;
        display: inline-block;
      }

      .auth-right button{
        box-shadow: -4px 4px 3px 0px rgba(100,100,100,.28) !important;
        font-family: unisansboldbold;
        font-weight: 100;
        font-size: 1.1em;
        color: white;
        border-radius: 8px;
        border: none;
        background-color: #0b2a4a;
        padding:.8em 2em;
      }

      .auth-right button:hover,.auth-right button:focus{
        border:none
      }

      .auth-right .form-btn{
        width: 29%;
        padding: 0px;
        margin-left: 1em;
      }

      .auth-right .dont-have-account{
        font-size: 1em;
        font-family: unisansregularregular;
        color: #c7c8ca;
        padding: 0px;
        width: 67%;
        text-align: right;
        padding-right: 1em;
        padding-top: 1em;
      }

      .auth-right .dont-have-account .signup-link{
        font-family: unisansboldbold;
        font-weight: 700;
        color: #0b2a4a;
        text-decoration: none;
      }


      @media (min-width: 992px){
      .col-md-5 {
          width: 43.666667%;
      }
      .col-md-7 {
          width: 53.333333%;
      }
      .card{
        width: 73.5%;
        margin-left: 14.5%;
      }
    }
    </style>

    @yield('style')


  </head>
  <body>

    @yield('body')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.validationEngine.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validationEngine-en.min.js') }}"></script>

    @yield('template_script')
  </body>
</html>
