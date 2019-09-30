<!--Modal Body Start-->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <strong class="modal-title">Assign Bank (Staff)</strong>
            </div>
  
            <!-- Modal body -->
            @include('partials.session_msg')
        <div class="modal-body modal-block">
            <form action="{{url('assign_bank_to_staff')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="staff_name" class="col-sm-2 col-form-label">Staff Name</label>
                    <div class="col-sm-7">
                        <select name="staff_name" id="normal_user" value="{{old('staff_name')}}"
                                class="form-control staff_name {{ $errors->has('staff_name') ? 'has-error' : '' }}">
                            <option value="">select staff name</option>
                            @foreach($user_list as $ulist)
                            <option value="{{$ulist->user_staff_id}}" 
                                        email-value="{{$ulist->email}}"
                                            category-value="{{$ulist->frole_code}}">
                                    {{ $ulist->first_name }} {{ $ulist->last_name }}
                                    ({{ $ulist->frole_code == 2 ? 'Reviewer' : 'Normal User' }})</option>
                            @endforeach
                        </select>
                        <input type="text" name="user_staff_id" id="user_staff_id" >
                    @if($errors->has('staff_name'))
                        <span class="help-block">
                        <strong style='color: #a94442'>{{ $errors->first('staff_name') }}</strong>
                    @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-3">
                        <input type="email" class="form-control" id="staff_email" readonly
                            placeholder="Email">
                    </div>

                    <div class="col-sm-3">
                        <input type="text" name="user_category" class="form-control" 
                        placeholder="user role" id="user_category" readonly>
                    </div>
                </div>

                <fieldset>
                    <legend style="font-size:15px">
                        <div class="form-group row">
                            <label for="bank_list" class="col-sm-2">Choose Bank</label>
                        </div>
                    </legend>

                    <div class="form-group row">
                    <div class="form-check form-check-inline">
                        @foreach($bank_list as $bank)
                        <input class="form-check-input" style="margin-left: 12px" type="checkbox" name="bank_list[]" id="bank_list"
                                onclick="" value="{{$bank->bank_code}}" >
                        <label class="form-check-label" for="bank_list" style="font-size:12px">
                                    {{strtoupper($bank->bank_name)}}</label>
                        @endforeach
                    </div>
                        @if($errors->has('bank_list'))
                            <span class="help-block">
                        <strong style='color: #a94442'>{{ $errors->first('bank_list') }}</strong>
                        @endif
                    </div>
                </fieldset>
                <hr>
                <div class="form-group row text-center">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-info">Assign Bank</button>
                    </div>
                </div>
            </form>
        </div><!--/ modal body -->

        </div><!--/ modal content -->
    </div>
</div>