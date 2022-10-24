<?php
include_once "../lip/database.php";
include_once "../helpers/Format.php";
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
      $content=$this->fr->validation($data['content']);  
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
        $upload_img_s="upload/".$unique_imag_s;

        if(empty($title)/*||empty($category)||empty($desc)||empty($type_post)||empty($tag)*/){
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

            $query="INSERT INTO `post`( `title`, `category_id`, `imgone`, `content`, `imgtow`,`type`, `tag`) VALUES ('$title','$category','$unique_imag','$content','$unique_imag_s','$type_post','$tag')";
             $this->db->insert($query);
             $msg_success="post added with success";
             return $msg_success;
        }
    }
    public function deletePost($id){
          $query_delete="DELETE FROM `post` WHERE id='$id'";
          $result_delete=$this->db->delete($query_delete);
          return $result_delete;
    }
    public function postupdate($id,$info,$img){
      $title=$this->fr->validation($info['title']);  
      $category=$this->fr->validation($info['category']);  
      $content=$this->fr->validation($info['content']);  
      $type_post=$this->fr->validation($info['type']);  
      $tag=$this->fr->validation($info['tag']);  
      $type=array('jpg','png','gif','jpge');
        //first image
        $file_name=$img['img']['name'];
        $file_size=$img['img']['size'];
        $file_temp=$img['img']['tmp_name'];
        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $unique_imag=substr(md5(time()),0,10).'.'.$file_ext;
        $upload_img="upload/".$unique_imag;
        //seconde image
        $file_name_s=$img['s_img']['name'];
        $file_size_s=$img['s_img']['size'];
        $file_temp_s=$img['s_img']['tmp_name'];
        $div_s=explode('.',$file_name_s);
        $file_ext_s=strtolower(end($div_s));
        $unique_imag_s=substr(md5(rand().time()),0,10).'.'.$file_ext_s;
        $upload_img_s="upload/".$unique_imag_s;

        if(empty($title)/*||empty($category)||empty($desc)||empty($type_post)||empty($tag)*/){
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

            $query="UPDATE `post` SET `title`='$title',`category_id`='$category',`imgone`='$unique_imag',`content`='$content',`imgtow`='$unique_imag_s',`type`='$type_post',`tag`='$tag' WHERE id='$id';";
            $update=  $this->db->insert($query);
            if($update){
             $msg_success="post updated with success";
             return $msg_success;                
            }else{
                $msg_error="somthing went wrong";
                return $msg_error ;  
            }

        }
    }
    public function selectPost(){
        $query_select="SELECT p.*,c.name FROM post p,category c where c.id=p.category_id";
        $result_select=$this->db->select($query_select);
         return $result_select;
    }
    public function viewPost($id){
        $query_select="SELECT p.*,c.name FROM post p,category c where c.id=p.category_id and p.id=$id";
        $result_select=$this->db->select($query_select);
         return $result_select;
    }
    public function displayPost_front(){
        $query_select="SELECT p.*,c.name FROM post p,category c where c.id=p.category_id and p.type='1'";
        $result_select=$this->db->select($query_select);
         return $result_select;
    }
    public function viewSinglePost($id){
        $query_select="SELECT p.*,c.name FROM post p,category c where c.id=p.category_id and p.id=$id and p.type='1'";
        $result_select=$this->db->select($query_select);
         return $result_select;
    }

}
?>