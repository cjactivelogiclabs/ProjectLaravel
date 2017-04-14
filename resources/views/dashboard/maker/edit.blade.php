@extends('layouts.app')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{url('/dashboard')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Maker</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Maker</h1>
			</div>
		</div><!--/.row-->
		@include('alerts.success')
    	@include('alerts.error')		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Maker</div>
					<div class="panel-body">
						<div class="col-md-6">
							{!!Form::model($maker,['route'=>['maker.update',$maker->id], 'method' => 'PUT', 'class' => 'form'])!!}

  
                        	@include('dashboard.maker.form')							
																					
								
							{!!Form::button('<i class="fa fa-save fa-1x"></i> Update',[ 'type'=>'submit',  'class' => 'btn btn-success' , 'style' => 'margin-right: 15px; margin-top: 0px;' ])!!}  

							<a href="{{url('maker/'.$maker->id.'/delete')}}">{!!Form::button('  <i class="fa fa-times fa-1x"></i>   Delete', ['class' => 'btn btn-danger',  'style' => 'margin-right: 15px;', 'onclick' => "return confirm('Are you sure to delete this maker?');"])!!}</a>                               

                            <a href="{{url('maker')}}">
                            {!!Form::button(' <i class="fa fa-arrow-circle-o-left fa-1x"></i> Cancel',['class' => 'btn btn-details' , 'style' => 'margin-right: 15px;' ])!!}
                            </a>                                 
							{!!Form::close()!!}

	                    </div>                			
						
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
@endsection