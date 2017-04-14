<?php $__env->startSection('content'); ?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">  

    <?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('alerts.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Years</h1>
        </div>
    </div><!--/.row-->     
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo e(url('year/create')); ?>">
                <button class="btn btn-success">
                    <b>Add new year</b>
                </button> 
            </a>
        </div>
    </div><!--/.row--> 
    <br>
    <div class="clearfix"></div>
    <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>                                
                                <th data-field="name" data-sortable="true">Year</th>
                                <th>Options</th>           
                            </tr>
                            </thead>
                            <tbody>
                           
                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $year): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>                                   
                                    <td><?php echo e($year->year); ?></td>
                                    <td>
                                    <a href="<?php echo e(url('year/'.$year->id.'/edit')); ?>">
                                    <?php echo Form::button('Edit',['class' =>"btn btn-primary"]); ?>

                                    </a>
                                    
                                    <a href="#" data-id="<?php echo e($year->id); ?>" class="btn btn-danger btn-deleteM">Delete</a>
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


<?php echo Form::open(array('route' => array('year.destroy', 'YEAR_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')); ?>

<?php echo Form::close(); ?>


<?php $__env->startSection('scripts'); ?>
<?php echo Html::script('js/scripts.js'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>