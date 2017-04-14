@extends('website.layout')

@section('content')
<div class="title-page">
    <h3>Setting Profile</h3>
</div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif   
<div class="login-box-container">
    <div class="container" style="width:80%">    
                <p>Creating an account will save you time at checkout and allow you to access your order status and history.</p>
                            <div class="contact-form">
                              {!! Form::open(array('action' => ['UserController@updateProfile', $user->id],'method' => 'PUT')) !!}

                                   <p><h4>Personal Information</h4></p>

                                    <div class="row">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="name" placeholder="Name *" type="text" name="name" value="{{ $user->name }}" required autofocus>
                                        <input type="hidden" id="idE" name="idE" value="{{ $user->id_state}}">             
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="lastname" placeholder="Lastname *" type="text" name="lastname" value="{{ $user->lastname }}"  required>            
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="email" placeholder="Email adress *" type="email" name="email" value="{{ $user->email }}"  required>             
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="phone" placeholder="Phone *" type="text" name="phone" value="{{ $user->phone }}" required>            
                                    </div>
                                    </div>
                                    <p ><h4>Address Information</h4></p>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('id_countrie') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">   
                                        {!! Form::select('id_countrie', $countries, $user->id_country, ['id' => 'id_countrie','class' => 'form-control' , 'placeholder'=>'Country *']) !!}
                                    </div>
                                    <div class="form-group{{ $errors->has('id_state') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6 ">
                                        {!! Form::select('id_state', $states, $user->id_state, ['id' => 'id_state','class' => 'form-control', 'placeholder'=>'State/Province *']) !!}
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input id="address" type="text" placeholder="Address *" class="form-control" name="address" value="{{ $user->address }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input id="city" type="text" placeholder="City *" class="form-control" name="city" value="{{ $user->city }}" required>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input id="zipcode" type="number" placeholder="Zip Code *" max="5" class="form-control" name="zipcode" value="{{ $user->zipcode }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('hear_about_us') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input id="hear_about_us" type="text" placeholder="How did you hear about us?" title="How did you hear about us?" value="{{ $user->hear_about_us }}" class="form-control" name="hear_about_us" >
                                    </div>                                    
                                    </div>
                                    <p ><h4>User Authorization</h4></p>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('company_type') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">   
                                        {!! Form::select('company_type', $company_type, $user->company_type, ['id' => 'company_type','class' => 'form-control' , 'placeholder'=>'Company Type *']) !!}
                                    </div>
                                    <div class="form-group{{ $errors->has('interested_in') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6 ">
                                        {!! Form::select('interested_in', $interested, $user->interested_in, ['id' => 'interested_in','class' => 'form-control', 'placeholder'=>'Mainly interested in *']) !!}
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('programmer_using') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input id="programmer_using" type="text" placeholder="Programmer/Machine you are using *"  value="{{ $user->programmer_using }}" class="form-control" name="programmer_using" >
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        
                                    </div>
                                    </div>
                                     <div class="form-group text-center">  
                                         <button type="submit" class="btn link-button lh-55 hover-white" title="Save">
                                            Save<i class="link-icon-white"></i>          
                                        </button>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {!! Form::close() !!}
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
@endsection
