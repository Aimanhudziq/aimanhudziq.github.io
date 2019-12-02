export default{
    namespaced:true,
    state:{
    },
    actions:{
        submitCardApplication(context,data){
            return new Promise((resolve,reject)=>{
                axios.post('api/maybank/submit_card_application',{
                    full_name:data.name,
                    phone_no:data.mobile,
                    email:data.email,
                    ic_no:data.ic,
                    image_file:data.image_file,
                    branch_code:data.selected_branch_code
                  })
                  .then(function (response) {
                    resolve(response);
                  })
                  .catch(function (error) {
                    reject(error);
                  });
            });
            
        },
    },
    mutations:{
    },
    getters:{
    }
}