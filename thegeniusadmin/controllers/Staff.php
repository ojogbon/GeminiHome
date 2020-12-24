<?php


$key = "";
$methods = "";

if (!empty($_GET)) {
    // code...
     $key = $_GET["key"];
     $staffId = $_GET["staff_id"];
     echo $staffId;

}else {
    // code...
    $key = "";
    $methods = "";

}





if ($methods == "insert" || $methods == "post"){
    // insertU($key,$user);
}
elseif ($methods == "selectall" || $methods == "getall"){
    $username = $_GET["username"];
    $password = $_GET["password"];
    $sql = "select id from users where email='".$username."' and password ='".$password."'";
    if(count($user->getAllUserBySql($sql)[0]) > 0){
        $_SESSION["user_id"] =  $user->getAllUserBySql($sql)[0]["id"];
        $_SESSION["user_email"] =  $username;
        echo 1;
    }else{
        echo 0;
    }
}elseif ($methods == "select" || $methods == "get"){
    $id = $_GET["id"];
    if (!empty($id)) {
        echo json_encode($user->getUserById($id));
    }else{
        echo "Not there!";
    }
}


/**
 *  this is the controller method for inserting all staffs
 * into the database (dbname = staff).
 * it check key value for auth, then also test for fields emptiness, then
 * send to mainModel for the real insertion. this method
 * then return success or failure after all process.
 * @param $staff
 * @param $key
 * @param $firstName
 * @param $lastName
 * @param $password
 * @param $confirm_password
 * @param $passport
 * @param $emil
 * @param $staff_id  
 * @param $role   
 ***/

function insertStaff($staff,$key, $firstName,$lastName,$password,$confirm_password,$passport,$email,$role,$staff_id,$phonenumber,$address,$gender,$type,$access_id){

    if ($key == "1234567opiuyt") {

        if (empty($firstName)
        || empty($lastName)
        || empty($password)
        || empty($confirm_password)
        || empty($passport)
        || empty($email)
        || empty($role)
    ){
            echo "<div class='alert alert-danger'><b>Fields can't be empty!</b>   Please fill and try again</div>";
        }else{
                $uploaded = uploadImage ($passport,"./loadedImage/");
              if ( $uploaded[0] !== "TRUE" ){
                        echo $uploaded[0];
              }else{
                // ["TRUE",$passportName,$targePath];
                if ($password != $confirm_password ){

                    echo "<div class='alert alert-danger'><b>Password not match!</b>   Please Confirm!</div>";
    
                }else {

                    if($staff->saveStaff("`staff_tbl`(`id`, `staff_id`, `firstname`, `lastname`, `email`, `password`, `phonenumber`,
                     `address`, `gender`, `type`, `access_id`, `image`, `path`, `date`, `status`, `deleted`, `role`)",
                        "VALUES (null,'$staff_id','$firstName','$lastName', '$email','$password','$phonenumber'
                        ,'$address','$gender','$type','$access_id','$uploaded[1]','$uploaded[2]'
                        ,now(),'0','0','$role')")){
    
                            echo "<div class='alert alert-success'><b> Congratulations!</b>  staff registered successfully</div>";
                    }else{
    
                           echo "<div class='alert alert-danger'><b> We are very Sorry, Something happened!</b>   Please try again</div>";
                    }
                }

              }
              
         
        }
    }
}


/**
 * 
 *  this function handles the staff login
 *  the key parameter ensure that this function 
 *  is not available to a non authorized user, while the
 *  staff tag is the unique tag given to every user at registration point.
 * 
 *  @param $staff
 *  @param $key 
 *  @param $staff_email 
 *  @param $staff_password 
 */


function loginStaff ($staff,$key, $staff_email,$staff_password){

    if(!empty($key) && $key === "1234567opiuyt" ){
            if((empty($staff_email) || empty($staff_password)) || (empty($staff_email) && empty($staff_password)) ){
                    echo "<div class='alert alert-danger'><b>Feilds can't be empty!</b>  please fill and try again.</div>";
            }else{
                    $sql = "select * from staff_tbl where email = '$staff_email' and password = '$staff_password'";
                    $staff_Online = $staff->getAllStaffBySql($sql);
                    if(count($staff_Online) > 0){
                          $_SESSION["staff_Online_fullName"] = $staff_Online[0]["firstname"] . " ".$staff_Online[0]["lastname"] ;
                          $_SESSION["staff_Online_id"] = $staff_Online[0]["id"];
                          echo "<script> location.replace('Dashboard.php');</script>";

                    }else{
                        echo "<div class='alert alert-danger'><b>No User found for this details!</b>   Please try again</div>";
                    }
            }

    }

}

/**
 *  this function handles the 
 *  edit of a user details
 * 
 *  @param $staff
 *  @param $key
 *  @param $firstname
 *  @param $lastname 
 *  @param $passport
 *  @param $role
 *  @param $staff_id
 * 
*/

function updateStaffDtails ($staff,$key,$firstname,$lastname,$passport,$role, $staff_to_edit_id){


    if(!empty($key) && $key === "1234567opiuyt" ){
        
        if(isEmpty([$staff,$firstname,$lastname,$passport,$role, $staff_to_edit_id])){
            echo "<div class='alert alert-danger'><b>Feilds can't be empty!</b>   Please try again</div>";
        }else{
            $uploaded = uploadImage ($passport,"./loadedImage/");
            if ( $uploaded[0] !== "TRUE" ){
                echo "787878877878gvgh";
                      echo $uploaded;
            }else{
                $sql = "update staff set firstName = ' $firstname',
                 lastName = '$lastname', image = '$uploaded[1]', path = '$uploaded[2]', role = '$role' where id = '$staff_to_edit_id' ";

                 if ( $staff->UpdateStaff($sql) == ""){
                    echo "<div class='alert alert-success'><b> Congratulations!</b>  staff details successfully updated </div>";
                 }else{
                    echo "<div class='alert alert-danger'><b>Something Happened !</b>   Please try again</div>";
                 }

            }
        }


    }

}









 


?>
