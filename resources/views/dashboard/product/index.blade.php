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


    @include('alerts.success')
    @include('alerts.error')
      
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('product.create') }}">
                    <button class="btn btn-success">
                        <b>Add new Product</b>
                    </button> 
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="lastname"  data-sortable="true">Stock</th>
                                <th data-field="email" data-sortable="true">Price</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="special" data-sortable="true">Special?</th>
                                <th data-sortable="true">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($products as $key => $product)
                                    <tr>
                                    <td>{{ $i++ }}</td>    
                                    <td><img src="{{ asset($product->image) }}" width="100px" heigth="100px" class="img-rounded img-responsive  "></td>      
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->price }}</td>
                                    @if ($product->status == 0)
                                    <td>Inactive</td>
                                    @else
                                    <td>Active</td>
                                    @endif
                                    @if ($product->special == 0)
                                    <td>No</td>
                                    @else
                                    <td>Yes</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('product.show',$product->id) }}"><span class="glyphicon glyphicon-eye-open boton"></span></a>
                                        <a href="{{ route('product.edit',$product->id) }}"><span class="glyphicon glyphicon-pencil boton"></span></a> 
                                        {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $product->id],'style'=>'display:inline']) !!}
                                            <button type="submit" class="glyphicon btn-link glyphicon-trash" onClick="return confirm('Are you sure you want to delete the record?')"></button>
                                        {!! Form::close() !!}
                                    </td> 
                                    </tr>
                                @endforeach   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div><!--/.row--> 
</div> 


@endsection