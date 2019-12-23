<template>

<div style="margin-bottom:50px;padding:10px 10px 10px 10px;">
    <div class="row" style="margin-bottom:10px;margin-top:10px;">
       <div class="col-sm-2">
                <label for="us" style="padding-top:9px;">Username</label>
            </div>
            <div class="col-sm-8">
                 <input id="us" placeholder="Username" class="form-control">
            </div>
    </div>
    <div class="row" >
            <div class="col-sm-2">
                <label for="ps" style="padding-top:9px;">Password</label>
            </div>
            <div class="col-sm-8">
                 <input id="ps" placeholder="password" class="form-control">
            </div>
    </div>
    <div class="row" >
            <div class="col-sm-2">
                <label for="ps" style="padding-top:9px;"></label>
            </div>
            <div class="col-sm-8">
                 <button class="btn btn-success col-12 col-sm-4">Login</button>
            </div>
    </div>
</div>
</template>

<script>
    export default{
        data:function(){
            return{

            }
        },
        methods:{

        }
    }
</script>