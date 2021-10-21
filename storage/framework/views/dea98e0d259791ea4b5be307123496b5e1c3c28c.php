 
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/investor-index.css')); ?>">

<style>
    .product-desc {
        color:#484848;
        font-weight: 100;
        min-height: 380px !important;
    }
    input{
        padding: 5px !important;
    }
    .objectfit{
        object-fit: cover;
    }
</style>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('body'); ?>

<div id="inSlider" class="carousel carousel-fade" data-ride="carousel" style="display:none;">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="product-banner-container">
                <!-- <div class="row"> -->
                <div class="realtor-image  col-md-12">
                    <div class="product-banner-title col-md-12">
                        <h1>Featured Houses</h1>
                    </div>
                    <div class="product-banner-text col-md-6">
                        <h2>Oppurtunities are abundant. <br>Find your ideal investment and make your mark. </h2>
                    </div>
                    <div class="offset-md-3 col-md-8 search-filter" style='margin-top:3em;margin-left:3em'>
                        
                        <!-- <div class="col-sm-2 text-right" style='padding:0px;padding-top:.5em;'>
                            <label for="" style='color:#0b2a4a;font-family:unisansboldbold;font-weight:100;font-size:15px'>Search By :</label>
                        </div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="search" name="q" class="search-input form-control" style='' placeholder="Address, City, State, ZipCode" autocomplete="on">
                                <span class="input-group-btn"> <button type="button" style='background:#0b2a4a !important' class="btn btn-primary search-btn mainSearch"><i class="fa fa-search"></i></button> </span> 
                            </div>
                            
                        </div> -->
                        
                    
                    </div>

                </div>

            </div>

            <!-- Set background for slide in css -->
            <div class="header-back banner"></div>
        </div>
    </div>
</div>
<br><br>
<div class='main-content col-md-offset-1 col-md-10' style="margin-bottom: 50px;">
  <div class='main-body row'>
    <div class='col-md-12'>
      <h1>How it works?</h1>
    </div>
    <div class='col-md-12'>
      <iframe width="100%" height="800px" src="//www.youtube.com/embed/gG-tLeMmmvI?autoplay=1" style="box-shadow: 4px 4px 12px #181818; border: none;"></iframe>
    </div>
  </div>
</div>
<br><br>
<!-- Product part -->
<section class="container-fluid" id="how-it-works" style='background:white'>
    <div class="">
        <div class="/*ibox-content*/ m-b-sm">
            <div class="product_container ibox-content" style="margin-top: 20px;border:none;padding:0px 5px">
                <form action="<?php echo e(route('investors.search')); ?>" method='post'>
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-3 brv-filter">
                            <label for="" style='font-family:unisansboldbold;font-weight:100;font-size:15px'>BRV Price :</label>
                            <div class="form-group filter-form">
                                <input id="min" type="number" maxlength=20 class="rounded-0 form-control" <?php if(isset($request)): ?> value="<?php echo e($request->brpricemin ? $request->brpricemin : ''); ?>" <?php endif; ?> name="brpricemin" placeholder='Min'>
                            </div>
                            <div class="form-group filter-form">
                                <input id="max" type="number" maxlength=20 class="rounded-0 form-control" <?php if(isset($request)): ?> value="<?php echo e($request->brpricemax ? $request->brpricemax : ''); ?>" <?php endif; ?> name="brpricemax" placeholder='Max'>
                            </div>
                        </div>
                        <div class="col-md-3 brv-filter">
                            <label for="" style='font-family:unisansboldbold;font-weight:100;font-size:15px'>ARV Price :</label>
                            <div class="form-group filter-form">
                                <input id="min" type="number" maxlength=20 class="rounded-0 form-control" <?php if(isset($request)): ?> value="<?php echo e($request->arpricemin ? $request->arpricemin : ''); ?>" <?php endif; ?> name="arpricemin" placeholder='Min'>
                            </div>
                            <div class="form-group filter-form">
                                <input id="max" type="number" maxlength=20 class="rounded-0 form-control" <?php if(isset($request)): ?> value="<?php echo e($request->arpricemax ? $request->arpricemax : ''); ?>" <?php endif; ?> name="arpricemax" placeholder='Max'>
                            </div>
                        </div>
                        <div class="col-md-3 brv-filter">
                            <label for="" style='font-family:unisansboldbold;font-weight:100;font-size:15px'>Investment :</label>
                            <div class="form-group filter-form">
                                <input id="min" type="number" maxlength=20 class="rounded-0 form-control" <?php if(isset($request)): ?> value="<?php echo e($request->investmentmin ? $request->investmentmin : ''); ?>" <?php endif; ?> name="investmentmin" placeholder='Min'>
                            </div>
                            <div class="form-group filter-form">
                                <input id="max" type="number" maxlength=20 class="rounded-0 form-control" <?php if(isset($request)): ?> value="<?php echo e($request->investmentmax ? $request->investmentmax : ''); ?>" <?php endif; ?> name="investmentmax" placeholder='Max'>
                            </div>
                        </div>
                        <div class="col-md-3 brv-filter">
                            <label for="" style='font-family:unisansboldbold;font-weight:100;font-size:15px'>Zipcode :</label>
                            <div class="form-group filter-form" style="width:auto;">
                                <input type="number" maxlength=5 class="rounded-0 form-control" <?php if(isset($request)): ?> value="<?php echo e($request->zipcode ? $request->zipcode : ''); ?>" <?php endif; ?> name="zipcode"   placeholder='Zipcode'>
                            </div>
                        </div>
                        <div class="col-md-3 brv-filter">
                            <label for="" style='font-family:unisansboldbold;font-weight:100;font-size:15px'>State :</label>
                            <div class="form-group filter-form">
                                <select name="state" class='form-control' id="">
                                    <option value="">Select State</option>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($request) && $request->state == $zip->state): ?>
                                            <option value='<?php echo e($zip->state); ?>' selected><?php echo e($zip->state); ?></option>
                                        <?php else: ?>
                                            <option value='<?php echo e($zip->state); ?>'><?php echo e($zip->state); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                            </div>
                        </div>
                        <div class="col-md-3 brv-filter">
                            <label for="" style='font-family:unisansboldbold;font-weight:100;font-size:15px'>County :</label>
                            <div class="form-group filter-form">
                                <select name="county" class='form-control' id="">
                                    <option value="">Select County</option>
                                    <?php $__currentLoopData = $counties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($request) && $request->county == $zip->county): ?>
                                            <option value='<?php echo e($zip->county); ?>' selected><?php echo e($zip->county); ?></option>
                                        <?php else: ?>
                                            <option value='<?php echo e($zip->county); ?>'><?php echo e($zip->county); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 brv-filter">
                            <label for="" style='font-family:unisansboldbold;font-weight:100;font-size:15px'>Distance :</label>
                            <div class="form-group filter-form" style="width:auto;">
                                <input id="" type="number" maxlength="5" class="rounded-0 form-control" <?php if(isset($request)): ?> value="<?php echo e($request->distance ? $request->distance : ''); ?>" <?php endif; ?> name="distance" placeholder='distance(in KM)'>
                            </div>
                        </div>
                        <div class="col-md-6" style='padding-right:3.4em;padding-top:0.4em'>
                            <div class="product-show-button">
                                <button type='submit' class='form-control' style='width:7em;margin-top:0px;float:right'>Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12" style="text-align: center; padding-top: 20px; ">
                        <div class="col-md-12" style="text-align: center; padding-top: 20px; ">
                            <div class="col-md-12">
                                <select class='form-control' onChange="displayfiltered(this.value);">
                                    <option value="all">All</option>
                                    <option value="both">Partner Up & For Sale (Both)</option>
                                    <option value="partnerup">Parner Up</option>
                                    <option value="forsale">For Sale</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight ">
            <div class=" product_container row" id="property_content_area">
                <?php if(!empty($properties)): ?>

                    <?php $counter = 1; $sell_type=''; ?>
                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $for_sale = (isset($property->detail) && isset($property->detail->for_sale)) ? $property->detail->for_sale : 0;
                        $partner_up = (isset($property->detail) && isset($property->detail->partner_up)) ? $property->detail->partner_up : 0;
                        ?>
                        <?php if($for_sale == 1 && $partner_up == 1): ?>
                            <?php $sell_type = 'both'; ?>
                        <?php elseif($for_sale == 1): ?>
                            <?php $sell_type = 'forsale'; ?>
                        <?php elseif($partner_up == 1): ?>
                            <?php $sell_type = 'partnerup'; ?>
                        <?php endif; ?>
                    <?php if(isset($latitude) && $latitude != '' && isset($longitude) && $longitude != '' && isset($distance) && $distance != ''): ?>
                        <?php
                        $distanceInKM = App\Http\Controllers\frontendController::distance($latitude,$longitude,$property->lat,$property->long,'K');
                        $distanceInKM = number_format((float)$distanceInKM, 2, '.', '');
                        ?>
                        <?php if($distanceInKM <= $distance): ?>
                            <?php if($counter == 1): ?>
                                <div class="col-md-12">    
                            <?php endif; ?>
                                <div class="col-md-3 <?php echo $sell_type; ?>">
                                    <div class="ibox">
                                        <div class="ibox-content product-box custom-product-box">

                                            <div class="product-img">
                                                <a href="<?php echo e(route('investors.property.show',$property->id)); ?>">
                                                        <?php if(isset($property->images()->first()->image)): ?>
                                                            <img class="objectfit" alt="image" src="<?php echo e(asset('properties/'.$property->id.'/images/'.$property->images()->first()->image)); ?>">                                
                                                        <?php else: ?>
                                                            <img class="objectfit" alt="image" src="<?php echo e(asset('dashboard/seller/default-property.jpg')); ?>" /> <?php endif; ?>
                                                </a>

                                            </div>

                                            <span class="product-small-image">
                                                <?php if(isset($property->seller->profile->image)): ?>
                                                    <img class="objectfit" src="<?php echo e(asset('profilepic/'.$property->seller->profile->image)); ?>">
                                                <?php else: ?>
                                                    <img class="objectfit" src="<?php echo e(asset('profilepic/default.png')); ?>">
                                                <?php endif; ?>
                                            </span>
                                            <div class="product-desc ">

                                                <div class="m-t-xs">
                                                    <h2></h2>
                                                </div>
                                                <div class="m-t-xs" style='position:relative'>
                                                    <!--<div class="" style="position:absolute;height: 10px;width: 10%;display:  inline-block;">
                                                        <img src="<?php echo e(asset('dashboard/investor/address.png')); ?>" style='margin' alt="">
                                                    </div>-->
                                                    <div class="" style="position:relative;padding-left:  2px;display: inline-block;width: 90%;">
                                                        <b>Address - </b> <?php echo e($property->address); ?>, <?php echo e($property->city); ?>, <?php echo e($property->state); ?>, <?php echo e($property->zip); ?>

                                                    </div>
                                                </div>
                                                <div class="m-t-xs">
                                                    <b>Property Id - </b> <?php echo e($property->id); ?>

                                                </div>
                                                <div class="m-t-xs">
                                                    <b>List Date - </b> <?php echo e(date('m-d-Y',strtotime($property->created_at))); ?>

                                                </div>
                                                <div class="m-t-xs">
                                                    <b>Days Listed - </b>
                                                    <?php
                                                      $datetime1 = new DateTime($property->created_at);
                                                      $datetime2 = new DateTime('now');
                                                      $interval = $datetime1->diff($datetime2);
                                                      echo $interval->format('%a');?> day(s)

                                                </div>
                                                <div class="m-t-xs">
                                                    <b>Est. BVR - </b> $<?php echo e($property->detail->brv_price); ?>

                                                </div>
                                                <div class="m-t-xs">
                                                    <b>Est. AVR - </b> $<?php echo e($property->detail->arv_price); ?>

                                                </div>
                                                <div class="m-t-xs">
                                                    <b>For Sale - </b> <?php echo e((isset($property->detail->for_sale) && $property->detail->for_sale == 1)  ? 'Yes' : 'No'); ?>

                                                </div>
                                                <?php
                                                if(isset($property->detail->for_sale) && $property->detail->for_sale == 1){
                                                ?>
                                                    <div class="m-t-xs">
                                                        <b>Investment Price - </b> $<?php echo e($property->detail->investment_price); ?>

                                                    </div>
                                                <?php
                                                }
                                                if($property->seller()->first()->roles()->first()->slug != 'wholeseller')
                                                {
                                                ?>
                                                <div class="m-t-xs">
                                                    <b>Partner Up - </b> <?php echo e((isset($property->detail->partner_up) && $property->detail->partner_up == 1)  ? 'Yes' : 'No'); ?>

                                                </div>
                                                <?php
                                                }
                                                if(isset($property->detail->partner_up) && $property->detail->partner_up == 1){
                                                ?>
                                                    <div class="m-t-xs">
                                                        <?php
                                                        if($property->seller()->first()->roles()->first()->slug != 'wholeseller')
                                                        {
                                                        ?>
                                                            <b>Partnership Share (Seller/Investor)%  - </b> 
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                            <b>Partnership Share (Wholesaler/Investor)%  - </b> 
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php echo e($property->detail->partnership_seller); ?>/<?php echo e($property->detail->partnership_investor); ?> %
                                                    </div>
                                                    <div class="m-t-xs">
                                                        <b>Cost of Repair - </b> <?php echo e((isset($property->detail->estimated_repair_cost) && $property->detail->estimated_repair_cost != '') ? $property->detail->estimated_repair_cost : '-'); ?>

                                                    </div>
                                                <?php
                                                }
                                                ?> 
                                                <?php if(isset($latitude) && $latitude != '' && isset($longitude) && $longitude != '' && isset($distance) && $distance != ''): ?>
                                                    <div class="m-t-xs" style='position:relative'>
                                                        <div>
                                                            <b>Distance - <?php echo e($distanceInKM); ?> KM</b>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <!--<div class="m-t-xs">
                                                    <img src="<?php echo e(asset('dashboard/investor/YPS__email_mail_mailbox_receive-512.png')); ?>" alt="">
                                                </div>-->
                                            </div>
                                            <?php if($property->property_state == 0): ?>
                                            <div class="status" style="">
                                                <button href="" class="btn-primary-01" style="border:none;background:none">
                                                    <img style='width:18px' class="objectfit" src="<?php echo e(asset('dashboard/investor/accepting.png')); ?>" alt=""></button>

                                                <a class="ellipsis ng-binding ng-scope -user-role" style="max-width: 100%; min-width: 100%;" href="<?php echo e(route('investors.property.show',$property->id)); ?>"> &nbsp;&nbsp;Accepting Proposals
                                                         </a>
                                            </div>
                                            <?php elseif($property->property_state == 1): ?>
                                            <div class="status" style="">
                                                <button href="" class="btn-primary-01" style="border:none;background:none">
                                                    <img style='width:18px' class="objectfit" src="<?php echo e(asset('dashboard/investor/tags.png')); ?>" alt=""></button>

                                                <a class="ellipsis ng-binding ng-scope -user-role" style="max-width: 100%; min-width: 100%;" href=""> &nbsp;&nbsp;Contracted
                                                          </a>
                                            </div>
                                            <?php endif; ?> 
                                        </div>
                                    </div>
                                </div>
                            <?php if($counter % 4 == 0): ?>
                                </div>
                                <?php $counter = 1; ?>    
                            <?php else: ?>
                                <?php $counter++; ?> 
                            <?php endif; ?> 
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($counter == 1): ?>
                            <div class="col-md-12">    
                        <?php endif; ?>
                        <div class="col-md-3 <?php echo $sell_type; ?>">
                            <div class="ibox">
                                <div class="ibox-content product-box custom-product-box">

                                    <div class="product-img">
                                        <a href="<?php echo e(route('investors.property.show',$property->id)); ?>">
                                                <?php if(isset($property->images()->first()->image)): ?>
                                                <img alt="image" class="objectfit" src="<?php echo e(asset('properties/'.$property->id.'/images/'.$property->images()->first()->image)); ?>">                                <?php else: ?>
                                                <img alt="image" class="objectfit" src="<?php echo e(asset('dashboard/seller/default-property.jpg')); ?>" /> <?php endif; ?>
                                        </a>

                                    </div>

                                    <span class="product-small-image">
                                        <?php if(isset($property->seller->profile->image)): ?>
                                            <img class="objectfit" src="<?php echo e(asset('profilepic/'.$property->seller->profile->image)); ?>">
                                        <?php else: ?>
                                            <img class="objectfit" src="<?php echo e(asset('profilepic/default.png')); ?>">
                                        <?php endif; ?>
                                    </span>
                                    <div class="product-desc ">

                                        <div class="m-t-xs">
                                            <h2></h2>
                                        </div>
                                        <div class="m-t-xs" style='position:relative'>
                                            <!--<div class="" style="position:absolute;height: 10px;width: 10%;display:  inline-block;">
                                                <img src="<?php echo e(asset('dashboard/investor/address.png')); ?>" style='margin' alt="">
                                            </div>-->
                                            <div class="" style="position:relative;padding-left:  2px;display: inline-block;width: 90%;">
                                                <b>Address - </b> <?php echo e($property->address); ?>, <?php echo e($property->city); ?>, <?php echo e($property->state); ?>, <?php echo e($property->zip); ?>

                                            </div>
                                        </div>
                                        <?php if(isset($latitude) && $latitude != '' && isset($longitude) && $longitude != '' && isset($distance) && $distance != ''): ?>
                                            <div class="m-t-xs" style='position:relative'>
                                                <div>
                                                    <?php
                                                        echo "<b>Distance:</b> ".App\Http\Controllers\frontendController::distance($latitude,$longitude,$property->lat,$property->long,'K')." KM";
                                                    ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="m-t-xs">
                                            <b>Property Id - </b> <?php echo e($property->id); ?>

                                        </div>
                                        <div class="m-t-xs">
                                            <b>List Date - </b> <?php echo e(date('m-d-Y',strtotime($property->created_at))); ?>

                                        </div>
                                        <div class="m-t-xs">
                                            <b>Days Listed:</b>
                                            <?php
                                              $datetime1 = new DateTime($property->created_at);
                                              $datetime2 = new DateTime('now');
                                              $interval = $datetime1->diff($datetime2);
                                              echo $interval->format('%a');?> day(s)

                                        </div>
                                        <div class="m-t-xs">
                                            <b>Est. BVR - </b> $<?php echo e(number_format((isset($property->detail) && isset($property->detail->brv_price)) ? $property->detail->brv_price : 0)); ?>

                                        </div>
                                        <div class="m-t-xs">
                                            <b>Est. AVR - </b> $<?php echo e(number_format((isset($property->detail) && isset($property->detail->arv_price)) ? $property->detail->arv_price : 0)); ?>

                                        </div>
                                        <div class="m-t-xs">
                                            <b>For Sale - </b> <?php echo e((isset($property->detail->for_sale) && $property->detail->for_sale == 1)  ? 'Yes' : 'No'); ?>

                                        </div>
                                        <?php
                                        if(isset($property->detail->for_sale) && $property->detail->for_sale == 1){
                                        ?>
                                            <div class="m-t-xs">
                                                <b>Investment Price - </b> $<?php echo e(number_format($property->detail->investment_price)); ?>

                                            </div>
                                        <?php
                                        }
                                        if($property->seller()->first()->roles()->first()->slug != 'wholeseller')
                                        {
                                        ?>
                                        <div class="m-t-xs">
                                            <b>Partner Up - </b> <?php echo e((isset($property->detail->partner_up) && $property->detail->partner_up == 1)  ? 'Yes' : 'No'); ?>

                                        </div>
                                        <?php
                                        }
                                        if(isset($property->detail->partner_up) && $property->detail->partner_up == 1){
                                        ?>
                                            <div class="m-t-xs">
                                                <?php
                                                if($property->seller()->first()->roles()->first()->slug != 'wholeseller')
                                                {
                                                ?>
                                                    <b>Partnership Share (Seller/Investor)%  - </b> 
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                    <b>Partnership Share (Wholesaler/Investor)%  - </b> 
                                                <?php
                                                }
                                                ?>
                                                <?php echo e($property->detail->partnership_seller); ?>/<?php echo e($property->detail->partnership_investor); ?> %
                                            </div>
                                            <div class="m-t-xs">
                                                <b>Cost of Repair - </b> <?php echo e((isset($property->detail->estimated_repair_cost) && $property->detail->estimated_repair_cost != '') ? number_format($property->detail->estimated_repair_cost) : '-'); ?>

                                            </div>
                                        <?php
                                        }
                                        ?> 
                                        <?php if(isset($latitude) && $latitude != '' && isset($longitude) && $longitude != '' && isset($distance) && $distance != ''): ?>
                                            <div class="m-t-xs" style='position:relative'>
                                                <div>
                                                    <b>Distance -  <?php echo e($distanceInKM); ?> KM</b>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <!--<div class="m-t-xs">
                                            <img src="<?php echo e(asset('dashboard/investor/YPS__email_mail_mailbox_receive-512.png')); ?>" alt="">
                                        </div>-->
                                    </div>
                                    <?php if($property->property_state == 0): ?>
                                    <div class="status" style="">
                                        <a class="ellipsis ng-binding ng-scope -user-role" style="max-width: 100%; min-width: 100%;" href="<?php echo e(route('investors.property.show',$property->id)); ?>"> &nbsp;&nbsp;Accepting Proposals</a>
                                    </div>
                                    <?php elseif($property->property_state == 1): ?>
                                    <div class="status" style="">
                                        <button href="" class="btn-primary-01" style="border:none;background:none"><img style='width:18px' class="objectfit" src="<?php echo e(asset('dashboard/investor/tags.png')); ?>" alt=""></button>

                                        <a class="ellipsis ng-binding ng-scope -user-role" style="max-width: 100%; min-width: 100%;" href=""> &nbsp;&nbsp;Contracted
                                                  </a>
                                    </div>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </div>
                        <?php if($counter % 4 == 0): ?>
                            </div>
                            <?php $counter = 1; ?>     
                        <?php else: ?>
                            <?php $counter++; ?> 
                        <?php endif; ?> 
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
</section>
<!-- End Product part -->

<section>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <a class="membership-buttom" data-toggle="modal" data-target="#myModal" hidden="true"></a>
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Your Membership Status.</h2>
                </div>
                <div class="modal-body">
                    <h4>Your membership remained <label class="membership-remain-day"></label> days.</h4>
                    <h4>Please update your membership</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" style='padding:4em'>
                    <div class="row zip-code-part" style=''>
                        <div class="col-md-offset-1 col-md-4">
                            <label for="">ZIP</label>
                        </div>
                        <div class="input-group col-md-7" style='display:inline-block'>
                            <select data-placeholder="Choose a ZIPCODE..." class="zipcode-select chosen-select" multiple style="width:100%;" tabindex="4">
                    </select>
                            <!-- <div class="input-group col-sm-12"><input type="number" name="arvstart" class="form-control border-green" value="<?php echo e(isset($state)==true?$state[0]:''); ?>" placeholder="Please the Zipcode"></div> -->

                            <span class="input-group-btn"> <button type="submit" class="property-search-btn btn btn-primary search-btn"><i class="fa fa-search"></i></button> </span>
                        </div>
                    </div>
                    <br>
                    <div class="row" style='padding-left: 0px;'>
                        <form action="/searchareaform" method="POST" role="form" class="form-inline">
                            <?php echo e(csrf_field()); ?>

                            <div class="col-md-offset-1 col-md-4">
                                <label>Town </label>
                            </div>
                            <div class="input-group col-sm-3">
                                
                                <select data-placeholder="Choose a ZIPCODE..." class="zipcode-selects chosen-select" style="width:100%;" tabindex="4">
                        </select>
                            </div>
                            <div class="input-group col-sm-3" style='margin-left:.9em'><input type="number" name="distance" id="distance" class="form-control border-green" placeholder="Distance (miles)">
                                <span class="input-group-btn"> <button type="button" class="btn btn-primary search-btn distanceSearch"><i class="fa fa-search"></i></button> </span>
                            </div>
                        </form>
                    </div>
                    <br>
                    <!-- </div> -->
                    <!--<div class="row " style='padding:0px'>
                        <form action="/searchform" method="POST" role="form" class="form-inline">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-4">
                                    <label>After Renovation value</label>
                                </div>
                                <div class="input-group col-sm-3"><input type="text" name="arvstart" class="form-control border-green" value="<?php echo e(isset($state)==true?$state[0]:''); ?>"
                                        placeholder="Min"></div>
                                <div class="input-group col-sm-3" style='margin-left:.9em;'><input type="text" name="arvend" class="form-control border-green" value="<?php echo e(isset($state)==true?$state[1]:''); ?>"
                                        placeholder="Max">
                                    <span class="input-group-btn"> <button type="submit" class="btn btn-primary search-btn"><i class="fa fa-search"></i></button> </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-4">
                                    <label>Before Renovation value</label>
                                </div>
                                <div class="input-group col-sm-3"><input type="text" name="brvstart" class="form-control border-green" value="<?php echo e(isset($state)==true?$state[2]:''); ?>"
                                        placeholder="Min"></div>
                                <div class="input-group col-sm-3" style='margin-left:.9em;'><input type="text" name="brvend" class="form-control border-green" value="<?php echo e(isset($state)==true?$state[3]:''); ?>"
                                        placeholder="Max">
                                    <span class="input-group-btn"> <button type="submit" class="btn btn-primary search-btn"><i class="fa fa-search"></i></button> </span>
                                </div>
                            </div>
                        </form>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('script'); ?>

<script src='<?php echo e(asset(' js/typeahead.bundle.min.js ')); ?>'></script>


<script>
    /*
jQuery(document).ready(function($) {
        // Set the Options for "Bloodhound" suggestion engine
        
    var engine = new Bloodhound({
        remote: {
            url: '/investor/find?q=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        source: engine.ttAdapter(),

        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'usersList',

        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<a href="/investor/property/' + data.id + '" class="list-group-item">' + `<img class='objectfit' src='/properties/${data.id}/images/${data.images[0].image}' style='width:50px;height:50px'/> ${data.address}, ${data.city}, ${data.state}, ${data.zip}` + '</a>'
            }
        }
    });
});
*/
$("select[name=state]").on('change', function(){
    state_name = $(this).find("option:selected").text();
    $.ajax({
        url    : '<?php echo e(ENV('APP_URL')); ?>/getCounty',
        method : "POST",
        data : {state_name:state_name, _token:"<?php echo e(csrf_token()); ?>"},
        dataType : "text",
        success : function (responses)
        {
            $("select[name=county]").html(responses);
        }
    });
});

function displayfiltered(filter){
    if(filter == 'all'){
        $("#property_content_area .col-md-3").hide();    
    }
    else
    {
        $("#property_content_area .col-md-3").hide();
        $("#property_content_area .col-md-3."+filter).show();

    }
    

}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.investor-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>