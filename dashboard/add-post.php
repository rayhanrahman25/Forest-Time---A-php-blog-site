<?php
include "includes/header.php";
include "includes/config.php";
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
     $sql = "INSERT INTO posts (title, description, img, old_img,  categories_id) VALUES ('$title', '$description', '$img_name', 'old_img', '$cat_id')";
     $result = mysqli_query($conn, $sql);
     if($result){
       move_uploaded_file($img_tmp_name, "../upload/".$img_name);
       $msg = "<div class='alert alert-success'>Post added successfully</div>";
       $_POST['title'] = "";
       $_POST['description'] = "";
       $_POST['category'] = "";
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
                    <h1 class="h3 mb-4 text-gray-800 text-center">Add Post</h1>
                    <div class="row">
                        <div class="col-md-8 mx-auto bg-white p-4 shadow">
<form action="" method="POST" enctype="multipart/form-data">
    <?php print_r($msg) ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="<?php echo $_POST['title']; ?>" required>
  </div>
  <div class="form-group ">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" rows="5" id="description" value="<?php echo $_POST['title']; ?>" required></textarea>
  </div>
  <div class="form-group ">
   <select class="form-control" name="category" required>
       <?php
        $show_cat_query = "SELECT * FROM categories";
        $cat_result = mysqli_query($conn, $show_cat_query);
        if(mysqli_num_rows($cat_result)>0){
            while($cat_row = mysqli_fetch_assoc($cat_result)){
       ?>
     <option <?php if($_POST['category'] == $cat_row['id']){echo "selected";} ?> value="<?php echo $cat_row['id'] ?>" ><?php echo $cat_row['cat_name'] ?></option>
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
  <button type="submit" name="submit" class="btn btn-primary">Add Post</button>
  
</form>
</div>
</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php include "includes/footer.php"?>