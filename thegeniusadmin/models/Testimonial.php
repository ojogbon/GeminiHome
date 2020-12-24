<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Testimonial extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("Testimonial");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveTestimonial($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllTestimonial()
    {
        $sql = "select * from testimonial_tbl";
          
        
        $result = $this->db->getAll($sql);
      
            return $result;
    }

    public function getAllTestimonialBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getTestimonialById($id)
    {
        $sql = "select * from testimonial_tbl where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateTestimonial ($sql){
      $update = $this->UpdateAll($sql);
       $update;
 }

}


 ?>
