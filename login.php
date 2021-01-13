
<html style="height:100%">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="englishWeb.css">

  <title>English Demo</title>
</head>

<script>
    localStorage.setItem('AudioMode', 'true');
</script>
<script src="englishWeb.js"></script>

<?php
include("config.php");
 session_start();
 $english_to = "למתחילים";

 if(isset ($_POST['business']))
 {
     $english_to="לאוניברסיטה";
 }

 if(isset($_POST['students']))
 {
     $english_to="לתלמידים";
 }

 if(isset ($_POST['beginners']))
 {
     $english_to="למתחילים";
 }
  $_SESSION['english_to'] = $english_to;

  if($_SESSION['re_username'] == 'True')
  {
    // username and password sent from form
    $_SESSION['re_username']= 'False';
    $message = "This username already exist, please insert new one.";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }

  if($_SESSION['Login_error'] == 'True')
  {
    // username and password sent from form
    $_SESSION['Login_error']= 'False';
    $message = "Error. username or password is incorrect, Please insert again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>

<body style="margin:0; height:100%; max-width:100%">


    <div class="container">
        <div class="row1">
                    <a  href="" onclick="changeAudioModeBtn()"><img class="serviceBtn" src=".\assets\images\png\volT.png"></a>
                    <a href="" onclick="languegeModeBtn()" ><img class="serviceBtn" src=".\assets\images\png\LangEng.png"></a>
                    <a href="" onclick="infoBtn()" ><img class="serviceBtn" src=".\assets\images\png\help.png"></a>
                    <a href="" onclick="closeBtn()"  ><img class="serviceBtn" src=".\assets\images\png\close.png"></a>
        </div>
        <div class="header">
            <label>עמוד כניסה</label>
        </div>
        <div class="row3">
            <div class="login">

                    <form action="lesson.php" method="post">
                    <label class="label"> :משתמש חדש</label>
                    <br> <br>
                    <input class="input" type="text"  name='username' placeholder="אנא בחר שם משתמש" required>
                    <br> <br>
                    <input class="input" type="password"  name='password'  placeholder="אנא בחר סיסמא" required>

                    <br> <br>
                   <input class="btn1" type="submit" name="new_user" value="הירשם">


                </form>
            </div>
            <div class="login">
                    <form action="lesson.php" method="post">
                    <label class="label"> :משתמש קיים</label>
                    <br> <br>
                    <input class="input" type="text"  name='username'  placeholder="שם משתמש" required>
                    <br> <br>
                    <input class="input" type="password"  name='password' placeholder="סיסמא" required>

                    <br> <br>
                   <input class="btn1" type="submit" name="exist_user" value="כניסה">


                </form>


            </div>
        </div>

    </div>
</body>
</html>