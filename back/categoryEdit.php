<?php include_once "inc/header.php";
include "inc/sidebar.php";
include "../classes/category.php";
$category=new Category();
if(isset($_GET['id'])){
$id= base64_decode($_GET['id']); 
$val=$category->selectvalue($id);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id= base64_decode($_GET['id']); 
    $name=$_POST['category'];
    $res=$category->updatecategory($id,$name);
}

?>
<div class="main-content w-50 p-3">
<div class="page-content">
    <div class="container-fluid">
        <div class="">
            <h4 class="card_header">Update Category</h4>
            <div class="card">
                <div class="card-body">
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
                    <form class="custom-validation"  method="POST">
                        <div class="mb-3">
                            <label class="form-label">Update Category</label>
                            <?php if($val){
                                    while($res=mysqli_fetch_assoc($val)){ ?>
                            <input type="text" name="category" class="form-control" value="<?php echo $res['name'];?>" placeholder="Name Category"/>
                            <?php }}?>
                        </div>
                        <div>
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                   Update
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Back
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end row -->
<?php include "inc/footer.php";?>           