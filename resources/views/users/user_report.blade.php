@extends('layouts.user_master')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">{{trans('content.report')}}</strong>
        </div>

        <!-- <div class="col-lg-12">
        <button class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#print_excel">Excel</button>
        </div>
        <tr>
        <tr>
        <div class="col-lg-12">
        <button class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#print_pdf">PDF</button>
        </div> -->

        <div class="col-lg-12">
        <a href="{{url('user_excel_report')}}" class="btn btn-sm btn-success mt-3 mb-3 text-white" role="button" aria-pressed="true">Excel</a>
        <a href="{{url('/htmlPDF/pdf')}}" class="btn btn-sm btn-danger mt-3 mb-3 text-white" role="button" aria-pressed="true">PDF</a>

        
        </div> 
        
       

        <!-- <button class="btn btn-sm btn-success mb-1"
                    <a href="{{ url('user_excel_report') }}"><i class="menu-icon ti ti-search">
                    </i>Download Client Report(Excel)</a>
                </li>
                <li class="{{ Route::currentRouteNamed('html-pdf') ? 'active' : '' }}">
                    <a href="{{ url('/htmlPDF/pdf') }}"><i class="menu-icon ti ti-search">
                    </i>Download Client Report(Pdf)</a>
                </li> -->



        </div><!--/ modal content -->
    </div>
</div>




        </div>
</div> <!--/ col-md-12 -->




@endsection