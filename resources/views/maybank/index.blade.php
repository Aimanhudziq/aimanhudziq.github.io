@extends('layouts.maybank_master')
@section('content')
<cardapplication :pname="'{{$name}}'"></cardapplication>
<!-- <div class="row" style="margin-bottom:10px;">
<div class="col-sm-12">
<input
      class="file-input"
      ref="fileInput"
      type="file"
      @input="onSelectFile"
    >
</div>
</div>

<div class="row" >
    <div class="col-sm-6">
    <img :src="src" id="originalimage"/>
    </div>
    <div class="col-sm-6">
    <img :src="destination" id="destimage" class="img-preview"/>
    </div>
   
</div>
<div class="row" style="margin-top:10px;">
    <div class="col-sm-12">
    <button class="btn btn-primary" @click="editImage">edit image</button>
     &nbsp;<button class="btn btn-danger" @click="cancelEdit">cancel</button>
    </div>
    
</div>
<hr>
<div class="row">
    <div class="col-sm-12">
    <h3>Customer Details</h3>
    </div>
    <div class="col-sm-12">
        <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-6">
        <input type="text"  class="form-control" id="name" v-model="name">
        </div>
        </div>

        <div class="form-group row">
        <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
        <div class="col-sm-6">
        <input type="text"  class="form-control" id="mobile" v-model="mobile">
        </div>
        </div>

        <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
        <input type="text"  class="form-control" id="email" v-model="email">
        </div>
        </div>

        <div class="form-group row">
        <label for="icnumber" class="col-sm-2 col-form-label">IC Number</label>
        <div class="col-sm-6">
        <input type="text"  class="form-control" id="icnumber" v-model="ic">
        </div>
        </div>

        <div class="form-group row">
        <label for="icnumber" class="col-sm-2 col-form-label">Branch Code</label>
        <div class="col-sm-6">
        <select class="form-control" v-model="branch_code">
            <option>001</option>
            <option>002</option>
        </select>
        </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
            <button class="btn btn-success" @click="submitApplication">submit</button>
            </div>
        </div>
    </div>
</div> -->
@endsection