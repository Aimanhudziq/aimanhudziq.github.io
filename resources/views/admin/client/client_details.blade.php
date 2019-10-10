@extends('layouts.admin_master')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Add Client Details</strong>
        </div>
    </div>
    <div class="card-body">
            <form action="" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                    <input type="text" id="user_staff_id" name="user_staff_id" value="{{ old('user_staff_id') }}"
                        placeholder="staff id" class="form-control {{ $errors->has('user_staff_id') ? 'has-error' : '' }}">
                </div>
                @if($errors->has('user_staff_id'))
                <span class="help-block">
                <strong style='color: #a94442'>{{ $errors->first('user_staff_id') }}</strong>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                        placeholder="firstname" class="form-control {{ $errors->has('first_name') ? 'has-error' : '' }}">
                </div>
                @if($errors->has('first_name'))
                <span class="help-block">
                <strong style='color: #a94442'>{{ $errors->first('first_name') }}</strong>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                        placeholder="lastname" class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}">
                </div>
                @if($errors->has('last_name'))
                <span class="help-block">
                <strong style='color: #a94442'>{{ $errors->first('last_name') }}</strong>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                    <input type="text" id="username" name="username" value="{{ old('username') }}"
                        placeholder="username" class="form-control {{ $errors->has('username') ? 'has-error' : '' }}">
                </div>
                @if($errors->has('username'))
                <span class="help-block">
                    <strong style='color: #a94442'>{{ $errors->first('username') }}</strong>
                @endif
                </span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                        placeholder="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}">
                </div>
                @if($errors->has('email'))
                <span class="help-block">
                <strong style='color: #a94442'>{{ $errors->first('email') }}</strong>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="form-group">                                                                            
                <select name="role_category" id="role_category" class="form-control">
                    <option value="">--Choose Role--</option>

                    <option value=""></option>
                </select>
                @if($errors->has('role_category'))
                <span class="help-block">
                <strong style='color: #a94442'>{{ $errors->first('role_category') }}</strong>
                @endif
            </div>                                                                  
            <div class="modal-footer">
                <div class="form-actions form-group">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection