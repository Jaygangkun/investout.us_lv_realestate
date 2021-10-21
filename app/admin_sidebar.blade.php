<section class="admin-sidebar">
    <nav class="navbar-default navbar-static-side admin-pan" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class='text-center'>
                    <a href="{{ route('admin.index') }}">
              <img alt="image" style='width:100px;height:90px;margin-top:.3em' class="img-circle" src="{{ asset('profilepic/'.session('profile')->image) }}">
              <h2 style='font-family:unisansboldbold;font-size:1.5em'>{{ $user->name() }}</h2>
              <div style="text-align: center;"><span class="btn btn-primary btn-sm" style="padding: 2px 10px; text-align: ">{{$user->roles[0]->name}}</span></div>
            </a>
                </li>
                <li style="">
                    <a href="index.html" class="dropdown"><i class="fa fa-angellist"></i> <span class="nav-label">Admin Manage</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="active"><a href="{{ route('admin.users.admin-index') }}">Administrator list</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.stripe.getUserPlans') }}" class="dropdown"><i class="fa fa-money"></i> <span class="nav-label">Manage Plans</span></a>
                </li>

                <!--<li>
                    <a href="{{ route('admin.stripe.getStripePlans') }}" class="dropdown"><i class="fa fa-money"></i> <span class="nav-label">Plans Listing</span></a>
                </li>-->
                
                <li>
                    <a href="{{ route('admin.users.index') }}" class="dropdown"><i class="fa fa-wechat"></i> <span class="nav-label">Users</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.realtors.index') }}" class="dropdown"><i class="fa fa-wechat"></i> <span class="nav-label">Realtors</span></a>
                </li>
                <!--<li>
                    <a href="index.html" class="dropdown"><i class="fa fa-user"></i> <span class="nav-label">User Manage</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ route('admin.users.index','seller') }}">Sellers</a></li>
                        <li><a href="{{ route('admin.users.index','investor') }}">Investors</a></li>
                    </ul>
                </li>-->
                <li>
                    <a href="{{ route('admin.property.phase-index',0) }}" class="dropdown"><i class="fa fa-cubes"></i> <span class="nav-label">Properties</span></a>
                </li>
                <li>
                    <a href="#" class="dropdown"><i class="fa fa-cubes"></i> <span class="nav-label">Envoys</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ route('reservation.index') }}">Envoy Inquiries</a></li>
                        <li><a href="{{ route('booking.index') }}">Envoy Time Slots</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown"><i class="fa fa-cubes"></i> <span class="nav-label">Proposals</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ route('admin.proposal.index') }}">New Proposals</a></li>
                        <li><a href="{{ route('admin.proposal.approved') }}">Approved Proposals</a></li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="{{ route('admin.document.show') }}" class="dropdown"><i class="fa fa-wechat"></i> <span class="nav-label">Upload Documents</span></a>
                </li> -->

                <!-- <li>
                    <a href="#" class="dropdown"><i class="fa fa-cubes"></i> <span class="nav-label">Resources</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ route('admin.blog.index') }}" class="dropdown"><i class="fa fa-wechat"></i> <span class="nav-label">Blog Post</span></a></li>
                        <li><a href="{{ route('admin.training.create') }}" class="dropdown"><i class="fa fa-wechat"></i> <span class="nav-label">Upload Training Video</span></a></li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a href="{{ route('admin.cms.index','1') }}" class="dropdown"><i class="fa fa-cubes"></i> <span class="nav-label">CMS</span></a>
                </li> -->
                <!-- <li>
                    <a class="" href="{{route('admin.membership.index')}}"><span class="nav-label"><i class="fa fa-wechat"></i> Membership Requests</span></a>
                </li> -->
                <li>
                    <a class="" href="{{route('message.read','new')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Message</span></a>
                </li>
                <li>
                    <a class="" href="{{route('admin.importRequests')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Import Request</span></a>
                </li>
                <!--<li>
                    <a class="{{ request()->is('*/viewedproperties') ? 'active' : '' }}"  href="{{route('viewedProperties')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Viewed Properties</span></a>
                </li>-->
            </ul>

        </div>
    </nav>
</section>