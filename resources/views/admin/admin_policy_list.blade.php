@extends('layouts.admin_master')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">{{trans('content.policy_list')}}</strong>
            <button type="button" class="btn btn-secondary mb-1 float-right" data-toggle="modal" data-target="#add_policy">
                <i class="fa fa-shield"></i>&nbsp; {{trans('content.add_policy')}}
            </button>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>{{trans('content.policy_code')}}</th>
                        <th>{{trans('content.policy_name')}}</th>
                        <th>{{trans('content.policy_source')}}</th>
                        <th>{{trans('content.policy_regulation')}}</th>
                        <th>Status</th>
                        <th>{{trans('content.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($policies as $policy)
                    <tr>
                        <td class="col-md-2">{{ $policy->policy_no }}</td>
                        <td class="col-md-5">{{ $policy->policy_name }}</td>
                        <td><span class="badge bg-dark">
                            {{ $policy->policy_source }}
                        </span></td>
                        <td class="col-md-1">
                            {{ $policy->policy_regulation }}
                        </td>
                        <td><input data-id="{{$policy->id}}"  type="checkbox" class="toggle-class"
                                 data-onstyle="success" data-offstyle="danger" data-toggle="toggle" 
                                                            data-on="Active" data-off="InActive" 
                                                            {{ $policy->status == 0 ? "checked" : " " }}/>
                        </td>
                        <td class="col-md-2">
                            <a  class="btn btn-sm btn-info mb-1" data-toggle="modal" 
                                    data-target="#view_policy_details{{$policy->policy_no}}">
                                <i  class="fa fa-eye"></i>
                            </a>
                            <a href="{{ url('policy/delete',$policy->policy_no) }}" 
                                    onclick="return confirm('Are you sure want to delete this policy {{ $policy->policy_name }}?')" 
                                    class="btn btn-sm btn-danger mb-1" >
                                <i  class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    @include('admin.view_policy_form')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!--/ col-md-12 -->

@include('admin.admin_new_policy_form')
<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 0 : 1; 
        var policy_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {
                'status': status, 
                'policy_id': policy_id
            },
            success: function(data){
              console.log(data.success)
              console.log(data.policy_id)
            }
        });
    })
  })
</script>

@endsection