@extends('layouts.user_master')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="alert alert-info col-sm-5 col-md-offset-4" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" 
                    aria-hidden="true"></span>
                    Find someone with <strong><u>No IC</u></strong> or 
                    </strong><strong><u>Phone Number</u></strong>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">New Task</strong>
                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Review</th>
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
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <h4 class="modal-title" id="largeModalLabel">Picture Review</h4>
            <div class="row">
                <div class="col-lg-6">
                        <h6 class="card-text" style="font-size: small">Reference Number : 5106332553</h6>
                        <h6 class="card-text" style="font-size: small">Status : New</h6>
                </div>
                <div class="col-lg-6">
                        <h6 class="card-text" style="font-size: small">Date : 2019-09-01</h6>
                        <h6 class="card-text" style="font-size: small">Time : 16:04</h6>
                </div>  
            </div>   
        </div>

                <!--Body start-->
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="images/demo.png" alt="Logo" height="180px" width="200px">
                </div>
                <div class="col-md-6">
                    <div class="row form-group" style="margin-right: 20px">
                            <label for="textarea-input" class=" form-control-label ml-3">Remarks</label>
                            <textarea name="textarea-input" id="textarea-input" rows="5" placeholder="Content..." 
                            class="form-control ml-3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Policy</strong>
                            </div> <!--/card header -->
                            <div class="card-body" style="font-size: small">
                                <form action="" method="GET">
                                    <div class="form-check" >
                                        @foreach($policy as $p)
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label for="policy" class="form-check-label " >
                                                        <input type="checkbox" id="policy" name="policy[]" value="{{ $p->id }}" 
                                                            class="form-check-input" v-model='policy'>
                                                        {{ $p->policy_name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!--  /.col-lg-6 -->
                </div>
            </div>
            <!--Body end-->

            <div class="modal-footer">
                <a  class="btn btn-sm btn-success mt-3 mb-3 text-white" id="approve">Approve</a>
                <a class="btn btn-sm btn-danger mt-3 mb-3 text-white">Reject</a>
                <a class="btn btn-sm btn-warning mt-3 mb-3 text-white">KIV</a>
                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!--Modal Body End-->
@endsection
