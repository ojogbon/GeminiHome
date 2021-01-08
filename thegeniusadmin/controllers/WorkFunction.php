<?php


/**
 *  this is the controller method for inserting all Work
 * into the database (table name = 	Work).
 * it check key value for auth, then also test for fields emptiness, then
 * send to mainModel for the real insertion. this method
 * then return success or failure after all process.
 * @param $Work
 * @param $key
 * @param $WorkTitle
 * @param $WorkDescription
 * @param $WorkImage
 * @param $staff_id 
 * @param $category_id
 * @param $price
 ***/

function insertWork($work,$key, $WorkTitle,$WorkDescription,$WorkImage,$staff_id,$fileName){

    if ($key == "1234567opiuyt") {

        if (isEmpty([$WorkTitle,$WorkDescription,$WorkImage,$staff_id,$fileName])){
            echo "<div class='alert alert-danger'><b>Fields can't be empty!</b>   Please fill and try again</div>";
        }else{

                if($WorkImage === "video" || $WorkImage === "audio"){

                        $links = $_POST[$fileName];

                        if(isEmpty([$links])){
                            echo "<div class='alert alert-danger'><b>Link Field can't be empty!</b>   Please fill and try again</div>";
                        }else {
                            # code...
                            $added = addslashes($WorkDescription);
                            if($work->saveWork(" `work_tbl`(`id`, `staff_id`, `title`, `content`, `upload`, `path`, `date`, `status`, `delete`,`type`)",
                                "VALUES (null,'$staff_id','$WorkTitle','$added','$links',''
                                ,now(),'0','0','$WorkImage')")){
            
                                    echo "<div class='alert alert-success'><b> Congratulations!</b>  Work registered successfully</div>";
                            }else{
            
                                   echo "<div class='alert alert-danger'><b> We are very Sorry, Something happened! </b>   Please try again</div>";
                            }
                        }

                
                
                }else {
                    # code...
                    $uploaded = uploadImage ($fileName,"./loadedImage/");
                    if ( $uploaded[0] !== "TRUE" ){
                              echo $uploaded;
                    }else{
      
                        $added = addslashes($WorkDescription);
                          if($work->saveWork(" `work_tbl`(`id`, `staff_id`, `title`, `content`, `upload`, `path`, `date`, `status`, `delete`,`type`)",
                              "VALUES (null,'$staff_id','$WorkTitle','$added','$uploaded[1]','$uploaded[2]'
                              ,now(),'0','0','$WorkImage')")){
          
                                  echo "<div class='alert alert-success'><b> Congratulations!</b>  Work registered successfully</div>";
                          }else{
          
                                 echo "<div class='alert alert-danger'><b> We are very Sorry, Something happened! </b>   Please try again</div>";
                          }
                      
      
                    }
                }

          
              
         
        }
    }
}



/**
 *  this function handles the 
 *  edit of a Work details
 * 
 *  @param $Work
 *  @param $key
 *  @param $WorkTitle
 *  @param $WorkDescription
 *  @param $WorkImage
 *  @param $category_id
 *  @param $Work_id
 * 
*/

function updateWorkDtails ($Work,$key,$WorkTitle,$WorkDescription, $WorkImage,$category_id ,$Work_id,$price){


    if(!empty($key) && $key === "1234567opiuyt" ){

        if(isEmpty([$Work,$WorkTitle,$WorkImage,$WorkDescription, $Work_id,$category_id,$price])){
            echo "<div class='alert alert-danger'><b>Feilds can't be empty! </b>   Please fill up and try again</div>";
        }else{
            $uploaded = uploadImage ($foodImage,"./loadedImage/");
            if ( $uploaded[0] !== "TRUE" || $extra[0] !== "TRUE"){
                      echo $uploaded;
            }else{
                $added = addslashes($WorkDescription);
                $sql = "update Work set title = '$foodTitle', description = '$added' ,image = '$uploaded[1]' ,path = '$uploaded[2]',category_id = '$category_id',price='$price' where id = '$Work_id' ";

                 if ( $Work->UpdateFood($sql) == ""){
                    echo "<div class='alert alert-success'><b> Congratulations! </b>  Work details successfully  </div>";
                 }else{
                    echo "<div class='alert alert-danger'><b>Something Happened ! </b>   Please try again</div>";
                 }

            }
        }


    }

}