<?php

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();
include("config.php");

$userKey = $_POST["userKey"];
$usercategory = $_POST["usercategory"];
$userlevel = $_POST["userlevel"];

// SELECT LESSON, POINTS FROM `USER_POINTS` WHERE `USER_KEY`= 'metilda12345' AND `CATEGORY`='0' AND `LEVEL`='0'
 $sql = "SELECT LESSON, POINTS FROM USER_POINTS WHERE USER_KEY = '$userKey' AND CATEGORY = '$usercategory' AND LEVEL ='$userlevel'";
 $result = mysqli_query($db,$sql);
 $lessonNum = '';
 $lessonPoints = '';
 while ($row = $result->fetch_assoc()) {
    $lessonNum =  $lessonNum."@".$row['LESSON'];
    $lessonPoints =  $lessonPoints."@".$row['POINTS'];
}

 $result = $lessonNum."#######".$lessonPoints;
 echo $result;
?>
