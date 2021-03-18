<?php

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();
include("config.php");

$userKey = $_POST["userKey"];

 $sql = "SELECT PERMISSION FROM USER_PERMISSION WHERE USER_KEY = '$userKey' ";
 $result = mysqli_query($db,$sql);
 $count = mysqli_num_rows($result);

 //insert Permission
 if ($count == 0)
 {
     $sql = "INSERT INTO USER_PERMISSION (USER_KEY, PERMISSION) VALUES ('".$userKey."', '1')";
     $result = mysqli_query($db,$sql);
 }
?>
