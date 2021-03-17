<?php

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();
include("config.php");


$sql = "INSERT INTO USER_POINTS (USER_KEY, CATEGORY, LEVEL,LESSON, POINTS)
VALUES ('".$_POST["userKey"]."','".$_POST["category"]."','".$_POST["level"]."','".$_POST["lesson"]."','".$_POST["points"]."')";
$result = mysqli_query($db,$sql);
echo $result;
?>