
/**
 * import function for all util functions
 * to be available
 * 
*/

import {Useable} from "./functions.js";

/***
 *  @author ojogbon 3:40pm, 11-23-2020
 *  JS class to get all reviews from server. 
 * ****/

class Review {

    constructor (){

    }
    
    fetchAllDocuments (endPointURL) {
        const container__ = document.querySelector(".reviws-all-for-it");
        const xhr = new XMLHttpRequest();
        xhr.open('GET', endPointURL, true);
        xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
        xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            
            if (xhr.responseText) {
              console.log(99999999999999999999999999)
                console.log(xhr.responseText);
                let response = JSON.parse(xhr.responseText);
                
                response.forEach(element => {

                   let  vat = `
                   <div class="col-lg-3 d-flex mb-sm-4 ftco-animate fadeInUp ftco-animated">
                   <div class="staff">
                         <div class="img mb-4" style="background-image: url(thegeniusadmin/loadedImage/${element.image});"></div>
                         <div class="info text-center">
                             <h3><a href="teacher-single.html">${element.name}</a></h3>
                             <span class="position">${element.occupation}</span>
                             <div class="text">
                               <p>${element.content}</p>
                           </div>
                         </div>
                   </div>
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
        this.fetchAllDocuments("./thegeniusadmin/controllers/Testimonial.php");
      }

      actionListeners () {    
            this.doGetAllReviews();
      }


}

const review = new Review();
review.actionListeners();