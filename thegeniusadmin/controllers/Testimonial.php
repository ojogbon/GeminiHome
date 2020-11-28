<?php

include "call.php";

  include "TestimonialFunction.php";

 include ($_SERVER['DOCUMENT_ROOT']."/". $parent_path.'models/Testimonial.php');


function doReviewCheck () {
   

    $testimonial = new Testimonial();
    
        if(!is_ajax_resquest()){
           
            $key = "1234567opiuyt";

            if(RequestType() === 0){
                echo "  --99 ".getAllTestimonials($testimonial)+89;
                echo json_encode(getAllTestimonials($testimonial));
                echo 886666666666999;
            }else{

                    echo 55555555555;
            }
            
        
        }else{
            echo 11111;
        }
}




function getAllTestimonials ($testimonial){
            echo 56556555665;
        return $testimonial->getAllTestimonial();
}
  doReviewCheck ();