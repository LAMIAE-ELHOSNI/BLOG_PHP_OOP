<?php
include "../lip/database.php";
include "../helpers/Format.php";
class Category{
    public $db;
    public $fr;
public function __construct(){
   $this->db=new Database();
   $this->fr=new Format();
}
public function addcategory($name){
    $name=$this->fr->validation($name);
    if(empty($name)){
        $error="Field must not be empty";
        return $error;
    }else{
        $select_query="select * from category where name ='$name'";
        $result=$this->db->select($select_query);
          if(mysqli_num_rows($result)>0){
            $error2="Category is alerdy exist";
            return $error2;
        }else{
        // $insert_query="INSERT INTO category('name') VALUES('$name')";
           $insert_query="INSERT INTO category(name) VALUES ('$name')";
            $result_insert=$this->db->insert($insert_query);
            if($result_insert){
                $message_success="category add successfull";
                return $message_success;
            }else{
                $message_error="something went wrong";
                return $message_error;
            }
        }
    }
}
public function selectCategory(){
    $query_select="SELECT * FROM category";
    $result_select=$this->db->select($query_select);
     return $result_select;

}
public function updatecategory($id,$name){
    $name=$this->fr->validation($name);
    if(empty($name)){
        $error="Field must not be empty";
        return $error;
    }else{
        $query_update="UPDATE `category` SET `name`='$name' WHERE id='$id'";
        $res_update=$this->db->insert($query_update);
            if($res_update){
                $message_success="category update successfull";
                return $message_success;
            }else{
                $message_error="something went wrong";
                return $message_error;
            }
    }    
}
public function deletecategory($id){
    $query_delete="DELETE FROM `category` WHERE id='$id'";
    $result_delete=$this->db->delete($query_delete);
     return $result_delete;
}
public function selectvalue($id){
    $query_select="SELECT name FROM category where id ='$id'";
    $res=$this->db->select($query_select);
     return $res;
}
 }
?>