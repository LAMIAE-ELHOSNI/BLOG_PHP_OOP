<?php
class Session{
    public static function init(){
        session_start();
    }
    public static function set($key ,$value){
        $_SESSION[$value]=$key;
    }   
    public static function get($key){
        if($_SESSION[$key]){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    public static function logincheck(){
        self::init();
        if(self::get('login')==true){
            header("Location:index.php");
        }
    }
    public static function checksession(){
        self::init();
        if(self::get('login')==false){
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