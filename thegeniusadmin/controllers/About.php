<?php

include "call.php";

include "AboutFunction.php";

include ($_SERVER['DOCUMENT_ROOT']."/". $parent_path.'models/About.php');


function doAboutCheck () {
    
    $about = new About();

        if(is_ajax_resquest()){

            $key = "1234567opiuyt";


            if(RequestType() === 0){
                echo json_encode(getAllAbouts($about));
            }else{
                
            }
            
        }
}




function getAllAbouts ($about){
        return $about->getAllAbout();
}
doAboutCheck ();