<?php



/**
 *  this is the controller method for inserting all product
 * into the database (table name = 	product).
 * it check key value for auth, then also test for fields emptiness, then
 * send to mainModel for the real insertion. this method
 * then return success or failure after all process.
 * @param $member
 * @param $key
 * @param $firstname
 * @param $lastname
 * @param $email
 * @param $phone 
 * @param $password
 * @param $confirmpassword
 ***/

function insertMember($member,$key, $firstname, $lastname,$email,$phone,$password,$confirmpassword){

    if ($key == "1234567opiuyt") {

        if (isEmpty([$firstname,$lastname,$email,$phone,$password,$confirmpassword])){
            echo "<div class='alert alert-danger'><b>Fields can't be empty!</b>   Please fill and try again</div>";
        }else{
                
              if ( $password !== $confirmpassword ){
                        echo "Password must be Match!";
              }else{
                  $added_code = "787sdsd".rand(11111,99999)."89hsdsd";
                    if($member->saveMember("`member`(`id`, `memberCode`, `firstName`, `lastName`,
                     `email`, `password`, `phoneNumber`, `image`, `path`, `date`, `status`, `deleted`)",
                        "VALUES (null,'$added_code','$firstname','$lastname','$email','$password','$phone','',''
                        ,now(),'0','0')")){
    
                            echo "<div class='alert alert-success'><b> Congratulations!</b>  Member registered successfully</div>";
                    }else{
    
                           echo "<div class='alert alert-danger'><b> We are very Sorry, Something happened! </b>   Please try again</div>";
                    }
                

              }
              
         
        }
    }
}


/**
 * 
 *  this function handles the member login
 *  the key parameter ensure that this function 
 *  is not available to a non authorized user, while the
 *  staff tag is the unique tag given to every user at registration point.
 * 
 *  @param $member
 *  @param $key 
 *  @param $member_email 
 *  @param $member_password 
 */


function loginMember ($member,$key, $member_email,$member_password){

    if(!empty($key) && $key === "1234567opiuyt" ){
        
            if((empty($member_email) || empty($member_password)) || (empty($member_email) && empty($member_password)) ){
                    echo "<div class='alert alert-danger'><b>Feilds can't be empty!</b>  please fill and try again.</div>";
            }else{
                    $sql = "select * from member where email = '$member_email' and password = '$member_password'";
                    $member_Online = $member->getAllMemberBySql($sql);
                    if(count($member_Online) > 0){
                          $_SESSION["_Online_fullName"] = $member_Online[0]["firstName"].' '.$member_Online[0]["lastName"] ;
                          $_SESSION["member_Online_id"] = $member_Online[0]["id"];
                          echo "Successs";
                        //   echo "<script> location.replace('dashboard.php');</script>";

                    }else{
                        echo "<div class='alert alert-danger'><b>No User found for this details!</b>   Please try again</div>";
                    }
            }

    }

}



/**
 *  this function handles the 
 *  edit of a product details
 * 
 *  @param $product
 *  @param $key
 *  @param $productTitle
 *  @param $productDescription
 *  @param $productImage
 *  @param $category_id
 *  @param $product_id
 * 
*/

function updateProductDtails ($product,$key,$productTitle,$productDescription, $productImage,$category_id ,$product_id,$price){


    if(!empty($key) && $key === "1234567opiuyt" ){

        if(isEmpty([$product,$productTitle,$productImage,$productDescription, $product_id,$category_id,$price])){
            echo "<div class='alert alert-danger'><b>Feilds can't be empty! </b>   Please fill up and try again</div>";
        }else{
            $uploaded = uploadImage ($foodImage,"./loadedImage/");
            if ( $uploaded[0] !== "TRUE" || $extra[0] !== "TRUE"){
                      echo $uploaded;
            }else{
                $added = addslashes($productDescription);
                $sql = "update product set title = '$foodTitle', description = '$added' ,image = '$uploaded[1]' ,path = '$uploaded[2]',category_id = '$category_id',price='$price' where id = '$product_id' ";

                 if ( $product->UpdateFood($sql) == ""){
                    echo "<div class='alert alert-success'><b> Congratulations! </b>  Product details successfully  </div>";
                 }else{
                    echo "<div class='alert alert-danger'><b>Something Happened ! </b>   Please try again</div>";
                 }

            }
        }


    }

}