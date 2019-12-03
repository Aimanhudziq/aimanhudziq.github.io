@extends('layouts.admin_master')

@section('content')

<div class="box box-primary">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
            </div>
        </div>

        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        <form role="form" method="POST" action="{{ route('forgot-passwordResetAdmin') }}">
        {{ csrf_field() }}
        
        <div class="box-body">
                <div class="col-md-5 offset-md-2">
                    <div class="login-form">
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                
                            <label for="new-password">Current Password</label>
             
                            <input type="password" id="password" placeholder="{{ trans('passwords.placeholder_currentPassword')}} "
                                name="current-password" class="form-control centered" required>

                            @if ($errors->has('current-password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('current-password') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                               
                            <label for="new-password">New Password</label>
                            <input type="password" id="new-password" placeholder="{{ trans('passwords.placeholder_newPassword')}} "
                                name="new-password" class="form-control"  required>

                                @if ($errors->has('new-password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong></span>
                                @endif

                        </div>
                        <div class="form-group">
                                
                            <label for="new-confirm-password">Confirm Password</label>
                            <input type="password" id="new-confirm-password" placeholder="{{ trans('passwords.placeholder_passwordConfirmation')}}"
                                name="new-password_confirmation" class="form-control" required>

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                @endif
                        </div>
                        <div class="box-footer text-center">
                        <button class="btn-lg btn-primary" type="submit">change password</button>
                        </div>
                    </div>    
                </div><!--/box-body -->
        </div>
        </form>
        </div>
    </div>
        
</div>

@endsection