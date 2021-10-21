<style media="screen">
    .lab1 {
        display: inline-block !important;
        margin-top: -.9em !important;
        margin-right: -5px !important;
    }
</style>
<section class="custom-second-header-section">
    <nav class="navbar navbar-inverse custom-navbar  navbar-fixed-top">
        <div class="container-fluid ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

                <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
                <?php
                if($user->roles()->first()->slug === 'seller') {
                    $admin_logo_url = route('seller.index');
                }
                else if($user->roles()->first()->slug === 'realtor') {
                    $admin_logo_url = route('realtors.index');    
                }
                else {
                    $admin_logo_url = route('admin.index');
                }
                ?>
                <a class="navbar-brand custom-navbar-brand" href="{{ $admin_logo_url }}">
                <img class="colaborator-logo-inline header-circle-img" src="{{asset('sitefront/log.png')}}" style='width:auto'>
          </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info-user-img" data-toggle="dropdown" href="">
	                    <img alt="image" class="img-circle header-circle-img" src="{{ asset('profilepic/'.session('profile')->image) }}">
	                    <span>{{ $user->name() }}</span>
	                    <span class="caret"></span>
	                </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile.show',$user->roles()->first()->slug) }}">View Your Profile</a></li>
                            <li><a href="{{ route('profile.edit',$user->roles()->first()->slug) }}">Edit Your Profile</a></li>
                            @if($user->roles()->first()->slug == 'realtor')
                                <li><a href="{{ route('realtors.billingDetails') }}">Billing Details</a></li>
                            @elseif($user->roles()->first()->slug == 'seller')
                                <li><a href="{{ route('seller.billingDetails') }}">Billing Details</a></li>
                            @endif
                            <li><a href="{{ route('change.password') }}">Change Password</a></li>
                            <li class="divider"></li>
                            <li>
                                <a onclick="document.getElementById('logout-form').submit()"><i class="fa fa-sign-out"></i>Log out</a>
                                <form action="{{ route('logout') }}" method="post" id="logout-form">
                                    {{csrf_field()}}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info count-info-alert" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label lab1 label-warning msg-count">0</span>
                        </a>
                        <ul class="dropdown-menu user-alerts" id='message-alerts'>
                            <li>
                                <a href='#' class='noti-link'>
                                    <div class="col-md-3 text-left msg-alert-pic" style='padding:0px'>
                                    </div>
                                    <div class="col-md-8 nav-msg-item">
                                        <h3>No new Messages</h3>
                                    </div>
                                </a>
                            </li>
                            <li class="divider" style='margin-bottom:0px'></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info count-info-notification" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label lab1 label-warning notification-count">0</span>
                        </a>
                        <ul class="dropdown-menu notification-alerts" id='notification-alerts'>
                            <li>
                                <a href='#' class='noti-link'>
                                    <div class="col-md-3 text-left msg-alert-pic" style='padding:0px'>
                                    </div>
                                    <div class="col-md-8 nav-msg-item">
                                        <h3>No new Notifications</h3>
                                    </div>
                                </a>
                            </li>
                            <li class="divider" style='margin-bottom:0px'></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>