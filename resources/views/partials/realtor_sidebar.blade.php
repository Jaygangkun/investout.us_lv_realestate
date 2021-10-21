<section class="admin-sidebar">
<nav class="navbar-default navbar-static-side admin-pan" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
          <li class='text-center'>
            <a href="{{ route('realtors.index') }}">
              <img alt="image" style='width:100px;height:90px;margin-top:.3em' class="img-circle" src="{{ asset('profilepic/'.session('profile')->image) }}">
              <h2 style='font-family:unisansboldbold;font-size:1.5em'>{{ $user->name() }}</h2>
              <div style="text-align: center;"><span class="btn btn-primary btn-sm" style="padding: 2px 10px; text-align: ">{{$user->roles[0]->name}}</span></div>
            </a>
          </li>
            <!--<li><a class="{{ request()->is('investor-propertys') ? 'active' : '' }}" href="{{route('investors.proposals')}}"><i class="fa fa-list" aria-hidden="true"></i>All Proposals</a></li>-->
            <li>
            </li>
            <li><a class="{{ request()->is('investor-propertys') ? 'active' : '' }}" href="{{route('realtors.index')}}"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a></li>
            <li>
                <a href="{{ route('realtors.property.phase-index',5) }}" class=""><i class="fa fa-cubes"></i> <span class="nav-label">My Properties</span></a>
            </li>
            <?php
            if(auth()->user()->assign_zip_code != 0 || auth()->user()->assign_zip_code != '' )
            {   
            ?>
                <li>
                    <a href="{{ route('realtors.property.all-phase-index',0) }}" class=""><i class="fa fa-cubes"></i> <span class="nav-label">Properties Zip(<?php echo auth()->user()->assign_zip_code; ?>)</span></a>
                </li>
            <?php
            }
            ?>
            <li>
                <a href="#"  class="dropdown"><i class="fa fa-send"></i> <span class="nav-label">Proposals</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('realtors.proposal.show') }}"> <span class="nav-label">New Proposals</span></a></li>
                    <li><a href="{{ route('realtors.proposal.approved.show')}}"> <span class="nav-label">Accepted Proposals</span></a></li>
                    <li><a href="{{ route('realtors.proposal.denied.show')}}"> <span class="nav-label">Denied Proposals</span></a></li>
                </ul>
            </li>
            <li>
                <a class="{{ request()->is('*/property_message') ? 'active' : '' }}"  href="{{route('message.read','new')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Message</span></a>
            </li>
            <li>
                <a class="{{ request()->is('*/document') ? 'active' : '' }}"  href="{{route('realtors.viewDocument')}}"><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Document</span></a>
            </li>
            <li>
                <a class="{{ request()->is('*/bulkImport') ? 'active' : '' }}"  href="{{route('realtors.importCSV')}}"><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Bulk Import</span></a>
            </li>
            <!--<li>
                <a href=" route('brokeragehouse.membership') "><i class="fa fa-money"></i> <span class="nav-label">Billing Details</span></a>
            </li>-->
        </ul>

    </div>
</nav>
</section>
