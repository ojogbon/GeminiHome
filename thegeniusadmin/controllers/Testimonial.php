<?php

include "call.php";

  include "TestimonialFunction.php";

 include ($_SERVER['DOCUMENT_ROOT']."/". $parent_path.'models/Testimonial.php');


function doReviewCheck () {
   

   $testimonial = new Testimonial();

  
             $key = "1234567opiuyt";

             if(RequestType() === 0){
                 echo json_encode(getAllTestimonials($testimonial));
    //         // }else{

     }
            
        
       
}




function getAllTestimonials ($testimonial){
        return $testimonial->getAllTestimonial();
}
  doReviewCheck ();