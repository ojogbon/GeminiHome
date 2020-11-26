<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class  Appointment extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("appointment_tbl");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveAppointment($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllAppointment()
    {
        $sql = "select * from   appointment_tbl";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllAppointmentBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAppointmentById($id)
    {
        $sql = "select * from  appointment_tbl where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateAppointment ($sql){
      $update = $this->UpdateAll($sql);
       $update;
 }

}


 ?>
