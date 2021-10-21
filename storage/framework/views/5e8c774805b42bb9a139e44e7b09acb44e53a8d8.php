
<?php $__env->startSection('body'); ?>
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h3>Realtor</h3>
                        <div class="breadcrumb-option">
                            <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> Home</a>
                            <span>realtor</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->

    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-item set-bg" data-setbg="<?php echo e(asset('assets/front_end/img/realtor/top.jpg')); ?>">
            </div>
            </div>
        </div>
        <div class="thumbnail-pic">
            <div class="thumbs owl-carousel" style="display: none;">
                
            </div>
        </div>
    </section>
    <!-- Writing Section Begin -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Load your listings into the Invest Out portal and get fast sales for your 100 day+ misfit properties.<span>.</span></h2>
                        <p> How does the Invest Out Model benefit Realtors? We put your C properties directly in front of investors who are interested in any number of opportunities from Partnering to simple cash for home deals. They are looking for those ugly ducklings.
 Invest Out Model creates options for homeowners and investors. Whether the homeowner wants to increase their profits or simply sell fast, the Partnering process provides options.
						</p>
                        <p>
                            Realtors try their best to maximize the sale price of their client’s property’s; in fact, typically Realtors advise home sellers to repair, renovate or even remodel the home before listing it for sale.</p>
                        <p>
                            By making it easy for Realtors to upload their listings into the portal, Invest Out enables them to get exposure from investors  who are eagerly searching for more investable properties.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Writing Section End -->
    <!-- Video Section Begin -->
    <div class="video-section set-bg" data-setbg="<?php echo e(asset('assets/front_end/img/slider.jpg')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <a href="https://www.youtube.com/watch?v=U-v2lc2Mxvs" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        <h4>WE CREATE NEW WORLD SOLUTIONS</h4>
                        <h2>Increase your Investing IQ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Section End -->
    <br>
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-item set-bg" data-setbg="<?php echo e(asset('assets/front_end/img/realtor/last.jpg')); ?>">
            </div>
            </div>
        </div>
        <div class="thumbnail-pic">
            <div class="thumbs owl-carousel" style="display: none;">
                
            </div>
        </div>
    </section>
    <section class="howit-works spad">
        <div class="row">
            <div class="col-lg-12" style="padding: 0px;">
                <div class="section-title">
                    <img src="<?php echo e(asset('affiliate/1.png')); ?>" alt="How it Works">
                    <a class="btn btn-primary btn-block" href="https://investout.leaddyno.com/" style="padding: 10px 30px">Apply Now</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo e(asset('assets/front_end/img/realtor/graphic.png')); ?>" alt="">
                </div>
            </div>
        </div>
    </section>
    <div class="container text-center">
        <img src="<?php echo e(asset('assets/front_end/img/BeforeAfterrealtor.png')); ?>">
    </div>
    <div class="container text-center">
        <h4 class="text-center pb-1 pt-3">Patent Pending</h4>
        <h4 class="text-center pb-1 pt-3">
            Membership 
            <a href="#" class="terms_and_conditions_link" data-toggle="modal" data-target="#termsAndConditionsModal">
                Terms & Conditions.
            </a>
        </h4>
        <h3 class="text-center pb-1 pt-3">Membership Plan</h2>
        <?php if(count($plans) > 0): ?>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope=" row "> <h5>Choose a membership plan that's right for you based on the features given below. </h5></th>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td colspan="0" class="tableheading" style="text-align: center;">
                        <?php if($plan->role == 6): ?>
                            <b>Brokerage</b>
                        <?php else: ?>
                            <b>Realtor</b>
                        <?php endif; ?>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <th></th>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td class="table-data">
                        <b><font size="5"><?php echo e($plan->amount); ?></font>/<?php echo e($plan->interval); ?></b>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td scope="row "><h5>Upload your available properties for sale </h5><br>Realtors and brokerage houses have the opportunity to upload all of their listings to enable a<br>faster sale of the home.</td>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td style=""><h3>✓</h3></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td scope="row "><h5>Make properties available for renovation at no cost to homeowners</h5><br> Realtors and brokerage houses have the opportunity to upload all of their listings to enable a<br>faster sale of the home. </td>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td style=""><h3>✓</h3></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td scope="row "><h5>Enable multiple uploads by different brokers</h5>Brokerage houses, by selecting this level of service, can make upload options available for all <br>Realtors operating under the brokerage house office.</td>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td style=""><h3>✓</h3></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td scope="row "></td>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td style=""><a target="_blank" href="<?php echo e(config('app.basepath.APP_URL')); ?>register?plan=<?php echo e($plan->plan_id); ?>" class="btn btn-primary btn-block">Sign Up</a></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </tbody>
        </table>
        <?php else: ?>
            <h5 style="margin-bottom: 30px;">No plans found!</h5>
        <?php endif; ?>
    </div>
    <div class="text-center">
        <img src="<?php echo e(asset('assets/front_end/img/realtor/realtor.png')); ?>">
    </div>
    <div class="modal fade" id="termsAndConditionsModal" tabindex="-1" role="dialog" aria-labelledby="termsAndConditionsModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Membership Terms & Conditions </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>These free trial terms and conditions govern the free trial of the InvestOut web portal:</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul id="tandcList">
                            <li>After signing up for the free trial, you will have access to the complete functionality of
                                the InvestOut web portal for a period of 30 days, beginning from the moment you
                                complete the registration process.</li>
                            <li>You may use this free trial only once.</li>
                            <li>You have the option to cancel your membership anytime during this trial period.</li>
                            <li>You will not be charged any membership fee before this 30 days trial period ends.</li>
                            <li>At the end of the trial period, you will be charged the monthly membership fee on the
                                31st day from the time of your registration and your subscription will be renewed
                                automatically.</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>See InvestOut help center for more information.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default tandcButton" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">$("#realtor").addClass('active');</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front_end.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>