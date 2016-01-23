

<?php $__env->startSection('content'); ?>
	<div class="row">
	    <div class="col-lg-6">
	        <form role="form" action="<?php echo e(route('status.post')); ?>" method="post">
	            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
	                <textarea placeholder="What's up <?php echo e(Auth::user()->getFirstNameOrUsername()); ?>?" name="status" class="form-control" rows="2"></textarea>
					<?php if($errors->has('status')): ?>
						<span class="help-block"><?php echo e($errors->first('status')); ?></span>
					<?php endif; ?>	            
	            </div>
	            <button type="submit" class="btn btn-default">Update status</button>
	            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
	        </form>
	        <hr>
	    </div>
	</div>
	 
	<div class="row">
	    <div class="col-lg-5">
	        <?php if(!$statuses->count()): ?>
	        	<p>There's nothing in your timeline, yet.</p>
	        <?php else: ?>
	        	<?php foreach($statuses as $status): ?>
	        		<div class="media">
	        			<!--$status is from the foreach as the object the user is the relation to the status since it is called in the model and the username is the username in the user-->
					    <a class="pull-left" href="<?php echo e(route('profile.index', ['username' => $status->user->username])); ?>">
					    	<!--IF THE MODEL HAS A RELATION THAN WE CAN CALL THAT OBJECT\\ IN THIS CASE USER WITHIN STATUS.PHP-->
					        <img class="media-object" alt="<?php echo e($status->user->getNameOrUsername()); ?>" src="<?php echo e($status->user->getAvatarUrl()); ?>">
					    </a>
					    <div class="media-body">
					        <h4 class="media-heading"><a href="<?php echo e(route('profile.index', ['username' => $status->user->username])); ?>"><?php echo e($status->user->getNameOrUsername()); ?></a></h4>
					        <p><?php echo e($status->body); ?></p>
					        <ul class="list-inline">
					        	<!--Outputs the timestap it was created of the $status object creation time || WHAT IS diffForHumans?-->
					            <li><?php echo e($status->created_at->diffForHumans()); ?></li>
					            <?php if($status->user->id !== AUTH::user()->id): ?>
					            <li><a href="<?php echo e(route('status.like', ['statusId' => $status->id])); ?>">Like</a></li>
					            <?php endif; ?>
					            <li><?php echo e($status->likes->count()); ?> <?php echo e(str_plural('like', $status->likes->count())); ?></li>
					        </ul>
					 		
					 		<?php foreach($status->replies as $reply): ?>
						        <div class="media">
						            <a class="pull-left" href="<?php echo e(route('profile.index', ['username' => $reply->user->username])); ?>">
						                <img class="media-object" alt="<?php echo e($reply->user->getNameOrUsername()); ?>" src="<?php echo e($reply->user->getAvatarUrl()); ?>">
						            </a>
						            <div class="media-body">
						                <h5 class="media-heading"><a href="<?php echo e(route('profile.index', ['username' => $reply->user->username])); ?>"><?php echo e($reply->user->getNameOrUsername()); ?></a></h5>
						                <p><?php echo e($reply->body); ?></p>
						                <ul class="list-inline">
						                    <li><?php echo e($reply->created_at->diffForHumans()); ?>.</li>
						                    <?php if($reply->user->id !== Auth::user()->id): ?>
						                    <li><a href="<?php echo e(route('status.like', ['statusId' => $reply->id])); ?>">Like</a></li>
					                        <?php endif; ?>
					                        <li><?php echo e($reply->likes->count()); ?> <?php echo e(str_plural('like', $reply->likes->count())); ?></li>
						                </ul>
						            </div>
						        </div>
					        <?php endforeach; ?>
					 
					        <form role="form" action="<?php echo e(route('status.reply', ['statusId' =>$status->id])); ?>" method="post">
					            <div class="form-group<?php echo e($errors->has("reply-{$status->id}") ? ' has-error' : ''); ?>">
					                <textarea name="reply-<?php echo e($status->id); ?>" class="form-control" rows="2" placeholder="Reply to this status"></textarea>
					                <?php if($errors->has("reply-{$status->id}")): ?>
					                	<span class="help-block"><?php echo e($errors->first("reply-{$status->id}")); ?></span>
					                <?php endif; ?>
					            </div>
					            <input type="submit" value="Reply" class="btn btn-default btn-sm">
					            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
					        </form>
					    </div>
					</div>
					<!--FOR PAGINATION-->
	        	<?php endforeach; ?>

	        	<?php echo $statuses->render(); ?>

	        <?php endif; ?>
	    </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>