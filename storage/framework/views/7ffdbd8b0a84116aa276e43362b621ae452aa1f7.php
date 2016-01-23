

<?php $__env->startSection('content'); ?>
	<h3>Wuh oh something went wrong</h3>
	<p>What happened?! <a href="<?php echo e(route('home')); ?>">go home!</a></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>