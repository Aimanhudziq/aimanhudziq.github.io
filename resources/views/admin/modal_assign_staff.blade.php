<!--Modal Body Start-->
<div class="modal fade add_policy" id="add_bank{{$bank->user_staff_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <strong class="modal-title">{{trans('content.add_assign')}}</strong>
            </div>
  
            <!-- Modal body -->
            
        <div class="modal-body">
            <form action="{{url('assign_bank_to_staff')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="bank_list" class="col-sm-3 col-form-label">Select Bank</label>
                    <div class="col-sm-7">
                        <select name="bank_list" id="bank_list" value="{{old('bank_list')}}"
                                class="form-control {{ $errors->has('bank_list') ? 'has-error' : '' }}">
                            <option value="">--select bank--</option>
                            @foreach($bank_list as $b_code)
                            <option value="{{$b_code->bank_code}}" >
                                {{ $b_code->bank_name }}</option>
                            @endforeach
                        </select>
                        <!-- hidden input text -->
                        <input type="text" name="user_staff_id" value="{{$bank->user_staff_id }}">
                        <input type="text" name="role_code" value="{{$bank->frole_code }}">
                        <!--/-------------------->
                        @if($errors->has('bank_list'))
                            <span class="help-block">
                            <strong style='color: #a94442'>{{ $errors->first('bank_list') }}</strong>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="form-group row text-center">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-info">{{trans('content.assign')}}</button>
                    </div>
                </div>
            </form>
        </div><!--/ modal body -->

        </div><!--/ modal content -->
    </div>
</div>
@if (count($errors) > 0)
<script>
    $( document ).ready(function() {
        $('.add_bank').modal('show');
    });
</script>
@endif