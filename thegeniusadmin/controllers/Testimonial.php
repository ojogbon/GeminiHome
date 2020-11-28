<?php

include "call.php";

  include "TestimonialFunction.php";

 include ($_SERVER['DOCUMENT_ROOT']."/". $parent_path.'models/Testimonial.php');


function doReviewCheck () {
   

    $testimonial = new Testimonial();
    echo 999999;
        if(is_ajax_resquest()){
            echo 88899999;
            $key = "1234567opiuyt";


            if(RequestType() === 0){
                echo json_encode(getAllTestimonials($testimonial));
            }else{
                    echo 5;
            }
            
        
        }else{
            echo 11111;
        }
}




function getAllTestimonials ($testimonial){
        return $testimonial->getAllTestimonial();
}
  doReviewCheck ();