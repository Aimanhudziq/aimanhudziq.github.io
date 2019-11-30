export default{
    namespaced:true,
    state:{
        test:" this is test"
    },
    actions:{
        submitCardApplication(context,data){
            console.log(data);
        }
    },
    mutations:{
        SET_TEST(state,test){
            state.test=test;
        }
    }
}