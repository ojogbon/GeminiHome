<?php
    include "call.php";


    include ($_SERVER['DOCUMENT_ROOT']. $parent_path.'models/Staff.php');
    include ($_SERVER['DOCUMENT_ROOT']. $parent_path.'models/Work.php');
    include ($_SERVER['DOCUMENT_ROOT']. $parent_path.'models/Contact.php');
    include ($_SERVER['DOCUMENT_ROOT']. $parent_path.'models/Appointment.php');
    include ($_SERVER['DOCUMENT_ROOT']. $parent_path.'models/Member.php');
    include ($_SERVER['DOCUMENT_ROOT']. $parent_path.'models/Testimonial.php');
    include ($_SERVER['DOCUMENT_ROOT']. $parent_path.'models/About.php');
    


    
    $staff = new Staff();
    $work = new Work();
    $contact = new Contact();
    $appointment = new Appointment();
    $member = new Member();
    $testimonial = new Testimonial();
    $about = new About();

    if(!empty($_GET) ){
        $key = $_GET["key"];
        $actionType = $_GET["action_type"];
        $functionType = $_GET["function_type"];
         
        if ($functionType === "user"){
            
            $staff_id = $_GET["staff_id"];

                    if($actionType === "suspend")
                    suspendStaff ($staff,$key, $staff_id);
                else deletedStaff($staff,$key, $staff_id);

        }elseif($functionType === "search"){

            $filterby = $_GET["filterby"];
            filterByAlphabet ($fruilts,$key,$filterby);
        }
        else if ($functionType === "foods"){
            $food_id = $_GET["food_id"];
            deletedFood ($food,$key, $food_id);
        }
  
    }

    if(count($_SESSION) > 1){
        if(isset($_SESSION["staff_Online_fullName"])){
            $staff_Online_fullName =  $_SESSION["staff_Online_fullName"];
            $staff_Online_id =  $_SESSION["staff_Online_id"] ;
            // $staff_Online_role = $_SESSION["staff_Online_role"];
            // $staff_Online_passport =  $_SESSION["staff_Online_passport"];
        }
    
    }
    




     /**
     *  this funtion handles product removal,
     *  it takes product object, authentication key and product To Be Deleted ID
     *  it first of all confirms if user is authorized to use the function 
     *  then also check if product object and product Id is not empty, it then update 
     *  product table by setting delted = 1
     *  @param   $product
     *  @param   $key 
     *  @param   $staff_id 
     * 
    */


    function deletedFood ($product,$key, $product_id){


        if(!empty($key) && $key === "1234567opiuyt" ){
    
            if(empty($product) || empty($product_id)){
                echo "<div class='alert alert-danger'><b>Feilds can't be empty!</b>   Please try again</div>";
            }else{
        
                    $sql = "update food_tbl set deleted =  '1' where id = '$$product_id' ";
    
                     if ( $product->UpdateProduct($sql) == ""){
                        echo "success";
                     }else{
                        echo "<div class='alert alert-danger'><b>Something Happened !</b>   Please try again</div>";
                     }
    
               
            }
    
    
        }
    
    }


    /**
     * Filter fruit or smoothies by 
     * Alphabet
     * @param $fruilts
     * @param $key
     * @param $filterby 
     * 
    */
    function filterByAlphabet ($fruilts,$key,$filterby){

        $sql = "";
        if($filterby === "*"){
            $sql = "select * from product where type='fruit' and  deleted ='0' order by name asc ";
        }else {
            $sql = "select * from product where type='fruit' and  deleted ='0' and name LIKE '$filterby%'  order by name asc ";    
        }
        
        $list_of_fruit =  $fruilts->getAllProductBySql($sql);     

        echo json_encode($list_of_fruit);
    }

    
/**
 *  this is the controller method for inserting all checkout
 * into the database (table name = 	check_out_tbl).
 * it check key value for auth, then also test for fields emptiness, then
 * send to mainModel for the real insertion. this method
 * then return success or failure after all process.
 * @param $checkout
 * @param $key
 * @param $phone
 * @param $email
 * @param $name
 * @param $address 
 * @param $address_1
 * @param $state
 * @param $country
 * @param $cart
 * 
 ***/

function insertCheckout($checkout,$key, $phone,$email,$name,$address,$address_1,$state,$country,$cart){

    if ($key == "1234567opiuyt") {

        if (isEmpty([$phone,$email,$name,$address,$address_1,$state,$country,$cart])){
            echo "<div class='alert alert-danger'><b>Fields can't be empty!</b>   Please fill and try again</div>";
        }else{
                    if($checkout->saveCheckout("`check_out_tbl`(`id`, `phone`, `email`, `name`,
                     `address`, `address_1`, `state`, `country`, `cart`, `date`, `status`, `deleted`)  ",
                        "VALUES (null,'$phone','$email','$name','$address','$address_1','$state','$country','$cart'
                        ,now(),'0','0')")){
    
                            echo "<div class='alert alert-success'><b> Congratulations!</b>  Checked out successfully</div>";
                    }else{
    
                           echo "<div class='alert alert-danger'><b> We are very Sorry, Something happened! </b>   Please try again</div>";
                    }
        }
    }
}

    include "central_function.php";