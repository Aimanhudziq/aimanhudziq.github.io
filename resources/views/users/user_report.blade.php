@extends('layouts.user_master')

@section('content')

<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">{{trans('content.report')}}</strong>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h5><span class="badge bg-info">Download PDF & Excel Report</h5>
                    <a href="{{url('report/user_excel_report')}}" class="btn btn-sm btn-success mt-3 mb-3 text-white" role="button" aria-pressed="true">Excel</a>
                    <a href="{{url('report/pdf_report')}}" class="btn btn-sm btn-danger mt-3 mb-3 text-white" role="button" aria-pressed="true">PDF</a>
                </div>

                <div class="col-xs-6">
                
                    <h5>
                    <span class="badge bg-info">
                       Download XML Report
                    </span>
                    </h5>
                    <a href="{{url('report/download_xml')}}"
                       class="btn btn-sm btn-danger mt-3 mb-3 text-white" 
                        role="button" aria-pressed="true">download xml file</a>

                    @if (session('status'))
                    <span class="badge bg-success">
                        {{ session('status') }} 
                    </span>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@endsection