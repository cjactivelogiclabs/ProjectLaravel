<div class="col-lg-12"> 
	<div class="form-group">
		<b> <?php echo Form::label('Model'); ?></b> 

			<?php echo Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Enter a model','required' => 'required']); ?>

		
	</div>	
</div>
<div class="col-lg-12"> 
	<div class="form-group">
		<b> <?php echo Form::label('Maker'); ?></b> 

			<?php echo Form::select('maker_id', $makers ,null,['class'=>'form-control']); ?>

		
	</div>
</div>