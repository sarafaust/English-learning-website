//const
var STUDENTS = "students"
var BEGINNERS = "beginners"
var BUSINESS = "business"

var LEVEL_LESSON_1 = "1"
var LEVEL_LESSON_2 = "1"
var LEVEL_LESSON_3 = "3"

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
    window.open("http://clickenglish.unaux.com/short_help_English4Beginners.html", "_blank");
}

function fullInstructions()
{
    window.open("http://clickenglish.unaux.com/UG.pdf", "_blank");
}

function getLessonLevel(level)
{
     if(level == 1)
     {
        document.getElementById("level_1_btnID").style.backgroundColor =  "#bb99ff";
        objectBtn = document.getElementById("level_2_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        objectBtn = document.getElementById("level_3_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("lesson_input").innerHTML=html_code1;
        document.getElementById("testBtnID").style.display = "none";
        document.getElementById("testWordBtnID").style.display = "none";
        document.getElementById("againBtnID").style.display = "none";
     }
     if(level == 2)
     {
        document.getElementById("level_2_btnID").style.backgroundColor =  "#bb99ff";
        objectBtn = document.getElementById("level_1_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        objectBtn = document.getElementById("level_3_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("lesson_input").innerHTML=html_code2;
        document.getElementById("testBtnID").style.display = "block";
        document.getElementById("testBtnID").innerHTML  = "מבחן לרמה  2";
        document.getElementById("testWordBtnID").style.display = "block";
        document.getElementById("againBtnID").style.display = "block";
     }
     if(level == 3)
     {
        document.getElementById("level_3_btnID").style.backgroundColor =  "#bb99ff";
        objectBtn = document.getElementById("level_1_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        objectBtn = document.getElementById("level_2_btnID").style.backgroundColor = "rgb(114, 142, 235)";
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

    function updateBtn(btn)
    {
        lastBtn = btn;
        if(btn == learnWordBtn)
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
