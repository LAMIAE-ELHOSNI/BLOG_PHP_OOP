

<?php
 include_once "inc/header.php";
include "inc/sidebar.php";
include "../classes/post.php";
$post= new Post();
$category_post=$post->selectCategory();
$result=$post->selectPost();
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $res=$post->deletePost($id);
}
?>
<div class="main-content w-70 p-3">
<div class="page-content">
<div class="container-fluid">
                
<div class="card">
<div class="card-body">
<h4 class="card-header">Manage Post</h4>
<div style="margin:2%;">
   <button type="button" class="btn btn-success waves-effect waves-light mb-3">Add customers</button> 
</div>

<div class="table-responsive">
    <table class="table table-editable table-nowrap align-middle table-edits m-0"  id="editableTable">
        <thead>
            <tr>
                <th>np</th>
                <th>Title Post</th>
                <!-- <th>Short Descrption</th> -->
                <th>Category</th>
                <th>Tags</th>
                <th>Status</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  while($row=mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td class="col-md-2">np</td>
                    <td class="col-md-2">
                        <a href="">
                            <img src="upload/<?php echo $row['imgone']; ?>" alt="" class="avatar-xs rounded-circle me-2">
                            <span><?php echo $row['title'];?></span>                            
                        </a>
                    </td>
                    <td class="col-md-2"><?php echo $row['name'];?></td>
                    <td class="col-md-2"><?php echo $row['tag'];?></td>
                    <td class="col-md-2"><?php if($row['type']==1){echo "<div class='badge bg-pill bg-soft-success font-size-12'>published</div>";}else{echo "<div class='badge bg-pill bg-soft-danger font-size-12'>unpublished</div>";}?></td>

                    <td class="col-md-2"  style="text-align: center;">
                        <a class="btn btn-success" title="Edit" href="edit_post.php?id=<?php echo base64_encode($row['id']) ;?>">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger delete_post" title="Delete" value="<?php echo $row['id'] ;?>"> <i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-primary button-view"  id='<?php echo $row["id"] ?> 'data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="far fa-eye"></i></button>

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



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="myModal">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">POST</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
           
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  
 <!-- Table Editable plugin -->
 <script src="assets/libs/table-edits/build/table-edits.min.js"></script>

<script src="assets/js/pages/table-editable.int.js"></script> 

<!-- App js -->
<script src="assets/js/app.js"></script>
 <?php include "inc/footer.php";
include "delete.php";
?>

<script>
$(document).ready(function(){
    $('.button-view').click(function(){
  id_emp = $(this).attr('id')
        $.ajax({url: "select.php",
        method:'post',
        data:{emp_id:id_emp},
         success: function(result){
    $(".modal-body").html(result);
  }});
        $('#myModal').modal("show");
    })
})
</script>
