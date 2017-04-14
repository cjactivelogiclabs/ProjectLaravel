 @extends('website.layout')

 @section('content') 


            <div class="title-page">
                <h3>Login</h3>
            </div>

            <div class="login-box-container">
                <div class="container" style="width:80%">
                            <p>If you have an account with us, log in using your email address.<br></p>
                             <div class="contact-form">
                                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}"> 
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-6">
                                        {{ csrf_field() }}                
                                        <input class="form-control" id="email" name="email" placeholder="Email adress*" type="email" required autofocus>                                      
                                                  
                                    </div>
                                    
                                    <div class="form-group  col-md-6 col-sm-6 col-xs-6">
                                        <input class="form-control" id="password" name="password" placeholder="Password*" type="password" required>                
                                    </div>
                                     <div class="form-group"> 
                                         @if ($errors->has('password'))
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            </div>
                                        @endif  
                                        @if ($errors->has('email'))
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            </div>
                                        @endif             
                                        <button type="submit" class="btn link-button lh-55 hover-white" title="Login">
                                            Login<i class="link-icon-white"></i>          
                                         </button>   
                                                                               
                                    </div>

                                    <p><br><b><a class="over-black" href="{{ url('/password/reset') }}">Forgot Your Password?</b></a></p>
                                </form>
                            </div>
                            <!-- End contact form -->
                </div>
                <!-- End container -->
            </div>
            <!-- End cat-box-container -->
        
 @endsection