<?php
session_start();
include "includes/config.php";

$deleteID = $_GET['delete'];

if(isset($deleteID)){
    if($_SESSION['username'] =='hello'){
     $sql = "DELETE FROM posts WHERE id='$deleteID'";
     $result = mysqli_query($conn, $sql);
     if($result){
         header("location:post.php?remove_success=true");
     }else{
        header("location:post.php?remove_success=false");
     }
    }
}