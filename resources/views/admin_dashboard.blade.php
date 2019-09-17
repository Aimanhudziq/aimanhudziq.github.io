@extends('layouts.admin_master')

@section('content')
<!-- Animated -->
<div class="animated fadeIn">
    <!-- row  -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-3">
                <div class="card-body">
                    <div class="card-left float-left text-left">
                        <i class="icon fade-5 icon-lg fa fa-user-o"></i>
                    </div><!-- /.card-left -->

                    <div class="card-right  float-right">
                        <h3 class="mb-0 fw-r">
                            <span class="count">23</span>
                        </h3>
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
                        <h3 class="mb-0 fw-r">
                            <span class="count">14</span>
                        </h3>
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
                        <h3 class="mb-0 fw-r">
                            <span class="count">6</span>
                        </h3>
                        <p class="text-light mt-1 m-0">{{ trans('dashboard.bank') }}</p>
                    </div><!-- /.card-left -->

                    <div class="card-left float-left text-left">
                        <i class="icon fade-5 icon-lg fa fa-credit-card"></i>
                    </div><!-- /.card-right -->

                </div>
            </div>
        </div> <!--/Reject -->
    </div><!--/ row -->
</div><!-- /animated -->
@endsection