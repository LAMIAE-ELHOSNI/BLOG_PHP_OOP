<?php
include "../lip/database.php";
include "../helpers/Format.php";
class Post{
    public $db;
    public $fr;
    public function __construct()
    {
        $this->db=new Database;
        $this->fr=new Format;
    }
    public function selectCategory(){
    $query_select="SELECT * FROM category";
    $result_select=$this->db->select($query_select);
     return $result_select;

}
    public function addpost($data,$file){
      $title=$this->fr->validation($data['title']);  
      $category=$this->fr->validation($data['category']);  
      $desc=$this->fr->validation($data['desc']);  
      $type_post=$this->fr->validation($data['type']);  
      $tag=$this->fr->validation($data['tag']);  
      $type=array('jpg','png','gif','jpge');
        //first image
        $file_name=$file['img']['name'];
        $file_size=$file['img']['size'];
        $file_temp=$file['img']['tmp_name'];
        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $unique_imag=substr(md5(time()),0,10).'.'.$file_ext;
        $upload_img="upload/".$unique_imag;
        //seconde image
        $file_name_s=$file['s_img']['name'];
        $file_size_s=$file['s_img']['size'];
        $file_temp_s=$file['s_img']['tmp_name'];
        $div_s=explode('.',$file_name_s);
        $file_ext_s=strtolower(end($div_s));
        $unique_imag_s=substr(md5(rand().time()),0,10).'.'.$file_ext_s;
        $upload_img_s="upload/".$unique_imag;

        if(empty($title)||empty($category)||empty($desc)||empty($type_post)||empty($tag)){
            $error_msg="all filed must not be empty";
            return $error_msg;
        }elseif(in_array($file_ext,$type)==false){
            $error_msg="image type should be".implode(' ,',$type);
            return $error_msg;
        }elseif(in_array($file_ext_s,$type)==false){
            $error_msg="image type should be ".implode(' ,',$type);
            return $error_msg;
        }else{
            move_uploaded_file($file_temp,$upload_img);
            move_uploaded_file($file_temp_s,$upload_img_s);

            $query="INSERT INTO `post`( `title`, `category_id`, `imgone`, `descone`, `imgtow`, `desctow`, `type`, `tag`, `status`)
             VALUES ('$title','$category','$upload_img','$desc','$unique_imag_s','$desc','$type','$tag')";
             $res=$this->db->insert($query);
             $msg_success="add post with success";
             return $msg_success;
        }
    }
}
?>