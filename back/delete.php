<script>
  //////////Category////////////
    $(document).ready(function (){
    $('.delete_category').click(function(e){
      e.preventDefault();
      var id =$(this).val();
       //  alert(id);
          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
              Swal(
              jQuery.ajax({
                  url:'manage_category.php',
                  type:'POST',
                  data:{
                      'id':id,
                      'delete':true,
                  },
              success:function(result){
                Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Your work has been saved',
                      showConfirmButton: false,
                      timer: 3000,
                    })
                    location.reload();
                  }	
              }),
            )
          }
        })
    });
    });
    //////////Post//////////////
    $('.delete_post').click(function(e){
      e.preventDefault();
      var id =$(this).val();
        alert(id);
          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
              Swal(
              jQuery.ajax({
                  url:'manage_post.php',
                  type:'POST',
                  data:{
                      'id':id,
                      'delete':true,
                  },
              success:function(result){
                Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Your work has been saved',
                      showConfirmButton: false,
                      timer: 3000,
                    })
                    location.reload();
                  }	
              }),
            )
          }
        })
    });
    </script>