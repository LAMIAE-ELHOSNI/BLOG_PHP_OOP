<?php include_once "inc/header.php";
include "inc/sidebar.php";
include "../classes/post.php";
$post=new Post();
$category_post=$post->selectCategory();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $add=$post->addpost($_POST,$_FILES);
}
?>
<div class="main-content w-55 p-3">
<div class="page-content">
    <div class="container-fluid">
        <div class="container">
            <h4 class="card_header">Add Post</h4>
             <span>
                    <?php
                        if(isset($add)){
                    ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo $add?>
                    </div>
                    <?php
                        }
                    ?>
                </span>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3 ">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" value="Artisanal kale" name="title">
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <label class="col-md-2 col-form-label">Select Category</label>
                                    <div class="col-md-12">
                                     <select class="form-select" name="category">
                                         <?php while($row=mysqli_fetch_assoc($category_post)){?>
                                            <option disabled selected value>select an option</option>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                         <?php }?>
                                      </select>

                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <label for="example-text-input" class="col-md-2 col-form-label" >Image</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="file" name="img">
                                    </div>
                                </div>

                                <div class="mb-3 ">
                                    <label for="example-text-input" class="col-md-2 col-form-label" >Descrption</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="classic-editor"></div>
                                        </div>
                                            <textarea id="elm1" name="desc"></textarea>        
                                    </div>
                                </div>

                      
                                <div class="mb-3 ">
                                    <label for="example-text-input" class="col-md-2 col-form-label" >Seconde Image</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="file" name="s_img">
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
                                        <input class="form-control" type="text" name="tag">
                                    </div>
                                </div>                               

                                <!-- <div class="mb-3 ">
                                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Date and time</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="example-color-input" class="col-md-2 col-form-label">Tags</label>
                                    <div class="col-md-10">
                                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#5b73e8" title="Choose your color">
                                    </div>
                                </div> -->

                            </div>
                            
                        </div>
                      <button type="submit" class="btn btn-primary w-md col-md-3 w-55">Submit</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end row -->
<?php include "inc/footer.php";?>     
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