

<?php $__env->startSection('style'); ?>
<style>
  .custom-container-a {
    width: 86%;
  }

  .fa-eye,
  .fa-star,
  .fa-pencil-square-o {
    font-size: 4em;
    color: darkgray
  }

  #page-wrapper {
    padding: 0px
  }

  .banner h2 {
    color: #0b2a4a;
  }

  .banner .text-container {
    margin-top: 4%;
  }

  .banner h2:first-of-type {
    margin-bottom: -10px;
    font-family: unisansboldbold;
    font-size: 3.3em;
  }

  .banner h2:last-of-type {
    margin: 0px;
    font-size: 3.6em;
    font-family: unisansthinregular;
    font-weight: 700;
  }

  .main-content .main-img {
    margin-left: 4em;
    margin-top: 10%
  }

  .main-content h3,
  p {
    color: #0b2a4a
  }

  .main-content h3 {
    font-family: unisansboldbold;
    font-weight: 100;
    font-size: 2em;
    margin-bottom: 5px;
  }

  .main-content p {
    font-family: unisansregularregular;
    font-size: 1.2em;
    line-height: 25px;
  }

  .outer {
    width: 1px;
    height: 440px;
    margin: auto;
    position: absolute;
    overflow: hidden;
    top: 7px;
    left: 0px
      /* left: 6%; */
  }

  .inner {
    position: absolute;
    width: 100%;
    height: 33.5%;
    background: black;
  }

  .main-body {
    margin-top: 4em;
  }

  @media (min-width:768px) {
    #page-wrapper {
      min-height: 1600px !important
    }
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="banner" style="">
  <div class='col-md-offset-2 col-md-6 text-container'>
    <div class="realtor-name text-left">
      <h2 style=''>Welcome To</h2>
      <h2 style=''> Account</h2>
    </div>
  </div>
</div>
<div class='main-content col-md-offset-1 col-md-10'>
  <div class='main-body row'>
    <div class='col-md-12'>
      <h1>How it works?</h1>
    </div>
    <div class='col-md-12'>
      <iframe width="100%" height="800px" src="//www.youtube.com/embed/jZVf9U755eU?autoplay=1" style="box-shadow: 4px 4px 12px #181818; border: none;"></iframe>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.seller-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>