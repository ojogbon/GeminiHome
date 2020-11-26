<?php


/**
 *  this is the controller method for inserting all About
 * into the database (table name = 	about_tbl).
 * it check key value for auth, then also test for fields emptiness, then
 * send to mainModel for the real insertion. this method
 * then return success or failure after all process.
 * @param $About
 * @param $key
 * @param $header
 * @param $content
 * @param $image
 * @param $staff_id 
 ***/

function insertAbout($about,$key, $header,$content,$image,$staff_id){

    if ($key == "1234567opiuyt") {

        if (isEmpty([$header,$content,$image,$staff_id])){
            echo "<div class='alert alert-danger'><b>Fields can't be empty!</b>   Please fill and try again</div>";
        }else{
                
                $uploaded = uploadImage ($image,"./loadedImage/");
              if ( $uploaded[0] !== "TRUE" ){
                        echo $uploaded;
              }else{
                  $added = addslashes($content);
                    if($about->saveAbout(" `about_tbl`(`id`, `staff_id`, `header`, `content`, `image`, `path`, `date`, `status`, `deleted`)",
                        "VALUES (null,'$staff_id','$header','$added','$uploaded[1]','$uploaded[2]'
                        ,now(),'0','0')")){
    
                            echo "<div class='alert alert-success'><b> Congratulations!</b>  About registered successfully</div>";
                    }else{
    
                           echo "<div class='alert alert-danger'><b> We are very Sorry, Something happened! </b>   Please try again</div>";
                    }
                

              }
              
         
        }
    }
}



/**
 *  this function handles the 
 *  edit of a About details
 * 
 *  @param $About
 *  @param $key
 *  @param $AboutTitle
 *  @param $AboutDescription
 *  @param $AboutImage
 *  @param $category_id
 *  @param $About_id
 * 
*/

function updateAboutDtails ($About,$key,$AboutTitle,$AboutDescription, $AboutImage,$category_id ,$About_id,$price){


    if(!empty($key) && $key === "1234567opiuyt" ){

        if(isEmpty([$About,$AboutTitle,$AboutImage,$AboutDescription, $About_id,$category_id,$price])){
            echo "<div class='alert alert-danger'><b>Feilds can't be empty! </b>   Please fill up and try again</div>";
        }else{
            $uploaded = uploadImage ($foodImage,"./loadedImage/");
            if ( $uploaded[0] !== "TRUE" || $extra[0] !== "TRUE"){
                      echo $uploaded;
            }else{
                $added = addslashes($AboutDescription);
                $sql = "update About set title = '$foodTitle', description = '$added' ,image = '$uploaded[1]' ,path = '$uploaded[2]',category_id = '$category_id',price='$price' where id = '$About_id' ";

                 if ( $About->UpdateFood($sql) == ""){
                    echo "<div class='alert alert-success'><b> Congratulations! </b>  About details successfully  </div>";
                 }else{
                    echo "<div class='alert alert-danger'><b>Something Happened ! </b>   Please try again</div>";
                 }

            }
        }


    }

}