@extends('layouts.user_master')

@section('content')
<!-- Animated -->
<div class="animated fadeIn">
    <!-- row  -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-3">
                <div class="card-body">
                    <div class="card-left float-left text-left">
                        <i class="icon fade-5 icon-lg fa fa-plus-circle"></i>
                    </div><!-- /.card-left -->
                    @if(Auth::user()->frole_id == 3)
                    <a href="{{ url('user_new_task') }}" class="">
                        <div class="card-right  float-right">
                            <h3 class="mb-0 fw-r">
                                <span class="count">23</span>
                            </h3>
                            <p class="text-light mt-1 m-0">{{ trans('dashboard.new') }}</p>
                        </div><!-- /.card-right -->
                    </a>
                    @else
                        <div class="card-right  float-right">
                            <h3 class="mb-0 fw-r">
                                <span class="count">23</span>
                            </h3>
                            <p class="text-light mt-1 m-0">{{ trans('dashboard.new') }}</p>
                        </div><!-- /.card-right -->
                    @endif
                </div>
            </div>
        </div>

        <!-- KIV -->
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-2">
            <div class="card-body">
                    <div class="card-left float-left text-left">
                        <i class="icon fade-5 icon-lg fa fa-eye"></i>
                    </div><!-- /.card-left -->
                    @if(Auth::user()->frole_id == 2)
                    <a href="{{ url('user_kiv_list') }}" class="">
                        <div class="card-right  float-right">
                            <h3 class="mb-0 fw-r">
                                <span class="count">23</span>
                            </h3>
                            <p class="text-light mt-1 m-0">{{ trans('dashboard.kiv') }}</p>
                        </div><!-- /.card-right -->
                    </a>
                    @else
                        <div class="card-right  float-right">
                            <h3 class="mb-0 fw-r">
                                <span class="count">23</span>
                            </h3>
                            <p class="text-light mt-1 m-0">{{ trans('dashboard.kiv') }}</p>
                        </div><!-- /.card-right -->
                    @endif
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
                        <p class="text-light mt-1 m-0">{{ trans('dashboard.rejected') }}</p>
                    </div><!-- /.card-left -->

                    <div class="card-left float-left text-left">
                        <i class="icon fade-5 icon-lg fa fa-times-circle"></i>
                    </div><!-- /.card-right -->

                </div>
            </div>
        </div> <!--/Reject -->

        <!-- Approve -->
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-1">
                <div class="card-body">
                    <div class="card-right pt-1 float-right">
                        <h3 class="mb-0 fw-r">
                            <span class="count">3</span>
                        </h3>
                        <p class="text-light mt-1 m-0">{{ trans('dashboard.approved') }}</p>
                    </div><!-- /.card-left -->

                    <div class="card-left float-left text-left">
                        <i class="icon fade-5 icon-lg fa fa-check-circle"></i>
                    </div><!-- /.card-right -->
                </div>
            </div>
        </div><!--/ Approve -->

    </div><!--/ row -->
</div><!-- /animated -->

<div class="clearfix"></div>
<!-- Orders -->
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">{{ trans('dashboard.status_summary') }}</h4>
                <canvas id="doughutChart"></canvas>
            </div>
        </div>
    </div><!-- /# column -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">{{trans('dashboard.status_month')}}</h4>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- /.orders -->   
@endsection