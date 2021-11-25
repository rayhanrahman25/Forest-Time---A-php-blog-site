<?php include "includes/header.php"; $cat_id = $_GET['catid'];?>

        <div class="page-title wb">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <?php
                          
                            $category_sql = "SELECT * FROM categories WHERE id='$cat_id' ";
                            $cat_sql_result = mysqli_query($conn, $category_sql);
                            if($cat_sql_result){
                            while($cat_sql_row = mysqli_fetch_assoc($cat_sql_result)){
                        ?>
                        <h2><i class="fa fa-leaf bg-green"></i> Category by: <?php echo $cat_sql_row['cat_name']; ?></h2>
                        
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active"><?php echo $cat_sql_row['cat_name']; ?></li>
                        </ol>
                    </div><!-- end col -->   
                    <?php
                            }}
                        ?>                 
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->
        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                        <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                                <img src="upload/banner_05.jpg" alt="" class="img-fluid">
                                            </div><!-- end banner-img -->
                                        </div><!-- end banner -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <hr class="invis"> 
                            <div class="blog-list clearfix">
                                <!-- first loop start -->
                                 <?php
                                $result_per_page = 6;
                                $sql3='SELECT * FROM posts WHERE categories_id=10';
                                $result3 = mysqli_query($conn,$sql3);
                                $number_of_results = mysqli_num_rows($result3);
                                $number_of_pages = ceil($number_of_results/$result_per_page);
                                 
                                if(!isset($_GET['page'])){
                                $page = 1;
                                }else{
                                $page = $_GET['page'];
                                }
                                $this_page_first_result = ($page-1)*$result_per_page;
                                
                                      //$indoor_query = 'SELECT * FROM  posts LIMIT ' . $this_page_first_result . ',' .  $result_per_page;
                                      $indoor_query = "SELECT * FROM  posts WHERE categories_id='$cat_id' LIMIT  $this_page_first_result ,".$result_per_page;
                                      $indoor_result = mysqli_query($conn, $indoor_query);
                                       if($indoor_result){
                                           while($indoor_row = mysqli_fetch_assoc($indoor_result)){
                                 ?>

                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="single.php" title="">
                                                <img src="upload/<?php echo $indoor_row['img']; ?>" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                    <?php
                                   $in_cat_id = $indoor_row['categories_id'];
                                   $in_cat_name_query = "SELECT * FROM categories WHERE id='$in_cat_id' ";
                                   $in_cat_name_result = mysqli_query($conn, $in_cat_name_query);
                                   if($in_cat_name_result){
                                   while($in_cat_name_row = mysqli_fetch_assoc($in_cat_name_result)){

                           
                                    ?>
                                        <span class="bg-aqua"><a href="category.php" title=""><?php echo $in_cat_name_row['cat_name']; ?></a></span>
                                        <h4><a href="single.php?id=<?php echo $indoor_row['id']; ?>&catid=<?php echo $in_cat_name_row['id']; ?>" title=""><?php echo $indoor_row['title']; ?></a></h4>
                                        <p><?php echo $indoor_row['description']; ?></p>
                                        <small><a href="category.php" title=""><i class="fa fa-eye"></i> <?php echo rand(100,9999); ?></a></small>
                                        <small><a href="single.php?id=<?php echo $indoor_row['id']; ?>" title="">11 July, 2017</a></small>
                                        <small><a href="#" title="">by Matilda</a></small>
                                     <?php
                                   }}
                                     ?>

                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">
                              
                                <?php 
                                           }}
                                ?>
                                  
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">
                         <?php



                         ?>
                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <?php
                                         for($page= 1; $page<=$number_of_pages; $page++){
                                        ?>
                                          <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                                        <?php
                                         }
                                        ?>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                    <?php include "includes/sidebar.php" ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
<?php include "includes/footer.php" ?>