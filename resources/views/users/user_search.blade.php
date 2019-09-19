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
                    <strong class="card-title">User Search</strong>
                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Phone Number</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="badge bg-secondary">123456789</span></td>
                                <td><span class="badge bg-dark">013-8976113</span></td>
                                <td><span class="badge bg-info">10-08-2019</span></td>
                                <td><span class="badge bg-success">Aprrove</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge bg-secondary">987654321</span></td>
                                <td><span class="badge bg-dark">019-8104967</span></td>
                                <td><span class="badge bg-info">09-09-2019</span></td>
                                <td><span class="badge bg-warning">KIV</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge bg-secondary">54321789</span></td>
                                <td><span class="badge bg-dark">019-9099507</span></td>
                                <td><span class="badge bg-info">14-09-2019</span></td>
                                <td><span class="badge bg-danger">Reject</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/div.row -->
</div><!-- .animated -->
@endsection
