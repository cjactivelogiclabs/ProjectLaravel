<?php $__env->startSection('content'); ?>
<div class="title-page">
    <h3>Setting Profile</h3>
</div>
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>   
<div class="login-box-container">
    <div class="container" style="width:80%">    
                <p>Creating an account will save you time at checkout and allow you to access your order status and history.</p>
                            <div class="contact-form">
                              <?php echo Form::open(array('action' => ['UserController@updateProfile', $user->id],'method' => 'PUT')); ?>


                                   <p><h4>Personal Information</h4></p>

                                    <div class="row">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="name" placeholder="Name *" type="text" name="name" value="<?php echo e($user->name); ?>" required autofocus>
                                        <input type="hidden" id="idE" name="idE" value="<?php echo e($user->id_state); ?>">             
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="lastname" placeholder="Lastname *" type="text" name="lastname" value="<?php echo e($user->lastname); ?>"  required>            
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="email" placeholder="Email adress *" type="email" name="email" value="<?php echo e($user->email); ?>"  required>             
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="phone" placeholder="Phone *" type="text" name="phone" value="<?php echo e($user->phone); ?>" required>            
                                    </div>
                                    </div>
                                    <p ><h4>Address Information</h4></p>
                                    <div class="row">
                                    <div class="form-group<?php echo e($errors->has('id_countrie') ? ' has-error' : ''); ?> col-md-6 col-sm-6 col-xs-6">   
                                        <?php echo Form::select('id_countrie', $countries, $user->id_country, ['id' => 'id_countrie','class' => 'form-control' , 'placeholder'=>'Country *']); ?>

                                    </div>
                                    <div class="form-group<?php echo e($errors->has('id_state') ? ' has-error' : ''); ?> col-md-6 col-sm-6 col-xs-6 ">
                                        <?php echo Form::select('id_state', $states, $user->id_state, ['id' => 'id_state','class' => 'form-control', 'placeholder'=>'State/Province *']); ?>

                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?> col-md-6 col-sm-6 col-xs-6">
                                        <input id="address" type="text" placeholder="Address *" class="form-control" name="address" value="<?php echo e($user->address); ?>" required>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?> col-md-6 col-sm-6 col-xs-6">
                                        <input id="city" type="text" placeholder="City *" class="form-control" name="city" value="<?php echo e($user->city); ?>" required>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group<?php echo e($errors->has('zipcode') ? ' has-error' : ''); ?> col-md-6 col-sm-6 col-xs-6">
                                        <input id="zipcode" type="number" placeholder="Zip Code *" max="5" class="form-control" name="zipcode" value="<?php echo e($user->zipcode); ?>" required>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('hear_about_us') ? ' has-error' : ''); ?> col-md-6 col-sm-6 col-xs-6">
                                        <input id="hear_about_us" type="text" placeholder="How did you hear about us?" title="How did you hear about us?" value="<?php echo e($user->hear_about_us); ?>" class="form-control" name="hear_about_us" >
                                    </div>                                    
                                    </div>
                                    <p ><h4>User Authorization</h4></p>
                                    <div class="row">
                                    <div class="form-group<?php echo e($errors->has('company_type') ? ' has-error' : ''); ?> col-md-6 col-sm-6 col-xs-6">   
                                        <?php echo Form::select('company_type', $company_type, $user->company_type, ['id' => 'company_type','class' => 'form-control' , 'placeholder'=>'Company Type *']); ?>

                                    </div>
                                    <div class="form-group<?php echo e($errors->has('interested_in') ? ' has-error' : ''); ?> col-md-6 col-sm-6 col-xs-6 ">
                                        <?php echo Form::select('interested_in', $interested, $user->interested_in, ['id' => 'interested_in','class' => 'form-control', 'placeholder'=>'Mainly interested in *']); ?>

                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group<?php echo e($errors->has('programmer_using') ? ' has-error' : ''); ?> col-md-6 col-sm-6 col-xs-6">
                                        <input id="programmer_using" type="text" placeholder="Programmer/Machine you are using *"  value="<?php echo e($user->programmer_using); ?>" class="form-control" name="programmer_using" >
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        
                                    </div>
                                    </div>
                                     <div class="form-group text-center">  
                                         <button type="submit" class="btn link-button lh-55 hover-white" title="Save">
                                            Save<i class="link-icon-white"></i>          
                                        </button>
                                    </div>
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <?php echo Form::close(); ?>

                            </div>
        </div>
</div>
<script type="text/javascript">
    
        $('#id_countrie').change(function(event){
           $('#id_state').empty();
            $("#id_state").append("<option value='0'>State</option>");
            var country = event.target.value;
            var estado = document.getElementById('idE').value;
            $.get("stateCountry/"+country+"", function(response , state)
                {
                    for(i=0; i<response.length; i++)
                    {
                        if(response[i].id == estado)
                            $("#id_state").append("<option value='"+response[i].id+"' selected>"+response[i].name+"-"+response[i].short_name+"</option>");
                        else
                            $("#id_state").append("<option value='"+response[i].id+"'>"+response[i].name+"-"+response[i].short_name+"</option>"); 
                    }
                });   
            }); 

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>