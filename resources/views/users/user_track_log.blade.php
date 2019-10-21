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
                                <th>{{trans('content.date')}}</th>
                                <th>{{trans('content.status')}}</th>
                                <th>{{trans('content.review')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0;?>
                        @foreach($logs as $log)
                            <tr>
                            <?php $i++; ?>
                                <td>{{$i}}</td>
                                <td><span class="badge bg-secondary">{{$log->reference_no}}</span></td>
                                <td><span class="badge bg-dark">{{$log->created_at}}</span></td>
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
                                    <a type="button" class="btn btn-white mb-1" data-toggle="modal" 
                                        data-target="#track_log{{$log->ic_no}}"><i  class="fa fa-cog"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div><!--/div.row -->
</div><!-- .animated -->

@foreach($logs as $log)
<!--Modal Body Start-->
<div class="modal fade"  id="track_log{{$log->ic_no}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel1" 
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
                                    <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel"
                                        aria-labelledby="custom-nav-home-tab">
                                        <p style="text-align:center; display:block">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="{{url($log->image_url)}}" alt="Logo" height="150px" width="225px">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h6 class="card-text" style="font-size: small">{{trans('content.ref_num')}} : 
                                                                                        <span class="badge bg-info">{{$log->reference_no}}</span></h6>
                                                            <h6 class="card-text" style="font-size: small">{{trans('content.status')}} : 
                                                                                        <span class="badge bg-secondary">{{$log->fstatus_code}}</span></h6>
                                                            <h6 class="card-text" style="font-size: small">{{trans('content.date')}} : {{$log->created_at}}</h6>
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
                                                    <th>{{trans('content.policy_violated')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2019-08-29</td>
                                                    <td>New</td>
                                                    <th>Approve</th>
                                                    <td>-</td>
                                                </tr>
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
<!--Modal Body End-->
@endforeach

@endsection
