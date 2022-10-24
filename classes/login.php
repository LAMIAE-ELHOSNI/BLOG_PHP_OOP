<?php
include_once "../lip/database.php";
include_once "../helpers/Format.php";
include_once "../lip/session.php";
Session::logincheck();
class login{
    public $db;
    public $fr;
    public function __construct()
    {
        $this->db=new Database;
        $this->fr=new Format;
    }
    public function checklogin($email,$password){
      $email=$this->fr->validation($email);
      $password=$this->fr->validation($password);
      if(empty($email)||empty($password)){
        $error="filed must be not empty";
        return $error;
      }else{
        $query_select="SELECT * FROM admin where email='$email' and password='$password'";
        $result =$this->db->select($query_select);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            // if($row['v_status']=1){ until activate php
                Session::set('login',true);
                Session::set('admin_id',$row['id']);
                header("Location:index.php");
            // }else{
            //     $error_message="varifi your email first please";
            // }
        }else{
            $error="invalide username or password";
            return $error;
        }
      }
    }
}
?>

