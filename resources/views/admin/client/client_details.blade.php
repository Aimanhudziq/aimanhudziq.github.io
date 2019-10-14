@extends('layouts.admin_master')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Add Client Details</strong>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <form action="{{ url('register_client_details') }}" method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group col-xs-6">
                    <label for="full_name">Full Name</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}"
                            placeholder="full name" class="form-control {{ $errors->has('full_name') ? 'has-error' : '' }}">
                    </div>
                    @if($errors->has('full_name'))
                    <span class="help-block">
                    <strong style='color: #a94442'>{{ $errors->first('full_name') }}</strong>
                    @endif
                </div>
                
                <div class="form-group col-xs-6">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                        <input type="text" id="email" name="email" value="{{ old('email') }}"
                            placeholder="eg: jasvinliyun@yahoo.com" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}">
                    </div>
                    @if($errors->has('email'))
                    <span class="help-block">
                    <strong style='color: #a94442'>{{ $errors->first('email') }}</strong>
                    @endif
                </div>

                <div class="form-group col-xs-6">
                    <label for="Phone_no">Phone No</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                        <input type="text" id="phone_no" name="phone_no" value="{{ old('phone_no') }}"
                            placeholder="eg: 0138976113" class="form-control {{ $errors->has('phone_no') ? 'has-error' : '' }}">
                    </div>
                    @if($errors->has('phone_no'))
                    <span class="help-block">
                    <strong style='color: #a94442'>{{ $errors->first('phone_no') }}</strong>
                    @endif
                </div>

                <div class="form-group col-xs-6">
                    <label for="ICNO">IC NO</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                        <input type="text" id="ic_no" name="ic_no" value="{{ old('ic_no') }}"
                            placeholder="eg: 800132061254" class="form-control {{ $errors->has('ic_no') ? 'has-error' : '' }}">
                    </div>
                    @if($errors->has('ic_no'))
                    <span class="help-block">
                    <strong style='color: #a94442'>{{ $errors->first('ic_no') }}</strong>
                    @endif
                </div>

                <div class="form-group col-xs-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" 
                                placeholder="Client address" name="address" 
                                    id="address">{{old('address')}}</textarea>
                        </div>
                    @if($errors->has('address'))
                    <span class="help-block">
                    <strong style='color: #a94442'>{{ $errors->first('address') }}</strong>
                    @endif
                </div>

                <div class="form-group col-xs-6">
                    <label for="bank_name">Choose Bank</label>
                    <select name="bank_name" id="bank_name" class="form-control">
                        <option value="">--Choose Bank--</option>
                        <option value="test">test</option>
                    </select>

                    @if($errors->has('bank_name'))
                    <span class="help-block">
                    <strong style='color: #a94442'>{{ $errors->first('bank_name') }}</strong>
                    @endif
                </div>

                <div class="form-group col-xs-4">
                    <label for="upload_image">Upload Image</label>
                    <input type="file" id="image_file" name="image_file"
                                    placeholder="file image">
                    @if($errors->has('image_file'))
                    <strong style='color: #a94442'>{{ $errors->first('image_file') }}</strong>
                    @endif
                    <p class="help-block" style="font-size:12px;">
                        Maximum 1MB. Only .png, .jpeg image format</p>
                </div>                                              

                <div class="form-group col-xs-6">
                    <button type="button" class="btn btn-secondary btn-sm">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </div>

            </form>
        </div> <!-- row /-->
            
    </div>
</div>

@endsection