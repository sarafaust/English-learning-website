<html style="height:100%">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="study.css">
  <link rel="stylesheet" href="englishWeb.css">

  <title>English Demo</title>
</head>
<script src="englishWeb.js"></script>
<script src="study_3.js"></script>
<body style="margin:0; height:100%; max-width:100%" onload="loadData()">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
var level = getLevel();
var lesson = getCourseNum();
</script>

<?php
$level =  "<script>document.writeln(level);</script>";
$lesson =  "<script>document.writeln(lesson);</script>";
$xml=simplexml_load_file('English4Beginners/LEVEL'+$level+'/LESSON'+$lesson+'/TARGETW.xml');
$englishWords = $xml->xpath('//Words/word');

$englishWordsList = "";
$PartOfSpeechEngList = "";
$HebList = "";
$EngInHebList= "";
$PartOfSpeechHebList= "";

foreach($englishWords as $item) {
    $englishWordsList=$englishWordsList.(string)$item->Eng."@@@";
    $PartOfSpeechEngList=$PartOfSpeechEngList.(string)$item->PartOfSpeechEng."@@@";
    $HebList=$HebList.(string)$item->Heb."@@@";
    $EngInHebList=$EngInHebList.(string)$item->EngInHeb."@@@";
    $PartOfSpeechHebList=$PartOfSpeechHebList.(string)$item->PartOfSpeechHeb."@@@.";
}
?>

<script type="text/javascript">

englishWordsList = <?php echo json_encode($englishWordsList); ?>;
PartOfSpeechEngList = <?php echo json_encode($PartOfSpeechEngList); ?>;
HebList = <?php echo json_encode($HebList); ?>;
EngInHebList = <?php echo json_encode($EngInHebList); ?>;
PartOfSpeechHebList = <?php echo json_encode($PartOfSpeechHebList); ?>;

englishWordsListTmp = englishWordsList.split("@@@");
PartOfSpeechEngListTmp = PartOfSpeechEngList.split("@@@");
HebListTmp = HebList.split("@@@");
EngInHebListTmp = EngInHebList.split("@@@");
PartOfSpeechHebListTmp = PartOfSpeechHebList.split("@@@");

var englishWordsListArray = [];
$.each(englishWordsListTmp, function(i, el){
    if($.inArray(el, englishWordsListArray) === -1) englishWordsListArray.push(el);
});

var PartOfSpeechEngListArray = [];
$.each(PartOfSpeechEngListTmp, function(i, el){
    if($.inArray(el, PartOfSpeechEngListArray) === -1) PartOfSpeechEngListArray.push(el);
});

var HebListArray = [];
$.each(HebListTmp, function(i, el){
    if($.inArray(el, HebListArray) === -1) HebListArray.push(el);
});

var EngInHebListArray = [];
$.each(EngInHebListTmp, function(i, el){
    if($.inArray(el, EngInHebListArray) === -1) EngInHebListArray.push(el);
});

var PartOfSpeechHebListArray = [];
$.each(PartOfSpeechHebListTmp, function(i, el){
    if($.inArray(el, PartOfSpeechHebListArray) === -1) PartOfSpeechHebListArray.push(el);
});

var data_length= englishWordsListArray.length -1

</script>


   <div class="container">
        <div class="top">
            <div class="left">
                <button class="btn1" id="grammerhlpID"> סימני ניקוד </button>
            </div>
            <div class="right">
                <div>
                    <a href onclick="playBtn()" title="הפעל"><img class="serviceBtn" src=".\assets\images\png\play.png"></a>
                    <a href onclick="changeAudioMode()" title="שמע"><img class="serviceBtn" src=".\assets\images\png\volT.png"></a>
                    <a href onclick="printPageBtn()" title="הדפס"><img class="serviceBtn" src=".\assets\images\png\print.png"></a>
                    <a href onclick="infoBtn()" title="מידע"><img class="serviceBtn" src=".\assets\images\png\help.png"></a>
                    <a href onclick="closeBtn()" title="סגור"><img class="serviceBtn" src=".\assets\images\png\close.png"></a>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="colomn">
                <label class="label"> אוצר מילים לרמה 1 שיעור 1</label>
                <br>
                <progress value="1" max="26" class="prog" id="progressBarID"></progress>
                <div class="left_colomn">
                    <div class="div" id="wordCharId"> האות/המילה </div>
                    <div class="div" id="worldPartsId"> part of speech  חלק הדיבור </div>
                    <div class="div" id="worldHebTransId"> part of speech  חלק הדיבור </div>
                    <div class="div" id="worldHebId"> part of speech  חלק הדיבור </div>

                </div>
                <div class="row">
                    <button class="btn1" id="nextBtnId" onclick="pressWord(clickedWordIdx+1)"> הבא </button>
                    <button class="btn1" id="beforeBtnId" onclick="pressWord(clickedWordIdx-1)">  הקודם </button>
                </div>
            </div>
            <div class="colomn">
                <div class="row1">
                    <button class="btn1" onclick="pressWord(GO_FLAG)"> דלג לאות/למילה </button>

                   <!-- insert data list here -->
                    <div class="table" id="WorldList">

                    </div>
                </div>
                <!-- memory help -->
                <div id="memHelpBorderID">
                     <div id="memHelpTextId"> עזרי זיכרון </div>

                    <div class="row2">
                    <div id="text_row2"> לחץ על התמונה להגדלה </div>

                    <div id="myModal" class="modal">
                          <span class="close">&times;</span>
                          <img class="modal-content" id="img01">
                        </div>

                    <div id="imgWordId" class="imageWord">
                        <!-- here the image  -->
                    </div>
                </div>
                <div class="row3">
                    <label class="label2">מילת מפתח</label>
                    <div  id="textMemHelpID" class="text">
                      <!-- here the key words -->
                    </div>
                </div>
                </div>

            </div>
        </div>

    </div>

<div id="grammerWrpr" class="modal">
                          <span class="close" id="grammerClose" onclick="closeID()">&times;</span>
                          <div  class="modal-content" id="grammerContentText" >
                             מפני שיש יותר צלילים בשפה האנגלית מאשר בשפה העברית, השתמשנו במקצת סימני הניקוד בצורה שונה מהשימוש הרגיל שלהם בעברית.
אנא האזן לרשימת הדוגמאות הבאות.
                         </div>
                           <div  class="modal-content" id="grammerContent" >

<table class="tftable" border="1">
<tr><th>תעתיק</th><th>עזרי זכרון</th><th>אנגלית</th><th>עברית</th></tr>
<tr><td>Row:1 Cell:1</td><td>Row:1 Cell:2</td><td>Row:1 Cell:3</td><td>Row:1 Cell:4</td></tr>
<tr><td>Row:2 Cell:1</td><td>Row:2 Cell:2</td><td>Row:2 Cell:3</td><td>Row:2 Cell:4</td></tr>
<tr><td>Row:3 Cell:1</td><td>Row:3 Cell:2</td><td>Row:3 Cell:3</td><td>Row:3 Cell:4</td></tr>
<tr><td>Row:4 Cell:1</td><td>Row:4 Cell:2</td><td>Row:4 Cell:3</td><td>Row:4 Cell:4</td></tr>
<tr><td>Row:5 Cell:1</td><td>Row:5 Cell:2</td><td>Row:5 Cell:3</td><td>Row:5 Cell:4</td></tr>
<tr><td>Row:6 Cell:1</td><td>Row:6 Cell:2</td><td>Row:6 Cell:3</td><td>Row:6 Cell:4</td></tr>
<tr><td>Row:7 Cell:1</td><td>Row:7 Cell:2</td><td>Row:7 Cell:3</td><td>Row:7 Cell:4</td></tr>
<tr><td>Row:8 Cell:1</td><td>Row:8 Cell:2</td><td>Row:8 Cell:3</td><td>Row:8 Cell:4</td></tr>
<tr><td>Row:9 Cell:1</td><td>Row:9 Cell:2</td><td>Row:9 Cell:3</td><td>Row:9 Cell:4</td></tr>
<tr><td>Row:10 Cell:1</td><td>Row:10 Cell:2</td><td>Row:10 Cell:3</td><td>Row:10 Cell:4</td></tr>
<tr><td>Row:11 Cell:1</td><td>Row:11 Cell:2</td><td>Row:11 Cell:3</td><td>Row:11 Cell:4</td></tr>
<tr><td>Row:12 Cell:1</td><td>Row:12 Cell:2</td><td>Row:12 Cell:3</td><td>Row:12 Cell:4</td></tr>
<tr><td>Row:13 Cell:1</td><td>Row:13 Cell:2</td><td>Row:13 Cell:3</td><td>Row:13 Cell:4</td></tr>
<tr><td>Row:14 Cell:1</td><td>Row:14 Cell:2</td><td>Row:14 Cell:3</td><td>Row:14 Cell:4</td></tr>
<tr><td>Row:15 Cell:1</td><td>Row:15 Cell:2</td><td>Row:15 Cell:3</td><td>Row:15 Cell:4</td></tr>
<tr><td>Row:16 Cell:1</td><td>Row:16 Cell:2</td><td>Row:16 Cell:3</td><td>Row:16 Cell:4</td></tr>
<tr><td>Row:17 Cell:1</td><td>Row:17 Cell:2</td><td>Row:17 Cell:3</td><td>Row:17 Cell:4</td></tr>
<tr><td>Row:18 Cell:1</td><td>Row:18 Cell:2</td><td>Row:18 Cell:3</td><td>Row:18 Cell:4</td></tr>
<tr><td>Row:19 Cell:1</td><td>Row:19 Cell:2</td><td>Row:19 Cell:3</td><td>Row:19 Cell:4</td></tr>
</table>

</div>
</div>


<script>
    var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("imgWordId");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}



//סימני  ניקוד

var modalGrammer = document.getElementById("grammerWrpr");

// Get the image and insert it inside the modalGrammer - use its "alt" text as a caption
var contentGr = document.getElementById("grammerhlpID");
contentGr.onclick = function(){
  modalGrammer.style.display = "block";
}

// Get the <span> element that closes the modalGrammer
var grammer_span = document.getElementById("grammerClose");

// When the user clicks on <grammer_span> (x), close the modalGrammer
grammer_span.onclick = function() {

  modalGrammer.style.display = "none";
}

function closeID()
{
  modalGrammer.style.display = "none";
}
</script>
</body>


</html>