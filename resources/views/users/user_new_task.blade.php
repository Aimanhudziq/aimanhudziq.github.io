@extends('layouts.user_master')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">{{trans('content.new_task')}}</strong>
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
                                <td><span class="badge bg-secondary">013-8976113</span></td>
                                <td><span class="badge bg-dark">18-09-2019</span></td>
                                <td><span class="badge bg-info">New</span></td>
                                <td>
                                    <a type="button" class="btn btn-white mb-1" data-toggle="modal" 
                                        data-target="#largeModal"><i  class="fa fa-cog"></i>
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
<div class="modal fade"  id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" 
aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="padding-bottom:0px" >
            <div class="modal-header" style="padding-bottom:0px" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <h4 class="modal-title" id="largeModalLabel">{{trans('content.pic_review')}}</h4>
            </div>

                <!--Body start-->
        <div class="modal-body" style="padding-bottom:0px" >
            <div class="row">
                <div class="col-md-4">
                    <img src="images/demo.png" alt="Logo" height="150px" width="225px">
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-lg-12">
                        <h6 class="card-text" style="font-size: small">{{trans('content.ref_num')}} : 5106332553</h6>
                        <h6 class="card-text" style="font-size: small">{{trans('content.status')}} : New</h6>
                        <h6 class="card-text" style="font-size: small">{{trans('content.date')}} : 2019-09-01</h6>
                        <h6 class="card-text" style="font-size: small">{{trans('content.time')}} : 16:04</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row form-group" style="margin-right: 20px">
                            <label for="textarea-input" class=" form-control-label ml-3">{{trans('content.remarks')}}</label>
                            <textarea name="textarea-input" id="textarea-input" rows="5" placeholder="Content..." 
                            class="form-control ml-3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>{{trans('content.policy')}}</strong>
                            </div> <!--/card header -->
                            <div class="card-body" style="font-size: small; padding-top:0px; padding-bottom:0px">
                                <form action="" method="GET">
                                    <div class="form-check" >
                                        <div id="app">
                                        @foreach($policy as $p)
                                            <div class="checkbox">
                                                <div class="col-xs-6">
                                                    <label for="policy" class="form-check-label " >
                                                        <input type="checkbox" id="policy" name="policy" value="{{ $p->id }}" 
                                                            class="form-check-input" @click="disabledBtnApp">
                                                        {{ $p->policy_name }}
                                                        
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                            <div class="modal-footer" style="padding-bottom:0px" >
                                                <button class="btn btn-sm btn-success mt-3 mb-3 text-white" id="approve">{{trans('content.approve')}}</button>
                                                <button class="btn btn-sm btn-danger mt-3 mb-3 text-white">{{trans('content.reject')}}</button>
                                                <button class="btn btn-sm btn-warning mt-3 mb-3 text-white">KIV</button>
                                                <button class="btn btn-secondary" data-dismiss="modal">{{trans('content.cancel')}}</button>
                                            </div>
                                        </div>
                                    </div><!-- form check class-->
                                </form>
                            </div>
                        </div>
                    </div><!--  /.col-lg-6 -->
                </div>
            </div>
            <!--Body end-->            
        </div>
    </div>
</div>
<!--Modal Body End-->
@endsection
