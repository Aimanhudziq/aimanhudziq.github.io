<div class="modal fade " id="add_policy" tabindex="-1" role="dialog" data-backdrop="static"
        aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">{{trans('content.add_policy')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="{{ url('add_new_policy') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                                    <input type="text" id="policy_no" name="policy_no" value="{{ old('policy_no') }}"
                                        placeholder="Policy Number [eg: CB01]" class="form-control {{ $errors->has('policy_no') ? 'has-error' : '' }}">
                                </div>
                                @if($errors->has('policy_no'))
                                <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('policy_no') }}</strong>
                                @endif
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                                    <input type="text" id="policy_name" name="policy_name" value="{{ old('policy_name') }}"
                                        placeholder="Policy Name [eg: (Company) Logos]" class="form-control {{ $errors->has('policy_name') ? 'has-error' : '' }}">
                                </div>
                                @if($errors->has('policy_name'))
                                <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('policy_name') }}</strong>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-shield"></i></div>
                                    <input type="text" id="policy_source" name="policy_source" value="{{ old('policy_source') }}"
                                        placeholder="policy source [eg: MC/Visa]" class="form-control {{ $errors->has('policy_source') ? 'has-error' : '' }}">
                                </div>
                                @if($errors->has('policy_source'))
                                <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('policy_source') }}</strong>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-shield"></i></div>
                                    <input type="text" id="policy_regulation" name="policy_regulation" value="{{ old('policy_regulation') }}"
                                        placeholder="policy regulation [eg: Copyright]" class="form-control {{ $errors->has('policy_regulation') ? 'has-error' : '' }}">
                                </div>
                                @if($errors->has('policy_regulation'))
                                <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('policy_regulation') }}</strong>
                                @endif
                            </div>   
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-check-circle"></i></div>
                                    <input type="text" id="allowed_desc" name="allowed_desc" value="{{ old('allowed_desc') }}"
                                        placeholder="Allowed description [eg: Portraits of people not a celebrities ]" class="form-control {{ $errors->has('allowed_desc') ? 'has-error' : '' }}">
                                </div>
                                @if($errors->has('allowed_desc'))
                                <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('allowed_desc') }}</strong>
                                @endif
                            </div>   
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-times-circle"></i></div>
                                    <input type="text" id="notAllowed_desc" name="notAllowed_desc" value="{{ old('notAllowed_desc') }}"
                                        placeholder="Not allowed description [eg: Portraits of celebrities ]" class="form-control {{ $errors->has('notAllowed_desc') ? 'has-error' : '' }}">
                                </div>
                                @if($errors->has('notAllowed_desc'))
                                <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('notAllowed_desc') }}</strong>
                                @endif
                            </div>                                                               
                            <div class="modal-footer">
                                <div class="form-actions form-group">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{trans('content.cancel')}}</button>
                                    <button type="submit" class="btn btn-success btn-sm">{{trans('content.submit')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- /card-->
            </div> <!--/ modal body -->
            
        </div>
    </div>
</div>
@if (count($errors) > 0)
<script>
    $( document ).ready(function() {
        $('#add_policy').modal('show');
    });
</script>
@endif
