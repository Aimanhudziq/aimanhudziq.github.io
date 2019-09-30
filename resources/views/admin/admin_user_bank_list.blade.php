@extends('layouts.admin_master')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">User List With Bank Assign</strong>
        </div>
        @include('partials.session_msg')
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Category</th>
                        <th>Bank List (Assigned)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_bank as $bank)
                    <tr>
                        <td><span class="badge bg-secondary">
                            {{$bank->first_name}} {{$bank->last_name}}</span>
                        </td>
                        <td><span class="badge bg-info">
                            {{ $bank->frole_code == 2 ? 'Reviewer' : 'Normal User' }}
                        </span></td>
                        <td>
                            <!-- <ul style="display:inline-table;"> -->
                            @foreach($bank->bank_assignment_list as $b_code)
                                <!-- <li style="list-style-type: none;"> -->
                                    @if(count($b_code->fbank_code) == null)
                                    <span class="badge bg-info">Not Assign</span>
                                    @elseif($b_code->fbank_code == 101)
                                    <span class="badge bg-warning">MAYBANK</span>
                                    @elseif($b_code->fbank_code == 102)
                                    <span class="badge bg-danger">CIMB</span>
                                    @elseif($b_code->fbank_code == 103)
                                    <span class="badge bg-light">RHB</span>
                                    @elseif($b_code->fbank_code == 104)
                                    <span class="badge bg-secondary">MBSB</span>
                                    @elseif($b_code->fbank_code == 105)
                                    <span class="badge bg-info">BIMB</span>
                                    @elseif($b_code->fbank_code == 106)
                                    <span class="badge bg-dark">PUBLIC BANK</span>
                                    @elseif($b_code->fbank_code == 107)
                                    <span class="badge bg-light">MUAMALAT</span>
                                    @elseif($b_code->fbank_code == 108)
                                    <span class="badge bg-danger">-</span>
                                    @elseif($b_code->fbank_code == 109)
                                    <span class="badge bg-danger">-</span>
                                    @endif
                               <!-- </li> -->
                            @endforeach 
                           <!-- </ul> -->                       
                        </td>
                        <td>
                            <a  class="btn btn-sm btn-primary mb-1" data-toggle="modal" 
                                    data-target="#myModal2">
                                <i  class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!--/ col-md-12 -->
@include('admin.modal_assign_staff')
@endsection