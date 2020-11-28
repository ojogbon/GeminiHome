
/**
 * import function for all util functions
 * to be available
 * 
*/

import {Useable} from "./functions.js";

/***
 *  @author ojogbon 11:29pm, 11-23-2020
 *  JS class to get all reviews from server. 
 * ****/

class About {

    constructor (){

    }
    
    fetchAllDocuments (endPointURL) {
        const container__ = document.querySelector(".about-all-for-it");
        const xhr = new XMLHttpRequest();
        xhr.open('GET', endPointURL, true);
        xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
        xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            
            if (xhr.responseText) {
                let response = JSON.parse(xhr.responseText);
                
                response.forEach(element => {
                    console.log(element);
                   let  vat = `
                   <div class="col-md-6 d-flex ftco-animate fadeInUp ftco-animated">
                   <div class="img img-about align-self-stretch" style="background-image: url(./thegeniusadmin/loadedImage/${element.image}); width: 100%;"></div>
                 </div>
                 <div class="col-md-6 pl-md-5 ftco-animate fadeInUp ftco-animated">
                   <h2 class="mb-4">${element.header}</h2>
                   <p>${element.content}</p>
                 </div>
                        `;

                        container__.insertAdjacentHTML("beforeend",vat);
                });
            }
            
        }

        };
    xhr.send();


    }

      doGetAllReviews (){
        this.fetchAllDocuments("./thegeniusadmin/controllers/About.php");
      }

      actionListeners () {    
            this.doGetAllReviews();
      }


}

const about = new About();
about.actionListeners();