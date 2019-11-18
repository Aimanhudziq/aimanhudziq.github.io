@extends('layouts.user_master')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">{{trans('content.bank_select')}}</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>{{trans('content.bank_name')}}</th>
                        <th>{{trans('content.no_applicant')}}</th>
                        <th>{{trans('content.assign_date')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach($user as $b_code)
                    <?php $i++ ?>
                    
                    <tr>
                        <td>{{ $i }}</td> 
                        <td>
                        <a href="{{ url('user_new_task',$b_code->fbank_code)}}">
                            @if($b_code->fbank_code == 101)
                           
                                <span class="badge bg-warning">MAYBANK</span>
                                @elseif($b_code->fbank_code == 102)
                                <span class="badge bg-danger">CIMB</span>
                                @elseif($b_code->fbank_code == 103)
                                <span class="badge bg-dark">RHB</span>
                                @elseif($b_code->fbank_code == 104)
                                <span class="badge bg-secondary">MBSB</span>
                                @elseif($b_code->fbank_code == 105)
                                <span class="badge bg-info">BIMB</span>
                                @elseif($b_code->fbank_code == 106)
                                <span class="badge bg-dark">PUBLIC BANK</span>
                                @elseif($b_code->fbank_code == 107)
                                <span class="badge bg-danger">MUAMALAT</span>
                            @endif
                        </a>
                        </td>
                        <td>
                        <?php $total = 0; ?>
                        @foreach($bank as $b)
                       
                        @if($b->bank_code==$b_code->fbank_code)
                           <?php $total += count($b); ?>
                           
                        @endif
                        @endforeach
                        <span class="badge bg-default"> {{ $total }}</span>
                        </td>
                        
                        <td><span class="badge bg-info">{{$b_code->created_at}}</span></td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!--/ col-md-12 -->

@endsection