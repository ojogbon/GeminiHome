
/**
 * import function for all util functions
 * to be available
 * 
*/

import {Useable} from "./functions.js";

/***
 *  @author ojogbon 2:12pm, 11-23-2020
 *  JS class to send all client contact message to 
 *  the server. 
 * ****/

class Contact {

    constructor (){

    }
  
      /**
       * save all contact us message to the database 
       *  - prevent default 
       *  - create new reuseable object 
       *  - get endpoint url ready for use
       *  - send contact message to the back end via ajax    
      */

      doSendContactForm = (eve) =>{
        eve.preventDefault();
        const reuseable = new Useable();
        const url = `./thegeniusadmin/controllers/Contact.php`;

        reuseable.doAjaxCallPOST (url,"<b> Congratulations!</b>  We will get back ASAP","<b> We are very Sorry, Something happened! </b>   Please try again");
      }
      

      actionListeners () {    
        document.querySelector(".contact_btn").addEventListener('click',eve => this.doSendContactForm(eve));

      }


}

const contact = new Contact();
contact.actionListeners();