<section class="admin-sidebar">
<nav class="navbar-default navbar-static-side admin-pan" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class='text-center'>
                <a href="{{ route('investors.index') }}">
                    <img alt="image" style='width:100px;height:90px;margin-top:.3em' class="img-circle" src="{{ asset('profilepic/'.session('profile')->image) }}">
                    <h2 style='font-family:unisansboldbold;font-size:1.5em'>{{ $user->name() }}</h2>
                    <div style="text-align: center;"><span class="btn btn-primary btn-sm" style="padding: 2px 10px; text-align: ">{{$user->roles[0]->name}}</span></div>
                </a>
            </li>
            <li><a class="{{ request()->is('investor-propertys') ? 'active' : '' }}" href="{{route('investors.index')}}"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a></li>
            <li>
                <a href="{{ route('investors.property.phase-index',0) }}" class=""><i class="fa fa-cubes"></i> <span class="nav-label">My Properties</span></a>
            </li>
            <li>
                <a class="{{ request()->is('*/viewedproperties') ? 'active' : '' }}"  href="{{route('viewedProperties')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Viewed Properties</span></a>
            </li>
            <li>
                <a class="{{ request()->is('*/contractedproperties') ? 'active' : '' }}"  href="{{route('contractedProperties')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Contracted Properties</span></a>
            </li>
            <!-- <li>
                <a href="index.html" class=""><i class="fa fa-home"></i> <span class="nav-label">Proposals</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="{{ request()->is('investor-propertys') ? 'active' : '' }}" href="{{route('investors.proposals')}}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Sent</a> -->
                    <!--<a style='display:block' href="{{route('investors.proposal.property')}}">Proposal Properties</a>-->
                    <!-- </li>
                    <li>
                        <a class="{{ request()->is('investor-propertys') ? 'active' : '' }}" href="{{route('investors.proposal.show')}}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Received</a>
                    </li>
                </ul>
            </li> -->
            <!--<li><a class="{{ request()->is('investor-propertys') ? 'active' : '' }}" href="{{route('investors.proposals')}}"><i class="fa fa-list" aria-hidden="true"></i>All Proposals</a></li>-->
            <li>
                <a class="{{ request()->is('*/property_message') ? 'active' : '' }}"  href="{{route('message.read','new')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Message</span></a>
            </li>
            <li>
                <a class="{{ request()->is('*/document') ? 'active' : '' }}"  href="{{route('investors.viewDocument')}}"><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Document</span></a>
            </li>
            <!--<li>
                <a href="index.html" class=""><i class="fa fa-home"></i> <span class="nav-label">Contact</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a style='display:block' href="{{route('investors.proposal.property')}}">Proposal Properties</a></li>
                </ul>
            </li>-->
            <!--<li>
                <a href="{{ route('document.show','investor') }}"><i class="fa fa-wechat"></i> <span class="nav-label">Admin Documents</span></a>
            </li>-->
        </ul>

    </div>
</nav>
</section>
