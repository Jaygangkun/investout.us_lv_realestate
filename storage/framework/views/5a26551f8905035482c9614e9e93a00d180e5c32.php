<section class="admin-sidebar">
<nav class="navbar-default navbar-static-side admin-pan" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class='text-center'>
                <a href="<?php echo e(route('brokeragehouse.index')); ?>">
                    <img alt="image" style='width:100px;height:90px;margin-top:.3em' class="img-circle" src="<?php echo e(asset('profilepic/'.session('profile')->image)); ?>">
                    <h2 style='font-family:unisansboldbold;font-size:1.5em'><?php echo e($user->name()); ?></h2><div style="text-align: center;"><span class="btn btn-primary btn-sm" style="padding: 2px 10px; text-align: "><?php echo e($user->roles[0]->name); ?></span></div>
                </a>
            </li>
            <li><a class="<?php echo e(request()->is('investor-propertys') ? 'active' : ''); ?>" href="<?php echo e(route('brokeragehouse.index')); ?>"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a></li>
            <li>
                <a href="<?php echo e(route('brokeragehouse.property.phase-index',5)); ?>" class=""><i class="fa fa-cubes"></i> <span class="nav-label">My Properties</span></a>
            </li>
            <li>
                <a href="#"  class="dropdown"><i class="fa fa-send"></i> <span class="nav-label">Proposals</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(route('brokeragehouse.proposal.show')); ?>"> <span class="nav-label">New Proposals</span></a></li>
                    <li><a href="<?php echo e(route('brokeragehouse.proposal.approved.show')); ?>"> <span class="nav-label">Accepted Proposals</span></a></li>
                    <li><a href="<?php echo e(route('brokeragehouse.proposal.denied.show')); ?>"> <span class="nav-label">Denied Proposals</span></a></li>
                </ul>
            </li>
            <!--<li>
                <a class="<?php echo e(request()->is('*/property_message') ? 'active' : ''); ?>"  href="<?php echo e(route('message.read','new')); ?>"><i class="fa fa-envelope"></i> <span class="nav-label">Message</span></a>
            </li>-->
            <li>
                <a href="<?php echo e(route('brokeragehouse.getRealtors')); ?>"><i class="fa fa-cubes"></i> <span class="nav-label">Realtor</span></a>
            </li>
            <li>
                <a class="<?php echo e(request()->is('*/property_message') ? 'active' : ''); ?>"  href="<?php echo e(route('message.read','new')); ?>"><i class="fa fa-envelope"></i> <span class="nav-label">Message</span></a>
            </li>
            <li>
                <a class="<?php echo e(request()->is('*/document') ? 'active' : ''); ?>"  href="<?php echo e(route('brokeragehouse.viewDocument')); ?>"><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Document</span></a>
            </li>
            <!--<li>
                <a href="index.html" class=""><i class="fa fa-home"></i> <span class="nav-label">Realtors</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a style='display:block' href="route('brokeragehouse.add-realtor')">Create</a></li>
                </ul>
            </li>-->
        </ul>

    </div>
</nav>
</section>
