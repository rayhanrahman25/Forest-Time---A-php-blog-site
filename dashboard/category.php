<?php 
include "includes/header.php";
include "includes/config.php";
?>

                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Categories</h1>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        
                            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                             

                        </div>
                        <div class="card-body">
                        <?php
                              if($_GET['remove_success']=="true"){
                                  echo "<p class='alert alert-success text-center'>Record deleted successfully</p>";
                              }else{
                                 
                              }
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Category Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                          $sql = "SELECT * FROM categories";
                                          $result = mysqli_query($conn, $sql);
                                          if(mysqli_num_rows($result)>0){
                                              while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['cat_name']; ?></td>
                                            <td><?php echo $row['cat_order']; ?></td>
                                            <td>
                                                <a href="edit-category.php?edit=<?Php echo $row['id']; ?>" class="text-success"><i class="fas fa-edit" ></i></a>  |
                                                 <a href="delete-category.php?delete=<?Php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash" ></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                         }
                                          }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php include "includes/footer.php" ?>