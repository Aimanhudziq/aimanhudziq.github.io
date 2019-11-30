/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Vuesax=require('vuesax');
import 'vuesax/dist/vuesax.css';
Vue.use(Vuesax);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
import store from '../js/vuex/store';
Vue.component('cardapplication', require('./components/CardApplication/CardApplicationFormComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    data:{
        cropper:{},
        destination:{},
        src:String,
        name:"",
        mobile:"",
        email:"",
        ic:"",
        branch_code:"",
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
            var ap=this;
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
              });
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
});
