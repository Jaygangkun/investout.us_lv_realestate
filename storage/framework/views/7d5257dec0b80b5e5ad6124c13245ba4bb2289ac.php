<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('font/stylesheet.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/footer.css')); ?>">
    <style media="screen">
    .investor-part-main{
    background-image: url("<?php echo e(asset('sitefront/investor-image.jpg')); ?>");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 300px;
    }

    .realtor-part-main{
    background-image: url("<?php echo e(asset('sitefront/realtor-image.jpg')); ?>");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 300px;
    }
    .seller-part-main{
    background-image: url("<?php echo e(asset('sitefront/seller-image.jpg')); ?>");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 300px;
    }
    .seller-overlay,.inv-overlay,.rea-overlay{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10;
    opacity: 0;
    background-image: url(<?php echo e(asset('sitefront/seller-overlay.png')); ?>);
    transition: opacity .5s ease-in-out;
    }
    .seller-overlay2,.inv-overlay2,.rea-overlay2{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 11;
    opacity: 0;
    transition: opacity .5s ease-in-out;
    background-image: url(<?php echo e(asset('sitefront/seller-overlay2.png')); ?>);/*dim the background*/
    }

       .main-banner-text {
       font-size: inherit !important
   }


    </style>



    <?php echo $__env->yieldContent('style'); ?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <?php echo $__env->yieldContent('body'); ?>

    <?php echo $__env->make('partials.howitwork', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('js/parallax.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('template_script'); ?>
    <script type="text/javascript">
    $('.say-about').parallax({imageSrc: '<?php echo e(asset('sitefront/pc1.jpg')); ?>'});
    </script>
  </body>
</html>
