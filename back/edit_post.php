<?php
include_once "inc/header.php";
include "inc/sidebar.php";
include "../classes/post.php";
$post_edit=new Post();
$category_post=$post_edit->selectCategory();
if(isset($_GET['id'])){
    $id= base64_decode($_GET['id']); 
    $post=$post_edit->selectPost($id);
    if($post){
     while($row=mysqli_fetch_assoc($post)){
        $title=$row['title'];
        $category=$row['category_id'];
        $imgone=$row['imgone'];
        $descrption=$row['content'];
        $imgtow=$row['imgtow'];
        $tags=$row['tag'];
    }   
}
    
if(isset($_POST['submit'])){
    if(isset($_GET['id'])){
      $id=base64_decode($_GET['id']);
     $res=  $post_edit->postupdate($id,$_POST,$_FILES);       
    }
}    
}

?>
<div class="main-content w-55 p-3">
<div class="page-content">
    <div class="container-fluid">
        <div class="container">
            <h4 class="card_header">Add Post</h4>
              <span>
                    <?php
                        if(isset($res)){
                    ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo $res?>
                    </div>
                    <?php
                        }
                    ?>
                </span>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <?php 
                            ?>
                            <div class="card-body">
                                <div class="mb-3 ">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Enter the title" name="title" value="<?php echo $title;?>">
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <label class="col-md-2 col-form-label">Select Category</label>
                                    <div class="col-md-12">
                                     <select class="form-select" name="category">
                                            <option disabled selected value>select an option</option>
                                         <?php while($row_cat=mysqli_fetch_assoc($category_post)){
                                                if($row_cat['id']==$category){?>
                                                    <option selected value="<?php echo $row_cat['id'];?>"><?php echo $row_cat['name'];?></option>
                                         <?php }else{?>
                                                    <option value="<?php echo $row_cat['id'];?>"><?php echo $row_cat['name'];?></option>
                                            <?php } ?>   
                                        <?php }?>            
                                                    
                                               
                                      </select>

                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <label for="example-text-input" class="col-md-2 col-form-label" >Image</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="file" name="img" value="<?php echo $imgone; ?>">
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <label for="example-text-input" class="col-md-2 col-form-label" >Descrption</label>
                                    <div class="card">
                                            <textarea id="classic-editor" name="content"><?php echo $descrption;?></textarea>        
                                    </div>
                                </div>

                      
                                <div class="mb-3 ">
                                    <label for="example-text-input" class="col-md-2 col-form-label" >Seconde Image</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="file" name="s_img" value="<?php echo $imgtow;?>">

                                    </div>
                                </div>


                                <div class="mb-3 ">
                                    <label class="col-md-2 col-form-label">Post Type</label>
                                    <div class="col-md-12">
                                        <select class="form-select" name="type">
                                            <option>Select</option>
                                            <option value="1">Post</option>
                                            <option value="0">Don't Post</option>
                                        </select>
                                    </div>
                                </div>                                            

                                <div class="mb-3 ">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Tag</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="tag" value="<?php echo $tags;?>">
                                    </div>
                                </div>                               
                            </div>

                        </div>
                      <button type="submit" class="btn btn-primary w-md col-md-3 w-55" name="submit">Submit</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end row -->
<?php  //include "inc/footer.php";?>     
        <!-- ckeditor -->
        <script src="assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

        <!--tinymce js-->
        <script src="assets/libs/tinymce/tinymce.min.js"></script>

        <!-- init js -->
        <script src="assets/js/pages/form-editor.init.js"></script>   
 <script>
        ClassicEditor
        .create( document.querySelector( '#classic-editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>   