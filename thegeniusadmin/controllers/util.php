<?php

function isEmpty ($inputs){
    $index = 0;
    foreach($inputs as $input){

        if(empty($input)){
        return true ;
        break;
        }else {
            if($index === count($inputs)){
            return false ;
            break;
            }else{
                continue;
            }
        }
        $index++;
    }
}


/**
 *  this function handles image upload
 *  it takes input attribute name and destination path
 *  as parameter 
 *  
 *  @param $passport
 *  @param $path
*/

function uploadImage ($passport,$path)
{

            $passportName = $_FILES[$passport]["name"];
            $passportTmpName = $_FILES[$passport]["tmp_name"];
            $passportSize = $_FILES[$passport]["size"];
            $targePath = $path.$passportName;

            $imageFileType = strtolower(pathinfo($targePath,PATHINFO_EXTENSION));

            

            if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" ||  $imageFileType != "gif"){

        
                if( $passportSize < 500000){

                   if (move_uploaded_file($passportTmpName, $targePath)){

                     return ["TRUE",$passportName,$targePath];
                   }else{
                    return ["<div class='alert alert-danger'><b> We are very Sorry, Something happened!</b>   Please try again</div>"];   
                   }



                }else{
                   
                    return ["<div class='alert alert-danger'><b> Sorry, your file is too large!</b>   Please try another image with smaller size</div>"];
                }

            }else{
                
                return ["<div class='alert alert-danger'><b>Sorry, only JPG, JPEG, PNG & GIF files are allowed!</b>   Please try an Image file instead</div>"];

            }

}

/**
 *  sum price 
 *  loop through and 
 *  sum all price in the array 
 * @param $arrays
 * 
*/
function arraySumUp ($arrays){
    $sumUp = 0;
    foreach($arrays as $array){
        $sumUp +=$array["price"];
    }
    return $sumUp;

}


/**
 *  convert strings to sql by
 *  converting strings into an array by spliting strings by ','   
 *  then concatination string to convert it sql
 * @param $strings
 * 
*/
function stringToSql ($strings) {

        $sql = "select name,shortNane from product where ";

    $arrays = explode(",",$strings); 
    $counts = count($arrays);  
    $counter = 1 ;
    $string = "";


   foreach($arrays as $array){
       $e = (int)$array + 1;

       if($array !== ","){
           if($e !== 1 ){
               if($counter < $counts){
                   $string .= " id = ".$array." or ";
               }else if(  $counter == $counts){

                   $string .= " id = ".$array;
               }
           }
       }
       $counter++;    
   }

   return $sql.$string;

}



/**
 *  check if it is an ajax request
 * 
 * **/

function is_ajax_resquest () {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

/***
 *  get request type
 * **/
function RequestType()
{
    # code...
    return $_SERVER['REQUEST_METHOD'] === 'POST' ? 1 : 0;
}

