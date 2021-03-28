<html style="height:100%">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="practice.css">

  <title>English Demo</title>
</head>
<script src="englishWeb.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

var level = getLevel();
var lesson = parseInt(getCourseNum())+1;
var path = getPathCategory()+"/LEVEL"+level+"/LESSON"+(lesson)+"/TARGETW.xml"
</script>

<?php
$lesson = $_COOKIE["LESSON"];
if((int)($lesson) < 3)
{
    $path  = $_COOKIE["PATH"];
    $level =  "<script>document.writeln(level);</script>";
    $lesson =  "<script>document.writeln(lesson);</script>";
    $xml = simplexml_load_file($path."TARGETW.xml");

    $englishWords = $xml->xpath('//Words/word');

    $englishWordsList = "";
    $HebList = "";

    foreach($englishWords as $item) {
        $englishWordsList=$englishWordsList.(string)$item->Eng."@@@";
        $HebList=$HebList.(string)$item->Heb."@@@";
    }
}
else{
// read TSL file
// there is error in  read HEB php file.
// so js read from defines files.
}
?>



<script type="text/javascript">
HebListArray = []
englishWordsListArray = []

if(lesson <3)
{
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

}
else
{

textLsnFile = <?php echo json_encode($txtData); ?>;

}

</script>
<body style="margin:0; height:100%; max-width:100%" onload="updateDataPage()">
    <script src="practice_1.js"></script>
    <div class="container">
        <div class="top">
            <div class="textTitle" id="textTitleID">אנגלית למתחילים רמה 2 שיעור 1</div>
            <div class="row1">
                <a onclick="changeAudioModeBtn()" title="שמע" ><img class="serviceBtn" src=".\assets\images\png\volT.png"></a>
                <a onclick="languegeModeBtn()"  title="שפה"><img class="serviceBtn" src=".\assets\images\png\LangEng.png"></a>
                <a onclick="printPageBtn()" title="הדפס"><img class="serviceBtn" src=".\assets\images\png\print.png"></a>
                <a onclick="settingBtn()" title="רכוש הרשאה"><img class="serviceBtn" src=".\assets\images\png\setting.png"></a>
                <a onclick="infoBtn()" title="מידע"><img class="serviceBtn" src=".\assets\images\png\help.png"></a>
                <a onclick="closeBtn()" title="סגור"><img class="serviceBtn" src=".\assets\images\png\close.png"></a>
            </div>
        </div>

        <div class="middle">
            <div id="wordsWrpprID">
              <!-- words or chars -->

            </div>
        </div>
        <div class="bottom">
            <div class="left">
                <label class="label"></label>
                <div id="wrrperContentID">
                  <div   id="insLabelID"> התאם את האות עם  שמה</div>
                  <div class="wrrpListID" id="ListContentID">
                  </div>
                </div>
            </div>
            <div class="right">
                <div class="wrppHelpBtn">
                    <button id="savePointsBtnID" class="helpersBtnLsn" title="שמור " style="background-image: url('iconsave.png');"></button>
                    <button id="audioText"  class="helpersBtnLsn" title="לחץ על כפתור לשמיעת הטקסט " style="background-image: url('iconplay.png');"></button>
                    <button id="ansBtnID" class="helpersBtnLsn" onclick="showAns()" title="לחץ כאן אם אתה לא מוצא את המילה " style="background-image: url('icon_question.png');"> </button>
                </div>
                <button class="btn1" id="collecWordsBtnID" onclick="vacableFun()"> אוצר מילים  </button>
                <button class="btn1" id="InstBtnID" onclick="InsBtnFun()"> הוראות  </button>
                <button class="btn1" id="grammerSignsBtnID" onclick="grammerSignsBtnFun()"> סימני ניקוד  </button>
                <button class="btn1" id="anotherExplnationBtnID" onclick="anotherExplnationBtnFunc()"> הסבר נוסף  </button>
                <div id="gradsWrprrClass">
                    <label id="labelsC1">הציון שלך הוא : </label>
                    <label id="labelsCText" id="dynamicGradsID">5</label>
                </div>
                <div class="imageWC" id="imageWID">תמונה</div>
            </div>
        </div>
    </div>
</body>
</html>