<?php
include "includes/header.php"; 
include "dashboard/includes/config.php";
 $msg = "";
 if(isset($_GET['id']) && isset($_GET['catid'])){
   $post_id = $_GET['id'];
   $cat_id = $_GET['catid'];
 }else{
    $msg = "<div class='alert alert-danger'>We didn't get any id form here</div>";
 }
?>


      <?php echo $msg; ?>
        <div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-leaf bg-green"></i> Blog</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                             <?php 
                                $sqll = "SELECT * FROM categories WHERE id='$cat_id '";
                                $resultt = mysqli_query($conn, $sqll);
                                if($resultt){
                                  while($cat_name_roww = mysqli_fetch_assoc($resultt)){ 
                             ?>
                             <?php
                                $post_sqll= "SELECT * FROM posts WHERE id='$post_id'";
                                $post_resultt = mysqli_query($conn, $post_sqll);
                                if($post_resultt){
                                  while($post_name_roww = mysqli_fetch_assoc($post_resultt)){ 
                             ?>
                            <div class="blog-title-area">
                                <span class="color-green"><a href="category.php" title=""><?php echo $cat_name_roww['cat_name']; ?></a></span>

                                <h3><?php echo $post_name_roww['title']; ?></h3>

                               

                                <div class="blog-meta big-meta">
                                    <small><a href="single.php" title="">21 July, 2017</a></small>
                                    <small><a href="blog-author.php" title="">by Jessica</a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                                </div><!-- end meta -->

                               
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="upload/<?php echo $post_name_roww['img']; ?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <p><?php echo $post_name_roww['description']; ?></p>
                                <?php
                                  }
                                }
                            ?>
                            </div><!-- end content -->
                           
                           <?php
                              }
                            }

                           ?>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">Jessica</a></h4>
                                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Forest Time!</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">
                           
                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                <?php
                                 $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 2";
                                 $result = mysqli_query($conn, $sql);
                                 if($result){
                                     while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="single.php" title="">
                                                    <img src="upload/<?php echo $row['img']; ?>" alt="" height="200" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <?php
                                                   $cat_id = $row['categories_id'];
                                                   $post_id = $row['id'];
                                                   $sql2 = "SELECT * FROM categories WHERE id='$cat_id'";
                                                   $result2 = mysqli_query($conn, $sql2);
                                                   if($result2){
                                                     while($row2 = mysqli_fetch_assoc($result2)){ 
                                                ?>
                                                <h4><a href="single.php?id=<?php echo $post_id; ?>&catid=<?php echo $cat_id; ?>" title=""><?php echo $row['title']; ?></a></h4>
                                                <small><a href="blog-category-01.php" title=""><?php echo $row2['cat_name']; ?></a></small>
                                                <small><a href="blog-category-01.php" title="">21 July, 2017</a></small>
                                                <?php
                                                  }  
                                                }
                                                ?>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    <?php
                                           }
                                        }
                                    ?>
                                </div><!-- end row -->
                            </div><!-- end custom-box -->
                            <hr class="invis1">
                            <hr class="invis1">
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                    
                    <?php include "includes/sidebar.php" ?>

                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <?php include "includes/footer.php" ?>