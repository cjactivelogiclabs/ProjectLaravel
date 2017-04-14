@extends('layouts.app')
@section('content')


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">  
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{url('/dashboard')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Clients</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Clients - Users</h1>
        </div>
    </div><!--/.row-->      

    @include('alerts.success')
    @include('alerts.error')
     
    <?php $i=1 ?>
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('user.create') }}">
                    <button class="btn btn-success">
                        <b>Add new user</b>
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
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="lastname"  data-sortable="true">Lastname</th>
                                <th data-field="state"  data-sortable="true">State</th>
                                <th data-field="phone"  data-sortable="true">Phone</th>
                                <th data-field="email" data-sortable="true">E-mail</th>
                                <th data-field="type" data-sortable="true">Type</th>
                                <th data-sortable="true">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                    <td>{{ $i++ }}</td>    
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->state->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if ($user->type == 1)
                                    <td>Admin</td>
                                    @else
                                    <td>Client</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('user.show',$user->id) }}"><span class="glyphicon glyphicon-eye-open boton"></span></a>
                                        <a href="{{ route('user.edit',$user->id) }}"><span class="glyphicon glyphicon-pencil boton"></span></a> 
                                        {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}
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