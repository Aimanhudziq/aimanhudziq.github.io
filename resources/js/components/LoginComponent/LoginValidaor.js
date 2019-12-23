import validate from 'validate.js';
const loginvalidator={
  validateinput:function(input){
    return new Promise((resolve,reject)=>{
        var constrains={
            username:{
                presence:true
            },
            password:{
                presence:true
            }
        };

        validate.async(input,constrains).then((result)=>{
            resolve(result);
        }).catch((error)=>{
            reject(error);
        })
    });
  }
}

export {
    loginvalidator
}