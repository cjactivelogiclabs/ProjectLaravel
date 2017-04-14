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

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif  
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Show user</div>
                    <div class="panel-body">
                                <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" class="form-control" placeholder="{{$user->name}}" readonly>
                                            <input name="type" type="hidden" class="form-control" value="1">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input name="lastname" class="form-control" placeholder="{{$user->lastname}}" readonly>
                                        </div>                               
                                        
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input name="address" class="form-control" placeholder="{{$user->address}}" readonly>
                                        </div> 

                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input name="phone" class="form-control" placeholder="{{$user->phone}}" readonly>
                                        </div> 

                                        <div class="form-group">
                                            <label>E-mail Address</label>
                                            <input name="email" type="email" class="form-control" placeholder="{{$user->email}}" readonly>
                                        </div> 
                                       
                                       <div class="form-group">
                                            <label>Type</label>
                                            @if ($user->type == 1)
                                                <input name="type" class="form-control" placeholder="Admin" readonly>
                                            @else
                                                <input name="type" class="form-control" placeholder="Client" readonly>
                                            @endif

                                        </div> 

                                        <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
                                        </div>
                                </div>
                    
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->