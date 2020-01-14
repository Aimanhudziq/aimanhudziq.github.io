<footer class="site-footer" style="position:fixed; width:100%; bottom:0" >
    <div class="footer-inner bg-white" style="padding-bottom:8px; padding-top:8px" >
        <div class="row">
            <div class="col-sm-8 float-left">
                <div>
                <a data-toggle="modal" data-target="#about" style="padding-right:40px; cursor: pointer" target="_blank">{{ trans('footer.about')}}</a>
                <a data-toggle="modal" data-target="#contact" style="cursor:pointer" target="_blank">{{ trans('footer.contact') }}</a>
                </div>
            </div>
            <div class="col-sm-4 float-right">
                <div>
                &copy;<a href="http://www.modularsoft.com.my/" target="_blank">Modularsoft Sdn Bhd</a>
                </div>
            </div>
        </div>
        
    </div>
</footer>


<!--About Modal Start-->
<div class="modal fade"  id="about" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" 
aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="padding-bottom:0px" >
            <div class="modal-header" style="padding-bottom:0px" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="smallModalLabel">
                <i class="fa fa-info-circle"></i>About</h4>
            </div>

            <!--Body start-->
            <div class="modal-body" style="padding-bottom:0px" >
                <div class="box box-primary">
                    <span class="badge bg-info">system version</span>
                    <span class="badge bg-dark">v1.0</span>
                    <hr>
                    <span class="badge bg-info">Last Updated</span>
                    <span class="badge bg-dark">14-Jan-2020</span>
                    <hr>
                </div>
            </div>
            <!--Body end-->            
        </div>
    </div>
</div>
<!-- About Modal End-->

<!--Contact Modal Start-->
<div class="modal fade"  id="contact" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" 
aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="padding-bottom:0px" >
            <div class="modal-header" style="padding-bottom:0px" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="smallModalLabel">
                <i class="fa fa-address-book"></i>Contact Us</h4>
            </div>

            <!--Body start-->
            <div class="modal-body" style="padding-bottom:0px" >
                <div class="row" style="padding-left: 15px; padding-top:15px">
                    <span><i  class="ti ti-mobile"></i>
                    Phone: +603-2711 1280
                    </span>
                </div>
                <div class="row" style="padding-left: 15px; padding-top:15px">
                    <span><i  class="fa fa-print"></i>
                    Fax: +603-2711 1289
                    </span>
                </div>
                <div class="row" style="padding-left: 15px; padding-top:15px; padding-bottom:20px">
                    <span><i  class="ti ti-world"></i>
                    Website: <a href="{{ url('www.modularsoft.com.my') }}" target="_blank">modularsoft sdn bhd</a>
                    </span>
                </div>
            </div>
            <!--Body end-->            
        </div>
    </div>
</div>
<!-- Contact Modal End-->
    