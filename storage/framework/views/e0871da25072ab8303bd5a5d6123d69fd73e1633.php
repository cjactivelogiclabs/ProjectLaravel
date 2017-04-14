<?php $__env->startSection('content'); ?>
<style type="text/css">
 
.fila-base{ display: none; } /* fila base oculta */
 
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Products</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
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
                    <div class="panel-heading">Add new product</div>
                    <div class="panel-body">
                                <div class="col-md-8">
                                    <?php echo Form::open(array('method'=>'POST','route' => ['product.store'],'enctype'=>'multipart/form-data')); ?>

                                        <div class="form-group">
                                            <label>SKU</label>
                                            <input name="SKU" class="form-control" placeholder="SKU" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier SKU</label>
                                            <input name="supplier_sku" class="form-control" placeholder="Supplier SKU" required >
                                        </div>
                        
                                        <div class="form-group">
                                            <label>Product name</label>
                                            <input name="name" class="form-control" placeholder="Name" required >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Product description</label>
                                            <textarea name="description" rows="5" class="form-control" placeholder="Description" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Supplier</label>
                                             <?php echo Form::select('supplier', $suppliers, null, ['id' => 'supplier', 'class' => 'js-example-basic-single form-control' ,'required']); ?>

                                        </div> 

                                        <div class="form-group">
                                            <label>Condition option</label>
                                             <?php echo Form::select('condition_o', $condition, null, ['id' => 'condition_o','class' => 'form-control' , 'placeholder'=>'Condition']); ?>

                                        </div> 
                                        <div class="form-group">
                                            <label>Categoric</label>
                                             <?php echo Form::select('categoric', $categoric, null, ['id' => 'categoric','class' => 'form-control' , 'placeholder'=>'Categoric']); ?>

                                        </div> 
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <input name="weight" class="form-control" placeholder="Weight" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input name="location" class="form-control" placeholder="Location" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input name="type" class="form-control" placeholder="Type" required >
                                        </div>
                                        <div class="form-group">
                                            <label>FCC ID #</label>
                                            <input name="fcc_id" class="form-control" placeholder="FCC ID" required >
                                        </div>
                                        <div class="form-group">
                                            <label>IC #</label>
                                            <input name="ic" class="form-control" placeholder="IC #" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Frequency</label>
                                            <input name="frequency" class="form-control" placeholder="Frequency" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Number of button</label>
                                            <input name="num_button" type="number" class="form-control" placeholder="Number of button" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Reusable</label>
                                            <input name="reusable" class="form-control" placeholder="Reusable" required >
                                        </div>
                                        <div class="form-group">
                                            <label>On Board Programming</label>
                                            <?php echo Form::select('board_programming', $board_programming, null, ['id' => 'board_programming','class' => 'form-control' , 'placeholder'=>'On Board Programming']); ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Emergency Key</label>
                                            <?php echo Form::select('emergency_key', $emergency_key, null, ['id' => 'board_programming','class' => 'form-control' , 'placeholder'=>'Emergency Key']); ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Battery Part #</label>
                                            <input name="battery_part" class="form-control" placeholder="Battery Part #" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Maker</label>
                                             <?php echo Form::select('id_maker', $makers, null, ['id' => 'id_maker','class' => 'form-control' , 'placeholder'=>'Makers','required']); ?>

                                        </div> 
                                        <div class="form-group">
                                            <label>Model</label>
                                             <?php echo Form::select('model[]', $models, null, ['id' => 'model', 'multiple'=>true, 'class' => 'js-example-basic-multiple form-control','disabled' ,'required']); ?>

                                        </div> 

                                        <div class="form-group">
                                            <label>Year</label>
                                            <?php echo Form::select('year[]', $years, null, ['id' => 'year', 'multiple'=>true, 'class' => 'js-example-basic-multiple form-control','required']); ?>

                                        </div> 

                                        <div class="form-group">
                                            <label>Stock</label>
                                            <input name="stock" type="number" class="form-control" placeholder="Enter Stock" required>
                                        </div> 

                                        <div class="form-group">
                                            <label>Stock minimun</label>
                                            <input name="stock_minimum" type="number" class="form-control" placeholder="Enter Stock minimum" required>
                                        </div> 

                                        <div class="form-group">
                                            <label>Price</label>
                                            <input name="price" type="text" class="form-control" placeholder="Enter price" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Purchase price</label>
                                            <input name="purchase_price" type="text" class="form-control" placeholder="Enter purchase price" required>
                                        </div>

                                        <hr>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="special" id="special" value="1">Special?
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Special price</label>
                                            <input name="special_price" id="special_price" type="text" class="form-control" placeholder="Enter Comparable price" disabled>
                                        </div> 
                                        <hr>
                                        <div class="form-group">
                                            <label >Product image</label>
                                            <input type="file" class="form-control" id="ImageFile" name="ImageFile" required accept="image/*">
                                        </div>     
                                        <div class="pull-right">    
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="reset" class="btn btn-warning">Reset Button</button>
                                            <a class="btn btn-default" href="<?php echo e(route('product.index')); ?>"> Back</a>
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        </div>
                                    <?php echo Form::close(); ?>    
                                </div>
                    
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->
  
    <script type="text/javascript">
    
    $('#special').change(function(event){
        if($("#special").is(':checked')) {  
           $("#special_price").prop( "disabled", false );
            $("#special_price").focus();
        } else {  
            $("#special_price").prop( "disabled", true );
        }   
    }); 


    $('#id_maker').change(function(event){
        $('#model').empty();
        $("#model").removeAttr('disabled');
    }); 

    $(document).ready(function(){

        $('#supplier').select2();

        $('#year').select2({
            tokenSeparators: [','],
            ajax: {
                dataType: 'json',
                url: '<?php echo e(url("years")); ?>',
                delay: 250,
                data: function(params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function (data, page) {
                  return {
                    results: data
                  };
                },
            }
        });
       
        $('#model').select2({
            tokenSeparators: [','],
            ajax: {
                dataType: 'json',
                url: '<?php echo e(url("models/")); ?>',
                delay: 250,
                data: function(params) {
                    return {
                        term: params.term,
                        maker: $("select#id_maker option:checked").val()
                    }
                },
                processResults: function (data, page) {
                  return {
                    results: data
                  };
                },
            }
        });

        $('<img>').addClass('img-rounded img-responsive');

            $('input[type=file]').drop_uploader({
                uploader_text: 'Arrastre la imagen o ',
                browse_text: 'Seleccionela',
                browse_css_class: 'button button-primary',
                browse_css_selector: 'file_browse',
                uploader_icon: '<i class="pe-7s-cloud-upload"></i>',
                file_icon: '<i class="pe-7s-file"></i>',
                time_show_errors: 5,
                layout: 'thumbnails'
            });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>