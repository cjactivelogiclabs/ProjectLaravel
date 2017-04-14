@extends('layouts.app')
@section('content')


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">  
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{url('/dashboard')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Slides</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Slides</h1>
        </div>
    </div><!--/.row-->      


    @include('alerts.success')
    @include('alerts.error')
      
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('slide.create') }}">
                    <button class="btn btn-success">
                        <b>Add new slide</b>
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
                                <th data-field="name" data-sortable="true">Title</th>
                                <th data-field="lastname"  data-sortable="true">Description</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="special" data-sortable="true">Main?</th>
                                <th data-sortable="true">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($slides as $key => $slide)
                                    <tr>
                                    <td>{{ $i++ }}</td>    
                                    <td><img src="{{ asset($slide->image) }}" width="100px" heigth="100px" class="img-rounded img-responsive  "></td>      
                                    <td>{{ $slide->title }}</td>
                                    <td>{{ $slide->description }}</td>
                                    @if ($slide->status == 0)
                                    <td>Inactive</td>
                                    @else
                                    <td>Active</td>
                                    @endif
                                    @if ($slide->main == 0)
                                    <td>No</td>
                                    @else
                                    <td>Yes</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('slide.edit',$slide->id) }}"><span class="glyphicon glyphicon-pencil boton"></span></a> 
                                        {!! Form::open(['method' => 'DELETE','route' => ['slide.destroy', $slide->id],'style'=>'display:inline']) !!}
                                           @if ($slide->status == 0)
                                            <button type="submit" class="glyphicon btn-link glyphicon-thumbs-up" title="Active" onClick="return confirm('Are you sure you want to active the record?')"></button>
                                           @else
                                            <button type="submit" class="glyphicon btn-link glyphicon-thumbs-down" title="Inactive" onClick="return confirm('Are you sure you want to inactive the record?')"></button>
                                           @endif 
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