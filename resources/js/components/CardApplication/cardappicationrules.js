import validate from 'validate.js';
import { reject } from 'q';
const CardapplicationValidator={
    validateinput:function(input){
        //console.log(input.email==input.confirm_email);
        return new Promise((resolve,reject)=>{

        var constrains={
                ic:{
                    presence:true,
                    length:{
                        minimum:4,
                        maximum:4,
                        message:"length must be 4 digit"
                    },
                },
                mobile:{
                    presence:true,
                    format:{
                        pattern:/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/,
                        message:"number is not valid"
                        
                    }
                },
                email:{
                    presence:true
                },
                confirm_email:{
                    presence:true,
                    equality:{
                        attribute:"email",
                        message:"email in different",
                        comparator:function(email,confirm_email){
                            return email==confirm_email;
                        }
                    }
                },
                selected_branch_code:{
                    presence:{
                        attributeName :"branch name",
                        message:"please select"
                    }
                },
                image_file:{
                    presence:true
                }
        };
        validate.async(input,constrains).then((data)=>{
            resolve(data);
        })
        .catch((error)=>{
           reject(error);
        });
        });
    }
}

export{
  CardapplicationValidator
}