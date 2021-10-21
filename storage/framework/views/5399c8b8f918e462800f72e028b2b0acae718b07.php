<DOCTYPE html>
<html lang="en-US">
   	<head>
    	<meta charset="utf-8">
    </head>
    <body>
	    <h2>
	     	Hi <?php echo e($data['first_name']." ".$data['last_name']); ?>, we’re glad you’re here! Following are your account details: <br>
		</h2>
		<h3>Email: </h3><p><?php echo e($data['email']); ?></p>
		<h3>Phone: </h3><p><?php echo e($data['phone']); ?></p>
	</body>
</html>