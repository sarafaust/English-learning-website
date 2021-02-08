<!-- grads page -->
<html style="height:100%">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="lesson.css">
  <link rel="stylesheet" href="englishWeb.css">
  <link rel="stylesheet" href="another_questions_1.css">

  <title>English Demo</title>
</head>

<body style="margin:0; height:100%; max-width:100%" onload="loadQues()">
<script src="englishWeb.js"></script>
<script src="defines.js"></script>
<script src="another_questions_1.js"></script>

<?php
    $path  = $_COOKIE["PATH"];
    $level =  "<script>document.writeln(level);</script>";
    $lesson =  "<script>document.writeln(lesson);</script>";
    $xml = simplexml_load_file($path."QUESTIONS.xml");

    $questionData = $xml->xpath('//Questions/Question');
    //run over all word in Dict
    $questionList = "";
    $correct_num_list = "";

    foreach($questionData as $item) {
        $questionList = $questionList.(string)$item->question."@@@";
        $correct_num_list=$correct_num_list.(string)$item->Correct."@@@";
    }
?>
    <div class="container">
        <div class="top">
            <div class="right">
                <div class="row1">
                  <label class="label"> אנגלית <?php echo $english_to;?></label>
                    <a onclick="changeAudioModeBtn()" title="שמע" ><img class="serviceBtn" src=".\assets\images\png\volT.png"></a>
                    <a onclick="languegeModeBtn()"  title="שפה"><img class="serviceBtn" src=".\assets\images\png\LangEng.png"></a>
                    <a onclick="printPageBtn()" title="הדפס"><img class="serviceBtn" src=".\assets\images\png\print.png"></a>
                    <a onclick="settingBtn()" title="הגדות"><img class="serviceBtn" src=".\assets\images\png\setting.png"></a>
                    <a onclick="infoBtn()" title="מידע"><img class="serviceBtn" src=".\assets\images\png\help.png"></a>
                    <a onclick="closeBtn()" title="סגור"><img class="serviceBtn" src=".\assets\images\png\close.png"></a>
                </div>
              </div>
        </div>
        <div class="rightColsC">
          <fieldset id="dictWrrprID">
            <legend id="legendID">מילון </legend>
            <div >
              <button id="dictBtnID" class="DictBtnC" title="תרגם " onclick="translateWord()"> תרגם מילה </button>
              <input type="text" id="dictInTextID" class="DictBtnC"  name="הכנס מילה ">
              <div id="dictTranID" class="DictTxtC"  > התרגום </div>
             </div>
           </fieldset>
           <button class="btn1" id="grammerhlpID"> סימני ניקוד </button>
           <button class="btn1" id="textLessonID"> סטקסט של השיעור</button>

          </div>


          <div class="middleColsC">

            <div class="questionWrrprC" id="questionWrrprID">
              <!-- insert dynamic code -->
            </div>
            <button id="checkAnsID" onclick="checkAllAns()">בדוק תשובות </button>
          </div>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span id="closeSpanID">&times;</span>
        <div id="spanWrrpr">        <p> הציון שלך הוא: </p>
        <p id="textPointsID"></p></div>

      </div>

    </div>
</body>

<script type="text/javascript">

questionList = <?php echo json_encode($questionList); ?>;
correct_num_list = <?php echo json_encode($correct_num_list); ?>;
questionTextArray = questionList.split("@@@");
correctNunArray = correct_num_list.split("@@@");
</script>

</html>