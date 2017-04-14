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

         <?php if(Session::has('message')): ?>

        <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <?php echo e(Session::get('message')); ?>

          </div>

        <?php endif; ?>

        <?php if(Session::has('message-error')): ?>

        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <?php echo e(Session::get('message-error')); ?>

              </div>
        <?php endif; ?>  
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new user</div>
                    <div class="panel-body">
                                <div class="col-md-8">
                                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/user')); ?>">
                                    
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" class="form-control" placeholder="Name" required autofocus>
                                            <input name="type" id="type" type="hidden" class="form-control" value="1">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input name="lastname" class="form-control" placeholder="Lastname" required>
                                        </div>                               
                                        
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input name="address" class="form-control" placeholder="Address" required>
                                        </div> 

                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input name="phone" class="form-control" placeholder="Phone number" required>
                                        </div> 

                                        <div class="form-group">
                                            <label>E-mail Address</label>
                                            <input name="email" type="email" class="form-control" placeholder="E-mail Address" required>
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
                                            <button type="reset" class="btn btn-warning" >Reset Button</button>
                                            <a class="btn btn-default" href="<?php echo e(route('user.index')); ?>"> Back</a>
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        </div>
                                    </form>    
                                </div>
                    
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>