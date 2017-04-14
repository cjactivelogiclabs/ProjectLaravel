<div class="col-lg-12"> 
	<div class="form-group">
		<b> {!!Form::label('Model')!!}</b> 

			{!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Enter a model','required' => 'required'])!!}
		
	</div>	
</div>
<div class="col-lg-12"> 
	<div class="form-group">
		<b> {!!Form::label('Maker')!!}</b> 

			{!!Form::select('maker_id', $makers ,null,['class'=>'form-control'])!!}
		
	</div>
</div>