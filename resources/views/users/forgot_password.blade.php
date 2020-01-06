@extends('layouts.user_master')

@section('content')

<style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }
        .popover-title {
            text-align: center;
        }

        .custom-popover li {
            border: none!important;
            text-align: center;
        }

        .custom-popover li:nth-child(2) {
            border-top: 1px solid #ccc!important;
        }

        .custom-popover li:last-child {
            border-top: 1px solid #ccc!important;
        }    
        .popover{
            /* background-color:#b94a48; */
            border:none;
            border-radius:unset;
            min-width:100px;
            width:100%;
            max-width:400px;
            overflow-wrap:break-word;
        }      
    </style>

@if(session('success'))
<div class="alert alert-success col-md-5 col-md-offset-2" align="center" >
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger col-md-5 col-md-offset-2" align="center">
    {{ session('error') }}
</div>
@endif



<div class="box box-primary">
    
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
            </div>
        </div>
        <div class="alert alert-warning col-md-3 col-md-offset-2 float-right" style="font-size:15px" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" 
            aria-hidden="true"></span>  {{trans('login.popover_pwd_rule1')}} <br>
            <span class="glyphicon glyphicon-exclamation-sign" 
            aria-hidden="true"></span>  {{trans('login.popover_pwd_rule2')}} <br>
            <span class="glyphicon glyphicon-exclamation-sign" 
            aria-hidden="true"></span>  {{trans('login.popover_pwd_rule3')}} <br>
            <span class="glyphicon glyphicon-exclamation-sign" 
            aria-hidden="true"></span>  {{trans('login.popover_pwd_rule4')}} <br>
            <span class="glyphicon glyphicon-exclamation-sign" 
            aria-hidden="true"></span>  {{trans('login.popover_pwd_rule5')}} <br>
            
        </div>
        <div class="card-body">

           
        <form role="form" method="POST" action="{{ route('forgot-passwordReset') }}">
        {{ csrf_field() }}
        
        <div class="box-body">
                <div class="col-md-5 offset-md-2">
                    <div class="login-form">
                        <div class="form-group">
                                
                            <label for="current-password">Current Password</label>
             
                            <input type="password" id="password-field" placeholder="{{ trans('passwords.placeholder_currentPassword')}} "
                                name="current-password" class="form-control {{ $errors->has('current-password') ? ' has-error' : '' }} centered" value="{{old('current-password')}}" 
                                data-toggle="collapse">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @if($errors->has('current-password'))
                                <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('current-password') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                               
                            <label for="new-password">New Password</label>
                            <input type="password" id="password-field" placeholder="{{ trans('passwords.placeholder_newPassword')}} "
                                name="new-password" class="form-control {{ $errors->has('new-password') ? ' has-error' : '' }}"  value="{{old('new-password')}}" data-toggle="collapse">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                @if ($errors->has('new-password'))
                                <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('new-password') }}</strong></span>
                                @endif

                        </div>
                        <div class="form-group">
                                
                            <label for="new-confirm-password">Confirm Password</label>
                            <input type="password" id="password-field" placeholder="{{ trans('passwords.placeholder_passwordConfirmation')}}"
                                name="new-password_confirmation" class="form-control {{ $errors->has('new-password') ? ' has-error' : '' }}" value="{{old('new-confirm-password')}}" data-toggle="collapse"> 
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                @if ($errors->has('new-password_confirmation'))
                                <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('password_confirmation') }}</strong></span>
                                @endif
                        </div>
                        <div class="box-footer text-center">
                        <button class="btn-lg btn-primary" type="submit">change password</button>
                        </div>
                    </div>  



                    {{-- <div class="container">
                        
                        <div class="alert alert-warning">
                          <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
                        </div>
                        
                      </div> --}}
                 
                </div><!--/box-body -->

                
        </div>
        </form>
        </div>
    </div>
 
    
    
</div>
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") 
            {
                input.attr("type", "text");
            } 
            else 
            {
                input.attr("type", "password");
            }
        });
    </script>




@endsection