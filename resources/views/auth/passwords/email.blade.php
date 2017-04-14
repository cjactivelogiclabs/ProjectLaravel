@extends('website.layout')

<!-- Main Content -->
@section('content')
<div class="title-page">
    <h3>Reset Password</h3>
    @if (session('status'))
        <div class="text-center text-primary">
           {{ session('status') }}
        </div>
    @endif
</div>
<div class="login-box-container">
<div class="container">
   
        <div class="col-md-8 col-md-offset-2">
            
                    

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" placeholder="Email address" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn link-button hover-white" title="Send Password Reset Link">
                                Send Password Reset Link<i class="link-icon-white"></i>          
                            </button> 
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
