<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Chatty App</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<?php echo $__env->make('templates.partials.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container">
		<?php echo $__env->make('templates.partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->yieldContent('content'); ?>
	</div>
</body>
</html>