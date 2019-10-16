@extends('layouts.user_master')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                    @if(request()->route('bank_code') == 101)
                    <img src="{{URL::to('images/maybank.png')}}" 
                                height="50px" width="100px">
                    <span class="badge bg-warning">MAYBANK</span>
                    @elseif(request()->route('bank_code') == 102)
                    <img src="{{URL::to('images/cimb.png')}}" 
                                height="30px" width="100px">
                    <span class="badge bg-danger">CIMB BANK</span>
                    @elseif(request()->route('bank_code') == 103)
                    <img src="{{URL::to('images/rhb.png')}}" 
                                height="20px" width="100px">
                    <span class="badge bg-dark">RHB BANK</span>
                    @elseif(request()->route('bank_code') == 104)
                    <img src="{{URL::to('images/mbsb.png')}}" 
                                height="40px" width="100px">
                    <span class="badge bg-secondary">MBSB BANK</span>
                    @elseif(request()->route('bank_code') == 105)
                    <img src="{{URL::to('images/bimb.png')}}" 
                                height="30px" width="100px">
                    <span class="badge bg-info">BIMB BANK</span>
                    @elseif(request()->route('bank_code') == 106)
                    <img src="{{URL::to('images/public.png')}}" 
                                height="50px" width="125px">
                    <span class="badge bg-dark">PUBLIC BANK</span>
                    @elseif(request()->route('bank_code') == 107)
                    <img src="{{URL::to('images/muamalat.png')}}" 
                                height="50px" width="150px">
                    <span class="badge bg-danger">MUAMALAT BANK</span>
                    @endif
                    </strong>
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
                            @foreach($client as $applicant)
                            <tr>
                                <td><span class="badge bg-secondary">{{$applicant->reference_no}}</span></td>
                                <td><span class="badge bg-dark">{{$applicant->created_at}}</span></td>
                                <td><span class="badge bg-info">{{$status_desc}}</span></td>
                                <td>
                                    <a type="button" class="btn btn-white mb-1" data-toggle="modal" 
                                        data-target="#client_detail{{$applicant->ic_no}}"><i  class="fa fa-cog"></i>
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
@foreach($client as $applicant)
<!--Modal Body Start-->
<div class="modal fade"  id="client_detail{{$applicant->ic_no}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" 
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
                    <img src="{{url($applicant->image_url)}}" alt="client images" height="150px" width="180px">
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-lg-12">
                        <h6 class="card-text" style="font-size:12px">{{trans('content.ref_num')}} : <span class="badge bg-info" style="font-size:10px">{{$applicant->reference_no}}</span></h6>
                        <h6 class="card-text" style="font-size:12px">{{trans('content.date')}} : <span class="badge bg-info" style="font-size:10px">{{$applicant->created_at}}</span> </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row form-group" style="margin-right: 20px">
                            <label for="textarea-input" class=" form-control-label ml-3">{{trans('content.remarks')}}</label>
                            <textarea style="resize:none;font-size:11px;" name="textarea-input" id="textarea-input"  rows="3" placeholder="Content..." 
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
                                                    <label for="policy" class="form-check-label" style="font-size:10px;">
                                                        <input type="checkbox" id="policy" name="policy" value="{{ $p->id }}" onclick="alert(data)"
                                                            class="form-check-input">
                                                        {{ $p->policy_name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                            <div class="modal-footer" style="padding-bottom:0px" >
                                                <a class="btn btn-sm btn-success mt-3 mb-3 text-white" id="approve">{{trans('content.approve')}}</a>
                                                <a class="btn btn-sm btn-danger mt-3 mb-3 text-white">{{trans('content.reject')}}</a>
                                                <a class="btn btn-sm btn-warning mt-3 mb-3 text-white">KIV</a>
                                                <a class="btn btn-secondary" data-dismiss="modal">{{trans('content.cancel')}}</a>
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
@endforeach

@endsection
