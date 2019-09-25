<!--Modal Body Start-->
<div class="modal fade"  id="view_policy_details{{$policy->policy_no}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" 
aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <h3 class="modal-title" id="largeModalLabel">Policy Details</h3>  
        </div>

        <!--Body start-->
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <h5><span class="badge bg-success">Allowed</span></h5>
                    <ul class="card-text" style="font-size: small">
                    @foreach($policy->alloweds as $data)
                        <li>{{$data->desc}}</li>
                    @endforeach
                    </ul>
                </div>
                <div class="col-lg-6">
                    <h5><span class="badge bg-danger">Not Allowed</span></h5>
                    <ul class="card-text" style="font-size: small">
                    @foreach($policy->not_alloweds as $data)
                        <li>{{$data->desc}}</li>
                    @endforeach
                    </ul>
                </div>  
            </div>
            <!--Body end-->            
        </div>
    </div>
</div>
<!--Modal Body End-->
