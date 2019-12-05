<!--Modal Body Start-->
<div class="modal fade" id="printTableExcel">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <strong class="modal-title">Report</strong>
            </div>
  
            <!-- Modal body -->
            
        <div class="modal-body">
            <form action="{{url('')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="table" class="col-sm-3 col-form-label">Select Table</label>
                    <div class="col-sm-7">
                        <select name="tableDB" id="tableDB" value="{{old('tableDB')}}"
                                class="form-control {{ $errors->has('table') ? 'has-error' : '' }}">
                            <option value="">--select table--</option>
                            @foreach($table as $table)
                            <option value="{{$table->Tables_in_picturecard}}" >
                                </option>
                            @endforeach
                        </select>
                        <!-- hidden input text -->
                       
                        <!--/-------------------->
                      -->
                    </div>
                </div>
                <hr>
                <!-- <div class="form-group row text-center">
                    <div class="col-sm-10">
                    
                    </div>
                </div> -->
            </form>
        </div><!--/ modal body -->

        </div><!--/ modal content -->
    </div>
</div>
<!-- @if (count($errors) > 0) -->
<script>
    $( document ).ready(function() {
        $('#printTableExcel').modal('show');
    });
</script>
<!-- @endif -->