<html>
  <head>
    <title></title>
  </head>
  <body>

    <h1>From : <?php echo e($data['name']); ?></h1>
    <h2>Email : <?php echo e($data['email']); ?></h2>
    <br>

    <p>
      <?php echo e($data['message']); ?>

    </p>

  </body>
</html>
