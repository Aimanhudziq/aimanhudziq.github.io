@extends('layouts.admin_master')

@section('content')
<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-3">
        <div class="card-body">
            <div class="card-left float-left text-left">
                <i class="icon fade-5 icon-lg fa fa-user-o"></i>
            </div><!-- /.card-left -->

            <div class="card-right  float-right">
            <a href="{{ url('admin_user_list') }}">
                <h3 class="mb-0 fw-r">
                    <span class="count">{{ $user_list }}</span>
                </h3>
            </a>
                <p class="text-light mt-1 m-0">{{ trans('dashboard.user') }}</p>
            </div><!-- /.card-right -->
        </div>
    </div>
</div>

<!-- KIV -->
<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-2">
        <div class="card-body">
            <div class="card-right pt-1 float-right">
            <a href="{{ url('admin_policy_list') }}">
                <h3 class="mb-0 fw-r">
                    <span class="count">{{ $policy_list }}</span>
                </h3>
            </a>
                <p class="text-light mt-1 m-0">{{ trans('dashboard.policy') }}</p>
            </div><!-- /.card-left -->

            <div class="card-left float-left text-left">
                <i class="icon fade-5 icon-lg fa fa-shield"></i>
            </div><!-- /.card-right -->
        </div>
    </div>
</div><!-- KIV -->

<!-- Reject -->
<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-danger">
        <div class="card-body">
            <div class="card-right pt-1 float-right">
            <a href="{{url('admin_user_bank_list')}}">
                <h3 class="mb-0 fw-r">
                    <span class="count">
                        {{ $bank_assginment }}
                    </span>
                </h3>
            </a>
                <p class="text-light mt-1 m-0">{{ trans('dashboard.bank') }}</p>
            </div><!-- /.card-left -->

            <div class="card-left float-left text-left">
                <i class="icon fade-5 icon-lg fa fa-credit-card"></i>
            </div><!-- /.card-right -->

        </div>
    </div>
</div> <!--/Reject -->
@endsection