 
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
                        <p class="ng-binding"><i class="fa fa-calendar"></i> &nbsp;<?php echo e(date('m-d-yy', strtotime($property->created_at))); ?></p>
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


                  <br>
                -->



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
                                <td style='padding-right: 30px;'><?php echo e(date('m-d-Y', strtotime($property->detail->updated_at))); ?> &nbsp;&nbsp;&nbsp;&nbsp;</td>
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