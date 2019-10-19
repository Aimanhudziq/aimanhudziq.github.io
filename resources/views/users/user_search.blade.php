@extends('layouts.user_master')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">

                    <strong class="card-title float-left">{{trans('content.search')}}</strong>

                    <div class="alert alert-info col-xs col-md-offset-3 float-right" style="font-size:12px" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" 
                    aria-hidden="true"></span>  
                    {{trans('content.find_with')}} <strong><u>{{trans('content.ic_num')}}</u></strong> {{trans('content.or')}} 
                    </strong><strong><u>{{trans('content.phone_num')}}</u></strong>
                </div>
                </div>

                <div class="card-body">
                    
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>{{trans('content.ref_num')}}</th>
                                <th>{{trans('content.phone_num')}}</th>
                                <th>{{trans('content.date')}}</th>
                                <th>{{trans('content.status')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach($search as $sr)
                            <tr>
                            <?php $i++; ?>
                                <td>{{$i}}</td>
                                <td><span class="badge bg-secondary">{{$sr->reference_no}}</span></td>
                                <td><span class="badge bg-dark">{{$sr->phone_number}}</span></td>
                                <td><span class="badge bg-info">{{$sr->created_at}}</span></td>
                                <td>
                                @if($sr->fstatus_code == 0)
                                    <span class="badge bg-danger">reject</span>
                                    @elseif($sr->fstatus_code == 1)
                                    <span class="badge bg-success">approve</span>
                                    @elseif($sr->fstatus_code == 2)
                                    <span class="badge bg-warning">kiv</span>
                                    @elseif($sr->fstatus_code == 3)
                                    <span class="badge bg-info">new</span>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/div.row -->
</div><!-- .animated -->
@endsection
