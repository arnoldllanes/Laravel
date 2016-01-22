

<?php $__env->startSection('content'); ?>
	<h3>Sign Up</h3>
		<div class="row">
	    <div class="col-lg-6">
	        <form class="form-vertical" role="form" method="post" action="<?php echo e(route('auth.signup')); ?>">
	            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
	                <label for="email" class="control-label">Your email address</label>
	                <input type="text" name="email" class="form-control" id="email" value="<?php echo e(old('email') ?: ''); ?>">
	                <?php if($errors->has('email')): ?>
	                	<span class="help-block"><?php echo e($errors->first('email')); ?></span>
	                <?php endif; ?>
	            </div>
	            <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
	                <label for="username" class="control-label">Choose a username</label>
	                <input type="text" name="username" class="form-control" id="username" value="<?php echo e(old('username')); ?>">
	                <?php if($errors->has('username')): ?>
	                	<span class="help-block"><?php echo e($errors->first('username')); ?></span>
	                <?php endif; ?>
	            </div>
	            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
	                <label for="password" class="control-label">Choose a password</label>
	                <input type="password" name="password" class="form-control" id="password" value="">
	                <?php if($errors->has('password')): ?>
	                	<span class="help-block"><?php echo e($errors->first('password')); ?></span>
	                <?php endif; ?>
	            </div>
	            <div class="form-group">
	                <button type="submit" class="btn btn-default">Sign up</button>
	            </div>
	            	<input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
	        </form>
	    </div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>