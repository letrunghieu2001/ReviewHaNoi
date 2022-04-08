

// //Định nghĩa các rules và hàm validator
// function Validator(options){
//   var formElement = document.querySelector(options.form);
  
//   if(formElement){
//     options.rules.forEach(function(rule){
//       var inputElement = formElement.querySelector(rule.selector);
//       var message = inputElement.parentElement.querySelector('.form--message');

//       if(inputElement){
//         inputElement.onblur = ()=>{
//           var errorMessage = rule.test(inputElement.value);
//           if(errorMessage){
//             message.innerText = errorMessage;
//             inputElement.parentElement.classList.add('invalid');
//           }else{
//             message.innerText = '';
//           }
//         }
//       }
//     })
//   }
// }

// Validator.isRequired = function(selector){
//   return{
//     selector: this.selector,
//     test: function(value){
//       return value.trim() ? undefined : "Vui lòng nhập trường này"
//     }
//   }
// }

// Validator.isEmail = function(selector){
//   return{
//     selector: this.selector,
//     test: function(value){

//     }
//   }
// }

// Validator.isPassWord = function(selector){
//   return{
//     selector: this.selector,
//     test: function(){

//     }
//   }
// }

const userName = document.getElementById('fullName'),
      isPassWord = document.getElementById('password'),
      isPassWordConfirmation = document.getElementById('password-confirmation'),
      email = document.getElementById('email'),
      form = document.getElementById('form-1'),
      errorElement = document.querySelectorAll('.form__message');

      console.log(isPassWord)


  form.addEventListener('submit',(e)=>{
    e.preventDefault();

    checkInput();
  })

function checkInput(){
  //get values from input
  const userNameValue = document.getElementById('fullName').value.trim(),
      isPassWordValue = document.getElementById('password').value.trim(),
      isEmailValue = email.value.trim(),
      isPassWordConfirmationValue = document.getElementById('password-confirmation').value.trim();
  
  if(userNameValue===''){
    //show error, add error class
    setErrorFor(userName,'Username cannot be blank');
  }else{
    setSuccessFor(userName);
  }

  if(isPassWordValue===''){
    setErrorFor(isPassWord,'Password cannot be blank');
  }else{
    setSuccessFor(isPassWord);
  }

  if(isPassWordValue<=6){
    setErrorFor(isPassWord,'Password is too short');
  }else{
    setSuccessFor(isPassWord);
  }

  if(isPassWordConfirmationValue===''){
    setErrorFor(isPassWordConfirmation,'Password cannot be blank');
  }else if(isPassWordConfirmationValue!== isPassWordValue){
    setErrorFor(isPassWordConfirmation,'Password does not match');
  }else{
    setSuccessFor(isPassWordConfirmation);
  }

  if(isEmailValue===''){
    setErrorFor(email,'Email cannot be blank');
  }else if(!isEmailValue(isEmailValue)){
    setErrorFor(email,'Not a valid email');
  }else{
    setSuccessFor(email);
  }
}

function setErrorFor(input,message){
  const formInput = input.parentElement;
  const span = formInput.querySelector('span');

  span.innerText = message;
  formInput.className = 'form__group error';
}
function setSuccessFor(input){
  const formInput = input.parentElement;
  const span = formInput.querySelector('span');

  span.innerText = 'Accepted';
  span.classList.add('correct');
  formInput.className = 'form__group success';
}
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

  
  

