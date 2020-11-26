<?php
//include 'Dbh.php';
include "DbHandler.php";
/**
 *
 */
class MainModel
{

    public $db = null;
    public function __construct()
    {
        $this->db = new DbHandler();
    }

    public function login($username, $password, $table)
    {
    $sql = "SELECT * FROM $table WHERE `email` = '$username'";
    $user = $this->db->getOne($sql);

    //If $row is FALSE.
    if($user === false){
        die('Incorrect username / password combination!');
    } else{
        $validPassword = password_verify($password, $user['password']);

        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            return $user;


        }
      }
  }

protected function insertToTables($table,$values) {
     $sql = " INSERT INTO ".$table.$values;
     $insert = $this->db->executeGetId($sql);
     if ($insert) {
       return true;
     }else {
       return false;
    }
  }

    public function UpdateAll($sql)
    {

        $users = $this->db->execute($sql);

        return $users;
    }


}


 ?>
