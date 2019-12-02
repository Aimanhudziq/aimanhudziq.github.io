export default{
    namespaced:true,
    state:{
    },
    actions:{
        submitCardApplication(context,data){
            
           let form=new FormData();
           console.log(data);
             var ap=this;
            axios.post('/maybank/addCardApplication', {
                full_name: ap.name,
                phone_no:ap.mobile,
                email:ap.email,
                ic_no:ap.ic,
                image_file:ap.image_file,
                branch_code:ap.branch_code
              })
              .then(function (response) {
                ap.pageRedirect(response.data);
              })
              .catch(function (error) {
                console.log(error);
              });
        },
    },
    mutations:{
    },
    getters:{
    }
}