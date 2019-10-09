@extends('layouts.admin_master')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">{{trans('content.bank_details')}}</strong>
        </div>
        @include('partials.session_msg')
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>{{trans('content.full_name')}}</th>
                        <th>{{trans('content.category')}}</th>
                        <th>{{trans('content.bank_list')}}</th>
                        <th>{{trans('content.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_bank as $bank)
                    <tr>
                        <td><span>
                            {{$bank->first_name}} {{$bank->last_name}}</span>
                        </td>
                        <td><span>
                            {{ $bank->frole_code == 2 ? 'Reviewer' : 'Normal User' }}
                        </span></td>
                        <td>
                            <!-- <ul style="display:inline-table;"> -->
                            @if($bank->bank_assignment_list->count()== 0)
                                <b>{{trans('content.no_bank')}}</b>
                            @else
                                @foreach($bank->bank_assignment_list as $b_code)
                                    <!-- <li style="list-style-type: none;"> -->
                                        @if(count($b_code->fbank_code) == null)
                                        <span class="badge bg-info">Not Assign</span>
                                        @elseif($b_code->fbank_code == 101)
                                        <span class="badge bg-warning">MAYBANK</span>
                                        @elseif($b_code->fbank_code == 102)
                                        <span class="badge bg-danger">CIMB</span>
                                        @elseif($b_code->fbank_code == 103)
                                        <span class="badge bg-dark">RHB</span>
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
                            @endif
                           <!-- </ul> -->                       
                        </td>
                        <td>
                            <span title="{{trans('content.add_assign')}}" data-toggle="tooltip" data-placement="top">
                                <button class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#add_bank{{$bank->user_staff_id}}">
                                    <i  class="fa fa-plus"></i>
                                </button>
                            </span>
                            <span title="{{trans('content.remove_assign')}}" data-toggle="tooltip" data-placement="top">
                                <button class="btn btn-sm btn-danger mb-1"  data-toggle="modal" data-target="#drop_bank{{$bank->user_staff_id}}">
                                    <i  class="fa fa-minus"></i>
                                </button>
                            </span>
                        </td>
                    </tr>
                    @include('admin.modal_assign_staff')
                    @include('admin.modal_unassign_staff')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!--/ col-md-12 -->

@endsection