<!--Modal Body Start-->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: darkblue" >
                <button type="button" style="color: #ffffff" class="close" data-dismiss="modal">&times;</button>
                <h2><strong class="modal-title text-white">Select Bank</strong></h2>
            </div>
  
            <!-- Modal body -->
            <div class="modal-body" >
                @foreach($user as $b_code)
                <div class="row"  >
                    <a type="button" style="margin: auto; background-color: aqua" 
                        class="btn-lg mb-3" data dismiss="modal" href="{{$b_code->fbank_code}}">
                            <i class="ti ti-credit-card"></i>&nbsp;
                            @if(count($b_code->fbank_code) == null)
                            Not Assign
                            @elseif($b_code->fbank_code == 101)
                            MAYBANK
                            @elseif($b_code->fbank_code == 102)
                            CIMB
                            @elseif($b_code->fbank_code == 103)
                            <span class="badge bg-light">RHB</span>
                            @elseif($b_code->fbank_code == 104)
                            <span class="badge bg-secondary">MBSB</span>
                            @elseif($b_code->fbank_code == 105)
                            <span class="badge bg-info">BIMB</span>
                            @elseif($b_code->fbank_code == 106)
                            <span class="badge bg-dark">PUBLIC BANK</span>
                            @elseif($b_code->fbank_code == 107)
                            <span class="badge bg-light">MUAMALAT</span>
                            @elseif($b_code->fbank_code == 108)
                            <span class="badge bg-danger">-</span>
                            @elseif($b_code->fbank_code == 109)
                            <span class="badge bg-danger">-</span>
                        @endif
                    </a>
                    
                </div>
                @endforeach
            </div><!--/ modal body -->

        </div><!--/ modal content -->
    </div>
</div>