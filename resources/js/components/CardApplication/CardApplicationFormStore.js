const state={
    test:"this is test"
}
const mutations={
    SET_TEST(state,test){
        state.test=test;
    }
}
const getters={
    GET_TEST(state){
        return state.test;
    }
}
const actions={

}

export default{
    namespaced:true,
    state:{
        test:" hello"
    },
    action:{

    }
}