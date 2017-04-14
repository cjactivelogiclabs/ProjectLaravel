<?php $__env->startSection('content'); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Clients</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Clients - Users</h1>
        </div>
    </div><!--/.row-->      

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>  
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Show user</div>
                    <div class="panel-body">
                                <div class="col-md-8">
                                    <?php echo Form::open(array('action' => ['UserController@update', $user->id],'method' => 'PUT')); ?>

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" class="form-control" value="<?php echo e($user->name); ?>" required autofocus>
                                            <input name="type" type="hidden" class="form-control" value="1">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input name="lastname" class="form-control" value="<?php echo e($user->lastname); ?>" required>
                                        </div>                               
                                        
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input name="address" class="form-control" value="<?php echo e($user->address); ?>" required>
                                        </div> 

                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input name="phone" class="form-control" value="<?php echo e($user->phone); ?>" required>
                                        </div> 

                                        <div class="form-group">
                                            <label>E-mail Address</label>
                                            <input name="email" type="email" class="form-control" value="<?php echo e($user->email); ?>" required>
                                        </div> 
                                       
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" type="password" class="form-control" placeholder="Password*" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" id="password-confirm" placeholder="Comfirm password*" type="password" name="password_confirmation" required>
                                        </div>

                                        <div class="pull-right">
                                        <button type="submit" class="btn btn-success">Save</button>    
                                        <a class="btn btn-default" href="<?php echo e(route('user.index')); ?>"> Back</a>
                                        </div>
                                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <?php echo Form::close(); ?>

                                </div>
                    
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>