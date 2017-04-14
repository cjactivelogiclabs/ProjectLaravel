@extends('layouts.app')

@section('content') 

       
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Main</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
        <a href="#">
            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">0</div>
                            <div class="text-muted">New Orders</div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="{{ asset('/product')}}">
            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="panel panel-orange panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{ $products }}</div>
                            <div class="text-muted">Products</div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="{{ asset('/user')}}">
            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="panel panel-red panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{ $clients }}</div>
                            <div class="text-muted">Clients</div>
                        </div>
                    </div>
                </div>
            </div>
           </a>
        </div><!--/.row-->       
                                      
       
    </div>  <!--/.main-->

@endsection