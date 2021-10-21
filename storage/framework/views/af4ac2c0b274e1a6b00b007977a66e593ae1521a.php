 
<?php $__env->startSection('style'); ?>
<style>
  @media  only screen and (max-width: 1400px) {

    .tabbable-line .about_client {
      width: 0px;
      height: 0px;

    }
    .about_client_img {
      width: 0px;
      height: 0px;
    }
    .about_client_mail {
      padding-top: 10px;
      text-align: center;
      padding-left: 20px;
    }

  }

  @media  only screen and (min-width: 1400px) {

    .tabbable-line .about_client {
      float: right;
      margin-top: -10%;
      margin-right: -10%;
      /*height: 200px;*/
      /*width:  400px;*/
      z-index: 3;

    }
    .about_client_img {
      float: right;
      margin-right: -85%;
      margin-top: 5%;
      width: 100px;
      height: 100px;
      z-index: 9;
      border-radius: 50%;
    }

    .about_client_mail {

      float: right;
      margin-right: 200px;
      margin-top: 85px;

    }
  }

  .fa:hover {
    opacity: 0.7;
  }

  .fa-youtube {
    padding: 8px;
    font-size: 30px;
    width: 45px;
    text-align: center;
    text-decoration: none;
    margin: 2.5px 1px;
    background: #dd4b39;
    color: white;
  }

  .fa-vimeo {
    padding: 8px;
    font-size: 30px;
    width: 45px;
    text-align: center;
    text-decoration: none;
    margin: 2.5px 1px;
    background: #55ACEE;
    color: white;
  }

  .fa-imdb {
    padding: 8px;
    font-size: 30px;
    width: 45px;
    text-align: center;
    text-decoration: none;
    margin: 2.5px 1px;

    background: #ed5565;
    color: white;
  }

  .fa-instagram {
    padding: 8px;
    font-size: 30px;
    width: 45px;
    text-align: center;
    text-decoration: none;
    margin: 2.5px 1px;
    background: #007bb5;
    color: white;
  }

  .custom-container-a {
    width: 86%;
  }

  .fa-eye,
  .fa-star,
  .fa-pencil-square-o {
    font-size: 4em;
    color: darkgray
  }

  #detail-progress {
    padding-left: 2.6em;
  }

  .tab-pane {
    overflow: hidden
  }

  .form-group {
    padding: 0px;
  }

  #detail-doc label {
    font-family: unisansboldbold;
    font-weight: 100;
    color: #0b2a4a;
    font-size: 1.1em;
  }

  #detail-doc input,
  #detail-doc select {
    box-shadow: 4px 4px 5px -2px rgba(100, 100, 100, .4) !important;
    border-radius: 5px;
    border: 1px solid #eee;
    padding-left: 1em;
  }

  #detail-doc input:focus,
  #detail-doc select:focus {
    border: 1px solid #eee !important;
  }
  div.property-details table tbody tr td:nth-child(3) {
    border-left: 1px solid #ddd;
  }
  div.property-details table{
    width: 100%;
  }
</style>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('body'); ?>

<meta property="og:url" content="<?php echo e(Request::url()); ?>" />
<meta property="og:type" content="Property" />
<meta property="og:title" content="Check this Property" />
<meta property="og:description" content="A nice value property to invest in." />
<section>
  <div class="landing-main landing-page">
    <div class="row">
  <?php echo $__env->make('partials.property-breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <div class="wrapper wrapper-content custom-container-a overfolw-hidden">

        <div class="row">
          <!--<div class="col-md-4" style=''>
            <div class="my-stat" style='padding:0px'>
              <div class="col-md-4" style='margin-top:-12px !important'>
                <h1>00</h1>
              </div>
              <div class="col-md-4" style='padding:0px;color: #34a691;'>
                <strong>Posts</strong>
                <span>You have views</span>
              </div>
              <div class="col-md-4 text-right" style='padding:0px;padding-right:5px'>
                <i class="fa fa-eye" aria-hidden="true" style='margin-top:-10px'></i>
              </div>
            </div>
          </div>
          <div class="col-md-4" style='margin-bottom:20px;border-left: 1px solid #eee;'>
            <div class="my-stat" style='padding:0px'>
              <div class="col-md-4" style='margin-top:-10px !important'>
                <h1>00</h1>
              </div>
              <div class="col-md-5" style='padding:0px;color: #34a691;'>
                <strong>Proposals</strong>
                <span>You have recieved proposals</span>
              </div>
              <div class="col-md-3 text-right" style='padding:0px;padding-right:5px'>
                <a href="/property_submission">
                                       <i class="fa fa-pencil-square-o" aria-hidden="true" style='margin-top:-4px;'></i>
                                     </a>
              </div>
            </div>
          </div>
          <div class="col-md-4" style='border-left: 1px solid #eee;'>
            <div class="my-stat" style='padding:0px'>
              <div class="col-md-4" style='margin-top:-12px !important'>
                <h1>00</h1>
              </div>
              <div class="col-md-5" style='padding:0px;color: #34a691;'>
                <strong>Followings</strong>
                <span>You have favorites</span>
              </div>
              <div class="col-md-3 text-right" style='padding:0px;padding-right:5px'>
                <i class="fa fa-star" aria-hidden="true" style='margin-top:-4px'></i>
              </div>
            </div>
          </div>-->
          <div class='col-md-12'>
            <div class="tab-content body">
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
                            <div class="carousel slide property-detail-carousel" id="myCarousel">
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
                              <!-- Carousel nav -->
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
                      <ul class="hide-bullets">
                        <?php if(isset($property->images)): ?> <?php $__currentLoopData = $property->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="col-sm-2 thumb-link" data-target="#myCarousel" data-slide-to="<?php echo e($key); ?>">
                          <a class="thumbnail "><img src="<?php echo e(asset('properties/'.$property->id.'/images/'.$image->image )); ?>" class="thumbnail-height"></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <br><br>

                <div class="p-t-md">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="col-sm-5">
                        <h3>Location</h3>
                      </div>
                      <div class="col-sm-7">
                        <p class="ng-binding"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo e($property->address); ?>, <?php echo e($property->city); ?>, <?php echo e($property->state); ?>, <?php echo e($property->zipCode); ?></p>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="col-sm-4">
                        <h3>BRV</h3>
                      </div>
                      <div class="col-sm-7">
                        <p class="ng-binding"><i class="fa fa-dollar"></i>&nbsp;&nbsp;<span class="priceNew"><?php echo e($property->detail->brv_price); ?></span></p>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="col-sm-5">
                        <h3>ARV</h3>
                      </div>
                      <div class="col-sm-7">
                        <p class="ng-binding"><i class="fa fa-dollar"></i>&nbsp;&nbsp;<span class="priceNew"><?php echo e($property->detail->arv_price); ?></span></p>
                      </div>
                    </div>
                    <div class="col-sm-6" style='padding:0px'>
                      <div class="col-sm-4">
                        <h3>List Date</h3>
                      </div>
                      <div class="col-sm-7" style='padding-left: 28px;'>
                        <p class="ng-binding"><i class="fa fa-calendar"></i> &nbsp;<?php echo e(date('d-M-Y', strtotime($property->created_at))); ?></p>
                      </div>
                    </div>
                  </div>
                  <!--<br>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="col-sm-5" style="padding-right:  0px;">
                        <h3>During Date</h3>
                      </div>
                      <div class="col-sm-7">
                        <p class="ng-binding"><i class="fa fa-calendar"></i> <?php echo e($property->detail->during_date); ?> Days</p>
                      </div>
                    </div>
                  </div>-->
                  <?php
                  if(isset($property->detail->about) && $property->detail->about != '')
                  {
                  ?>
                    <br>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="col-sm-5" style="padding-right:  0px;">
                          <h3>Description</h3>
                        </div>
                        <div class="col-sm-12">
                          <p class="ng-binding"><?php echo e($property->detail->about); ?></p>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  <br>
                  <!--
                  <div class="row">
                    <div class="col-sm-12 text-right" style='padding-right: 7.8em;font-size:.8em'>
                      <h3><a style='color: #0b2a4a;' href="http://maps.google.com/maps?q=<?php echo e($property->lat); ?>,<?php echo e($property->long); ?>&t=k"
                          target="_blank">Check On Google Map</a></h3>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-12 text-right" style='padding-right: 7.8em;font-size:.8em'>
                      <h3><a style='color: #0b2a4a;' href='<?php echo e(route("message.read",$property->seller->id)); ?>'>Send A Message</a></h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 text-right" style='padding-right: 7.8em;font-size:.8em'>
                      <button id='shareBtn' type='button' class='btn btn-primary'>Share On Facebook</button>
                    </div>
                  </div>


                  <br>-->



                  <div class="row">
                    <div class="ibox">
                      <hr>
                      <h3>Property Details</h3>
                      <div class="ibox-content " style="margin-right:15px;padding-left:0px">
                        <div class="property-details custom-text-color">
                          <table class="table table-striped">
                            <tbody>
                              <tr>
                                <td><b>Bedroom(s)</b></td>
                                <td><?php echo e($property->detail->bedroom); ?></td>
                                <td><b>Property Type</b></td>
                                <td><?php echo e($property->detail->property_type); ?></td>
                              </tr>
                              <tr>
                                <td><b>Bathroom(s)</b></td>
                                <td><?php echo e($property->detail->bathroom); ?></td>
                                <td><b>Neighborhood</b></td>
                                <td><?php echo e($property->detail->neighborhood); ?></td>
                              </tr>
                              <tr>
                                <td><b>Square Footage</b></td>
                                <td><span class="priceNew"><?php echo e($property->detail->square_footage); ?></span></td>
                                <td><b>County</b></td>
                                <td><?php echo e($property->detail->county); ?></td>
                              </tr>
                              <tr>
                                <td><b>Price per SqrFt</b></td>
                                <td>$<span class="priceNew"><?php echo e($property->detail->price_per_sqft); ?></span></td>
                                <td><b>Monthly, Mortage</b></td>
                                <td>$<span class="priceNew"><?php echo e($property->detail->mortgage); ?></span></td>
                              </tr>
                              <tr>
                                <td><b>Lot Size</b></td>
                                <td><span class="priceNew"><?php echo e($property->detail->lot_size); ?></span></td>
                                <td><b>Monthly, Insurance</b></td>
                                <td>$<span class="priceNew"><?php echo e($property->detail->insurance); ?></span></td>
                              </tr>
                              <tr>
                                <td><b>Stories</b></td>
                                <td><?php echo e($property->detail->stories); ?></td>
                                <td><b>Monthly Property Tax</b></td>
                                <td>$<span class="priceNew"><?php echo e($property->detail->tax); ?></span></td>
                              </tr>
                              <tr>
                                <td><b>Year Built</b></td>
                                <td><?php echo e($property->detail->built); ?></td>
                                <td><b>Last Updated</b></td>
                                <td style='padding-right: 30px;'><?php echo e(date('d-M-Y', strtotime($property->detail->updated_at))); ?> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                              </tr>
                              <tr>
                                <td><b>Building Type</b></td>
                                <td><?php echo e($property->detail->building_type); ?></td>

                              </tr>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="ibox">
                      <hr>
                      <h3>Property Documents</h3>
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
                  <br><br>
                  <div class="row">
                    <div class="ibox float-e-margins" style='padding-right: 30px;'>
                      <div class="ibox-title">
                        <h5>Video</h5>
                        <div class="ng-scope">
                          <div class="ibox-tools dropdown" uib-dropdown="">
                            <a class="collapse-link"> <i class="fa fa-chevron-up"></i></a>
                            <a class="close-link"><i class="fa fa-times"></i></a>
                          </div>
                        </div>
                      </div>
                      <?php $__currentLoopData = $property->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="ibox-content">
                        <?php if($key == 0): ?>
                        <figure responsive-video="">
                          <iframe src="<?php echo e($video->video); ?>" frameborder="0" allowfullscreen="" data-aspectratio="0.8192488262910798" style="width: 100%; height: 450px;"></iframe>
                        </figure>
                        <?php else: ?>
                        <figure responsive-video="">
                          <iframe src="<?php echo e($video->video); ?>" frameborder="0" allowfullscreen="" data-aspectratio="0.8192488262910798" style="width: 100%; height: 190px;"></iframe>
                        </figure>
                        <?php endif; ?>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>
                  <!--<div class="row">
                    <div id='detail-doc' style='' class="col-md-12 detail-doc">
                      <hr>
                      <h3>Property Documents</h3>
                      
                      <div class="b-bottom"></div>
                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Does anyone claim an easement on or a right to use all or some of the property?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_04" name="easement_claim" disabled value='<?php echo e($property->info["easement_claim"]); ?>'>                          <?php if($errors->has('easement_claim')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> If not, when did seller last occupy property?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_02" name="occupy_last" disabled value='<?php echo e($property->info["occupy_last"]); ?>'>                          <?php if($errors->has('occupy_last')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is any part of the property leased?</label></label>
                        <div class="col-sm-8">
                          <input class="form-control" id="question_03" name="leased" disabled value='<?php echo e($property->info["leased"]); ?>'>                          <?php if($errors->has('leased')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>


                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Does seller currently occupy property?</label></label>
                        <div class="col-sm-8">
                          <input class="form-control" id="question_01" name="occupy_current" disabled value='<?php echo e($property->info["occupy_current"]); ?>'>                          <?php if($errors->has('occupy_current')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Does property rest on a landfill?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_05" name="landfill" disabled value='<?php echo e($property->info["landfill"]); ?>'>                          <?php if($errors->has('landfill')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is the property in a designated flood plain?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_06" name="flood_plain" disabled value='<?php echo e($property->info["flood_plain"]); ?>'>                          <?php if($errors->has('flood_plain')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is the property in a designated fire danger zone?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_07" name="danger_zone" disabled value='<?php echo e($property->info["danger_zone"]); ?>'>                          <?php if($errors->has('danger_zone')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is the property in a designated earthquake danger zone?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_08" name="earthquake_zone" disabled value='<?php echo e($property->info["earthquake_zone"]); ?>'>                          <?php if($errors->has('earthquake_zone')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are  you aware of any settling/earth movement?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_09" name="earth_movement_zone" disabled value='<?php echo e($property->info["earth_movement_zone"]); ?>'>                          <?php if($errors->has('earth_movement_zone')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any encroachments, boundary line disputes, or unrecorded easements?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_10" name="unrecorded_easements" disabled value='<?php echo e($property->info["unrecorded_easements"]); ?>'>                          <?php if($errors->has('unrecorded_easements')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> How old is the structure?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_11" name="old" disabled value='<?php echo e($property->info["old"]); ?>'>                          <?php if($errors->has('old')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any problems, past or present, with roof, gutters, or downspouts?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_12" name="problem" disabled value='<?php echo e($property->info["problem"]); ?>'>                          <?php if($errors->has('problem')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any past or present damage caused by infiltrating pests,termites, dry rot,or other wood-boring insects?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_13" name="pest_damage" disabled value='<?php echo e($property->info["pest_damage"]); ?>'>                          <?php if($errors->has('pest_damage')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is your property currently under warranty by a licensed pest control company?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_14" name="pest_license" disabled value='<?php echo e($property->info["pest_license"]); ?>'>                          <?php if($errors->has('pest_license')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any past or present movement or other structural problems with floors, walls, or foundations?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_15" name="structure_problem" disabled value='<?php echo e($property->info["structure_problem"]); ?>'>                          <?php if($errors->has('structure_problem')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Has there been fire, wind, or flood damage that required repair?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_16" name="repair" disabled value='<?php echo e($property->info["repair"]); ?>'>                          <?php if($errors->has('repair')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Has there ever been water leakage or dampness within the basement or crawl space?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_17" name="water_leakage" disabled value='<?php echo e($property->info["water_leakage"]); ?>'>                          <?php if($errors->has('water_leakage')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Have there been any additions, structural changes, or alterations to the property?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_19" name="structure_changes" disabled value='<?php echo e($property->info["structure_changes"]); ?>'>                          <?php if($errors->has('structure_changes')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Was work done with the necessary permits and approvals in compliance with building codes and zoning regulations?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_20" name="zone_regulataion" disabled value='<?php echo e($property->info["zone_regulataion"]); ?>'>                          <?php if($errors->has('zone_regulataion')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is drinking water source public or private?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_21" name="water_source" disabled value='<?php echo e($property->info["water_source"]); ?>'>                          <?php if($errors->has('water_source')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is sewer system public or private?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_22" name="sewer_system" disabled value='<?php echo e($property->info["sewer_system"]); ?>'>                          <?php if($errors->has('sewer_system')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any past or present leaks, backups, etc. relating to water and/or sewer?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_23" name="water_sewer_leaks" disabled value='<?php echo e($property->info["water_sewer_leaks"]); ?>'>                          <?php if($errors->has('water_sewer_leaks')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is there polybutylene plumbing (other than the primary service line) on the property?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_24" name="plumbing" disabled value='<?php echo e($property->info["plumbing"]); ?>'>                          <?php if($errors->has('plumbing')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are you aware of any toxic substances on the property?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_25" name="toxic_substance" disabled value='<?php echo e($property->info["toxic_substance"]); ?>'>                          <?php if($errors->has('toxic_substance')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Has the property been tested for radon?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_26" name="radon_tested" disabled value='<?php echo e($property->info["radon_tested"]); ?>'>                          <?php if($errors->has('radon_tested')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are there or have there ever been fuel storage tanks below ground on the property?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_27" name="fuel_storage" disabled value='<?php echo e($property->info["fuel_storage"]); ?>'>                          <?php if($errors->has('fuel_storage')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is property subject to covenants and restrictions?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_28" name="restrictions" disabled value='<?php echo e($property->info["restrictions"]); ?>'>                          <?php if($errors->has('restrictions')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is there a mandatory association fee?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_30" name="association_fee_condition" disabled value='<?php echo e($property->info["association_fee_condition"]); ?>'>                          <?php if($errors->has('association_fee_condition')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> If so, how much monthly/yearly? </label></label>
                        <div class="input-group m-b col-sm-8" style="padding-left:15px;padding-right:15px;">
                          <span class="input-group-addon">$</span>
                          <input type="text" class="form-control" style='box-shadow:none !important;border-radius:0px;' placeholder="" name="association_fee"
                            id="question_29" disabled value='<?php echo e($property->info["association_fee"]); ?>'>
                          <span class="input-group-addon">
                                                                <select style="font-size:10.9px" name='association_fee_unit'>
                                                                    <option value="monthly">monthly</option>
                                                                    <option value="yearly">yearly</option>
                                                                </select>
                                                            </span> <?php if($errors->has('association_fee')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Is there an initiation fee?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_31" name="initiation_fee" disabled value='<?php echo e($property->info["initiation_fee"]); ?>'>                          <?php if($errors->has('initiation_fee')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are special assessments approved by the association?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_32" name="assessments_approved" disabled value='<?php echo e($property->info["assessments_approved"]); ?>'>                          <?php if($errors->has('assessments_approved')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Has the property ever been the subject of litigation?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_33" name="litigation" disabled value='<?php echo e($property->info["litigation"]); ?>'>                          <?php if($errors->has('litigation')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Do you know of any violations of local, state, or federal laws, codes, or regulations with respect to the property?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_34" name="laws_violation" disabled value='<?php echo e($property->info["laws_violation"]); ?>'>                          <?php if($errors->has('laws_violation')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Are any equipment/appliances/systems included in sale of property in need of repair or replacement?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_35" name="equipment_repair" disabled value='<?php echo e($property->info["equipment_repair"]); ?>'>                          <?php if($errors->has('equipment_repair')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group col-md-12"><label class="col-sm-4 text-left" style="display:inline-flex;"><i class="fa fa-circle" style="font-size:9px;padding-top:4px;padding-right:6px;"></i><label> Does the property contain asbestos?</label></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="question_35" name="asbestos" disabled value='<?php echo e($property->info["asbestos"]); ?>'>                          <?php if($errors->has('asbestos')): ?>
                          <small><strong class='text-danger'>Please answer this question</strong> </small> <?php endif; ?>
                        </div>
                      </div>

                    </div>
                  </div>-->

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('script'); ?>


<script>
  window.fbAsyncInit = function() {
      // FB JavaScript SDK configuration and setup
      FB.init({
        appId      : '1801355226611397', // FB App ID
        autoLogAppEvents : true,
        xfbml      : true,  // parse social plugins on this page
        version    : 'v3.0' // use graph api version 2.8
      });
  };



  // Load the JavaScript SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: '<?php echo e(Request::url()); ?>',
  }, function(response){});
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
<?php echo $__env->make(session('layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>