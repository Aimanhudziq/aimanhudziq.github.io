@extends('layouts.admin_master')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">{{trans('content.user_list')}}</strong>
            <button type="button" class="btn btn-secondary mb-1 float-right" data-toggle="modal" data-target="#add_user">
                <i class="fa fa-user-plus"></i>&nbsp; {{trans('content.add_user')}}
            </button>
        </div>
        @include('partials.session_msg')
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>{{trans('content.full_name')}}</th>
                        <th>{{trans('content.username')}}</th>
                        <th>{{trans('content.staff_id')}}</th>
                        <th>{{trans('content.email')}}</th>
                        <th>{{trans('content.category')}}</th>
                        <th>{{trans('content.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_list as $user)
                    <tr>
                        <td><span class="badge bg-secondary">
                            {{ $user->first_name }} {{ $user->last_name}}</span></td>
                        <td><span class="badge bg-primary">
                        {{ $user->username }}</span></td>
                        <td><span class="badge bg-dark">
                            {{ $user->user_staff_id }}
                        </span></td>
                        <td><span class="badge bg-info">{{ $user->email }}
                        </span></td>
                        <td>
                            @if($user->frole_code == 1)
                            <span class="badge bg-info">Admin</span>
                            @elseif ($user->frole_code == 2)
                            <span class="badge bg-info">Reviewer</span>
                            @else
                            <span class="badge bg-info">Normal User</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('user/delete',$user->user_staff_id) }}" onclick="return confirm('Are you sure want to delete this user {{ $user->first_name }}?')" 
                                    class="btn btn-danger mb-1" >
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

@include('admin.admin_new_user_form')

@endsection