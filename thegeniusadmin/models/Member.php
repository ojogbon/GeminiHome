<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Member extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("member");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function savemember($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllMember()
    {
        $sql = "select * from member";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllMemberBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getMemberById($id)
    {
        $sql = "select * from member where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateMember ($sql){
      $update = $this->UpdateAll($sql);
       $update;
 }

}


 ?>
