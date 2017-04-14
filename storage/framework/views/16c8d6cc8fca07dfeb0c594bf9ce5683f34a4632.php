<?php $__env->startSection('content'); ?>

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
                    <div class="panel-heading">Edit product</div>
                    <div class="panel-body">
                            <?php echo Form::open(array('method'=>'PUT','route' => ['product.update', $product->id],'enctype'=>'multipart/form-data')); ?>

                                <div class="col-md-3">
                                    <img src="<?php echo e(asset($product->image)); ?>" width="200px" heigth="200px" class="img-rounded img-responsive  ">
                                    <div class="form-group">
                                        <label >Edit image</label>
                                        <input type="file" class="form-control" id="ImageFile" name="ImageFile" accept="image/*">
                                    </div> 
                                </div>
                                <div class="col-md-8">

                                        <div class="form-group">
                                            <label>SKU</label>
                                            <input name="SKU" class="form-control" placeholder="SKU" value="<?php echo e($product->SKU); ?>" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier SKU</label>
                                            <input name="supplier_sku" class="form-control" placeholder="Supplier SKU" value="<?php echo e($product->supplier_sku); ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Product name</label>
                                            <input name="name" class="form-control" placeholder="Name" value="<?php echo e($product->name); ?>" required >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Product description</label>
                                            <textarea name="description" class="form-control" rows="5" placeholder="Description" required><?php echo e($product->description); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier</label>
                                             <?php echo Form::select('supplier', $suppliers, $product->supplier_id, ['id' => 'supplier', 'class' => 'js-example-basic-single form-control' ,'required']); ?>

                                        </div>                                
                                        <div class="form-group">
                                            <label>Condition option</label>
                                             <?php echo Form::select('condition_o', $condition, $product->condition_o, ['id' => 'condition_o','class' => 'form-control' , 'placeholder'=>'Condition']); ?>

                                        </div> 
                                        <div class="form-group">
                                            <label>Categoric</label>
                                             <?php echo Form::select('categoric', $categoric, $product->categoric, ['id' => 'categoric','class' => 'form-control' , 'placeholder'=>'Categoric']); ?>

                                        </div> 
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <input name="weight" class="form-control" value="<?php echo e($product->weight); ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input name="location" class="form-control" value="<?php echo e($product->location); ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input name="type" class="form-control" value="<?php echo e($product->type); ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label>FCC ID #</label>
                                            <input name="fcc_id" class="form-control" value="<?php echo e($product->fcc_id); ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label>IC #</label>
                                            <input name="ic" class="form-control" value="<?php echo e($product->ic); ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Frequency</label>
                                            <input name="frequency" class="form-control" value="<?php echo e($product->frequency); ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Number of button</label>
                                            <input name="num_button" type="number" class="form-control" value="<?php echo e($product->num_button); ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Reusable</label>
                                            <input name="reusable" class="form-control" value="<?php echo e($product->reusable); ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label>On Board Programming</label>
                                            <?php echo Form::select('board_programming', $board_programming, $product->board_programming, ['id' => 'board_programming','class' => 'form-control' , 'placeholder'=>'On Board Programming']); ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Emergency Key</label>
                                            <?php echo Form::select('emergency_key', $emergency_key, $product->emergency_key, ['id' => 'board_programming','class' => 'form-control' , 'placeholder'=>'Emergency Key']); ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Battery Part #</label>
                                            <input name="battery_part" class="form-control" value="<?php echo e($product->battery_part); ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Maker</label>
                                             <?php echo Form::select('id_maker', $makers, $product->id_maker, ['id' => 'id_maker','class' => 'form-control' , 'placeholder'=>'Makers', 'required']); ?>

                                        </div> 
                                        <div class="form-group">
                                            <label>Model</label>
                                             <?php echo Form::select('model[]', $models, $list_models, ['id' => 'model', 'multiple'=>true, 'class' => 'js-example-basic-multiple form-control','required']); ?>

                                        </div> 

                                        <div class="form-group">
                                            <label>Year</label>
                                             <?php echo Form::select('year[]', $years, $list_years, ['id' => 'year','multiple'=>true, 'class' => 'js-example-basic-multiple form-control','required']); ?>

                                        </div> 

                                        <div class="form-group">
                                            <label>Stock</label>
                                            <input name="stock" type="number" class="form-control" placeholder="Enter Stock" value="<?php echo e($product->stock); ?>" required>
                                        </div> 

                                         <div class="form-group">
                                            <label>Stock minimun</label>
                                            <input name="stock_minimum" type="number" class="form-control" placeholder="Enter Stock minimum" value="<?php echo e($product->stock_minimum); ?>" required>
                                        </div> 

                                        <div class="form-group">
                                            <label>Purchase price</label>
                                            <input name="purchase_price" type="text" class="form-control" placeholder="Enter price" value="<?php echo e($product->purchase_price); ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Price</label>
                                            <input name="price" type="text" class="form-control" placeholder="Enter price" value="<?php echo e($product->price); ?>" required>
                                            <input type="hidden" name="image" id="image" value="<?php echo e($product->image); ?>">
                                        </div> 
                                        
                                        <hr>
                                        <div class="checkbox">
                                            <label>
                                                <?php if($product->special==1): ?>
                                                <input type="checkbox" name="special" value="1" checked>Special?
                                                <?php else: ?>
                                                <input type="checkbox" name="special" value="1">Special?
                                                <?php endif; ?>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Special price</label>
                                            <input name="special_price" type="text" class="form-control" placeholder="Enter Comparable price or Special price" value="<?php echo e($product->special_price); ?>">
                                        </div> 
                                        <hr>
                                            
                                        <div class="pull-right">    
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <a type="reset" class="btn btn-default" href="<?php echo e(route('product.index')); ?>">Back</a>
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        </div>
                                </div>
                            <?php echo Form::close(); ?>  
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->
  
    <script type="text/javascript">
    
        $('#id_maker').change(function(event){
           $('#model').empty();
           $("#model").prop('disabled',false);
            }); 


    $(document).ready(function(){


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

            $('<img>').addClass('img-rounded img-responsive');

            $('#supplier').select2();

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
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>