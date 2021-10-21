<section class="admin-sidebar">
<nav class="navbar-default navbar-static-side admin-pan" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
          <li class='text-center'>
            <a href="{{ route('enterprise.index') }}">
              <img alt="image" style='width:100px;height:90px;margin-top:.3em' class="img-circle" src="{{ asset('profilepic/'.session('profile')->image) }}">
              <h2 style='font-family:unisansboldbold;font-size:1.5em'>{{ $user->name() }}</h2>
              <div style="text-align: center;"><span class="btn btn-primary btn-sm" style="padding: 2px 10px; text-align: ">{{$user->roles[0]->name}}</span></div>
            </a>
          </li>
            <!--<li><a class="{{ request()->is('investor-propertys') ? 'active' : '' }}" href="{{route('investors.proposals')}}"><i class="fa fa-list" aria-hidden="true"></i>All Proposals</a></li>-->
            <li>
            </li>
            <!--<li>
                <a href="index.html" class=""><i class="fa fa-home"></i> <span class="nav-label">Contact</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a style='display:block' href="{{route('investors.proposal.property')}}">Proposal Properties</a></li>
                </ul>
            </li>-->
            <!--<li>
                <a href="index.html" class=""><i class="fa fa-home"></i> <span class="nav-label">Realtors</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a style='display:block' href="route('brokeragehouse.add-realtor')">Create</a></li>
                </ul>
            </li>-->
            <li>
                <a href="{{ route('enterprise.property.phase-index',5) }}" class=""><i class="fa fa-cubes"></i> <span class="nav-label">My Properties</span></a>
            </li>
            <li>
                <a class="{{ request()->is('*/viewedproperties') ? 'active' : '' }}"  href="{{route('viewedProperties')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Viewed Properties</span></a>
            </li>
            <li>
                <a target="_blank" href="{{ ENV('APP_URL').'/property-lists' }}" class=""><i class="fa fa-cubes"></i> <span class="nav-label">Properties Listing</span></a>
            </li>
            <li>
                <a href="{{route('enterprise.billingDetails')}}"><i class="fa fa-money"></i> <span class="nav-label">Billing Details</span></a>
            </li>
            <!--<li>
                <a href=" route('brokeragehouse.membership') "><i class="fa fa-money"></i> <span class="nav-label">Billing Details</span></a>
            </li>-->
        </ul>

    </div>
</nav>
</section>
