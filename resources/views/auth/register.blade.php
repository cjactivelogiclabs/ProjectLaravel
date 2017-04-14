@extends('website.layout')

@section('content')
<div class="title-page">
    <h3>Register</h3>
</div>

<div class="login-box-container">

    <div class="container" style="width:80%">    
        @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            An error has occurred!
         </div>
        @endif 
                <p>Creating an account will save you time at checkout and allow you to access your order status and history.</p>
                            <div class="contact-form">
                               <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">

                                   <p><h4>Personal Information</h4></p>

                                    <div class="row">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="name" placeholder="Name *" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                        <input type="hidden" id="idE" name="idE" >    
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                         @endif         
                                    </div>
                                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="lastname" placeholder="Lastname *" type="text" name="lastname" value="{{ old('lastname') }}"  required>            
                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                         @endif   
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="email" placeholder="Email address *" type="email" name="email" value="{{ old('email') }}"  required>             
                                         @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                         @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="phone" placeholder="Phone *" type="text" name="phone" value="{{ old('phone') }}" required>            
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                         @endif   
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="password" name="password" placeholder="Password *" type="password" required>  
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                         @endif                 
                                    </div>
                                    <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="password-confirm" type="password" placeholder="Confirm Password *" name="password_confirmation"  required>                
                                        @if ($errors->has('password-confirm'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password-confirm') }}</strong>
                                            </span>
                                         @endif    
                                    </div>
                                    </div>
                                    <p ><h4>Address Information</h4></p>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('id_countrie') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">   
                                        {!! Form::select('id_countrie', $countries, null, ['id' => 'id_countrie','class' => 'form-control' , 'placeholder'=>'Country *']) !!}
                                    </div>
                                    <div class="form-group{{ $errors->has('id_state') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6 ">
                                        {!! Form::select('id_state', $states, null, ['id' => 'id_state','class' => 'form-control', 'placeholder'=>'State/Province *']) !!}
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input id="address" type="text" placeholder="Address *" class="form-control" name="address" value="{{ old('address') }}" required>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                         @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input id="city" type="text" placeholder="City *" class="form-control" name="city" value="{{ old('city') }}" required>
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                         @endif
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input id="zipcode" type="number" placeholder="Zip Code *" max="99999" class="form-control" name="zipcode" value="{{ old('zipcode') }}" required>
                                        @if ($errors->has('zipcode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('zipcode') }}</strong>
                                            </span>
                                         @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('hear_about_us') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input id="hear_about_us" type="text" placeholder="How did you hear about us? *" value="{{ old('hear_about_us') }}" title="How did you hear about us?" class="form-control" name="hear_about_us" >
                                    </div>                                    
                                    </div>
                                    <p ><h4>User Authorization</h4></p>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('company_type') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">   
                                        {!! Form::select('company_type', $company_type, null, ['id' => 'company_type','class' => 'form-control' , 'placeholder'=>'Company Type *']) !!}
                                    </div>
                                    <div class="form-group{{ $errors->has('interested_in') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6 ">
                                        {!! Form::select('interested_in', $interested, null, ['id' => 'interested_in','class' => 'form-control', 'placeholder'=>'Mainly interested in *']) !!}
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('programmer_using') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        <input id="programmer_using" type="text" placeholder="Programmer/Machine you are using *" value="{{ old('programmer_using') }}" class="form-control" name="programmer_using" >
                                        @if ($errors->has('programmer_using'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('programmer_using') }}</strong>
                                            </span>
                                         @endif
                                    </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        </div>        
                                    </div>

                                    <div class="row">
                                    <!-- <div class="g-recaptcha" data-sitekey="6LdeVg4UAAAAAHral-9ZxTMXXObakun7Qqh2Nsek" align="center"></div> -->
                                        <button type="submit" class="btn link-button lh-55 hover-white" title="register">
                                            register<i class="link-icon-white"></i>          
                                        </button>
                                    </div>    
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </div>
        </div>
</div>
<script type="text/javascript">
    
        $('#id_countrie').change(function(event){
           $('#id_state').empty();
            $("#id_state").append("<option value='0'>State</option>");
            var country = event.target.value;
            $.get("stateCountry/"+country+"", function(response , state)
                {
                    for(i=0; i<response.length; i++)
                    {
                        $("#id_state").append("<option value='"+response[i].id+"'>"+response[i].name+"-"+response[i].short_name+"</option>"); 
                    }
                });   
            }); 

</script>
@endsection
