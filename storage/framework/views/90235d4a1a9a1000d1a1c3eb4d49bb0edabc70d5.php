<?php $__env->startSection('content'); ?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> 
<div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/dashboard')); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Maker</li>
            </ol>
        </div><!--/.row--> 

    <?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('alerts.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Makers</h1>
        </div>
    </div><!--/.row-->     
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo e(url('maker/create')); ?>">
                <button class="btn btn-success">
                    <b>Add new maker</b>
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
                                <th data-field="name" data-sortable="true">Name</th>
                                <th>Options</th>           
                            </tr>
                            </thead>
                            <tbody>
                           
                                <?php $__currentLoopData = $makers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $maker): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>                                   
                                    <td><?php echo e($maker->name); ?></td>
                                    <td>
                                    <a href="<?php echo e(url('maker/'.$maker->id.'/edit')); ?>">
                                    <span class="glyphicon glyphicon-pencil boton"></span>
                                    </a>
                                    
                                    <?php echo Form::open(['method' => 'DELETE','route' => ['maker.destroy', $maker->id],'style'=>'display:inline']); ?>

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

<?php $__env->startSection('scripts'); ?>
<?php echo Html::script('js/scripts.js'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>