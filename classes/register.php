<?php
include "../lip/database.php";
include "../helpers/Format.php";
include "../php_mailer/PHPMailer.php";
include "../php_mailer/Exception.php";
include "../php_mailer/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class register{
    public $db;
    public $fr;
    public function __construct()
    {
        $this->db=new Database;
        $this->fr=new Format;
    }
    public function adduser($data){
        // function  sendemail_varifi($name,$email,$v_token){
        //     $mail = new PHPMailer(true);
        //     $mail->isSMTP();
        //     $mail->SMTPAuth   = true;  


        // }
      $name=$this->fr->validation($data['name']);
      $email=$this->fr->validation($data['email']);
      $phone=$this->fr->validation($data['phone']);
      $password=$this->fr->validation($data['password']);
      $v_token=md5(rand());
        if(empty($name)||empty($email)||empty($phone)||empty($password)){
            $error="filed must not to be empty";
            return $error;
        }else{
            $e_query="select * from admin where email='$email'";
            $check_email=$this->db->select($e_query);
            if($check_email>0){
              $error="this email is alerdy exisit";
              return $error;
              header("Location:register.php");
            }else{
                $inser_query="INSERT INTO `admin`( `admin_name`, `email`, `phone`, `password`, `v_token`) VALUES ('$name','$email','$phone','$password','$v_token')";
                $insert_admin_user=$this->db->insert($inser_query);
                if($insert_admin_user){
                    // sendemail_varifi($name,$email,$v_token);
                    $message_success="create account successfull check your email to varifi your account you can login to your account";
                    return $message_success;
                }else{
                    $error="error";
                    return $error;
                }
            }
        }
    }
}
?>