<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Contact extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("contact_msg_tbl");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveContact($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}

    public function getAllContact()
    {
        $sql = "select * from  contact_msg_tbl";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllContactBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getContactById($id)
    {
        $sql = "select * from  contact_msg_tbl where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }


}


 ?>
