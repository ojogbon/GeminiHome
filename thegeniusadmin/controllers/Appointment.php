<?php

include "call.php";

include ($_SERVER['DOCUMENT_ROOT']. $parent_path.'models/Appointment.php');



//$_SERVER['REQUEST_METHOD']

  function doAppointmentSaving () {
        $appointment = new Appointment();

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $dateit = $_POST["dateit"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];
        $email  = $_POST["email"];

             
            if(is_ajax_resquest()){
                $key = "1234567opiuyt";
                insertAppointment($appointment,$key, $firstname,$lastname,$dateit,$email,$phone,$message);
            }
  }


  /**
 *  this is the controller method for inserting all appointments
 * into the database (dbname = appointment_tbl).
 * it check key value for auth, then also test for fields emptiness, then
 * send to mainModel for the real insertion. this method
 * then return success or failure after all process.
 * @param $appointment
 * @param $key
 * @param $firstName
 * @param $lastName
 * @param $dateit
 * @param $emil
 * @param $stphonenumberaff_id  
 * @param $message   
 ***/

function insertAppointment($appointment,$key, $firstName,$lastName,$dateit,$email,$phonenumber,$message){

    if ($key == "1234567opiuyt") {

        if (empty($firstName)
        || empty($lastName)
        || empty($dateit)
        || empty($phonenumber)
        || empty($email)
        || empty($message)
    ){
            echo "<div class='alert alert-danger'><b>Fields can't be empty!</b>   Please fill and try again</div>";
        }else{
        
                    if($appointment->saveAppointment("`appointment_tbl`(`id`, `firstname`, `lastname`, `dateit`,
                     `phone`, `email`, `message`, `date`, `status`, `delete`) ",
                        "VALUES (null,'$firstName','$lastName', '$dateit','$phonenumber'
                        ,'$email','$message',now(),'0','0')")){
    
                            echo 1;
                    }else{
    
                           echo 0;
                    }
        }
    }
}


doAppointmentSaving ();