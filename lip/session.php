<?php
class Session{
    public static function init(){
        session_start();
    }
    public static function set($key ,$value){
        $_SESSION[$key]=$value;
    }   
    public static function get_ssesion($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return "false";
        }
    }
    public static function logincheck(){
        self::init();
        if(self:: get_ssesion('login')==true){
        }
    }
    public static function checksession(){
        self::init();
        if(self:: get_ssesion('login')==false){
            self::destroy();
            header("Location:login.php");        
        }
    }
   public static function destroy(){
        session_destroy();
        header("Location:login.php");
    } 

}
?>