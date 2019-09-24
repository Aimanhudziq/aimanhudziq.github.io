@extends('layouts.admin_master')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Policy List</strong>
            <button type="button" class="btn btn-secondary mb-1 float-right" data-toggle="modal" data-target="#add_policy">
                <i class="fa fa-shield"></i>&nbsp; Add New Policy
            </button>
        </div>
        @include('partials.session_msg')
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Policy Name</th>
                        <th>Policy Source</th>
                        <th>Policy Regulation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($policies as $policy)
                    <tr>
                        <td class="col-md-5">{{ $policy->policy_name }}</td>
                        <td><span class="badge bg-dark">
                            {{ $policy->policy_source }}
                        </span></td>
                        <td class="col-sm-3">
                        <span class="bg-info">{{ $policy->policy_regulation }}
                        </span></td>
                        <td>
                            <a  class="btn btn-sm btn-primary mb-1" data-toggle="modal" 
                                    data-target="#view_policy_details">
                                <i  class="fa fa-eye"></i>
                            </a>
                            <a href="{{ url('policy/delete',$policy->policy_no) }}" 
                                    onclick="return confirm('Are you sure want to delete this policy {{ $policy->policy_name }}?')" 
                                    class="btn btn-sm btn-danger mb-1" >
                                <i  class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!--/ col-md-12 -->

@include('admin.admin_new_policy_form')
@include('admin.view_policy_form')

@endsection