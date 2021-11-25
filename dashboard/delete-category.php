<?php
session_start();
include "includes/config.php";

$deleteID = $_GET['delete'];

if(isset($deleteID)){
    if($_SESSION['username'] =='hello'){
     $sql = "DELETE FROM categories WHERE id='$deleteID'";
     $result = mysqli_query($conn, $sql);
     if($result){
         header("location:category.php?remove_success=true");
     }else{
        header("location:category.php?remove_success=false");
     }
    }
}