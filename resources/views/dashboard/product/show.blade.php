@extends('layouts.app')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{url('/dashboard')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Products</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
    </div><!--/.row-->      
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Show product</div>
                    <div class="panel-body">
                                <div class="col-md-3"><img src="{{ asset($product->image) }}" width="200px" heigth="200px" class="img-rounded img-responsive  "></div>
                                <div class="col-md-8">
                                        <div class="form-group">
                                            <label>SKU</label>
                                            <input name="SKU" class="form-control" placeholder="SKU" value="{{ $product->SKU }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier SKU</label>
                                            <input name="supplier_sku" class="form-control" placeholder="Supplier SKU" value="{{ $product->supplier_sku }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Product name</label>
                                            <input name="name" class="form-control"  placeholder="{{ $product->name }}" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Product description</label>
                                            <textarea name="description" rows="5" class="form-control"  placeholder="{{ $product->description }}" readonly></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier</label>
                                            <input name="name" class="form-control"  placeholder="{{ $product->suppliers->name }}" readonly>
                                        </div>                               
                                        <div class="form-group">
                                            <label>Condition option</label>
                                             {!! Form::select('condition_o', $condition, $product->condition_o, ['id' => 'condition_o','class' => 'form-control' , 'placeholder'=>'Condition' , 'disabled'=>'true']) !!}
                                        </div> 
                                        <div class="form-group">
                                            <label>Categoric</label>
                                             {!! Form::select('categoric', $categoric, $product->categoric, ['id' => 'categoric','class' => 'form-control' , 'placeholder'=>'Categoric' , 'disabled'=>'true']) !!}
                                        </div> 
                                         <div class="form-group">
                                            <label>Weight</label>
                                            <input name="weight" class="form-control" value="{{ $product->weight }}" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input name="location" class="form-control" value="{{ $product->location }}" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input name="type" class="form-control" value="{{ $product->type }}" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>FCC ID #</label>
                                            <input name="fcc_id" class="form-control" value="{{ $product->fcc_id }}" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>IC #</label>
                                            <input name="ic" class="form-control" value="{{ $product->ic }}" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>Frequency</label>
                                            <input name="frequency" class="form-control" value="{{ $product->frequency }}" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>Number of button</label>
                                            <input name="num_button" type="number" class="form-control" value="{{ $product->num_button }}" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>Reusable</label>
                                            <input name="reusable" class="form-control" value="{{ $product->reusable }}" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>On Board Programming</label>
                                            {!! Form::select('board_programming', $board_programming, $product->board_programming, ['id' => 'board_programming','class' => 'form-control' , 'placeholder'=>'On Board Programming', 'disabled'=>'true']) !!}
                                        </div>
                                        <div class="form-group">
                                            <label>Emergency Key</label>
                                            {!! Form::select('emergency_key', $emergency_key, $product->emergency_key, ['id' => 'board_programming','class' => 'form-control' , 'placeholder'=>'Emergency Key', 'disabled'=>'true']) !!}
                                        </div>
                                        <div class="form-group">
                                            <label>Battery Part #</label>
                                            <input name="battery_part" class="form-control" value="{{ $product->battery_part }}" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>Maker</label>
                                             {!! Form::select('id_maker', $makers, $product->id_maker, ['id' => 'id_maker','class' => 'form-control' , 'placeholder'=>'Makers' , 'disabled'=>'true']) !!}
                                        </div> 
                                        <div class="form-group">
                                            <label>Model</label>
                                             {!! Form::select('model[]', $models, $list_models, ['id' => 'model','multiple'=>true, 'class' => 'js-example-basic-multiple form-control', 'disabled'=>'true']) !!}
                                        </div> 

                                        <div class="form-group">
                                            <label>Year</label>
                                             {!! Form::select('year[]', $years, $list_years, ['id' => 'year', 'multiple'=>true, 'class' => 'js-example-basic-multiple form-control', 'disabled'=>'true']) !!}
                                        </div> 

                                        <div class="form-group">
                                            <label>Stock</label>
                                            <input name="stock" type="number" class="form-control" placeholder="{{ $product->stock }}" readonly>
                                        </div> 

                                         <div class="form-group">
                                            <label>Stock Minimum</label>
                                            <input name="stock_minimum" type="number" class="form-control" placeholder="{{ $product->stock_minimum }}" readonly>
                                        </div> 

                                        <div class="form-group">
                                            <label>Price</label>
                                            <input name="price" type="text" class="form-control" placeholder="{{ $product->price }}" readonly>
                                        </div>  

                                        <div class="form-group">
                                            <label>Purchase Price</label>
                                            <input name="purchase_price" type="text" class="form-control" placeholder="{{ $product->purchase_price }}" readonly>
                                        </div> 

                                        <div class="form-group">
                                            <label>Special Price</label>
                                            <input name="special_price" type="text" class="form-control" placeholder="{{ $product->special_price }}" readonly>
                                        </div> 

                                        <div class="pull-right">
                                        <a class="btn btn-default" href="{{ route('product.index') }}"> Back</a>
                                        </div>
                                </div>
                    
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->
  
<script type="text/javascript">

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
            
            $('#year').select2({
            tokenSeparators: [','],
            ajax: {
                dataType: 'json',
                url: '{{ url("years") }}',
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
                url: '{{ url("models") }}',
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
@endsection