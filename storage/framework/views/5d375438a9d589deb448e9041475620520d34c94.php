<?php $__env->startSection('content'); ?> 

<?php echo $__env->make('website.carrousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style type="text/css">

</style>
 <script type="text/javascript">


$(document).ready(function() {
 
    $('.owl-carousel').owlCarousel({
        items: 4,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause: true,   
        nav: true,
        autoHeight: true,
        navText : [
        "<i class='icon-chevron-left icon-white'><</i>",
        "<i class='icon-chevron-right icon-white'>></i>"],
        rewindNav : true,
        dots:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:<?php echo e($items[2]); ?>

            },
            600:{
                items:<?php echo e($items[1]); ?>

            },
            1000:{
                items:<?php echo e($items[0]); ?>

            }
        }
        
    });

    $('<img>').addClass('img-rounded img-responsive'); 
 
});
</script>  
<div class="container">
    <div class="slider-product our-new-product owl-nav-hidden">
        <ul class="tabs">
            <li class="item" rel="tab_1">NEW ARRIVALS</li>
            <li class="item" rel="tab_2">BEST SELLER</li>
                           
                        </ul>
                        <div class="tab-container space-10">
                            <div id="tab_1" class="tab-content">
  
                               <div class="owl-carousel owl-theme" id="owl-newarrivals">
                                 <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="item item-inner text-center">
                                        <div class="product" style="height: 300px; width:auto;">
                                            <div class="product-images" >
                                                <a href="<?php echo e(url('/product-detail/'.$product->id)); ?>" title="product-images">
                                                    <img class="img-responsive" src="<?php echo e(asset($product->image)); ?>" style="height: 260px; width:auto"  alt=""/>
                                                </a>
                                                <div class="action">
                                                    <a class="add-cart" href="#" title="Add to cart" ><i class="icon-bag"></i></a>
                                                </div>
                                            </div>
                                            <a  href="<?php echo e(url('/product-detail/'.$product->id)); ?>" title=""><p class="product-title"><?php echo e($product->name); ?></p></a>
                                             <?php if(!Auth::guest()): ?>
                                            <p class="product-price">$<?php echo e($product->price); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- End item -->
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
                                   <!-- End carrousel -->
                                </div>
                                
                                <!-- End product-tab-content products -->
                            </div>
                            <div id="tab_2" class="tab-content">

                                <div class="owl-carousel owl-theme" id="owl-bestseller">
                                 <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                 <?php if($product->special==1): ?>
                                     <div class="item item-inner text-center">
                                        <div class="product" style="height: 300px; width:auto;">
                                            <div class="product-images" >
                                                <a href="<?php echo e(url('/product-detail/$product->id')); ?>" title="product-images">
                                                    <img class="img-responsive" src="<?php echo e(asset($product->image)); ?>" style="height: 260px; width:auto"  alt=""/>
                                                </a>
                                                <div class="action">
                                                    <a class="add-cart" href="#" title="Add to cart" ><i class="icon-bag"></i></a>
                                                </div>
                                            </div>
                                            <a href="#" title="Bouble Fabric Blazer"><p class="product-title"><?php echo e($product->name); ?></p></a>
                                            <?php if(!Auth::guest()): ?>
                                            <p class="product-price">$<?php echo e($product->price); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <!-- End item -->
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
                                    
                                  
                                   <!-- End carrousel -->
                                </div>
                      
                            </div>
                    
                        </div>
                    </div>

                </div>
                <!-- End container -->
           
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>