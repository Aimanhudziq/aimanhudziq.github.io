
<template>
<div style="margin-bottom:50px;padding:10px 10px 10px 10px;">
    <div class="row" style="margin-bottom:10px;margin-top:10px;">
<div class="col-sm-12">
<input
      class="btn wr"
      ref="fileInput"
      type="file"
      @input="onSelectFile"
      :disabled="editstate==true"/>
    {{invalid.image_file}}
</div>
</div>

<div class="row" >
    <div class="col-sm-6">
    <img :src="src" id="originalimage" style="height:227px;width:364px;"/>
    </div>
    <div class="col-sm-6">
    <img :src="destination" id="destimage" class="img-preview" style="height:227px;width:364px;border-radius:10px;">
    </div>
   
</div>
<div class="row" style="margin-top:10px;">
    <div class="col-sm-12">
    <button class="btn wr" @click="editImage" :disabled="isfileuploaded==false||isfileuploaded==true&&editstate==true"><b>Edit Image</b></button>
     &nbsp;<button class="btn wr" @click="cancel" :disabled="isfileuploaded==false&&editstate==false||isfileuploaded==true&&editstate==false"><b>Cancel</b></button>
     &nbsp;<button class="btn wr" @click="save" :disabled="editstate==false"><b>Save</b></button>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-12">
    <h3>Customer Details</h3>
    </div>
    <div class="col-sm-12">
        <div class="form-group row">
        <label for="mobile" class="col-sm-2 col-form-label"><b>Mobile</b></label>
        <div class="col-sm-6">
        <input type="text"  class="form-control" id="mobile" v-model="mobile">
        {{invalid.mobile}}
        </div>
        </div>

        <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
        <div class="col-sm-6">
        <input type="text"  class="form-control" id="email" v-model="email">
        {{invalid.email}}
        </div>
        </div>

        <div class="form-group row">
        <label for="cemail" class="col-sm-2 col-form-label"><b>Confirm Email</b></label>
        <div class="col-sm-6">
        <input type="text"  class="form-control" id="cemail" v-model="confirm_email">
        {{invalid.confirm_email}}
        </div>
        </div>
        <div class="form-group row">
        <label for="icnumber" class="col-sm-2 col-form-label"><b>Last 4 Digit IC</b></label>
        <div class="col-sm-6">
        <input type="text"  class="form-control" id="icnumber" v-model="last4digitic">
        {{invalid.ic}}
        </div>
        </div>

        <div class="form-group row">
        <label for="icnumber" class="col-sm-2 col-form-label"><b>State</b></label>
        <div class="col-sm-6">
        <select class="form-control" v-model="selected_state">
            <option>johor</option>
            <option>selangor</option>
        </select>
        </div>
        </div>

        <div class="form-group row">
        <label for="icnumber" class="col-sm-2 col-form-label"><b>Branch name</b></label>
        <div class="col-sm-6">
        <select class="form-control" v-model="selected_branch_code">
            <option v-for="(item,index) in branch_list" v-bind:key="index">{{item.branch_code}}</option>
        </select>
        {{invalid.selected_branch_code}}
        </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
            <button class="btn wr col-sm-3" style="margin-left:21%" @click="submitApplication"><b>submit</b></button>
            </div>
        </div>
    </div>
</div>
</div>

</template>
<script>
    import {mapState} from 'vuex';
    import Cropper from 'cropperjs';
    import {frontCard} from './CardTemplate';
    import {validate} from 'validate.js';
    import {CardapplicationValidator} from './cardappicationrules';
    export default {
        mounted(){
            var ap=this;
             axios.get('/api/maybank/view_all_branches/101')
                .then(function (response) {
                    ap.branch_list=response.data;
                });    
        },
        data:function(){
            return{
                branch_list:[],
                cropper:{},
                destination:"images/frontcard.png",
                src:"images/frontcard.png",
                croppedimagebase64:{},
                mobile:"",
                email:"",
                confirm_email:"",
                last4digitic:"",
                selected_branch_code:"",
                selected_image:"",
                selected_state:"",
                image_file_selection_status:"not selected",
                editstate:false,
                isfileuploaded:false,
                invalid:{}
            }
        },
       methods:{
           onSelectFile:function(){
            const input = this.$refs.fileInput;
            const files = input.files;
            var ap=this;
            if (files && files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        
                         ap.src=e.target.result;
                         ap.isfileuploaded=true;
                        
                    }
                    reader.readAsDataURL(files[0]);
            }
           
        },
        editImage:function(){
            this.editstate=true;
            var ap=this;
            this.cropper = new Cropper(document.getElementById("originalimage"), {
                aspectRatio:1036/664,
                multiple: false,
                dragCrop: false,
                dashed: true,
                movable: true,
                zoomable:true,
                resizable: false,
                viewMode:2,
                checkCrossOrigin:false,
                cropBoxResizable: true,
                crop:()=>{
                    const canvas=this.cropper.getCroppedCanvas();
                    var image=document.getElementById("destimage");
                    var url=canvas.toDataURL("images/png");
                    ap.selected_image=url;
                    image.style.backgroundImage='url(' + url + ')';
                    image.style.backgroundSize='364px 227px';
                    image.style.backgroundRepeat='no-repeat'; 
                },

            });
            
        },
        save:function(){
            this.cropper.destroy();
            this.image_file_selection_status="modified image";
            this.isfileuploaded=false;
            this.editstate=false;
        },
        cancel:function(){
            if(this.cropper instanceof Cropper){
                this.cropper.destroy();
                this.selected_image="";
                var image=document.getElementById("destimage");
                image.style.backgroundImage='url(' +'#'+ ')';
            }
            this.image_file_selection_status="no images";
            this.editstate=false;
        },
        submitApplication:function(){
            this.invalid={};
            var ap=this;
            var data={
                mobile:this.mobile,
                ic:this.last4digitic==""?null:this.last4digitic,
                email:this.email==""?null:this.email,
                confirm_email:this.confirm_email==""?null:this.confirm_email, 
                selected_branch_code:this.selected_branch_code==""?null:this.selected_branch_code,
                image_file:this.selected_image==""?null:this.selected_image
                 
            }
            CardapplicationValidator.validateinput(data).then(()=>{
                    this.$store.dispatch('cardapplication/submitCardApplication',data).then((response)=>{
                    if(response.data.status=="success"){
                        ap.pageRedirect(1);
                    }else{
                        ap.pageRedirect(2);
                    }
                    }).catch((error)=>{
                        ap.pageRedirect(3);
                    });
            })
            .catch((error)=>{
                ap.invalid=error;
                
            });
            
        },
        pageRedirect:function(result){
            if(result==1){
                Swal.fire(
                    'Application has Been Submitted',
                    '',
                    'success'
                  )
            }else{
                Swal.fire(
                    'fail to submit application',
                    '',
                    'error'
                  )
            }
        }
       }
    }
</script>
