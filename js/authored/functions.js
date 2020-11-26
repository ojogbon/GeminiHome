export class Useable {

    constructor (){
        
    }

    gatherFormData (formClassName,returnElemet) {
       console.log(8);
        var getformFileBySelector = document.querySelector(formClassName);
  
        const empty_verse = document.querySelector(returnElemet);
    
        let array = [];
        let emptyNess = 0;
    
        for (var i = 0; i < getformFileBySelector.length; i++) {
  
              if(getformFileBySelector.elements[i].type !== "submit" && getformFileBySelector.elements[i].value !== ""){
                 
                  let concatinateTagNameWithValue =   getformFileBySelector.elements[i].name + '='+getformFileBySelector.elements[i].value;
                 
                  array.push(concatinateTagNameWithValue);
                 
                  if(i === (getformFileBySelector.length - 2)){
                      empty_verse.style = "";
                      empty_verse.innerHTML = " ";
                  }
                  emptyNess = 1;
  
              }else{
                  if(getformFileBySelector.elements[i].type === "submit" ){
  
                  }else{
                      empty_verse.style = "color:#ffffff; border:1px solid; padding:5px;";
                      empty_verse.innerHTML = getformFileBySelector.elements[i].placeholder+" can't be empty";
                      array = [];
                      break;
                  }
              }
  
        }
      
        return (emptyNess === 0) ? 0 : array.join('&');
    
      }

      doAjaxCallPOST(endPointURL,onSucceedMessage,onFailedMessage) {
  
        const elements = '.empty-verse';
        const getFormData = this.gatherFormData(".this_is-my_appointment",elements);
        const reportElement = document.querySelector(elements);
        let elementToSuccess = '';

        if(getFormData !== 0){
    
            const xhr = new XMLHttpRequest();
            xhr.open('POST', endPointURL, true);
            xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
            xhr.onreadystatechange = function () {
              if (xhr.readyState == 4 && xhr.status == 200) {
    
                 if (xhr.responseText) {
                  
                   if(xhr.responseText === "1"){
                      elementToSuccess  = `<div class='alert alert-success'> ${onSucceedMessage} </div>`;
                   }else if (xhr.responseText === "-1")  {
                       console.log(xhr.responseText);
                      elementToSuccess = `<div class='alert alert-danger'> ${onFailedMessage} </div>`;
                   }
  
                   reportElement.insertAdjacentHTML("beforeend",elementToSuccess);
                 }
              }
            }
           xhr.send(getFormData);

        }else{
            elementToSuccess = `<div class='alert alert-danger'> Fields Can't be empty </div>`;
            reportElement.insertAdjacentHTML("beforeend",elementToSuccess);
        }

      }


}