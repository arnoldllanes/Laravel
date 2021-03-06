

<?php $__env->startSection('content'); ?>
	<div class="row">
            <div class="col-lg-6">
                <form class="form-vertical" role="form" method="post" action"<?php echo e(route('profile.edit')); ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error': ''); ?>">
                               		<label for="first_name" class="control-label">First name</label>
                                	<input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo e(old('first_name') ?: Auth::user()->first_name); ?>">
                                	<?php if($errors->has('first_name')): ?>
                                		<span class="help-block"><?php echo e($errors->first('first_name')); ?></span>	
                                	<?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error': ''); ?>">
                                        <label for="last_name" class="control-label">Last name</label>
                                        <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo e(old('last_name') ?: Auth::user()->last_name); ?>">
                                        <?php if($errors->has('last_name')): ?>
                                		<span class="help-block"><?php echo e($errors->first('last_name')); ?></span>	
                                		<?php endif; ?>
                                </div>
                            </div>
                    </div>
                    <div class="form_group<?php echo e($errors->has('location') ? ' has-error': ''); ?>">
                            <label for="location" class="control-label">Location</label>
                            <input type="text" name="location" class="form-control" id="location" value="<?php echo e(old('location') ?: Auth::user()->location); ?>">
                            		<?php if($errors->has('location')): ?>
                                		<span class="help-block"><?php echo e($errors->first('location')); ?></span>	
                                	<?php endif; ?>
                    </div>
                    <div class="form-group">
                            <button tupe="submit" class="btn btn-default">Update</button>
                    </div>
                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                </form>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>