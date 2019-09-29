@extends('layouts.admin_master')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Admin List</strong>
        </div>
        @include('partials.session_msg')
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Staff Id</th>
                        <th>Email</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admin_list as $admin)
                    <tr>
                        <td><span class="badge bg-secondary">
                            {{ $admin->first_name }} {{ $admin->last_name}}</span></td>
                        <td><span class="badge bg-dark">
                            {{ $admin->user_staff_id }}
                        </span></td>
                        <td><span class="badge bg-info">{{ $admin->email }}
                        </span></td>
                        <td>
                            @if($admin->frole_code == 1)
                            <span class="badge bg-info">Admin</span>
                            @elseif ($admin->frole_code == 2)
                            <span class="badge bg-info">Reviewer</span>
                            @else
                            <span class="badge bg-info">Normal User</span>
                            @endif
                        </td>
                        <!-- 
                        <td>
                            <a href="{{ url('user/delete',$admin->user_staff_id) }}" 
                                    class="btn btn-danger mb-1" >
                                <i  class="fa fa-trash-o"></i>
                            </a>
                            onclick="return confirm('Are you sure want to delete this user {{ $admin->first_name }}?')" 
                        </td>
                        -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!--/ col-md-12 -->

@endsection