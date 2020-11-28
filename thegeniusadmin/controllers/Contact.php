<?php


include "call.php";

include ($_SERVER['DOCUMENT_ROOT']."/". $parent_path.'models/Contact.php');


function doContactSending () {
    $contact = new Contact();

    $name = $_POST["yourname"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $email  = $_POST["youremail"];

         
        if(is_ajax_resquest()){
            $key = "1234567opiuyt";
            insertContact($key,$contact,$name,$email,$subject,$message);
        }
}




    /***
     *  this is the controller method for inserting all contact
     * into the database (dbname = contactus).
     * it check key value for auth, then also test for fields emptiness, then
     * send to mainModel for the real insertion. this method
     * then return success or failure after all process.
     * @Param Key,Transaction object
    ***/

function insertContact($key,$contact,$name,$email,$subject,$message){

    if ($key == "1234567opiuyt") {
         
         if (empty($name)
            || empty($email)
             || empty($subject)
             || empty($message)
           ){
                    echo -1;
                    
            }else{
                            if($contact->saveContact("`contact_msg_tbl`(`id`, `fullname`, `email`, 
                            `subject`, `message`, `date`, `status`, `deleted`)",
                            "VALUES (null,'$name','$email','$subject','$message',now(),'0','0')")){
                                echo 1;
                            }else{
                                echo 0;
                            }
        }
    }
}

doContactSending();


?>
