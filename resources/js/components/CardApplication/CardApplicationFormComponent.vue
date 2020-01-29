
<template>
<style
.red-border {
  border: 1px solid #f00;
}
>
<div style="margin-bottom:50px;padding:10px 10px 10px 10px;">
    <div class="row" style="margin-bottom:10px;margin-top:10px;">
<div class="col-sm-12">
<input
      class="btn wr"
      ref="fileInput"
      type="file"
      @input="onSelectFile"
      v-bind:style="inputstyle"
      :disabled="editstate==true"/>
    {{invalid.image_file}}
</div>
</div>

<div class="row" >
    <div class="col-sm-6">
    <img :src="src" id="originalimage" style="height:227px;width:364px;" data-toggle="tooltip" title="uploaded image" data-placement="right"/>
    </div>
    <div class="col-sm-6">
    <img :src="destination" id="destimage" data-toggle="tooltip" title="edited image" data-placement="left" class="img-preview image-dest" style="height:227px;width:364px;border-radius:13px;border-style:solid;border-width:thin;box-shadow:1px 1px 3px 3px  #9e9b96;border-color:#9e9b96;">
    </div>
   
</div>
<hr>
<h6><b>info :</b> minimum resolution is 1036*664 pixels @ 300dpi , image file format should be in jpg or png only</h6>
<hr>
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
        <input type="text"  class="form-control" id="mobile" v-model="mobile" @focus="toggleBorder" :class="{'red-border': inputError}">
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
        <select class="form-control" v-model="state_code"  @change="onSelectState()" @click="onSelectState()">
            <option v-for="(item,index) in state_list" v-bind:key="index" v-bind:value="item.state_code2">{{item.state_name}}</option>
        </select>
        </div>
        </div>

        <div class="form-group row">
        <label for="icnumber" class="col-sm-2 col-form-label"><b>Branch name</b></label>
        <div class="col-sm-6">
        <select class="form-control" v-model="selected_branch_code">
            <option v-for="(item,index) in derived_branch_list" v-bind:key="index" v-bind:value="item.branch_code">{{item.branch_name}}</option>
        </select>
        {{invalid.selected_branch_code}}
        </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6">
                 <button class="btn wr col-sm-6"  @click="submitApplication"><b>submit</b></button>
            </div>
        </div>
    </div>
</div>
</div>

</template>
<script>
    import {mapState} from 'vuex';
    import Cropper from 'cropperjs';
    import {validate} from 'validate.js';
    import {CardapplicationValidator} from './cardappicationrules';
    export default {
        mounted(){
            var ap=this;
            axios.all([
                axios.get('/api/maybank/states'),
                axios.get('/api/maybank/branches')])
            .then(axios.spread((statelist, branchlist) => {  
                ap.state_list=statelist.data;
                ap.branch_list=branchlist.data;
            }))
            .catch(error => console.log(error)); 
            },
        data:function(){
            return{
                inputstyle:{
                    color:'black'
                },
                inputError:true,
                branch_list:[],
                state_list:[],
                derived_branch_list:[],
                cropper:{},
                destination:"/images/frontcard.png",
                src:"",
                croppedimagebase64:{},
                mobile:"",
                email:"",
                confirm_email:"",
                last4digitic:"",
                selected_branch_code:"",
                selected_image:"",
                state_code:"",
                image_file_selection_status:"not selected",
                editstate:false,
                isfileuploaded:false,
                invalid:{}
            }
        },
       methods:{
           toggleBorder: function(event) {
            this.inputError = true
            event.target.classList.remove('red-border')
            },
           onSelectFile:function(){
            const input = this.$refs.fileInput;
            const files = input.files;
            const byteinmb=1048576;
            const imageminimumfilesize=1;
            const imagemaximumfilesize=10;
            var cutsub=0;
            var ap=this;
            
                if (files && files[0]) {
                    if(files[0].type=="image/jpeg"||files[0].type=="image/png"){
                        ap.inputstyle.color='black';
                        cutsub=files[0].type=="image/jpeg"?23:22;
                        var reader = new FileReader();
                        reader.onload = function(e){
                            
                            
                            var base64str = e.target.result.substr(cutsub);//get only the base64
                            var decoded = atob(base64str);
                            var uploadedimagefilesize=decoded.length/byteinmb;//convert file size from byte to mega byte
                            if(uploadedimagefilesize>=imageminimumfilesize&&uploadedimagefilesize<=imagemaximumfilesize){
                                ap.src=e.target.result;
                                ap.isfileuploaded=true;
                            }else{
                                alert("image file size should be in between 1 to 10 mb");
                            }
                        }
                        reader.readAsDataURL(files[0]);
                    }else{
                        ap.inputstyle.color='transparent';
                        alert("only png and jpeg type image is allowed");
                        
                    }
                    
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
                minCropBoxWidth:291.2,
                minCropBoxHeight:181.6,
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
            this.editstate=false;
        },
        onSelectState:function(){
            this.selected_branch_code="";
            this.derived_branch_list=_.filter(this.branch_list,{'fstate_code2':this.state_code});
        },
        submitApplication:function(){
            this.invalid={};
            var ap=this;
            var data={
                mobile:this.mobile==""?null:this.mobile,
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
                this.resetInput();
                var image=document.getElementById("destimage");
                 image.style.backgroundImage='url(' +'#'+ ')';

            }else{
                Swal.fire(
                    'fail to submit application',
                    '',
                    'error'
                  )
            }
        },
        resetInput:function(){
            this.selected_image="";
            this.mobile="";
            this.email="";
            this.confirm_email="";
            this.last4digitic="";
            this.derived_branch_list=[];
            this.selected_branch_code="";
            this.src="";
        }
       }
    }
    
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
