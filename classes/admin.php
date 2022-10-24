<?php
include_once "../lip/database.php";
include_once "../lip/session.php";
class Admin{
    private $db;
    public function __construct()
    {
        $this->db=new Database;
    }
    public function DisplayAdmin(){
      $id= Session::get_ssesion('admin_id');
         if($id!=false){
            $query="SELECT * FROM `admin` WHERE id='$id'";
            $result_select=$this->db->select($query);
            return $result_select;
          }else{
            return false;
          }
    }
}

