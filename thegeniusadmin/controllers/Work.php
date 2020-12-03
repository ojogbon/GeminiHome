<?php

include "call.php";

 include "WorkFunction.php";

include ($_SERVER['DOCUMENT_ROOT']."/". $parent_path.'models/Work.php');


function doWorkCheck () {

     $work = new Work();
     echo "this is work loading";
    
         if(is_ajax_resquest()){

             $key = "1234567opiuyt";
            echo $key;

             if(RequestType() === 0){
                 echo json_encode(getAllWorks($work));
    //         }else{
    //                 echo 5;
             }
            
        
         }
}

function getAllWorks ($work){
    return "1322312312312";
   // return $work->getAllWork();
}
doWorkCheck ();
