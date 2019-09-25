@extends('layouts.admin_master')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Assign Bank (Staff)</strong>
        </div>
        @include('partials.session_msg')
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <label for="staff_list">Staff List</label>
                    <select name="staff_name" id="staff_name" class="form-control">
                        <option value="">--Select Staff Name--</option>
                        <option value="">--Select Staff Name--</option>
                        <option value="">--Select Staff Name--</option>
                    </select>
                </div> 
                <div class="col-md-5">
                    <label for="user_category">User Category</label>
                    <select name="user_category" id="user_category" class="form-control">
                        <option value="">--Select User Category--</option>
                        <option value="">--Select Staff Name--</option>
                        <option value="">--Select Staff Name--</option>
                    </select>
                </div>  
                <div class="col-md-5">
                    <label for="choose_bank">Choose Bank</label>
                    <div>
                        <label for="maybank">maybank</label>
                        <input type="checkbox" name="bank" />

                        <label for="cimb">cimb bank</label>
                        <input type="checkbox" name="bank" />

                        <label for="cimb">bimb bank</label>
                        <input type="checkbox" name="bank" />
                    </div>
                </div>
                
                <div class="form-actions form-group">
                    <button class="btn btn-sm btn-info">Assign</button>
                </div>
            </div>
        </div><!--/carl-body -->
    </div>
</div> <!--/ col-md-12 -->

@endsection