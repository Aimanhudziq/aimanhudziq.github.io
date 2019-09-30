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
                @foreach($reviewer as $b_code)
                <div class="row"  >
                    <a type="button" style="margin: auto; background-color: aqua" 
                        class="btn-lg mb-3" data dismiss="modal" href="{{$b_code->fbank_code}}">
                            <i class="ti ti-credit-card"></i>&nbsp;
                        @if($b_code->fbank_code == 101)
                            MAYBANK
                        @elseif($b_code->fbank_code == 102)
                            CIMB
                        @elseif($b_code->fbank_code == 103)
                            RHB
                        @elseif($b_code->fbank_code == 104)
                            MBSB
                        @elseif($b_code->fbank_code == 105)
                            BIMB
                        @elseif($b_code->fbank_code == 106)
                            PUBLIC BANK
                        @elseif($b_code->fbank_code == 107)
                            MUAMALAT
                        @endif
                    </a>
                    
                </div>
                @endforeach
            </div><!--/ modal body -->

        </div><!--/ modal content -->
    </div>
</div>