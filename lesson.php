<html style="height:100%">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="lesson.css">
  <link rel="stylesheet" href="englishWeb.css">

  <title>English Demo</title>
</head>

<body style="margin:0; height:100%; max-width:100%" >
<script src="englishWeb.js"></script>

<?php
    //for back page
    header('Cache-Control: no cache'); //no cache
    session_cache_limiter('private_no_expire'); // works

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
   $xml=simplexml_load_file("XMLLessons.xml");
    //levels;
    $lesson_level1 = $xml->xpath('//Levels/LevelsHeb/Level1/Lesson');
    $lessons_string1 = "";
    foreach( $lesson_level1 as $lesson )
    {
        $lessons_string1=$lessons_string1.(string)$lesson."@@@";
    }

    $lesson_level2 = $xml->xpath('//Levels/LevelsHeb/Level2/Lesson');
    $lessons_string2 = "";
    foreach( $lesson_level2 as $lesson )
    {
        $lessons_string2=$lessons_string2.(string)$lesson."@@@";
    }
    $lesson_level3 = $xml->xpath('//Levels/LevelsHeb/Level3/Lesson');
    $lessons_string3 = "";
    foreach( $lesson_level3 as $lesson )
    {
        $lessons_string3=$lessons_string3.(string)$lesson."@@@";
    }

?>
<script src="dictionary.js"></script>

<?php
    $xml=simplexml_load_file("XmlDictionary.xml");

    $englishWords = $xml->xpath('//WORDS/word');
    //run over all word in Dict
    $englishWordsList = "";
    $englishWordsOtherFormatList = "";
    $hebWordTransList = "";
    $ArbWordTransList = "";

    foreach($englishWords as $item) {
        $englishWordsList=$englishWordsList.(string)$item->EnglishWord."@@@";
        if($item->OtherForms)
        {
            $englishWordsOtherFormatList=$englishWordsOtherFormatList.(string)$item->OtherForms."@@@";
        }
        else
        {
            $englishWordsOtherFormatList=$englishWordsOtherFormatList.(string)"-"."@@@";
        }
        $hebWordTransList=$hebWordTransList.(string)$item->Heb."@@@";
        $ArbWordTransList=$ArbWordTransList.(string)$item->Arb."@@@";
    }
?>


    <div class="container">
        <div class="top">
            <div class="left">
                <button class="btn1" id="testBtnID"> מבחן לרמה   </button>
                <button class="btn1" id="gradsBtnID"  onclick="showGrads()"> ציונים  </button>
                <button class="btn1" onclick="fullInstructions()"> הוראות מלאות  </button>
                <button class="btn1" onclick="helperForBegginsPage()"> עזרה מקוצרת  </button>
            </div>
            <div class="right">
                <div class="row1">
                    <label class="label" id="lessonTitleID"> אנגלית </label>
                    <a onclick="changeAudioModeBtn()" title="שמע" ><img class="serviceBtn" src=".\assets\images\png\volT.png"></a>
                    <a onclick="languegeModeBtn()"  title="שפה"><img class="serviceBtn" src=".\assets\images\png\LangEng.png"></a>
                    <a onclick="printPageBtn()" title="הדפס"><img class="serviceBtn" src=".\assets\images\png\print.png"></a>
                    <a onclick="settingBtn()" title="הגדות"><img class="serviceBtn" src=".\assets\images\png\setting.png"></a>
                    <a onclick="infoBtn()" title="מידע"><img class="serviceBtn" src=".\assets\images\png\help.png"></a>
                    <a onclick="closeBtn()" title="סגור"><img class="serviceBtn" src=".\assets\images\png\close.png"></a>
                </div>
                <div class="row2">
                    <label class="label2"> <?php echo $myusername;?> שלום</label>
                    <label class="label2" id="labelTitleID"> הינך כעת ברמה: 1, בשיעור: 1 </label>
                </div>
            </div>
        </div>
        <div class="bottom">
            <label class="label2"> לבחירת שיעור אחר אנא בחר מהרשימה</label>
            <div class="level">
                <button class="btn1" onclick="getLessonLevel(3) " id="level_3_btnID">רמה 3 <br> דקדוק</button>
                <button class="btn1" onclick="getLessonLevel(2)" id="level_2_btnID"> רמה 2 <br> אוצר מילים</button>
                <button class="btn1" onclick="getLessonLevel(1)" id="level_1_btnID">רמה 1 <br> קריאה    </button>
            </div>
            <div class="table" id="lesson_input">

            </div>
           <div class="level">
                <button class="btn1" onclick="updateBtn('againBtn') " id="againBtnID"    > חזרה </button>
                <button class="btn1" onclick="updateBtn('addQWordBtn')"  id="addQWordBtnID" > שאלות נוספות </button>
                <button class="btn1" onclick="updateBtn('testWordBtn')"  id="testWordBtnID" > בחן את עצמך</button>
                <button class="btn1" onclick="updateBtn('exerciseBtn')"  id="exerciseBtnID" >   תירגול</button>
                <button class="btn1" onclick="updateBtn('learnWordBtn')" id="learnWordBtnID"> למד אותיות/מילים </button>
            </div>

        </div>



    </div>
</body>

<script type="text/javascript">
  var learnWordBtn = 1;
  var exerciseBtn = 2;
  var testWordBtn = 3;
  var addQWordBtn = 4;
  var againBtn = 5;

  var lastBtn = "";
  var lessonToLearnArray = ""
  var lessonToLearnLesson = ""
  var lessons1 = <?php echo json_encode($lessons_string1); ?>;
  var lessons_array1 = lessons1.split("@@@");
  var html_code1 = "<nav>"+'\n'+"<ul>";
//   for (i = 0; i < lessons_array1.length; i++) {
  for (i = 0; i < lessons_array1.length-4; i++) {//not support yet
    html_code1 += "<li><button onclick='lessonBtnFunc(1,"+i+")' class='lessonBtn'>"+lessons_array1[i]+"</button></li>";
  }
  html_code1+="</nav>"

  var lessons2 = <?php echo json_encode($lessons_string2); ?>;
  var lessons_array2 = lessons2.split("@@@");
  var html_code2 = "<nav>"+'\n'+"<ul>";
  for (i = 0; i < lessons_array2.length; i++) {
    html_code2 += "<li><button onclick='lessonBtnFunc(2,"+i+")' class='lessonBtn'>"+lessons_array2[i]+"</button></li>";
  }
  html_code2+="</nav>"

  var lessons3 = <?php echo json_encode($lessons_string3); ?>;
  var lessons_array3 = lessons3.split("@@@");
  var html_code3 = "<nav>"+'\n'+"<ul>";
  for (i = 0; i < lessons_array3.length; i++) {
    html_code3 += "<li><button onclick='lessonBtnFunc(3,"+i+")' class='lessonBtn'>"+lessons_array3[i]+"</button></li>";
  }
  html_code3+="</nav>"

  document.getElementById("lesson_input").innerHTML=html_code1;
  getLessonLevel(1);

</script>

<script type="text/javascript">

englishWordsList = <?php echo json_encode($englishWordsList); ?>;
englishWordsOtherFormatList = <?php echo json_encode($englishWordsOtherFormatList); ?>;
hebWordTransList = <?php echo json_encode($hebWordTransList); ?>;
ArbWordTransList = <?php echo json_encode($ArbWordTransList); ?>;

inputDictArray = englishWordsList.split("@@@");
inputDictOtherFormatArray = englishWordsOtherFormatList.split("@@@");
hebDictArr = hebWordTransList.split("@@@");
ArbDictArr = ArbWordTransList.split("@@@");

createDict();
saveDic();
</script>
</html>