<?php include_once "inc/header.php";
include_once "inc/slider.php";
include_once "../classes/post.php";
$post= new Post();
$post = $post->displayPost_front();
?>
     <section class="site-section pt-5 pb-5">
      </section>
      <!-- END section -->

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
              <?php while($row=mysqli_fetch_assoc($post)){?>
                      <div class="col-md-6">
                        <a href="blog-single.php?singlePost=<?= base64_encode($row['id']);?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                          <img src="../back/upload/<?=$row['imgone'];?>" alt="Image placeholder" style=" width:100%; height: 230px;">
                          <div class="blog-content-body">
                            <div class="post-meta">
                              <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                              <span class="mr-2"><?php echo $row['date_created'];?></span> &bullet;
                              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                            </div>
                            <h2><?php echo $row['title']; ?></h2>
                          </div>
                        </a>
                      </div>
                <?php }?>                     
              </div>
            </div>
            <!-- END main-content -->
<?php include "inc/sidebar.php";?>
            <!-- END sidebar -->
          </div>
        </div>
      </section>
 <?php include "inc/footer.php";?>