<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class About extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("about_tbl");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveAbout($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllAbout()
    {
        $sql = "select * from about_tbl";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllAboutBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAboutById($id)
    {
        $sql = "select * from about_tbl where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateAbout ($sql){
      $update = $this->UpdateAll($sql);
       $update;
 }

}


 ?>
