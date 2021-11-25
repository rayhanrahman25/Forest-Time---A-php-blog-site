<?php
session_start();
if(isset($_SESSION['id'])){
header("location:dashboard/index.php");
}
include "dashboard/includes/config.php";
$msg = "";
if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $sql = "SELECT * FROM users WHERE username='{$username}' AND password= '{$password}'";
   $result = mysqli_query($conn, $sql);
   if(mysqli_num_rows($result) > 0){
     $row = mysqli_fetch_assoc($result);
     $_SESSION['id'] = $row['id'];
     $_SESSION['username'] = $row['username'];
     header("location: dashboard/index.php");
   }else{
    $msg = "<div class='alert alert-danger'>Your username and password not matched</div>";  
   }
}
?>
<?php include "includes/header.php";?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-5 col-12 mx-auto">
            <?php echo $msg; ?>
            <form action="" method="POST">
              <div class="input-group mb-3">
                  <input class="form-control" name="username" type="text" value="<?php echo $_POST['username']; ?>" placeholder="Username" required>
              </div>
              <div class="input-group mb-3">
                  <input class="form-control" name="password" type="password" value="<?php echo $_POST['password']; ?>" placeholder="Password" required>
              </div>
              <div class="input-group">
                 <button type="submit" name="submit" class="btn btn-primary">Login</button>
              </div>
              <p class="pt-3">Don't have any account? <a href="register.php">Register Here</a></p>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>

