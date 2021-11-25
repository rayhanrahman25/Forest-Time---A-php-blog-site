<?php
include "includes/header.php";
include "includes/config.php";
$msg = "";
if(isset($_POST['submit'])){
    $cat_name = $_POST['cat_name'];
    $cat_order = $_POST['cat_order'];
    $sql = "INSERT INTO categories (cat_name, cat_order) VALUES ('$cat_name', '$cat_order')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $msg = "<div class='alert alert-success'>Category has been successfully created</div>";
    }else{
        $msg = "<div class='alert alert-danger'>Something Went Wrong</div>";
    }
}
?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Add Category</h1>
                    <div class="row">
                        <div class="col-md-8 mx-auto bg-white p-4 shadow">
<form action="" method="POST">
    <?php echo $msg; ?>
  <div class="form-group">
    <label for="name">Category Name</label>
    <input type="text" class="form-control" name="cat_name" id="name" required>
  </div>
  <div class="form-group ">
    <label for="name">Category Order</label>
    <input type="number" class="form-control" name="cat_order" id="order" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
  
</form>
</div>
</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php include "includes/footer.php"?>