<!DOCTYPE html>
<html style="height:100%">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="test_yourself.css">
  <link rel="stylesheet" href="practice_2.css">


  <title>English Demo</title>
</head>
<script src="test_yourself.js"></script>
<script src="englishWeb.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
var level = getLevel();
var lesson = parseInt(getCourseNum())+1;
var path = "English4Beginners/LEVEL"+level+"/LESSON"+(lesson)+"/TARGETW.xml"
</script>

<?php
$path  = $_COOKIE["PATH"];
$level =  "<script>document.writeln(level);</script>";
$lesson =  "<script>document.writeln(lesson);</script>";
$xml = simplexml_load_file($path."TARGETW.xml");

$englishWords = $xml->xpath('//Words/word');
if(count($englishWords)== 0)
{
    $englishWords = $xml->xpath('//Words/Word');
}
if(count($englishWords)== 0)
{
    $englishWords = $xml->xpath('//words/word');
}

$englishWordsList = "";
$HebList = "";

foreach($englishWords as $item) {
    $englishWordsList=$englishWordsList.(string)$item->Eng."@@@";
    $HebList=$HebList.(string)$item->Heb."@@@";
}
?>

<script type="text/javascript">

englishWordsList = <?php echo json_encode($englishWordsList); ?>;
HebList = <?php echo json_encode($HebList); ?>;

englishWordsListTmp = englishWordsList.split("@@@");
HebListTmp = HebList.split("@@@");

englishWordsListArray = [];
$.each(englishWordsListTmp, function(i, el){
    if($.inArray(el, englishWordsListArray) === -1) englishWordsListArray.push(el);
});

HebListArray = [];
$.each(HebListTmp, function(i, el){
    if($.inArray(el, HebListArray) === -1) HebListArray.push(el);
});

data_length= englishWordsListArray.length -1

</script>
<body style="margin:0; height:100%; max-width:100%" onload="loadTestData()">


    <div class="container">
            <div class="top">
                <a onclick="changeAudioModeBtn()" title="שמע" ><img class="serviceBtn" src=".\assets\images\png\volT.png"></a>
                <a onclick="languegeModeBtn()"  title="שפה"><img class="serviceBtn" src=".\assets\images\png\LangEng.png"></a>
                <a onclick="printPageBtn()" title="הדפס"><img class="serviceBtn" src=".\assets\images\png\print.png"></a>
                <a onclick="settingBtn()" title="הגדות"><img class="serviceBtn" src=".\assets\images\png\setting.png"></a>
                <a onclick="infoBtn()" title="מידע"><img class="serviceBtn" src=".\assets\images\png\help.png"></a>
                <a onclick="closeBtn()" title="סגור"><img class="serviceBtn" src=".\assets\images\png\close.png"></a>
            </div>
            <div class="bottom">
                <label class="label">רמה 2 שיעור 1</label>
                <progress value="10" max="50" class="prog" id="prgressTestID"></progress>
                <div class="question" id="englishWroldID">מילה באנגלית</div>
                <div class="answers" id="answerBtnwrrrprID">
                    <button class="answer" id="Ans1ID">מילה בעברית</button>
                    <button class="answer" id="Ans2ID">מילה בעברית</button>
                    <button class="answer" id="Ans3ID">מילה בעברית</button>
                    <button class="answer" id="Ans4ID">מילה בעברית</button>
                    <button class="answer" id="Ans5ID">מילה בעברית</button>
                </div>
            </div>




    </div>
</body>
</html>