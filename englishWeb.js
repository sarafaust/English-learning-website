//const
var STUDENTS = "students"
var BEGINNERS = "beginners"
var BUSINESS = "business"

var LEVEL_LESSON_1 = "1"
var LEVEL_LESSON_2 = "1"
var LEVEL_LESSON_3 = "3"

var wordsList = ["A","B","C", "D", "E", "F", "G", "H","I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T","U","V","W", "X","Y", "Z"]
var exerciseWordList = [" גֵ'י "," אֶס "," סִי ","אֶן "," פִּי "," דִי "," וּאַי "," יוּ "," אַר "," קְיוּ "," זֶד "," בּי "," גִ'י "," אַי "," אֶם "," אֶף "," 'אֵיץ "," אֵי "," קֵי "," טִי "," בִי "," אֶל "," אֶקְס "," אוֹוּ "," דַבְּליוּ "," אִי "]

var g_level_lesson = LEVEL_LESSON_1;
var g_lastBtn_lesson = "learnWordBtn"
function changeAudioModeBtn()
{
    var audio_m = localStorage.getItem('AudioMode')
    //first setting
    new_mode = (audio_m == 'true')? 'false' : 'true';
    localStorage.setItem('AudioMode', new_mode);
}

function updateLevel(level)
{
    localStorage.setItem('CourseLevel', level); // students/bugginers/buisness
}

function loadLessonPage()
{
   level = localStorage.getItem('CourseLevel');
   if (level == BEGINNERS)
   {

   }
}

function languegeModeBtn()
{
    //TODO:
}

function printPageBtn()
{
    window.print();
}

function settingBtn()
{
    window.print();
}

function infoBtn()
{
    window.open("https://www.english4students.com/hebrew-home/guides", "_blank");
}

function closeBtn()
{
   window.open("http://clickenglish.unaux.com/first_page.html", "_blank");
}

function playBtn()
{

}

//lesson page
function helperForBegginsPage()
{
    window.open("http://clickenglish.unaux.com/short_help_English4Beginners.html", "_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=200,width=600,height=1000");
}

function fullInstructions()
{
    window.open("http://clickenglish.unaux.com/UG.pdf", "_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=200,width=600,height=1000");
}

function showGrads()
{
    window.open("http://clickenglish.unaux.com/grads_page.php", "_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=200,width=600,height=1000");
}

function getLessonLevel(level)
{
    g_level_lesson = level;
     if(level == 1)
     {
        document.getElementById("level_1_btnID").style.backgroundColor =  "#bb99ff";
        document.getElementById("level_2_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("level_3_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("lesson_input").innerHTML=html_code1;
        document.getElementById("testBtnID").style.display = "none";
        document.getElementById("testWordBtnID").style.display = "none";
        document.getElementById("againBtnID").style.display = "none";
     }
     if(level == 2)
     {
        document.getElementById("level_2_btnID").style.backgroundColor =  "#bb99ff";
        document.getElementById("level_1_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("level_3_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("lesson_input").innerHTML=html_code2;
        document.getElementById("testBtnID").style.display = "block";
        document.getElementById("testBtnID").innerHTML  = "מבחן לרמה  2";
        document.getElementById("testWordBtnID").style.display = "block";
        document.getElementById("againBtnID").style.display = "block";
     }
     if(level == 3)
     {
        document.getElementById("level_3_btnID").style.backgroundColor =  "#bb99ff";
        document.getElementById("level_1_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("level_2_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("lesson_input").innerHTML=html_code3;
        document.getElementById("testBtnID").style.display = "block";
        document.getElementById("testBtnID").innerHTML  = "מבחן לרמה  3";

        document.getElementById("testWordBtnID").style.display = "block";
        document.getElementById("againBtnID").style.display = "block";
     }
 }

     function lessonBtnFunc(list, lesson)
    {
        lessonToLearnLesson = lesson;
        lessonToLearnArray = list;

    }

    function updateBtn(btnName)
    {
        // againBtn
        // addQWordBtn
        // testWordBtn
        // exerciseBtn
        // learnWordBtn
        g_lastBtn_lesson = btn;
        if(btnName == "learnWordBtn")
        {
            window.location.href="study.php";
        }

        if(btnName == "exerciseBtn")
        {
            window.location.href="study.php";
        }
    }


//study page:
function grammerHelper()
{

}

//conatins data in page:
function relevantBtn(pageName)
{
    // var
}


function loadExercisePage()
{
	html_code = "";
	for (i = 0; i < wordsList.length; i++) {
        html_code += "<div  class='wordC' onclick='pressWordExe("+i+")' value="+i+">"+wordsList[i]+"</div>";
      }
	document.getElementById("wordsWrpprID").innerHTML=html_code;
}
