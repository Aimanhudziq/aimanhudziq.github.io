import validate from 'validate.js';
import { reject } from 'q';
const CardapplicationValidator={
    validateinput:function(input){
        //console.log(input.email==input.confirm_email);
        return new Promise((resolve,reject)=>{

        var constrains={
                ic:{
                    presence:true,
                    numericality:{
                        message:"input is not a  number"
                    },
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
                        message:"^%{value} is not valid"
                        
                    }
                },
                email:{
                    presence:true,
                    email:{
                        message:"^%{value} is not valid"
                    }
                },
                confirm_email:{
                    presence:{},
                    email:{
                        message:"^%{value} is not valid"
                    },
                    equality:{
                        attribute:"email",
                        message:"^email in different",
                        comparator:function(email,confirm_email){
                            return email==confirm_email;
                        }
                    }
                },
                selected_branch_code:{
                    presence:{
                        message:"^Branch Name is not selected"
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