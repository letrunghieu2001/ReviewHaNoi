

//Định nghĩa các rules và hàm validator
function Validator(options){
  var formElement = document.querySelector(options.form);
  
  if(formElement){
    options.rules.forEach(function(rule){
      var inputElement = formElement.querySelector(rule.selector);
      var message = inputElement.parentElement.querySelector('.form--message');

      if(inputElement){
        inputElement.onblur = ()=>{
          var errorMessage = rule.test(inputElement.value);
          if(errorMessage){
            message.innerText = errorMessage;
            inputElement.parentElement.classList.add('invalid');
          }else{
            message.innerText = '';
          }
        }
      }
    })
  }
}

Validator.isRequired = function(selector){
  return{
    selector: this.selector,
    test: function(value){
      return value.trim() ? undefined : "Vui lòng nhập trường này"
    }
  }
}

Validator.isEmail = function(selector){
  return{
    selector: this.selector,
    test: function(value){

    }
  }
}

Validator.isPassWord = function(selector){
  return{
    selector: this.selector,
    test: function(){

    }
  }
}