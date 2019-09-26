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
                                <th>{{trans('content.ref_num')}}</th>
                                <th>{{trans('content.date')}}</th>
                                <th>{{trans('content.status')}}</th>
                                <th>{{trans('content.review')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="badge bg-secondary">123456789</span></td>
                                <td><span class="badge bg-dark">18-09-2019</span></td>
                                <td><span class="badge bg-info">New</span></td>
                                <td>
                                    <a type="button" class="btn btn-white mb-1" data-toggle="modal" 
                                        data-target="#track_log"><i  class="fa fa-cog"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/div.row -->
</div><!-- .animated -->

<!--Modal Body Start-->
<div class="modal fade"  id="track_log" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel1" 
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="mediumModalLabel1">{{trans('content.transaction_log')}}</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <h6 class="card-text" style="font-size: small">{{trans('content.ref_num')}} : 5106332553</h6>
                        <h6 class="card-text" style="font-size: small">{{trans('content.status')}} : New</h6>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="card-text" style="font-size: small">{{trans('content.date')}} : 2019-09-01</h6>
                        <h6 class="card-text" style="font-size: small">{{trans('content.time')}} : 16:04</h6>
                    </div>
                
                </div>
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
                                            <img src="images/demo.png" alt="Logo" style="width: 50%; height: 50%">
                                        </p>                                                                                         
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel
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
@endsection
