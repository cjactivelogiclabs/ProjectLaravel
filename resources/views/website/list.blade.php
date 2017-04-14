 @extends('website.layout')
 @section('content') 


  <!-- From our Blog -->
<div class="contact-us">
    <div class="container">

        <div class="row">
            <div class="col-md-12" align="center">
                <div class="boxed-content boxed-content-v2 center" >
                    <i class="bg-black glyphicon glyphicon-search icons top"></i>
                    <h2>SEARCH RESULTS</h2>
                    <h3>{{ $search->maker }}
                    {{ $search->model}}
                    {{ $search->year }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
        <!-- breadcumbs -->
         <div class="container">
             <div class="wrap-breadcrumb">
             <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Search Results</li>
            </ul>
            <div class="ordering">
                <span class="list"></span>
                <span class="col active"></span>
               
                <p class="result-count">Showing {{count($products)}} results</p>
                <form action="#" method="get" class="order-by">
                    <select class="orderby" name="orderby">                            
                            <option>Sort by newness</option>
                            <option>Sort by price: low to high</option>
                            <option>Sort by price: high to low</option>
                    </select>
                </form>
            </div>
            </div>
        </div>    
        <!-- end breadcumbs -->
                <div class="container">
            <div id="primary" class="col-xs-12 col-md-9">  
                    <div class="products grid_full grid_sidebar">
                    @if(count($products)>0)

                    @foreach($products as $product)
                        <div class="item-inner">
                                <div class="product">
                                    <div class="product-images">
                                        <a href="{{url('/product_detail/'.$product->id_product)}}" title="product-images">
                                            <img class="primary_image" src="{{ asset($product->image) }}" alt="{{ $product->name}}"/>
                                            <img class="secondary_image" src="{{ asset($product->image) }}" alt="{{ $product->name}}"/>
                                        </a>
                                        <div class="action">
                                            <a class="add-cart" href="#" title="Add to cart" ><i class="icon-bag"></i></a>
                                        </div>
                                    </div>
                                    <a href="#" title="Bouble Fabric Blazer"><p class="product-title">{{$product->name}} {{ $productMY->modelName($product->id_model) }} {{ $product->year}}</p></a>
                                    @if(!Auth::guest())<p class="product-price">{{$product->price}}</p>@endif
                                    <p class="description">{{$product->description}}</p>
                                </div>
                                <!-- End product -->
                           </div>
                    @endforeach 
                    @else
                        Sorry, your search did not match any products.
                    @endif       
                    </div>
                    <!-- End product-content products  -->
                    <div class="pagination-container">
                        <nav class="pagination">   

                        {!!$products->render()!!}


                           <!-- <a class="prev page-numbers" href="#"><i class="fa fa-angle-left"></i></a>
                            <span class="page-numbers current">1</span>
                            <a class="page-numbers" href="#">2</a>
                            <a class="page-numbers" href="#">3</a>
                            <a class="next page-numbers" href="#"><i class="fa fa-angle-right"></i></a> -->
                        </nav>
                    </div>
                    <!-- End pagination-container -->
                </div>
                <!-- End Primary -->
                
            <div id="secondary" class="widget-area col-xs-12 col-md-3">
                <aside class="widget widget_product_categories">
                    <h3 class="widget-title">Search</h3>
                    {!!Form::open(['url'=>'/search','method'=>'POST', 'role' => 'search' ])!!}

                    {{ csrf_field() }} 
                    
                    {!!Form::select('id_maker', $makers ,null,['class'=>'form-control', 'id' => 'id_maker', 'placeholder'=>'Makers', 'required' => 'required'])!!}
                    <br>
                    {!!Form::select('id_model', $models ,null,['class'=>'form-control', 'id' => 'id_model', 'placeholder'=>'Models'])!!}
                    <br>
                    {!!Form::select('id_year', $years ,null,['class'=>'form-control', 'id' => 'id_year', 'placeholder'=>'Years'])!!}
                    <br>
                    <button type="submit" class="btn btn-lg space-30 btn-info">Search</button>
                    
                    {!!Form::close()!!}
                </aside>
               
            </div>
            <!-- End Secondary -->
        </div>

        </div>
                  
    </div>
        <!-- End container -->
</div>
<!-- End contact-us -->
@endsection