@extends('layouts.user_master')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
            </div>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">{{trans('content.transaction_log')}}</strong>
            
                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No .</th>
                                <th>{{trans('content.ref_num')}}</th>
                                <th>{{trans('content.bank_name')}}</th>
                                <th>{{trans('content.date')}}</th>
                                <th>{{trans('content.status')}}</th>
                                <th>{{trans('content.review')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0;?>
                        @foreach($logs as $log)
                        <?php $i++; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td><span class="badge bg-secondary">{{$log->reference_no}}</span></td>
                                <td>
                                @if($log->fbank_code == 101)
                           
                                <span class="badge bg-warning">MAYBANK</span>
                                @elseif($log->fbank_code == 102)
                                <span class="badge bg-danger">CIMB</span>
                                @elseif($log->fbank_code == 103)
                                <span class="badge bg-dark">RHB</span>
                                @elseif($log->fbank_code == 104)
                                <span class="badge bg-secondary">MBSB</span>
                                @elseif($log->fbank_code == 105)
                                <span class="badge bg-info">BIMB</span>
                                @elseif($log->fbank_code == 106)
                                <span class="badge bg-dark">PUBLIC BANK</span>
                                @elseif($log->fbank_code == 107)
                                <span class="badge bg-danger">MUAMALAT</span>
                            @endif
                                </td>
                                <td><span class="badge bg-dark">{{$log->updated_at}}</span></td>
                                <td>
                                @if($log->fstatus_code == 0)
                                    <span class="badge bg-danger">reject</span>
                                    @elseif($log->fstatus_code == 1)
                                    <span class="badge bg-success">approve</span>
                                    @elseif($log->fstatus_code == 2)
                                    <span class="badge bg-warning">kiv</span>
                                    @elseif($log->fstatus_code == 3)
                                    <span class="badge bg-info">new</span>
                                @endif
                                </td>
                                <td>
                                    <a type="button" class="btn btn-white mb-1" data-toggle="modal"  onclick="test('<?php echo $log->reference_no;?>')"
                                        data-target="#track_log"><i  class="fa fa-cog"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div><!--/div.row -->
</div><!-- .animated -->

<div class="modal fade"  id="track_log" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel1" 
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="padding-bottom:0px" >
            <div class="modal-header" style="padding-bottom:0px" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="mediumModalLabel1">{{trans('content.transaction_log')}}</h4>
                </div>
    
            <!--Body start-->
            <div class="modal-body">
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="custom-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" 
                                            role="tab" aria-controls="custom-nav-home" aria-selected="true">{{trans('content.image')}}</a>
                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" 
                                            role="tab" aria-controls="custom-nav-profile" aria-selected="false">{{trans('content.history')}}</a> 
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane show active" id="custom-nav-home" role="tabpanel"
                                        aria-labelledby="custom-nav-home-tab">
                                        <p style="text-align:center; display:block">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img id="clientimage" alt="Logo" height="150px" width="225px">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h6 class="card-text" style="font-size: small">{{trans('content.ref_num')}} : 
                                                                                        <span class="badge bg-info" id="refno"></span></h6>
                                                            <h6 class="card-text" style="font-size: small">{{trans('content.status')}} : 
                                                                                        <span class="badge bg-secondary" id="newstatus"></span></h6>
                                                            <h6 class="card-text" style="font-size: small">{{trans('content.date')}} : 
                                                                                        <span class="badge bg-dark" id="date"></span></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </p>                                                                                         
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel"
                                        aria-labelledby="custom-nav-profile-tab">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                       
                                            <thead>
                                                <tr>
                                                    <th>{{trans('content.date')}}</th>
                                                    <th>{{trans('content.from')}}</th>
                                                    <th>{{trans('content.to')}}</th>
                                                    <th>{{trans('content.policy_code')}}</th>
                                                    <th>{{trans('content.policy_violated')}}</th>
                                                    <th>{{trans('content.comment')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablebody">
                                            
                                            </tbody>
                                        </table>   
                                                                                                                                                
                                    </div>
                                </div>
                            </div>    
                           
                        </div><!-- /# card -->
                         
                    </div><!--  /.col-lg-6 -->
                </div>
            </div>   
                   
            <!--Body end-->
            
            <!-- footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>

        </div>
    </div>
</div>






<script>
function test(ref){
var trackrec=<?php echo  json_encode($trackRec);?>;
var clientdetail=<?php echo  json_encode($logs);?>;
var cardapplication=<?php echo  json_encode($cardApp);?>;
var data=<?php  echo json_encode($data);?>;
document.getElementById("tablebody").innerHTML=""
trackrec.forEach(function(item){
    if(ref==item.freference_no){
    document.getElementById("newstatus").innerHTML=item.new_status_code;
    document.getElementById("date").innerHTML=item.created_at;
    var tr = document.createElement('tr');
    var date = document.createElement('td');
    var orist = document.createElement('td');
    var newst = document.createElement('td');
    var policy_code = document.createElement('td');
    var policy = document.createElement('td');
    var comment = document.createElement('td');

    date.appendChild(document.createTextNode(item.created_at));
    orist.appendChild(document.createTextNode(getstrcode(item.ori_status_code)));
    newst.appendChild(document.createTextNode(getstrcode(item.new_status_code)));
    policy_code.appendChild(document.createTextNode(item.code_policy));
    policy.appendChild(document.createTextNode(item.violated_policy));
    comment.appendChild(document.createTextNode(item.comment));
    tr.appendChild(date);
    tr.appendChild(orist);
    tr.appendChild(newst);
    tr.appendChild(policy_code);
    tr.appendChild(policy);
    tr.appendChild(comment);
    var container=document.getElementById("tablebody");
    container.appendChild(tr);

    // document.getElementById("clientimage").src=item.image_url;
    // document.getElementById("refno").innerHTML=item.reference_no;
    }
    });
    clientdetail.forEach(function(item){
        if(ref==item.reference_no){
            document.getElementById("clientimage").src=item.image_url;
            document.getElementById("refno").innerHTML=item.reference_no;

        }
    });
    // cardapplication.forEach(function(item){
    //     if(ref==item.freference_no){
    //         var tr = document.createElement('tr');
    //         var comment = document.createElement('td');
    //         comment.appendChild(document.createTextNode(item.comment));
    //         tr.appendChild(comment);

    //         var container=document.getElementById("tablebody");
    //         container.appendChild(tr);
    // });


}


function getstrcode(stcd){
    var strcode="";
    var className ="";
switch(stcd){
    case 3:
        strcode="new";
        break;
    case 2:
        strcode="kiv";
        break;
    case 1:
        strcode="approve";
        break;
    case 0:
        strcode="reject";
        break ;
}
return strcode;
}


</script>
@endsection
