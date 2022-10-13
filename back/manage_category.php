<?php include_once "inc/header.php";
include "inc/sidebar.php";
include "../classes/category.php";
$category=new Category();
$result=$category->selectCategory();
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $res=$category->deletecategory($id);
}
?>
<div class="main-content w-70 p-3">
<div class="page-content">
<div class="container-fluid">
                
<div class="card">
<div class="card-body">
<h4 class="card-header">Manage Category</h4>
<div class="table-responsive">
    <table class="table table-editable table-nowrap align-middle table-edits m-0"  id="editableTable">
        <thead>
            <tr>
                <th>np</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  while($row=mysqli_fetch_assoc($result)){ ?>

                        <tr>
                            <td class="col-md-2">np</td>
                            <td class="col-md-2"><?php echo $row['name'];?></td>
                            <td class="col-md-2">Stauts</td>
                            <td class="col-md-2">
                                <a class="btn btn-success" title="Edit" href="categoryEdit.php?id=<?php echo base64_encode($row['id']) ;?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger delete_category" title="Edit" value="<?php echo $row['id'] ;?>"> <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>                        
            <?php } ?>   
        </tbody>
        </table>
    </div>

      </div>
        </div>

        </div>
    </div>
</div>
<?php include "inc/footer.php";
include "delete.php";
?>
 <!-- Table Editable plugin -->
 <script src="assets/libs/table-edits/build/table-edits.min.js"></script>

<script src="assets/js/pages/table-editable.int.js"></script> 

<!-- App js -->
<script src="assets/js/app.js"></script>
