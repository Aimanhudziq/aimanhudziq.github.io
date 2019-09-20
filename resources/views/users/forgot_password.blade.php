@extends('layouts.user_master')

@section('content')

<div class="box box-primary">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div>
            </div>
        <div class="box-body">
                <div class="col-md-5 offset-md-2">
                    <div class="login-form">
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" id="current_password" placeholder="enter current password "
                                name="confirm_password" class="form-control centered">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" id="new_password" placeholder="enter new password "
                                name="confirm_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" id="confirm_password" placeholder="enter confirm password "
                                name="confirm_password" class="form-control">
                        </div>
                    <div class="box-footer text-center">
                        <button class="btn-lg btn-primary" type="submit">change password</button>
                    </div>
                </div>    
        </div><!--/box-body -->
    </div>
</div>
        
</div>

@endsection