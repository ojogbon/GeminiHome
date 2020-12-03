<?php

include "call.php";

  include "TestimonialFunction.php";

 include ($_SERVER['DOCUMENT_ROOT']."/". $parent_path.'models/Testimonial.php');


function doReviewCheck () {
   

   $testimonial = new Testimonial();
   echo "this is Testimonial loading";
  
             $key = "1234567opiuyt";

             if(RequestType() === 0){
                 echo json_encode(getAllTestimonials($testimonial));
    //         // }else{
        echo "koko koko koko";
     }
            
        
       
}




function getAllTestimonials ($testimonial){
      return "23wesadsdafass";
      //  return $testimonial->getAllTestimonial();
}
  doReviewCheck ();