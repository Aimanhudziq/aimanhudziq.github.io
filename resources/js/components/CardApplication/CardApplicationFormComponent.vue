
<template>

<div>
    <div class="row" style="margin-bottom:10px;">
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
</div>
</div>

</template>


<script>
    import {mapState} from 'vuex';
    import Cropper from 'cropperjs';
    export default {
        props:['testname'],
        mounted(){
            console.log(this.testname);
        },
        data:function(){
            return{
                cropper:{},
                destination:{},
                src:String,
                name:this.testname,
                mobile:"",
                email:"",
                ic:"",
                branch_code:"",
            }
        },
       computed:{
           ...mapState({
                test:state=>state.cardapplication.test,
            })
       },
       methods:{
           setTest:function(testdata){
               this.$store.commit('cardapplication/SET_TEST',"main-main");
           },
           onSelectFile:function(){
            const input = this.$refs.fileInput;
            const files = input.files;
            var ap=this;
            if (files && files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        
                         ap.src=e.target.result;
                        
                    }
                    reader.readAsDataURL(files[0]);
            }
           
        },
        editImage:function(){
            this.cropper = new Cropper(document.getElementById("originalimage"), {
                aspectRatio: 1,
                autoCropArea: 0.6, // Center 60%
                multiple: false,
                dragCrop: false,
                dashed: true,
                movable: false,
                zoomable:true,
                resizable: false,
                checkCrossOrigin:false,
                maxBoxWidth: 50,
                maxBoxHeight: 50,
                crop:()=>{
                    const canvas=this.cropper.getCroppedCanvas();
                    this.destination=canvas.toDataURL("images/png");     
                }
            });
            
        },
        cancelEdit:function(){
            this.cropper.destroy();
        },
        submitApplication:function(){
            var data={
                name:this.name,
                mobile:this.mobile,
                ic:this.ic,
                email:this.email,
                branch_code:this.branch_code,
                
            }
            this.$store.dispatch('cardapplication/submitCardApplication',data);
            /*var ap=this;
            axios.post('/maybank/addCardApplication', {
                name: ap.name,
                mobile:ap.mobile,
                email:ap.email,
                ic:ap.ic,
                branch_code:ap.branch_code
              })
              .then(function (response) {
                ap.pageRedirect(response.data);
              })
              .catch(function (error) {
                console.log(error);
              });*/
        },
        pageRedirect:function(result){
            if(result==1){
                Swal.fire(
                    'Application has Been Submitted',
                    '',
                    'success'
                  )
            }
        }
       }
    }
</script>
