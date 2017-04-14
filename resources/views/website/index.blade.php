
@extends('website.layout')

@section('content') 

@include('website.carrousel')
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
                items:{{$items[2]}}
            },
            600:{
                items:{{$items[1]}}
            },
            1000:{
                items:{{$items[0]}}
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
                                 @foreach ($products as $key => $product)
                                    <div class="item item-inner text-center">
                                        <div class="product" style="height: 300px; width:auto;">
                                            <div class="product-images" >
                                                <a href="{{url('/product-detail/'.$product->id)}}" title="product-images">
                                                    <img class="img-responsive" src="{{ asset($product->image) }}" style="height: 260px; width:auto"  alt=""/>
                                                </a>
                                                <div class="action">
                                                    <a class="add-cart" href="#" title="Add to cart" ><i class="icon-bag"></i></a>
                                                </div>
                                            </div>
                                            <a  href="{{url('/product-detail/'.$product->id)}}" title=""><p class="product-title">{{ $product->name }}</p></a>
                                             @if(!Auth::guest())
                                            <p class="product-price">${{ $product->price }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End item -->
                                   @endforeach 
                                   <!-- End carrousel -->
                                </div>
                                
                                <!-- End product-tab-content products -->
                            </div>
                            <div id="tab_2" class="tab-content">

                                <div class="owl-carousel owl-theme" id="owl-bestseller">
                                 @foreach ($products as $key => $product)
                                 @if($product->special==1)
                                     <div class="item item-inner text-center">
                                        <div class="product" style="height: 300px; width:auto;">
                                            <div class="product-images" >
                                                <a href="{{url('/product-detail/$product->id')}}" title="product-images">
                                                    <img class="img-responsive" src="{{ asset($product->image) }}" style="height: 260px; width:auto"  alt=""/>
                                                </a>
                                                <div class="action">
                                                    <a class="add-cart" href="#" title="Add to cart" ><i class="icon-bag"></i></a>
                                                </div>
                                            </div>
                                            <a href="#" title="Bouble Fabric Blazer"><p class="product-title">{{ $product->name }}</p></a>
                                            @if(!Auth::guest())
                                            <p class="product-price">${{ $product->price }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    <!-- End item -->
                                   @endforeach 
                                    
                                  
                                   <!-- End carrousel -->
                                </div>
                      
                            </div>
                    
                        </div>
                    </div>

                </div>
                <!-- End container -->
           
 @endsection