<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Staff extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("contact");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveStaff($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllStaff()
    {
        $sql = "select * from staff_tbl";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllStaffBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getStaffById($id)
    {
        $sql = "select * from staff_tbl where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateStaff ($sql){
      $update = $this->UpdateAll($sql);
       $update;
 }

}


 ?>
