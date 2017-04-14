<?php $__env->startSection('content'); ?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">  

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Clients - Users</h1>
        </div>
    </div><!--/.row-->     
    <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="lastname"  data-sortable="true">Lastname</th>
                                <th data-field="email" data-sortable="true">E-mail</th>
                                <th data-field="type" data-sortable="true">Type</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->lastname); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <?php if($user->type == 1): ?>
                                    <td>Admin</td>
                                    <?php else: ?>
                                    <td>Client</td>
                                    <?php endif; ?> 
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