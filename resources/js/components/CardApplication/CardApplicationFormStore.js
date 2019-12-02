export default{
    namespaced:true,
    state:{
        test:" this is test"
    },
    actions:{
        submitCardApplication(context,data){
            
            let FormData=new FormData();
           // console.log(FormData);
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
        }
    },
    mutations:{
    }
}