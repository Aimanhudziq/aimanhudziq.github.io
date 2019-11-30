
<script>
    import {mapState} from 'vuex';
    export default {
       computed:{
           ...mapState({
                companylist:state=>state.CardApplicationFormStore.companylist,
            })
       }
    }
</script>



<template>
<div>
    <vs-row>
    <vs-col vs-type="flex" vs-justify="left" vs-align="center" vs-w="12">
       {{test}}
    </vs-col>  
    </vs-row>
    <vs-row>
    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="6">
        
    </vs-col>
  <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="6">
      
  </vs-col>
</vs-row>
    
</div>

</template>

