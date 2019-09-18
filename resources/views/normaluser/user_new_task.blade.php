@extends('layouts.user_master')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">New Task</strong>
                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>013-8976113</td>
                                <td>2019-08-29</td>
                                <td>New</td>
                                <td>
                                    <a  type="button" class="btn btn-white mb-1" data-toggle="modal" 
                                        data-target="#largeModal"><i  class="fa fa-cog"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/div.row -->
</div><!-- .animated -->

<!--Modal Body Start-->
<div class="modal fade"  id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <h4 class="modal-title" id="largeModalLabel">Picture Review</h4>
            <div class="row">
                <div class="col-lg-6">
                        <h6 class="card-text" style="font-size: small">Reference Number : 5106332553</h6>
                        <h6 class="card-text" style="font-size: small">Status : New</h6>
                </div>
                <div class="col-lg-6">
                        <h6 class="card-text" style="font-size: small">Date : 2019-09-01</h6>
                        <h6 class="card-text" style="font-size: small">Time : 16:04</h6>
                </div>  
            </div>   
        </div>

                <!--Body start-->
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <img src="images/demo.png" alt="Logo" style="height: min-content">
                </div>
                <div class="col-lg-6">
                    <div class="row form-group" style="margin-right: 20px">
                            <label for="textarea-input" class=" form-control-label ml-3">Remarks</label>
                            <textarea name="textarea-input" id="textarea-input" rows="5" placeholder="Content..." 
                            class="form-control ml-3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Policy</strong>
                            </div> <!--/card header -->
                            <div class="card-body" style="font-size: small">
                                <div class="form-check" >
                                    <div class="checkbox">
                                        <label for="checkbox1" class="form-check-label " >
                                            <input type="checkbox" id="checkbox1" name="checkbox1" value="option1" class="form-check-input">Cardholders picture/portrait
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox2" class="form-check-label ">
                                            <input type="checkbox" id="checkbox2" name="checkbox2" value="option2" class="form-check-input">Portraits of third parties
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Outside/Inside buildings
                                        </label>
                                    </div>           
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Artworks (paintings, statues, song texts)
                                        </label>
                                    </div>       
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">(Company) Logos
                                        </label>
                                    </div>          
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Company names
                                        </label>
                                    </div>    
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Olympic Marks, logos, designation, or authentication statements
                                        </label>
                                    </div>
                                                            
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Names
                                        </label>
                                    </div>                  
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Text/wording
                                        </label>
                                    </div>     
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Poems, book text
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Cartoon figures
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Politicians, political symbols, logos of political parties
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Racist symbols or pictures
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Flags
                                        </label>
                                    </div>                 
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Cards, motorcycles, vehicles, clothes, advertising, commercials
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Personal- or company data (address, phone nr., web address)
                                        </label>
                                    </div>  
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Nudity, any sexual related matter
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Mistreatment, violence
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Religious pictures/symbols
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Gambling scenes or places
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Alcohol, tobacco, drugs, medicines
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Pictures which might bring confusion (card would look like it has a different function) names
                                        </label>
                                    </div>  
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input">Pictures which might bring negative impact to the payment organization brand
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--  /.col-lg-6 -->
                </div>
            </div>
            <!--Body end-->

                <div class="modal-footer">
                        <a type="submit" class="btn btn-sm btn-dark mt-3 mb-3 text-white">Approve</a>
                        <a type="submit" class="btn btn-sm btn-dark mt-3 mb-3 text-white">Reject</a>
                        <a type="submit" class="btn btn-sm btn-dark mt-3 mb-3 text-white">KIV</a>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                </div>
        </div>
    </div>
</div>
<!--Modal Body End-->
@endsection
