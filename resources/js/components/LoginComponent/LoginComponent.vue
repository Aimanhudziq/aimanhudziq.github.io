<template>

<div style="margin-bottom:50px;padding:10px 10px 10px 10px;">
    <form method="POST" action="/demo/login" id="formlogin">
        <input name="_token" v-model="csrf" type="hidden"/>
        <div class="row" style="margin-bottom:10px;margin-top:10px;">
       <div class="col-sm-2">
                <label for="us" style="padding-top:9px;">Username</label>
            </div>
            <div class="col-sm-8">
                 <input id="us" placeholder="Username" name="username" class="form-control" v-model="username">
            </div>
    </div>
    <div class="row" >
            <div class="col-sm-2">
                <label for="ps" style="padding-top:9px;">Password</label>
            </div>
            <div class="col-sm-8">
                 <input id="ps" placeholder="password" type="password" class="form-control" v-model="password" name="password">
            </div>
    </div>
    </form>
    <div class="row" >
            <div class="col-sm-2">
                <label for="ps" style="padding-top:9px;"></label>
            </div>
            <div class="col-sm-8">
                 <button class="btn btn-success col-12 col-sm-4" @click="submitCredential()">Login</button>
            </div>
    </div>
</div>
</template>

<script>
import {loginvalidator} from './LoginValidaor'
export default {
        data:function(){
            return {
                username:"",
                password:"",
                csrf:document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        methods:{
            submitCredential:function(){
                var input={
                    username:this.username==""?null:this.username,
                    password:this.password==""?null:this.password
                }
                
                loginvalidator.validateinput(input).then((result)=>{
                    document.getElementById("formlogin").submit();
                }).catch((error)=>{
                    alert("error");
                })
            }
        }
}
</script>