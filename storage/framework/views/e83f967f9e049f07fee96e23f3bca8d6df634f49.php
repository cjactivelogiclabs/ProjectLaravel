<?php $__env->startSection('content'); ?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">  
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Clients</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Clients - Users</h1>
        </div>
    </div><!--/.row-->      

    <?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('alerts.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     
    <?php $i=1 ?>
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo e(route('user.create')); ?>">
                    <button class="btn btn-success">
                        <b>Add new user</b>
                    </button> 
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="lastname"  data-sortable="true">Lastname</th>
                                <th data-field="state"  data-sortable="true">State</th>
                                <th data-field="phone"  data-sortable="true">Phone</th>
                                <th data-field="email" data-sortable="true">E-mail</th>
                                <th data-field="type" data-sortable="true">Type</th>
                                <th data-sortable="true">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                    <td><?php echo e($i++); ?></td>    
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->lastname); ?></td>
                                    <td><?php echo e($user->state->name); ?></td>
                                    <td><?php echo e($user->phone); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <?php if($user->type == 1): ?>
                                    <td>Admin</td>
                                    <?php else: ?>
                                    <td>Client</td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?php echo e(route('user.show',$user->id)); ?>"><span class="glyphicon glyphicon-eye-open boton"></span></a>
                                        <a href="<?php echo e(route('user.edit',$user->id)); ?>"><span class="glyphicon glyphicon-pencil boton"></span></a> 
                                        <?php echo Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']); ?>

                                            <button type="submit" class="glyphicon btn-link glyphicon-trash" onClick="return confirm('Are you sure you want to delete the record?')"></button>
                                        <?php echo Form::close(); ?>

                                    </td> 
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div><!--/.row--> 
</div> 


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>