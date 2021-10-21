 
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/investor-property.css')); ?>">
<style>
  li.col-sm-2.thumb-link {
      padding: 5px;
  }
  .apply-button:focus{
    color: #ffffff;
  }
  .apply-button{
    color: #ffffff;
    padding: 20px 40px;
    font-size: 20px;
  }
  div.property-details table tbody tr td:nth-child(3) {
    border-left: 1px solid #ddd;
  }
  div.property-details table{
    width: 100%;
  }
  .list-a li:before {
    content: '\2713';
    width: 10px;
    height: 2px;
    background-color: #2cbdb8;
    top: 15px;
    left: 0;
    font-family: "themify";
    color: black;
    border-radius: 5px;
    padding: 3px;
    font-size: 14px;
    margin-right: 5px;
    font-weight: bolder;
}
.list-a li {
    position: relative;
    width: 50%;
    float: left;
    padding-left: 25px;
    padding-right: 5px;
}
.list-a {
    display: inline-block;
    line-height: 2;
    padding: 0;
    list-style: none;
    width: 100%;
}
.detailinfo{
  font-size: 20px;
}
.fonicon{
  font-size: 20px;
}
@media (min-width: 992px)
{
  .list-a li {
      width: 33.333%;
  }
}
.borderArea{
  float: left;
  padding: 10px;
  margin: 10px; 
  border: 1px solid #474040; 
  width: 98%;
}
</style>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('body'); ?>

<div class="col-md-12" style="margin-top: 35px;">
    <p style="text-transform:capitalize"><a href="<?php echo e(URL::previous()); ?>"><b><i class="fa fa-arrow-left"></i> Back</b></a></p>
</div>

<div class="" style='padding:4em 3em'>
  <div class="row" style='margin-left:58px;margin-bottom:12px'>
    <h2 style='margin:0px;color:#0b2a4a;font-size:2.7em;font-family:unisansboldbold'>Overview</h2>
    <h3 style='margin:0px;color:#67bbab;font-size:1.4em;font-family:unisansregularregular'>By <?php echo e($property->seller->name()); ?></h3>
  </div>
  <br>
  <br>
  <div class="row" style='margin:0px;box-shadow:5px 5px 16px 0px rgba(0,0,0,0.28)'>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-sm-8 body" style='padding:0px'>
          <div class="tab-content">
            <!-- OVERVIEW -->
            <br><br>
            <div class="tab-pane active" id="tab_default_1">
              <div class="container-fluid">
                <div id="main_area">
                  <!-- Slider -->
                  <div class="row">
                    <div class="col-xs-12" id="slider">
                      <!-- Top part of the slider -->
                      <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                          <div class="carousel slide" id="myCarousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner custom-slider-second-inner">
                              <?php if(isset($property->images()->first()->image)): ?> <?php $__currentLoopData = $property->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="<?php echo e($key==0 ? " active item ":"item "); ?>" data-slide-number=<?php echo e($key); ?>>
                                <img src="<?php echo e(asset('properties/'.$property->id.'/images/'.$image->image )); ?>"></div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?>
                              <div class="active item" data-slide-number="0">
                                <img src="<?php echo e(asset('dashboard/seller/default-property.jpg')); ?>"></div>
                              <?php endif; ?>
                            </div>

                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                          </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!--/Slider-->

                  <div class="row hidden-xs" id="slider-thumbs">
                    <!-- Bottom switcher of slider -->
                    <div class="col-md-12" style="padding:0px 11px;">
                      <ul class="hide-bullets">
                        <?php
                        $ii = 1;
                        ?>
                        <?php if(isset($property->images)): ?> 
                          <?php $__currentLoopData = $property->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li class="col-sm-2 thumb-link" data-target="#myCarousel" data-slide-to="<?php echo e($key); ?>">
                            <a class="thumbnail "><img src="<?php echo e(asset('properties/'.$property->id.'/images/'.$image->image )); ?>" class="thumbnail-height"></a>
                          </li>
                          
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <br><br>
            </div>
          </div>
        </div>



        <div class="col-md-4 col-sm-4">
          <div class="row">
            <div class="col-md-12 col-sm-12 left-top" style="height:auto;">
              <br>
              <hr style='margin-bottom:0px'>
              <div class="col-md-12 col-sm-12" style="text-align:center;">
                <h2 style='font-family:unisansboldbold;font-size:2em;color:#0b2a4a'><img src="<?php echo e(asset('dashboard/investor/docsearch.png')); ?>" alt="" style='display:inline-block;padding-right:5px;margin-top:-10px'>Overview</h2>
              </div>
              <br>
              <div class="row" style='font-family:unisansregularregular !important'>
                <h3 class="col-md-offset-2 col-md-4 col-sm-3 text-right">Open</h3>
                <h3 class="col-md-4 col-sm-3 text-right" style='color:#34a691'>pro 0</h3>
              </div>

              <div class="row" style='font-family:unisansregularregular !important'>
                <h3 class="col-md-offset-2 col-md-4 text-right col-sm-3">Status</h3>
                <?php if($property->property_state == 0): ?>
                <h3 class="col-md-4 col-sm-3 text-right" style='color:#34a691'>Available</h3>
                <?php elseif($property->property_state == 1): ?>
                <h3 class="col-md-4 col-sm-3 text-right" style='color:#34a691'>Contracted</h3>
                <?php endif; ?>
              </div>
              <br><br>
              <div class="row">
                <div class="col-md-12 col-sm-12 custom-social-button-group" style="text-align: center;margin-bottom:0px">
                  <img src="<?php echo e(asset('dashboard/investor/vimeo.png')); ?>" alt="" style='display:inline-block;padding-left:5px;width:30px'>
                  <img src="<?php echo e(asset('dashboard/investor/fb.png')); ?>" alt="" style='display:inline-block;padding-left:5px;width:30px'>
                  <img src="<?php echo e(asset('dashboard/investor/youtube.png')); ?>" alt="" style='display:inline-block;padding-left:5px;width:30px'>
                  <img src="<?php echo e(asset('dashboard/investor/twitter.png')); ?>" alt="" style='display:inline-block;padding-left:5px;width:30px'>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <h4 style="text-align:center;font-family:unisansregularregular;font-size:1.5em">Share on activity stream</h4>
                </div>
              </div>

 
            </div>
          </div>
          <br>
          <?php if($property->user_id != auth()->user()->id): ?>
          <div class="ibox credis">
            <div class="ibox-content top-right-section">
              <div class="row">
                <div class="col-md-offset-1 col-md-10">
                  <a href='<?php echo e(route("message.read",$property->seller->id)); ?>' type="button" class="btn btn-sm btn-primary-01 apply-button">Get In Touch</a>
                </div>
                <?php if($property->property_state == 1): ?>
                  <?php if($proposal->from_user == auth()->user()->id || $proposal->to_user == auth()->user()->id): ?>
                    <div class="col-md-offset-1 col-md-10">
                      <span class="btn btn-sm btn-primary-01 apply-button">Contracted with you!</span>
                    </div>
                  <?php else: ?>
                    <div class="col-md-offset-1 col-md-10">
                      <span class="btn btn-sm btn-primary-01 apply-button">Contracted</span>
                    </div>
                  <?php endif; ?>
                <?php else: ?>
                  <?php if(!empty($Proposal) > 0 && $Proposal->status == 0): ?>
                    <div class="col-md-offset-1 col-md-10">
                      <span class="btn btn-sm btn-primary-01 apply-button">Proposal Sent!</span>
                    </div>
                  <?php elseif(!empty($Proposal) > 0 && $Proposal->status == 1): ?>
                    <div class="col-md-offset-1 col-md-10">
                      <span class="btn btn-sm btn-primary-01 apply-button">Proposal Accepted</span>
                    </div>
                  <?php elseif(!empty($Proposal) > 0 && $Proposal->status == 2): ?>
                    <div class="col-md-offset-1 col-md-10">
                      <a href='#' data-toggle='modal' data-target='#bidmodal' type="button" class="btn btn-sm btn-primary-01 apply-button">Send Proposal1</a>
                    </div>
                  <?php else: ?>
                    <div class="col-md-offset-1 col-md-10">
                      <a href="<?php echo e(route('investors.property.propertyProposals',$property->id)); ?>" type="button" class="btn btn-sm btn-primary-01 apply-button">Send Proposal</a>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
                <div class="col-md-offset-1 col-md-10">
                  <a href='<?php echo e(route("investors.index")); ?>' type="button" class="btn btn-sm btn-primary-01 apply-button">Cancel</a>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <div class="col-md-12">
          <div class="p-t-md">
                <div class="row">
                  <div class="col-sm-12">
                    <h1>Quick Summary</h1>
                  </div>
                <div class="borderArea">
                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Property Id:</h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon">
                        <i class="fa fa-home"></i>
                      </div>
                      <div class="detailinfo"><?php echo e($property->id); ?></div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Location:</h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon"style="vertical-align:top;"><i class="fa fa-map-marker"></i></div>
                      <div class="detailinfo"><?php echo e($property->address); ?>, <?php echo e($property->city); ?>, <?php echo e($property->state); ?>, <?php echo e($property->zip); ?></div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Property Type: </h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="detailinfo"><?php echo e($property->detail->property_type); ?></div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Contract Start Date: </h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="detailinfo"><?php echo e(Carbon\Carbon::parse($property->contract_start)->format('m/d/Y')); ?></div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Contract End Date: </h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="detailinfo"><?php echo e(Carbon\Carbon::parse($property->contract_end)->format('m/d/Y')); ?></div>
                    </div>
                  </div>


                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Bedroom: </h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon"style="vertical-align:top;"><i class="fa fa-bed"></i></div>
                      <div class="detailinfo"><?php echo e($property->detail->bedroom); ?></div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Bathroom: </h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="detailinfo"><?php echo e($property->detail->bathroom); ?></div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Square Footage: </h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="detailinfo"><span class="priceNew"> <?php echo e($property->detail->square_footage); ?></span></div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Price Per SQ.FT: </h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon"style="vertical-align:top;"><i class="fa fa-dollar"></i></div>
                      <div class="detailinfo"><span class="priceNew"><?php echo e($property->detail->price_per_sqft); ?></span></div>
                    </div>
                  </div>
                </div>
                <div class="borderArea">
                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Immidiate Sale Asking Price: </h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="detailinfo">
                      <span class="priceNew"> <?php echo e((isset($property->detail->for_sale) && $property->detail->for_sale == 1)  ? 'Yes' : 'No'); ?></span></div>
                    </div>
                  </div>

                  <?php
                  if(isset($property->detail->for_sale) && $property->detail->for_sale == 1){
                  ?>
                    <div class="col-sm-12">
                      <div class="col-md-4 text-left" style='padding:0px'>
                        <?php
                        if($property->seller()->first()->roles()->first()->slug != 'wholeseller')
                        {
                        ?>
                          <h3>Ask Price: </h3>
                        <?php
                        }
                        else
                        {
                        ?>
                          <h3>Maximum Offer Price to Seller : </h3>
                        <?php
                        }
                        ?>
                      </div>
                      <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                        <div class="fonicon"style="vertical-align:top;"><i class="fa fa-dollar"></i></div>
                        <div class="detailinfo">
                        <span class="priceNew"> <?php echo e($property->detail->brv_price); ?></span></div>
                      </div>
                    </div>
                  <?php
                    if($property->seller()->first()->roles()->first()->slug == 'wholeseller')
                    {
                    ?>
                      
                      <div class="col-sm-12">
                        <div class="col-md-4 text-left" style='padding:0px'>
                            <h3>Asking Price to Investor : </h3>
                        </div>
                        <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                          <div class="fonicon"style="vertical-align:top;"><i class="fa fa-dollar"></i></div>
                          <div class="detailinfo">
                          <span class="priceNew"> <?php echo e($property->detail->investor_asking); ?></span></div>
                        </div>
                      </div>
                    <?php
                    }
                  }
                  ?>
                </div>
                <div class="borderArea">
                 <!-- <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Estimated Before Renovation Value: </h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon"style="vertical-align:top;"><i class="fa fa-dollar"></i></div>
                      <div class="detailinfo"><span class="priceNew"><?php echo e($property->detail->brv_price); ?></span></div>
                    </div>
                  </div> -->
                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Estimated After Renovation Value: </h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="fonicon"style="vertical-align:top;"><i class="fa fa-dollar"></i></div>
                      <div class="detailinfo"><span class="priceNew"><?php echo e($property->detail->arv_price); ?></span></div>
                    </div>
                  </div>
                  <?php
                  if($property->seller()->first()->roles()->first()->slug != 'wholeseller')
                  {
                  ?>
                    <div class="col-sm-12">
                      <div class="col-md-4 text-left" style='padding:0px'>
                        <h3>Partner Up: </h3>
                      </div>
                      <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                        <div class="detailinfo">
                        <span class="priceNew"> <?php echo e((isset($property->detail->partner_up) && $property->detail->partner_up == 1)  ? 'Yes' : 'No'); ?></span></div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  <?php
                  if(isset($property->detail->partner_up) && $property->detail->partner_up == 1){
                  ?>
                    <div class="col-sm-12">
                      <div class="col-md-4 text-left" style='padding:0px'>
                        <h3>Req. Partnership % Share: </h3>
                      </div>
                      <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                        <div class="detailinfo">
                          <?php
                          if($property->seller()->first()->roles()->first()->slug != 'wholeseller')
                          {
                          ?>
                            <span class=""><b> Seller/Investor</b></span></br>
                          <?php
                          }
                          else
                          {
                          ?>
                            <span class=""><b> Wholesaler/Investor</b></span></br>
                          <?php
                          }
                          ?>
                          <?php echo e($property->detail->partnership_seller); ?>/<?php echo e($property->detail->partnership_investor); ?> %
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="col-md-4 text-left" style='padding:0px'>
                        <h3>Estimated Cost of Repair: </h3>
                      </div>
                      <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                        <div class="fonicon"style="vertical-align:top;"><i class="fa fa-dollar"></i></div>
                          <div class="detailinfo">
                            <span class="priceNew"> <?php echo e($property->detail->estimated_repair_cost); ?></span>
                        </div>
                      </div>
                    </div>
                   <div class="col-sm-12">
                     <div class="col-md-4 text-left" style='padding:0px'>
                       <h3>Holding Cost:</h3>
                     </div>
                     <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                       <div class="fonicon"style="vertical-align:top;"><i class="fa fa-dollar"></i></div>
                       <div class="detailinfo">
                         <span class="priceNew"> <?php echo e($property->detail->holding_cost); ?></span>
                       </div>
                     </div>
                   </div>

                   <div class="col-sm-12">
                     <div class="col-md-4 text-left" style='padding:0px'>
                       <h3>Resale Fees:</h3>
                     </div>
                     <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                       <div class="fonicon"style="vertical-align:top;"><i class="fa fa-dollar"></i></div>
                       <div class="detailinfo">
                         <span class="priceNew"> <?php echo e($property->detail->resale_fees); ?></span>
                       </div>
                     </div>
                   </div>

                   <div class="col-sm-12">
                     <div class="col-md-4 text-left" style='padding:0px'>
                       <h3>Loan Cost:</h3>
                     </div>
                     <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                       <div class="fonicon"style="vertical-align:top;"><i class="fa fa-dollar"></i></div>
                       <div class="detailinfo">
                         <span class="priceNew"> <?php echo e($property->detail->loan_cost); ?></span>
                       </div>
                     </div>
                   </div>


                  <?php
                  }
                  ?>

                  <div class="col-sm-12">
                    <div class="col-md-4 text-left" style='padding:0px'>
                      <h3>Proposal Received</h3>
                    </div>
                    <div class="col-md-8 text-left" style='padding:0px;padding-top:2px'>
                      <div class="detailinfo">
                        <i class="fa fa-home"></i> <?php echo e($proposal_count); ?>

                      </div>
                    </div>
                  </div>
                </div>
                <?php
                if(isset($property->detail->about) && $property->detail->about != '')
                {
                ?>
                <div class="borderArea">
                  <div class="col-sm-12">
                    <div class="col-md-12 text-left" style='padding:0px'>
                      <h3>Description: </h3>
                    </div>
                    <div class="col-md-12 text-left" style='padding:0px;padding-top:2px'>
                      <p><?php echo e($property->detail->about); ?></p>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?> 
                  
                </div>
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <?php
                    $url = ENV('APP_URL')."property-lists/".$property->id."/property-details"; 
                    ?>
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo $url; ?>&layout=button_count&size=large&appId=264923528245115&width=120&height=50" width="120" height="50" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                  </div>
                  <div class="col-sm-6 text-center">
                    <h3><a style='color: #0b2a4a;' href="https://www.google.com/maps/search/?api=1&query=<?php echo e($property->lat); ?>,<?php echo e($property->long); ?>&t=k"
                        target="_blank">Check On Google Map</a></h3>
                  </div>
                </div>

                <hr class='desc-row'>
                <div class="row">
                  <div class="col-sm-12">
                    <p><?php echo e($property->detail->about); ?></p>
                  </div>

                </div>
                <br>
                <hr class='desc-row'>
                <div class="row">
                  <div class="ibox">
                    <h1>Property Details</h1>
                    <div class="ibox-content ">
                      <div class="property-details custom-text-color">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <td><b>Bedroom(s)</b></td>
                              <td><?php echo e($property->detail->bedroom); ?></td>
                              <td><b>MLS</b></td>
                              <td><?php echo e($property->detail->mls); ?></td>
                            </tr>
                            <tr>
                              <td><b>Bathroom(s)</b></td>
                              <td><?php echo e($property->detail->bathroom); ?></td>
                              <td><b>City</b></td>
                              <td><?php echo e($property->city); ?></td>
                            </tr>
                            <tr>
                              <td><b>Square Footage</td>
                              <td><span class="priceNew"><?php echo e($property->detail->square_footage); ?></span></td>
                              <td><b>County</b></td>
                              <td><span class="priceNew"><?php echo e($property->detail->county); ?></span></td>
                            </tr>
                            <tr>
                              <td><b>Price per SqFt</b></td>
                              <td><span class="priceNew"><?php echo e($property->detail->price_per_sqft); ?></span></td>
                              <td><b>Monthly Mortgage</b></td>
                              <td><span class="priceNew"><?php echo e($property->detail->mortgage); ?></span></td>
                            </tr>
                            <tr>
                              <td><b>Lot Size</b></td>
                              <td><span class="priceNew"><?php echo e($property->detail->lot_size); ?></span></td>
                              <td><b>Monthly Insurance</b></td>
                              <td><span class="priceNew"><?php echo e($property->detail->insurance); ?></span></td>
                            </tr>
                            <tr>
                              <td><b>Stories</b></td>
                              <td><?php echo e($property->detail->stories); ?></td>
                              <td><b>Monthly Tax</b></td>
                              <td><span class="priceNew"><?php echo e($property->detail->tax); ?></span></td>
                            </tr>
                            <tr>
                              <td><b>Property Type</b></td>
                              <td><?php echo e(isset($property->detail->property_type) ? $property->detail->property_type : ' '); ?></td>
                              <td><b>Last Updated</b></td>
                              <td><?php echo e(date('d-M-Y', strtotime($property->detail->updated_at))); ?></td>
                            </tr>
                            <tr>
                              <td><b>Year Built</b></td>
                              <td><?php echo e($property->detail->built); ?></td>
                              <td><b>Building Type</b></td>
                              <td><?php echo e(isset($property->detail->building_type) ? $property->detail->building_type :
                                ' '); ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <hr style='' class='desc-row'>
                <div class="row">
                  <div class="col-sm-12">
                    <h1>Amenities</h1>
                  </div>
                  <div class="amenities-list color-text-a">

                    <ul class="list-a no-margin">
                      <?php if($property->items()->first()['burglar_alarm'] == 1): ?>
                        <li>Burglar Alarm</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['smoke_detector'] == 1): ?>
                        <li>Smoke Detector</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['fire_alarm'] == 1): ?>
                        <li>Fire Alarm</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['central_air'] == 1): ?>
                        <li>Central Air</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['central_heating'] == 1): ?>
                        <li>Central Heating</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['window_ac'] == 1): ?>
                        <li>Window AC</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['dishwasher'] == 1): ?>
                        <li>Dishwasher</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['trash_compactor'] == 1): ?>
                        <li>Trash Compactor</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['garbage_disposal'] == 1): ?>
                        <li>Garbage Disposal</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['oven'] == 1): ?>
                        <li>Oven</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['microwave'] == 1): ?>
                        <li>Microwave</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['tv_antenna'] == 1): ?>
                        <li>TV Antenna</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['satelite_dish'] == 1): ?>
                        <li>Satelite Dish</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['intercom_system'] == 1): ?>
                        <li>Intercom System</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['pool'] == 1): ?>
                        <li>Pool</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['washer_dryer'] == 1): ?>
                        <li>Washer Dryer</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['hot_tub'] == 1): ?>
                        <li>Hot Tub</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['washer'] == 1): ?>
                        <li>Washer</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['dryer'] == 1): ?>
                        <li>Dryer</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['refrigerator'] == 1): ?>
                        <li>Refrigerator</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['pool_barrier'] == 1): ?>
                        <li>Pool Barrier</li>
                      <?php endif; ?>
                      <?php if($property->items()->first()['safety_cover_hottub'] == 1): ?>
                        <li>Safety Cover Hottub</li>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
                <!--
                <hr style='' class='desc-row'>
                <div class="row">
                  <div class="ibox">
                    <hr>
                    <h1>Property Documents</h1>
                    <hr>
                    <div class="ibox-content " style="margin-right:15px;padding-left:0px;border-top:0px">
                      <?php $__currentLoopData = $property->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-12 p-0" style="color:#0b2a4a;overflow:hidden;display:inline-block;width:83px;margin-right:10px">
                        <a href="<?php echo e(asset('properties/'.$property->id.'/documents/'.$doc->document)); ?>">
                          <i style='font-size:4.4em' class='fa fa-folder-o'></i>
                          <p><small><?php echo e($doc->document); ?></small> </p>
                        </a>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>
                </div>
                <br><br> <?php if(isset($property->videos)): ?>
                <hr class='desc-row' style='margin:0px 15px'>
                <div class="" style='padding:2em 20px'>
                  <h1 style='font-weight:100;font-family:unisansboldbold;font-size:1.2em;color:#0b2a4a;margin:0px'>Video</h1>
                </div>
                <hr class='desc-row' style='margin:0px 15px'>
                <div class="row video-container">
                  <div class="col-sm-12" style='padding-right:0px'>
                    <div class="ibox float-e-margins">
                      <div class="ibox-content">
                        <?php $count = 0; 
                        ?> <?php $__currentLoopData = $property->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $count = $count + 1; 
                        ?> <?php if($count == 1): ?>
                        <div class="col-sm-12" style='padding:0px'>
                          <figure responsive-video="">
                            <iframe src="<?php echo e($video->video); ?>" frameborder="0" allowfullscreen="" data-aspectratio="0.8192488262910798" style="width: 100%; height: 450px;"></iframe>
                          </figure>
                        </div>
                        <?php else: ?>
                        <div class="col-sm-3" class='ex-thumb' style='padding:0px;height:120px;border-radius:0px;border:3px solid #319c89;'>
                          <figure responsive-video="">
                            <iframe src="<?php echo e($video->video); ?>" frameborder="0" allowfullscreen="" data-aspectratio="0.8192488262910798" style="width: 100%; height: 114px;"></iframe>
                          </figure>
                        </div>
                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <br><br> <?php endif; ?>
              -->
              </div>
        </div>
      </div>
    </div>

  </div>
  <div class="row landing-main-bottom">

  </div>

</div>

<div class="modal fade" id="bidmodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" style='width:74%;margin-right:3em;margin-top:5em'>
    <div class="modal-content container p-0" style='width:100%;border-radius:0px'>
      <div class="modal-body" style='padding:0px'>
        <div class="col-md-6 left-section">
          <h2 class='type-1-heading'>Project Details</h2>
          <hr style='margin-left:0px'>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'>$ Pay</h3>
            <span class='type-1-text'>$ <span class="priceNew"><?php echo e($property->detail->investment_price); ?></span></span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'><i class='fa fa-map-marker'></i>Location</h3>
            <span class='type-1-text'><?php echo e($property->address); ?>, <?php echo e($property->city); ?>, <?php echo e($property->state); ?>, <?php echo e($property->zip); ?></span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'><i class='fa fa-home'></i>Property Id</h3>
            <span class='type-1-text'><?php echo e($property->id); ?></span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'>$ Estimated Before Renovation Value</h3>
            <span class='type-1-text'>$ <span class="priceNew"><?php echo e($property->detail->brv_price); ?></span></span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'>$ Estimated After Renovation Value</h3>
            <span class='type-1-text'>$ <span class="priceNew"><?php echo e($property->detail->arv_price); ?></span></span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'><i class='fa fa-calender'></i>List Date</h3>
            <span class='type-1-text'><?php echo e(date('d-M-Y',strtotime($property->created_at))); ?></span>
          </div>
          <div class="col-md-6 p-0 ">
            <h3 class='type-2-heading'><i class='fa fa-home'></i>Proposal Received</h3>
            <span class='type-1-text'>0</span>
          </div>
          <div class="col-md-12 p-0">
            <hr style='margin-left:0px;margin-bottom:35px'>
            <h3 class='type-2-heading' style='margin-bottom:10px'>Description</h3>
            <p class='type-1-text lh'><?php echo e($property->detail->about); ?></p>
          </div>
          <br>
          <br>
          <hr style='margin-left:0px'>
        </div>


        <div class="col-md-6 right-section">
          <div class="col-md-12 p-0" style='border-bottom:2px solid #adadae'>
            <h2 class='type-1-heading' style='margin-bottom:35px;font-size:1.7em'>Interested in this investment opportunity?<br> Apply Here
            </h2>
          </div>
          <div class="col-md-12 p-0" style='border-bottom:2px solid #adadae;padding:1.5em 0px;'>
            <div class="col-md-6 p-0 " style='padding-left:10px'>
              <h3 class='type-2-heading'>$ Estimated Before Renovation Value</h3>
              <span class='type-1-text'>$ <span class="priceNew"><?php echo e($property->detail->brv_price); ?></span></span>
            </div>
            <div class="col-md-6 p-0 " style='padding-left:10px'>
              <h3 class='type-2-heading'>$ Estimated After Renovation Value</h3>
              <span class='type-1-text'>$ <span class="priceNew"><?php echo e($property->detail->arv_price); ?></span></span>
            </div>
            <div class="col-md-6 p-0 " style='padding-left:10px'>
              <h3 class='type-2-heading'><i class='fa fa-calender'></i>List Date</h3>
              <span class='type-1-text'><?php echo e(date('d-M-Y',strtotime($property->created_at))); ?></span>
            </div>
            <div class="col-md-6 p-0 " style='padding-left:10px'>
              <h3 class='type-2-heading'><i class='fa fa-home'></i>Proposal Received</h3>
              <span class='type-1-text'>0</span>
            </div>
          </div>
          <div class="col-md-12 p-0" style='border-bottom:2px solid #adadae;padding:1.5em 0px;'>
            <div class="col-md-12 p-0 ">
              <h3 class='type-2-heading' style='margin-top:0px;font-size:20px;margin-bottom:14px'>Send Proposal</h3>
              <?php if($user->roles()->first()->slug == 'investor'): ?>
              <p class='type-1-text lh'>In order to Submit a proposal for this investment, download proposal template from Admin Documents, fill in
                all the necessary information and post it here</p>
              <form action="<?php echo e(route('investors.proposal.create')); ?>" method='post' enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file" class='form=control' name='proposal'>
                <?php if(!empty($Proposal) && $Proposal->id > 0): ?>
                  <input type="hidden" value="<?php echo e($Proposal->id); ?>" name="proposal_id">
                <?php else: ?>
                  <input type="hidden" value="0" name="proposal_id">
                <?php endif; ?>
                <input type="hidden" value="<?php echo e($property->id); ?>" name="pro_id">
                <span class='text-danger'><?php echo e($errors->first()); ?></span>
                <div class="col-md-offset-10 col-md-4" style='margin-top:1.5em'>
                  <button type="submit" class="btn btn-sm btn-primary-01 apply-button">Submit</button>
                </div>
              </form>
              <?php else: ?>
              <p class='type-1-text lh'>You need to be an Enterprise Member in order to send Proposals, Click on the button below to buy a subscription</p>
              <a href="<?php echo e(route('membership.show',$user->roles()->first()->slug)); ?>" class="btn btn-sm btn-primary-01 apply-button">Buy Membership</a>              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-12 p-0" style='border-bottom:2px solid #adadae;padding:1.5em 0px;'>
            <div class="col-md-12 p-0 ">
              <h3 class='type-2-heading' style='margin-top:0px;font-size:19px;margin-bottom:14px'>Added Additional Media (images or video).</h3>
              <?php $__currentLoopData = $property->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="additonal-media">
                <img src="<?php echo e(asset('properties/'.$property->id.'/images/'.$image->image )); ?>" style='width:100%;height:100%' alt="">
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          <div class="col-md-12 p-0" style='padding:1.5em 0px;'>
            <div class="col-md-12 p-0 ">
              <h3 class='type-2-heading' style='margin-top:0px;font-size:19px;margin-bottom:14px'>Added Supporting Document</h3>
              <?php $__currentLoopData = $property->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-12 p-0 pro-doc" style="">
                <a download href="<?php echo e(asset('properties/'.$property->id.'/documents/'.$doc->document)); ?>">
                  <i style='font-size:4.4em' class='fa fa-folder-o'></i>
                  <p><small><?php echo e($doc->document); ?></small> </p>
                </a>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-offset-10 col-md-4" style='margin-top:2em'>
                <a href='#' type="button" data-dismiss='modal' class="btn btn-sm btn-primary-01 apply-button">Cancel</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('script'); ?>
<script>
  <?php if($errors->first()): ?>
        $("#bidmodal").modal('show');
    <?php endif; ?>

    $(document).ready(function(){
        <?php if(session('success')): ?>
            alert('Your Proposal has been submitted and is awaiting Admin Approval. You will be notified when it is approved')
        <?php endif; ?>
    })

    function popupCenter(url, title, w, h) {
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    }

</script>
<script>
    $( ".priceNew" ).each(function( index ) {
        var newPrice = numberWithCommas($(this).html());
        $(this).html(newPrice);
    });
    function numberWithCommas(number) {
        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.investor-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>