<!--Modal Body Start-->
<div class="modal fade" id="drop_bank">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <strong class="modal-title">{{trans('content.remove_assign')}}</strong>
            </div>
  
            <!-- Modal body -->
            
        <div class="modal-body modal-block">
            <form action="{{url('assign_bank_to_staff')}}" method="POST">
                {{ csrf_field() }}
                <fieldset>
                    <legend style="font-size:15px">
                        <div class="form-group row">
                            <label for="bank_list" class="col-sm-2">{{trans('content.choose_bank')}}</label>
                            <select name="" id="">
                                <option value="">{{trans('content.bank_name')}}</option>

                                <option class="form-check-input" name="bank_list[]" id="bank_list" value="">
                                    <label class="form-check-label" for="bank_list" style="font-size:12px">
                                    </label></option>
                                 
                            </select>
                        </div>
                    </legend>

                    <div class="form-group row">
                    <div class="form-check form-check-inline">
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
                    <button type="submit" class="btn btn-info">{{trans('content.unassign')}}</button>
                    </div>
                </div>
            </form>
        </div><!--/ modal body -->

        </div><!--/ modal content -->
    </div>
</div>
