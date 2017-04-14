 

 <?php $__env->startSection('content'); ?> 


        <div class="wrappage">
          <div class="main-content">
                <div class="container">     
                    <div class="product-details-content">
                        <div class="col-md-7 col-sm-7">
                            <div class="product-img-box">
                            <a>
                              <img id="image" src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>">
                            </a>
                                 
                              </div>
                              <!-- End product-img-box -->
                        </div>
                        <div class="col-md-5 col-sm-5">
                            <div class="box-details-info">
                                <div class="breadcrumb">
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li class="active">Product Details</li>
                                    </ul>
                                </div>
                                <div class="product-name">
                                    <h1><?php echo e($product->name); ?></h1>
                                </div>
                                <?php if(!Auth::guest()): ?>
                                <div class="wrap-price">
                                    <p class="price">$<?php echo e($product->price); ?></p>
                                </div>
                                <?php endif; ?>
                                <!-- End Price -->
                            </div>
                            <!-- End box details info -->
                            <div class="options">
                                <p><?php echo e($product->description); ?></p>
                                <div class="action">
                                    <form enctype="multipart/form-data">
                                        <div class="product-signle-options product_15 clearfix">
                                            <div class="selector-wrapper size">
                                                <div class="quantity"><span class="minus"><i class="fa fa-minus"></i></span>
                                                    <input data-step="1" value="1" title="Qty" class="qty" size="4" type="text">
                                                <span class="plus"><i class="fa fa-plus"></i></span></div>
                                            </div>
                                        </div>
                                    </form>
                                    <a class="link-ver1 add-cart" title="Back" href="<?php echo e(url('/')); ?>"><i class="fa fa-angle-left"></i><span>Back</span></a>
                                    <a class="link-ver1 add-cart" title="Add to cart" href="<?php echo e(route('cart-add', $product->id)); ?>"><i class="icon-bag"></i><span>Add to cart</span></a>
                                </div>
                                <?php 
                                    $condition = "";
                                    if($product->condition_o == 0){
                                        $condition = "OE Brand New";
                                    }else{
                                        $condition = "OE Refurbish";
                                    }

                                    $category = "";
                                    if($category == 0){
                                        $category = "RC";
                                    }
                                    if($category == 1){
                                        $category = "TK";
                                    }
                                    if($category == 2){
                                        $category = "RS";
                                    }

                                ?>
                                <!-- End action -->
                                <div class="infomation">
                                    <p class="sku"><span>Condition: </span><?php echo e($condition); ?></p>
                                    <p class="category"><span>Category: </span> <?php echo e($category); ?></p>
                                    <p class="tags"><span>Maker: </span><?php echo e($maker->name); ?></p>
                                    <p class="tags"><span>Models: </span>
                                        <?php $__currentLoopData = $list_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php echo e($model->modelName($model->id_model)); ?>

                                        <?php echo e($model->year); ?>    
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </p>
                                   
                                </div>
                                <!-- Infomation -->
                                <div class="social">
                                
                                    <a title="twitter" href="http://www.twitter.com/home?status=<?php echo e(Request::fullUrl()); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a title="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::fullUrl()); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a title="google plus" href="https://plus.google.com/share?url=<?php echo e(Request::fullUrl()); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                                    <a title="pinter" href="#"></a>
                                </div>
                                <!-- End share -->
                            </div>
                            <!-- End Options -->
                        </div>  
                    </div>
                    <!-- End product-details-content -->
                </div>    
          </div>
          <!-- End MainContent -->
        </div>
        <!-- End wrappage -->




 <?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>