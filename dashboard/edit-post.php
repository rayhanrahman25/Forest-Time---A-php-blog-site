<?php
include "includes/header.php";
include "includes/config.php";
if(isset($_GET['edit'])){
  $post_id = $_GET['edit'];
}else{
    echo "<script>window.location.replace('posts.php');</script>";
}
$msg = "";
if(isset($_POST['submit'])){
   $title = $_POST['title'];
   $description = $_POST['description'];
   $cat_id = $_POST['category'];
   $img_name = rand().$_FILES['img'] ['name'];
   $img_tmp_name = $_FILES['img']['tmp_name'];
   $img_size = $_FILES['img']['size'];
   if($img_size > 1024*1024*5){
       $msg = "<div class='alert alert-danger'>Image size is big try to upload less 5MB</div>";
     
   }else{
     $sql = "UPDATE posts SET title='$title', description='$description', img='$img_name', old_img='$img_name', categories_id='$cat_id' WHERE id='$post_id' LIMIT 1";
     $result = mysqli_query($conn, $sql);
     if($result){
       move_uploaded_file($img_tmp_name, "../upload/".$img_name);
       $msg = "<div class='alert alert-success'>Post  successfully Updated </div>";
      
     }else{
      $msg = mysqli_error_list($conn);
     }
   }
}
?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Edit Post</h1>
                    <div class="row">
                        <div class="col-md-8 mx-auto bg-white p-4 shadow">
<form action="" method="POST" enctype="multipart/form-data">
    <?php echo $msg;
      $sql1 = "SELECT * FROM posts WHERE id='$post_id'";
      $result1 = mysqli_query($conn, $sql1);
      if(mysqli_num_rows($result1)>0){
          while($row1 = mysqli_fetch_assoc($result1)){
    
    ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="<?php echo $row1['title']; ?>" required>
  </div>
  <div class="form-group ">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" rows="5" id="description"  required><?php echo $row1['description']; ?></textarea>
  </div>
  <div class="form-group ">
   <select class="form-control" name="category" required>
       <?php
        $show_cat_query = "SELECT * FROM categories";
        $cat_result = mysqli_query($conn, $show_cat_query);
        if(mysqli_num_rows($cat_result)>0){
            while($cat_row = mysqli_fetch_assoc($cat_result)){
       ?>
     <option <?php if($row1['categories_id'] == $cat_row['id']){echo "selected";} ?> value="<?php echo $cat_row['id'] ?>" ><?php echo $cat_row['cat_name'] ?></option>
     <?php
        }
    }
     ?>
   </select>
  </div>
  <div class="form-group">
    <label for="img">Image</label>
    <input type="file" accept="image/*" class="" name="img" id="img" required>
  </div>
  <?php
     }}
  ?>
  <button type="submit" name="submit" class="btn btn-primary">Update Post</button>
  
</form>
</div>
</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php include "includes/footer.php"?>