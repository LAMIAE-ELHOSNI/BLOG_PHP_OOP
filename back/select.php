<?php 
  include "../classes/post.php";
  if(isset($_POST["emp_id"]))  
  {
      $output = '';
        $id=$_POST["emp_id"];
        $select=new Post();
        $res_select=$select->viewPost($id);
      $output .= '<div class="table-responsive">  
      <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($res_select))  
      {  
        if($row["type"]==1){
            $status="<div class='badge bg-pill bg-soft-success font-size-12'>published</div>";
        }else{
            $status="<div class='badge bg-pill bg-soft-danger font-size-12'>unpublished</div>";
        }
           $output .= '  
                <tr>  
                     <td width="30%"><label>Title Post</label></td>  
                     <td width="70%">'.$row["title"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Image One </label></td>  
                     <td width="70%"><img src="upload/'.$row['imgone'].'"alt="image one" class="img-fluid"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Description</label></td>  
                     <td width="70%">'.$row["content"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Image Two</label></td>  
                     <td width="70%"><img src="upload/'.$row['imgtow'].'"alt="image one" class="img-fluid"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Category</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Tags</label></td>  
                     <td width="70%">'.$row["tag"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Status</label></td> 
                     <td width="70%">'.$status.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>DateCreated</label></td>  
                     <td width="70%">'.$row["date_created"].'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
  
  
  
  
    }
?>