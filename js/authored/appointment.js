
/**
 * import function for all util functions
 * to be available
 * 
*/

import {Useable} from "./functions.js";



class Appointment {
    constructor() {
     
    }
  
    sendToAppoint() {
      
      const reuseable = new Useable();
  
      const getFormData = reuseable.gatherFormData(".this_is-my_appointment",'.empty-verse');
  
   
      const url = `./thegeniusadmin/controllers/Appointment.php`;
          const xhr = new XMLHttpRequest();
          xhr.open('POST', url, true);
          xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
          xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
          xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
  
               if (xhr.responseText) {
                let elementToSuccess = '';
                
                 if(xhr.responseText === "1"){
                    elementToSuccess  = "<div class='alert alert-success'><b> Congratulations!</b>  Appointment sent successfully</div>";
                 }else {
                    elementToSuccess = "<div class='alert alert-danger'><b> We are very Sorry, Something happened!</b>   Please try again</div>";
                 }

                 document.querySelector(".empty-verse").insertAdjacentHTML("beforeend",elementToSuccess);
               }
            }
          }
         xhr.send(getFormData);
    }


    
  
   actionListeners () {
    
        document.querySelector(".myorder_btn").addEventListener('click',eve => {
                eve.preventDefault();
                this.sendToAppoint ();
        });


    }
}


  const appoint = new Appointment () ;
  appoint.actionListeners();
  