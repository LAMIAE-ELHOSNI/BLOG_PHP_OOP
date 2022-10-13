<?php 
include "../config/config.php";
    class Database{
        public $host =HOST;
        public $user =USER;
        public $password =PASSWORD;
        public $database =DATABASE;
        public $link;
        public $error;
        public function __construct()
        {
            $this->dbconnect();
        }
        public function dbconnect(){
            $this->link=mysqli_connect($this->host,$this->user,$this->password,$this->database);
            if(!$this->link){
                $this->error="Database Connection Failed";
                return false;
            }
        }
        //query select 
        public function select($query){
            $result=mysqli_query($this->link,$query) or die($this->link->error.__LINE__);
            if($result){
                return $result;
            }else{
                return false;
            }
        }
        //inser query
        public function insert($query){
            $result=mysqli_query($this->link,$query) or die($this->link->error.__LINE__);
            if($result){
                return $result;
            }else{
                return false;
            }
        }
        //update query
        public function update($query){
            $result=mysqli_query($this->link,$query) or die($this->link->error.__LINE__);
            if($result){
                return $result;
            }else{
                return false;
            }
        }
        //delete query
        public function delete($query){
            $result=mysqli_query($this->link,$query) or die($this->link->error.__LINE__);
            if($result){
                return $result;
            }else{
                return false;
            }
        }
    }
?>