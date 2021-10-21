{{-- header --}}
<div class="container-fluid headnav ">
 <nav class="navbar navbar-inverse navbar-default navbar-fixed-top nb-s shadow" role="navigation">
   <div class="" style="height:5px;background-color:#329e8b"></div>
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="{{ asset('sitefront/log.png') }}" alt='InvestOut Logo' style="height:58px;width:100%" alt=""></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('index') }}">HOME</a></li>
        <li><a href="{{ route('sellerFront') }}">SELLER</a></li>
        <li><a href="{{ route('investorFront') }}">INVESTOR</a></li>
        <li><a href="{{route('envoy.index')}}">ENVOY</a></li>
        <li><a href="{{ route('realtorFront') }}">REALTOR</a></li>
        <li><a href="{{ route('howitworkFront') }}">HOW IT WORK</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">RESOURCES <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('blog.outer.show') }}">BLOG</a></li>
                <li><a href="{{ route('train.outer.show') }}">TRAINING</a></li>
            </ul>
        </li>
        <li><a href="{{ route('contactFront') }}">CONTACT</a></li>
      @auth
        <li>
            <a  onclick="document.getElementById('logout-form').submit()"><i class="fa fa-sign-out"></i>Log out</a>
            <form action="/logout" method="post" id="logout-form">
                {{csrf_field()}}
            </form>
        </li>
      @else
      @endauth
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div><!-- end header -->
