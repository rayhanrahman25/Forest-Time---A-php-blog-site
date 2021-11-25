<?php
$host = "127.0.0.1";
$username = "root";
$password = "mysql";
$database = "forest_time";

$conn = mysqli_connect($host,$username,$password,$database);
if(!$conn){
    die("<script>alert('database connection failed')</script>");
}