<?php
 include "dashboard/includes/config.php";
?>
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Search</h2>
                                <form class="form-inline search-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search on the site">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    <?php
                                    
                                      $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 3";
                                      $result = mysqli_query($conn, $sql);
                                      if($result){
                                          while($row = mysqli_fetch_assoc($result)){
                                      ?>
                                      <?php
                                        $cat_id = $row['categories_id'];
                                        $post_id = $row['id'];
                                        $sql2 = "SELECT * FROM categories WHERE id='$cat_id'";
                                        $result2 = mysqli_query($conn, $sql2);
                                        if($result2){
                                            while($row2 = mysqli_fetch_assoc($result2)){ 
                                       ?>
                                        <a href="single.php?id=<?php echo $post_id; ?>&catid=<?php echo $cat_id; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="upload/<?php echo $row['img']; ?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1"><?php echo $row['title']; ?></h5>
                                                <small>12 Jan, 2016</small>
                                            </div>
                                        </a>

                                        <?php
                                        }}
                                        ?>
                                        <?php
                                         }}
                                        ?>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Advertising</h2>
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_04.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title text-center">Featured Image Gallery</h2>
                                <div class="instagram-wrapper clearfix">
                                    <?php 
                                    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 9";
                                    $result = mysqli_query($conn, $sql);
                                    if($result){
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <a href="#"><img src="upload/<?php echo $row['img']; ?>" alt="" class="img-fluid"></a>
                                    <?php
                                        }}
                                    ?>
                                </div><!-- end Instagram wrapper -->
                            </div><!-- end widget -->
                            <div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                               
                                    <ul>
                                        <?php
                                        $sql2 = "SELECT * FROM categories ORDER BY id DESC LIMIT 7";
                                        $result2 = mysqli_query($conn, $sql2);
                                        if($result2){
                                            while($row2 = mysqli_fetch_assoc($result2)){ 
                                        ?>
                                        <li>
                                            <a href="index.php"><?php echo $row2['cat_name']; ?> <span>
                                            <?php
                                            $categories_id = $row2['id'];
                                            $sql = "SELECT COUNT(*) FROM posts WHERE categories_id='$categories_id'";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                             while($row = mysqli_fetch_array($result)){

                                            ?>
                                            (<?php  echo $row[0]  ?>)
                                           <?php
                                               }}
                                           ?>
                                        </span>
                                         </a>
                                        </li>
                                       <?php
                                        }}
                                       ?>
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
        