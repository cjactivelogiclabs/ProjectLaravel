<!-- Main Content -->
<?php $__env->startSection('content'); ?>
<div class="title-page">
    <h3>Reset Password</h3>
    <?php if(session('status')): ?>
        <div class="text-center text-primary">
           <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
</div>
<div class="login-box-container">
<div class="container">
   
        <div class="col-md-8 col-md-offset-2">
            
                    

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                            <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" placeholder="Email address" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn link-button hover-white" title="Send Password Reset Link">
                                Send Password Reset Link<i class="link-icon-white"></i>          
                            </button> 
                        </div>
                    </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>