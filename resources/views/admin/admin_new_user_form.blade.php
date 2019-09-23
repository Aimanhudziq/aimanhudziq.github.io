<div class="modal fade " id="smallmodal" tabindex="-1" role="dialog" data-backdrop="static"
        aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="#" method="post" class="">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="first_name" name="first_name" placeholder="firstname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="last_name" name="last_name" placeholder="lastname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                                    <input type="text" id="staff_id" name="staff_id" placeholder="staff id" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                    <input type="text" id="email" name="email" placeholder="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">                                                                            
                                <select name="role_category" id="role_category" class="form-control">
                                    <option value="0">--Choose Role--</option>
                                    <option value="0">Admin</option>
                                    <option value="2">Reviewer</option>
                                    <option value="1">Normal User</option>
                                </select>
                            </div>
                            <div class="form-group">                                                                            
                                <select name="bank_assign" id="bank_assign" class="form-control">
                                    <option value="0">--Bank Assign--</option>
                                    <option value="1">Bank 1</option>
                                    <option value="2">Bank 2</option>
                                </select>
                            </div>                                                                     
                            <div class="modal-footer">
                                <div class="form-actions form-group">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- /card-->
            </div> <!--/ modal body -->
            
        </div>
    </div>
</div>