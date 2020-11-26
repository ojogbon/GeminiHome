<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Work extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("work_tbl");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveWork($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllWork()
    {
        $sql = "select * from work_tbl";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllWorkBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getWorkById($id)
    {
        $sql = "select * from work_tbl where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateWork ($sql){
      $update = $this->UpdateAll($sql);
       $update;
 }

}


 ?>
