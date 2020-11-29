<?php

include "call.php";

  include "TestimonialFunction.php";

 include ($_SERVER['DOCUMENT_ROOT']."/". $parent_path.'models/Testimonial.php');


function doReviewCheck () {
   

    $testimonial = new Testimonial();
    
        if(!is_ajax_resquest()){
           
            $key = "1234567opiuyt";

            if(RequestType() === 0){
                echo 88;
                echo json_encode(getAllTestimonials($testimonial));
               echo 88;
            }else{

            }
            
        
        }else{
            echo "yes nad no";
        }
}




function getAllTestimonials ($testimonial){
        return $testimonial->getAllTestimonial();
}
  doReviewCheck ();