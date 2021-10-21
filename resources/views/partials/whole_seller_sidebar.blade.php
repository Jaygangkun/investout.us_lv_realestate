<section>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class='text-center'>
                      <a href="{{ route('whole-seller.index') }}">
                        <img alt="image" style='width:100px;height:90px;margin-top:.3em' class="img-circle" src="{{ asset('profilepic/'.session('profile')->image) }}">
                        <h2 style='font-family:unisansboldbold;font-size:1.5em'>{{ $user->name() }}</h2>
                        <div style="text-align: center;"><span class="btn btn-primary btn-sm" style="padding: 2px 10px; text-align: ">Wholesaler</span></div>
                      </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('investor-propertys') ? 'active' : '' }}" href="{{route('whole-seller.index')}}"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('whole-seller.property.phase-index',5) }}" class=""><i class="fa fa-cubes"></i> <span class="nav-label">My Properties</span></a>
                    </li>
                    <!-- <li>
                        <a class="{{ request()->is('*/viewedproperties') ? 'active' : '' }}"  href="{{route('viewedProperties')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Viewed Properties</span></a>
                    </li> -->
                    <li>
                        <a href="#"  class="dropdown"><i class="fa fa-send"></i> <span class="nav-label">Proposals</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('whole-seller.proposal.show') }}"> <span class="nav-label">Received Proposals</span></a></li>
                            <li><a href="{{ route('whole-seller.proposal.approved.show')}}"> <span class="nav-label">Accepted Proposals</span></a></li>
                            <!-- <li><a href="{{ route('whole-seller.proposal.denied.show')}}"> <span class="nav-label">Denied Proposals</span></a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a class="{{ request()->is('*/property_message') ? 'active' : '' }}"  href="{{route('message.read','new')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Message</span></a>
                    </li>
                    <!--<li>
                        <a class="{{ request()->is('*/document') ? 'active' : '' }}"  href="{{route('whole-seller.viewDocument')}}"><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Document</span></a>
                    </li>
                    <li><a class="{{ request()->is('new_property') ? 'active' : '' }}" href="{{-- route('whole-seller.property.create') --}}"><i class="fa fa-file-zip-o"></i>New Listing</a></li>

                    <li><a class="{{ request()->is('all_property') ? 'active' : '' }}" href="{{-- route('whole-seller.property.index') --}}"><i class="fa fa-outdent"></i>All Listing</a></li>-->
                    <!--<li>
                        <a class="{{ request()->is('*/property_detail_create') ? 'active' : '' }}"  href="{{ route('membership.show',$user->roles()->first()->slug) }}"><i class="fa fa-edit"></i> <span class="nav-label">Membership</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('document.show','seller') }}"><i class="fa fa-wechat"></i> <span class="nav-label">Admin Documents</span></a>
                    </li>-->
                    <!-- Auth::user()->roles[0]['pivot']->role_id -->

                </ul>
            </div>
        </nav>
    </div>
</section>