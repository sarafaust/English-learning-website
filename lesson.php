<html style="height:100%">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
  <link rel="stylesheet" href="lesson.css">
   

  <title>English Demo</title>
</head>

<body style="margin:0; height:100%; max-width:100%">

<?php
    session_start();
    include("config.php");
    if(!(isset ($_POST['new_user'] )) AND (!(isset($_POST['exist_user']))))
    {
        header('Location: login.php');
        exit;
    }
    if(($_SERVER["REQUEST_METHOD"] == "POST") AND  (isset ($_POST['new_user'] )))
    {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $_SESSION['user_name'] = $_POST['username'];
      
      //check if username is already exist.
      $sql = "SELECT USER_NAME FROM USERS WHERE USER_NAME = '$myusername'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      
      //user name also exist
      if($count > 0)
      {
        $_SESSION['re_username']= 'True';
        header('Location: login.php');
        exit;
      }
      else
      {
        $sql = "INSERT INTO USERS (USER_NAME, USER_PASSWORD)
        VALUES ('".$_POST["username"]."','".$_POST["password"]."')";
        $result = mysqli_query($db,$sql);
      }
   }
   //user is exist.
   else if(isset($_POST['exist_user']))
   {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $_SESSION['user_name'] = $_POST['username'];

      $sql = "SELECT USER_NAME FROM USERS WHERE USER_NAME = '$myusername' and USER_PASSWORD = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      if($count != 1)
      {
        $_SESSION['Login_error']= 'True';
        header('Location: login.php');
        exit;
      }
   }
   $myusername = $_POST['username'];
   $english_to = $_SESSION['english_to'];
?>

    <div class="container">
        <div class="top">
            <div class="left">
                <button class="btn1"> מבחן לרמה 1  </button>
                <button class="btn1"> ציונים  </button>
                <button class="btn1"> הוראות מלאות  </button>
                <button class="btn1"> עזרה מקוצרת  </button>
            </div>
            <div class="right">
                <div class="row1">
                    <label class="label"> אנגלית <?php echo $english_to;?></label>
                    <a href="volume" ><img class="icon" src=".\assets\images\png\volT.png"></a>
                    <a href="language" ><img class="icon" src=".\assets\images\png\LangEng.png"></a>
                    <a href="print" ><img class="icon" src=".\assets\images\png\print.png"></a>
                    <a href="setting" ><img class="icon" src=".\assets\images\png\setting.png"></a>
                    <a href="help" ><img class="icon" src=".\assets\images\png\help.png"></a>
                    <a href="minimize" ><img class="icon" src=".\assets\images\png\min.png"></a>
                    <a href="closepage" ><img class="icon" src=".\assets\images\png\close.png"></a>
                </div>
                <div class="row2">
                    <label class="label2"> <?php echo $myusername;?> שלום</label>
                    <label class="label2"> הינך כעת ברמה: 1, בשיעור: 1 </label>
                </div>
            </div>
        </div>
        <div class="bottom">
            <label class="label2"> לבחירת שיעור אחר אנה בחר מהרשימה</label>
            <div class="level">
                <button class="btn1">רמה 3 <br> דקדוק</button>
                <button class="btn1"> רמה 2 <br> אוצר מילים</button>
                <button class="btn1">רמה 1 <br> קריאה    </button>
            </div>
            <div class="table">

            </div>
            <div class="level">
                <button class="btn1"> חזרה </button>
                <button class="btn1"> שאלות נוספות </button>
                <button class="btn1"> בחן את עצמך</button>
                <button class="btn1">   תירגול</button>
                <button class="btn1"> למד אותיות/מילים </button>
            </div>

        </div>



    </div>
</body>
</html>