<?php
include "includes/header.php";
include "includes/config.php";
$editId = $_GET['edit'];
$msg = "";
if(isset($_POST['submit'])){
    $cat_name = $_POST['cat_name'];
    $cat_order = $_POST['cat_order'];
    $sql = "UPDATE categories SET cat_name='$cat_name', cat_order='$cat_order' WHERE id='$editId'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $msg = "<div class='alert alert-success'>Category has been successfully Updated</div>";
    }else{
        $msg = "<div class='alert alert-danger'>Something Went Wrong</div>";
    }
}
?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Update Category</h1>
                    <div class="row">
                        <div class="col-md-8 mx-auto bg-white p-4 shadow">
<form action="" method="POST">
    <?php echo $msg; 
      $sql = "SELECT * FROM categories WHERE id='$editId'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
    ?>
  <div class="form-group">
    <label for="name">Category Name</label>
    <input type="text" class="form-control" name="cat_name" id="name" value="<?php echo $row['cat_name']; ?>" required>
  </div>
  <div class="form-group ">
    <label for="name">Category Order</label>
    <input type="number" class="form-control" name="cat_order" id="order" value="<?php echo $row['cat_order']; ?>" required>
  </div>
  <?php
          }
        }
  ?>
  <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
  
</form>
</div>
</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php include "includes/footer.php"?>