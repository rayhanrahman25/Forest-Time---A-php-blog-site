<?php
session_start();
 include "includes/header.php";
 include "dashboard/includes/config.php";
 ?>
<?php
error_reporting(0);
if(isset($_SESSION['id'])){
    header("location:dashboard/index.php");
    }
if(isset($_POST['submit'])){
    $msg = "";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    if($password == $cpassword){
        $sql = "SELECT username, email FROM users WHERE username='{$username}' AND email='{$email}'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $msg = "<div class='alert alert-danger'>This username or password already exist, try something new</div>";
        }else{
            $inser_reg_data = mysqli_query($conn, "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '0')");
            if($inser_reg_data){
               $msg = "<div class='alert alert-success'>Your registraion completed sucessfully</div>";
            }else{
                $msg = "<div class='alert alert-danger'>Your registraion isn't completed, please try again</div>"; 
            }
        }
    }else{
     $msg = "<div class='alert alert-danger'>Your password isn't matched with your previous passowrd</div>";
    }
}
?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-5 col-12 mx-auto">
         <?php echo $msg ?> 
            <form action="" method="POST">
              <div class="input-group mb-3">
                  <input class="form-control" name="username" type="text" placeholder="Username" value="<?php echo $_POST['username'] ?>" required>
              </div>
              <div class="input-group mb-3">
                  <input class="form-control" name="email" type="text" placeholder="Email" value="<?php echo $_POST['email'] ?>" required>
              </div>
              <div class="input-group mb-3">
                  <input class="form-control" name="password" type="password" placeholder="Password" value="<?php echo $_POST['password'] ?>" required>
              </div>
              <div class="input-group mb-3">
                  <input class="form-control" name="cpassword" type="password" placeholder="Confirm Password" value="<?php echo $_POST['cpassword'] ?>" required>
              </div>
              <div class="input-group">
                 <button type="submit" name="submit" class="btn btn-primary">Register</button>
              </div>
              <p class="pt-3">If you have account already? <a href="login.php">Login Here</a></p>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>

