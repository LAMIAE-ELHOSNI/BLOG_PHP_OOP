<?php include_once "inc/header.php";
include "inc/sidebar.php";
include "../classes/category.php";
$category=new Category();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=$_POST['category'];
    $res=$category->addcategory($name);
}
?>
<div class="main-content w-50 p-3">
<div class="page-content">
    <div class="container-fluid">
        <div class="">
            <h4 class="card_header">Add Category</h4>
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
                            <label class="form-label">Name Category</label>
                            <input type="text" name="category" class="form-control"  placeholder="Name Category"/>
                        </div>
                        <div>
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Add Category
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
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