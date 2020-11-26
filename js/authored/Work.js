
/**
 * import function for all util functions
 * to be available
 * 
*/

import {Useable} from "./functions";

/***
 *  @author ojogbon 3:40pm, 11-23-2020
 *  JS class to get all reviews from server. 
 * ****/

class Work {

    constructor (){

    }
    
    fetchAllDocuments (endPointURL) {
        const container__ = document.querySelector(".work-all-for-it");
        const xhr = new XMLHttpRequest();
        xhr.open('GET', endPointURL, true);
        xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
        xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            
            if (xhr.responseText) {
                let response = JSON.parse(xhr.responseText);
                
                console.log(response);
                response.forEach(element => {

                   let  vat = `
                   <div class="col-md-4 ftco-animate fadeInUp ftco-animated">
                   <a href="#" class="work-entry">
                     <img src="./thegeniusadmin/loadedImage/${element.upload}" class="img-fluid" alt="Loading...">
                     <div class="info d-flex align-items-center">
                       <div>
                         <div class="icon mb-4 d-flex align-items-center justify-content-center">
                           <span class="icon-search"></span>
                         </div>
                         <h3>${element.title}</h3>
                       </div>
                     </div>
                   </a>
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
        console.log(767);
        this.fetchAllDocuments("./thegeniusadmin/controllers/Work.php");
      }

      actionListeners () {    
            this.doGetAllReviews();
      }


}

const work = new Work();
work.actionListeners();