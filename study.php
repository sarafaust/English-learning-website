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
<script type="text/javascript">
 var GO_FLAG = 99;
 var clickedWordIdx = 0 // is a defualt word
 var wordsListHeb = ["אֵי","בּי","סִי", "דִי", "אִי", "אֶף", "גִ'י", "'אֵיץ","אַי", "גֵ'י", "קֵי", "אֶל", "אֶם", "אֶן", "אוֹוּ", "פִּי", "קְיוּ", "אַר", "אֶס", "טִי","יוּ","בִי","דַבְּליוּ", "אֶקְס","וּאַי", "זֶד"]
 var memHelp = [". A ראה בדמיונך איש שבמקום עיניים יש לו את האות  "
 , " .  B ראה בדמיונך ביס בצורת האות  "
 , " .  Cראה בדמיונך סיכה בצורת האות  "
 , " .  D ראה בדמיונך דינוזאור בצורת האות  "
 , " .  Eראה בדמיונך איש עם עיתון בצורת האות  "
 , " .  Fראה בדמיונך אפרוח בצורת האות  "
 , " .  Gראה בדמיונך ג'ירפה בצורת האות  "
 , " .  Hראה בדמיונך אש בצורת האות  "
 , " .  Iראה בדמיונך בחור שצועק איי ממכה שקיבל משולחן עבודה בצורת האות "
 , " .  Jראה בדמיונך די-ג'יי מתקלט על שולחן בצורת האות "
 , " .  Kראה בדמיונך קן בתוך האות "
 , " .  Lראה בדמיונך מטוס אל-על בצורת האות "
 , "ראה בדמיונך את האות M באמצע כל האותיות."
 , "ראה בדמיונך כלי חלול בצורת האות N שאין בו כלום."
 , " .  Oראה בדמיונך אופה אופה לחם בצורת "
 , " .  Pראה בדמיונך פיל בצורת האות "
 , " .  Qראה בדמיונך את אינשטיין, אדם בעל איי.קיו גבוה, בצורת האות "
 , " .  Rראה בדמיונך אריה שזנבו בצורת האות "
 , " .  Sראה בדמיונך נחש שמשמיע ססס .. כמו צליל האות "
 , " .  Tראה בדמיונך טיל בצורת האות "
 , " .  Uראה בדמיונך ביוב בצורת האות "
 , "ראה בדמיונך ילד אשר קיבל ציון גבוהה על שיעורי הבית שלו. "
 , "ראה בדמיונך את האות U מכופלת.  "
 , " . Xראה בדמיונך שודד מקסיקני עם חגורת נפץ בצורת "
 , " . Yראה בדמיונך איש הוואי מחזיק את ידיו בצורת האות "
 , " . Zראה בדמיונך זבוב שמותיר אחריו תוי בצורת האות "]
 function loadData()
 {
     var html_code = "<select size='5' name='' id='selectListID' class='form-control'>"+'\n';
      for (i = 0; i < wordsList.length; i++) {
        html_code += "<option   onclick='pressWord("+i+")' value="+i+">"+wordsList[i]+"</option>";
      }
      html_code+="</select>"
      document.getElementById("WorldList").innerHTML=html_code;
      document.getElementById("wordCharId").innerHTML="A";
      document.getElementById("worldHebId").innerHTML="אי";
      pressWord(0);

 }

 function pressWord(wordIdx)
 {
    if(wordIdx == GO_FLAG)
    {
        var e = document.getElementById("selectListID");
        wordIdx = e.options[e.selectedIndex].value;
    }
    wordIdx = Math.min(25, wordIdx);
    wordIdx = Math.max(0, wordIdx);
    // var urlString = 'url(buttons/' + imagePrefix + '.png)';
    var urlString = 'url(English4Beginners/LEVEL1/LESSON1/pic/'+wordsList[wordIdx]+'.jpg)';
    clickedWordIdx = wordIdx;
    document.getElementById("imgWordId").style.backgroundImage =  urlString;
    document.getElementById("imgWordId").src =  'English4Beginners/LEVEL1/LESSON1/pic/'+wordsList[wordIdx]+'.jpg';
    document.getElementById("textMemHelpID").innerHTML  =  memHelp[wordIdx];
    document.getElementById("progressBarID").value =Math.min( wordIdx +1, 26) ;
    document.getElementById("wordCharId").innerHTML= wordsList[wordIdx];
    document.getElementById("worldHebId").innerHTML=wordsListHeb[wordIdx];
 }

</script>
<body style="margin:0; height:100%; max-width:100%" onload="loadData()">



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
                    <div class="table" id="WorldList">

                    </div>
                </div>
                <div id="memHelpBorderID">
                     <div id="memHelpTextId"> עזרי זיכרון </div>

                    <div class="row2">
                    <div id="text_row2"> לחץ על התמונה להגדלה </div>

                    <div id="myModal" class="modal">
                          <span class="close">&times;</span>
                          <img class="modal-content" id="img01">
                        </div>
                    <div id="imgWordId" class="imageWord">

                    </div>
                </div>
                <div class="row3">
                    <label class="label2">מילת מפתח</label>
                    <div  id="textMemHelpID" class="text">

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