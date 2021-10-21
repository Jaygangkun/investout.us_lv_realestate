<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo $__env->yieldContent('title'); ?></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="<?php echo e(asset('font/stylesheet.css')); ?>"> 
  <!-- Custom styles for this template -->
  <link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/colaborator.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/dashboard.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/validationEngine.jquery.css')); ?>" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?php echo e(url('css/lightbox.css')); ?>" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <style>
    .nav .dropdown .fa,
    .nav .glyphicon-home {
      color: white !important;
    }

    #message-alerts,
    #notification-alerts {
      background: white !important;
      color: black;
      max-height: 400px;
      overflow-y: scroll
    }

    #message-alerts .noti-link,
    #notification-alerts .noti-link {
      padding: .4em;
      background: white !important;
      color: black;
      width: 260px;
      min-height: 60px;
      overflow: hidden;
    }

    #message-alerts p,
    #notification-alerts p {
      max-height: 51px;
      overflow: hidden;
    }

    #message-alerts a,
    #notification-alerts a {
      padding: 0px;
      background-color: white !important;
      color: #0b2a4a
    }


    #message-alerts .fa,
    #notification-alerts .fa {
      color: black !important
    }
  </style>
  <?php echo $__env->yieldContent('style'); ?>

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <?php echo $__env->yieldContent('header'); ?>

  <div id="wrapper">

    <?php echo $__env->yieldContent('sidebar'); ?>

    <div id="page-wrapper" class='row'>
      <?php echo $__env->yieldContent('body'); ?>
    </div>
  </div>
  <?php echo $__env->yieldContent('footer'); ?>

  <script>
    var APP_URL = '<?php echo e(env("APP_URL")); ?>';
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="<?php echo e(url('js/jquery.validationEngine-en.min.js')); ?>" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo e(url('js/jquery.validationEngine.min.js')); ?>" type="text/javascript" charset="utf-8"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


  <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
  <!-- Mainly scripts -->
  <script src="<?php echo e(asset('js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
  <script src="<?php echo e(asset('js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

  <!-- Custom and plugin javascript -->
  <script src="<?php echo e(asset('js/inspinia.js')); ?>"></script>
  <script src="<?php echo e(asset('js/plugins/pace/pace.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/notifications.js')); ?>"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo e(asset('js/lightbox.js')); ?>"></script>

  <script>
  var pusher = new Pusher('6631a70a7011640fac3c', {
      cluster: 'ap2',
      encrypted: true
  });

  //Also remember to change channel and event name if your's are different.
  var channel = pusher.subscribe('notification');
  channel.bind(<?php echo e($user->id); ?> , function(message) {
      newAlert(1);
      newNotification(1);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      // message notification ajax function
      function newAlert(sentinal = 0) {
          var max_val = APP_URL;
          var url, request, tag, data;
          tag = $(this);
          url = max_val+'/alert/message';
          //var fd = new FormData(this);
          var fd = new FormData();
          fd.append('initial', sentinal)

          request = $.ajax({
              method: "post",
              url: url,
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
          });


          request.done(function (response) {

              //console.log(response);
              if (response.status == 'success') {

                  if (response.html.length > 0) {
                      $("#message-alerts").empty()
                      if (response.count) {
                          let count = response.count
                          $('.msg-count').text(count)
                      }
                      // we used append because data is already coming descending order so 
                      for (let index = 0; index < response.html.length; index++) {
                          $("#message-alerts").append(response.html[index])
                      }
                  }
              }
          });

          request.error(function (response) {
              console.log(response);
          });
      }


      // Other types of notification ajax function
      function newNotification(sentinal = 0) {
          var max_val = APP_URL;
          var url, request, tag, data;
          tag = $(this);
          url = max_val+'/alert/notification';
          //var fd = new FormData(this);
          var fd = new FormData();
          fd.append('initial', sentinal)

          request = $.ajax({
              method: "post",
              url: url,
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
          });


          request.done(function (response) {
              if (response.status == 'success') {
                  if (response.html.length > 0) {
                      $('#notification-alerts').empty()
                      if (response.count) {
                          let count = response.count
                          $('.notification-count').text(count)
                      }

                      // we used append because data is already coming descending order so 
                      for (let index = 0; index < response.html.length; index++) {
                          $("#notification-alerts").append(response.html[index])
                      }
                  }
              }
          });

          request.error(function (response) {
              console.log(response);
          });
      }
  });
</script>




  <?php echo $__env->yieldContent('template_script'); ?>
</body>

</html>