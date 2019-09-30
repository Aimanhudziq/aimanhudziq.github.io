@extends('layouts.user_master')

<!--@include('partials.reviewer_modal_bank_selection')-->
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">List Bank Assigned</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bank Name</th>
                        <th>Number of Applicant</th>
                        <th>Assign Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach($reviewer as $b_code)
                    <?php $i++ ?>
                    
                    <tr>
                        <td>{{ $i }}</td> 
                        <td>
                        <a href="{{$b_code->fbank_code}}">
                            @if($b_code->fbank_code == 101)
                                <span class="badge bg-warning">MAYBANK</span>
                                @elseif($b_code->fbank_code == 102)
                                <span class="badge bg-danger">CIMB</span>
                                @elseif($b_code->fbank_code == 103)
                                <span class="badge bg-light">RHB</span>
                                @elseif($b_code->fbank_code == 104)
                                <span class="badge bg-secondary">MBSB</span>
                                @elseif($b_code->fbank_code == 105)
                                <span class="badge bg-info">BIMB</span>
                                @elseif($b_code->fbank_code == 106)
                                <span class="badge bg-dark">PUBLIC BANK</span>
                                @elseif($b_code->fbank_code == 107)
                                <span class="badge bg-danger">MUAMALAT</span>
                                @elseif($b_code->fbank_code == 108)
                                <span class="badge bg-danger">-</span>
                                @elseif($b_code->fbank_code == 109)
                                <span class="badge bg-danger">-</span>
                            @endif
                        </a>
                        </td>
                        <td><span class="badge bg-info">null</span></td>
                        <td><span class="badge bg-info">{{$b_code->created_at}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!--/ col-md-12 -->

@endsection