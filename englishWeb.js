//const
var STUDENTS = "students"
var BEGINNERS = "beginners"
var BUSINESS = "business"

var LEVEL_LESSON_1 = "1"
var LEVEL_LESSON_2 = "2"
var LEVEL_LESSON_3 = "3"

var wordsList = ["A","B","C", "D", "E", "F", "G", "H","I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T","U","V","W", "X","Y", "Z"]
var exerciseWordList = [" גֵ'י "," אֶס "," סִי ","אֶן "," פִּי "," דִי "," וּאַי "," יוּ "," אַר "," קְיוּ "," זֶד "," בּי "," גִ'י "," אַי "," אֶם "," אֶף "," 'אֵיץ "," אֵי "," קֵי "," טִי "," בִי "," אֶל "," אֶקְס "," אוֹוּ "," דַבְּליוּ "," אִי "]

var g_level_lesson = LEVEL_LESSON_1;
var g_lastBtn_lesson = "learnWordBtn"

var g_lesson_in_level = 0
var g_level_in_levels = 0

function changeAudioModeBtn()
{
    var audio_m = localStorage.getItem('AudioMode')
    //first setting
    new_mode = (audio_m == 'true')? 'false' : 'true';
    localStorage.setItem('AudioMode', new_mode);
}

function updateCategory(category)
{
    localStorage.setItem('Category', category); // students/bugginers/buisness
    var XMLLessonsPath = getPathCategory()+"/XML/XMLLessons.xml"
    document.cookie = "XML_LESSON_PATH="+XMLLessonsPath;
}

function getCategory()
{
    return localStorage.getItem('Category'); // students/bugginers/buisness
}

function getPicPath(lesson, level)
{
     var urlPath = getPathCategory()+'/LEVEL'+level+'/LESSON'+lesson+'/pic/picture1.JPG'
    if(getCategory()!= BEGINNERS)
    {
      urlPath = getPathCategory()+'/LEVEL'+level+'/LESSON'+lesson+'/pic/picture1.jpg'
    }
    return urlPath
}
function getPathCategory()
{
    category = localStorage.getItem('Category')
    if(category == BEGINNERS)
    {
        return "English4Beginners";
    }
    if(category == STUDENTS)
    {
        return "English4Students";
    }
    else
    return "English4Business"
}


function getHebCategory()
{
    category = localStorage.getItem('Category')
    if(category == BEGINNERS)
    {
        return "למתחילים";
    }
    if(category == STUDENTS)
    {
        return "לסטודנטים";
    }
    else
    return "לאוניברסיטה"
}

function updateLevel(level)
{
    localStorage.setItem('CourseLevel', level); // students/bugginers/buisness
}

function updateCourseNum(num)
{
    localStorage.setItem('CourseNumber', num); // students/bugginers/buisness
}

function getLevel()
{
    return localStorage.getItem('CourseLevel'); // students/bugginers/buisness
}

function getCourseNum()
{
    return localStorage.getItem('CourseNumber'); // students/bugginers/buisness
}

function shuffle(array) {
    let counter = array.length;

    // While there are elements in the array
    while (counter > 0) {
        // Pick a random index
        let index = Math.floor(Math.random() * counter);

        // Decrease counter by 1
        counter--;

        // And swap the last element with it
        let temp = array[counter];
        array[counter] = array[index];
        array[index] = temp;
    }

    return array;
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
    location.replace("https://www.english4students.com/hebrew-home/guides", "_blank");
}

function closeBtn()
{
     if(history.length === 1){
            window.location = "http://clickenglish.unaux.com/first_page.html"
        } else {
            history.back();
        }
    // location.replace("http://clickenglish.unaux.com/first_page.html");
}

function closeBtn_from_study()
{
    alert()
    // window.location.href = "lesson.php";
    // location.replace("http://clickenglish.unaux.com/lesson.php");
    window.open("http://clickenglish.unaux.com/lesson.php","_self")
    // location.replace("https://www.english4students.com/hebrew-home/guides", "_blank");
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
    document.getElementById("labelTitleID").innerHTML = " הנך כעת ברמה "+level+ " בשיעור 1"
    cat =  getHebCategory()
    document.getElementById("lessonTitleID").innerHTML="אנגלית "+ cat
    updateLevel(level);
    g_level_lesson = level;
     if(level == 1)
     {
        document.getElementById("level_1_btnID").style.backgroundColor =  "#bb99ff";
        objectBtn = document.getElementById("level_2_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        objectBtn = document.getElementById("level_3_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("lesson_input").innerHTML=html_code1;
        document.getElementById("testBtnID").style.display = "none";
        document.getElementById("testWordBtnID").style.display = "none";
        document.getElementById("againBtnID").style.display = "none";
          document.getElementById("addQWordBtnID").style.display = "block";
          if(getCategory != BEGINNERS)
          {
             document.getElementById("testBtnID").style.display = "block";
             document.getElementById("testWordBtnID").style.display = "block";
              document.getElementById("againBtnID").style.display = "block";
          }
     }
     if((level == 2)&&(getCategory() != BUSINESS))
     {
        document.getElementById("level_2_btnID").style.backgroundColor =  "#bb99ff";
        objectBtn = document.getElementById("level_1_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        objectBtn = document.getElementById("level_3_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("lesson_input").innerHTML=html_code2;
        document.getElementById("testBtnID").style.display = "block";
        document.getElementById("testBtnID").innerHTML  = "מבחן לרמה  2";
        document.getElementById("testWordBtnID").style.display = "block";
        document.getElementById("againBtnID").style.display = "block";
        document.getElementById("addQWordBtnID").style.display = "block";
     }
     if((level == 3)&&(getCategory() != BUSINESS))
     {
        document.getElementById("level_3_btnID").style.backgroundColor =  "#bb99ff";
        objectBtn = document.getElementById("level_1_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        objectBtn = document.getElementById("level_2_btnID").style.backgroundColor = "rgb(114, 142, 235)";
        document.getElementById("lesson_input").innerHTML=html_code3;
        document.getElementById("testBtnID").style.display = "block";
        document.getElementById("testBtnID").innerHTML  = "מבחן לרמה  3";
          document.getElementById("addQWordBtnID").style.display = "block";

        document.getElementById("testWordBtnID").style.display = "block";
        document.getElementById("againBtnID").style.display = "block";
     }
 }

     function lessonBtnFunc(list, lesson)
    {
        updateCourseNum(lesson);
        updateLevel(list);
        g_lesson_in_level = lesson;
        g_level_in_levels = list;
        if(list == 1)
        {
            updateBtnLevel1(lesson)
        }
    }
function updateBtnLevel1(lesson)
{
    if(getCategory()!= BEGINNERS)
    return;
    if (lesson !=0)//to first lesson - not support yet with other practies
    {
        document.getElementById("addQWordBtnID").style.display = "none";
    }
    else{
          document.getElementById("addQWordBtnID").style.display = "block";
    }
    if(lesson > 9)
    {
        document.getElementById("exerciseBtnID").style.display = "none";
    }
    else
    {
        document.getElementById("exerciseBtnID").style.display = "block";
    }
}
    function updateBtn(btnName)
    {
        // againBtn
        // addQWordBtn
        // testWordBtn
        // exerciseBtn
        // learnWordBtn
        g_lastBtn_lesson = btnName;
        var level = getLevel();
        var lesson = parseInt(getCourseNum())+1;

        var path = getPathCategory()+"/LEVEL"+level+"/LESSON"+(lesson)+"/"


        //save in cookies - in order to pass js value to php
        document.cookie = "PATH="+path;
        document.cookie = "LESSON="+lesson;
        document.cookie = "LEVEL="+level;
        if(btnName == "learnWordBtn")
        {
            window.location.href="study_3.php";

            // if(g_level_lesson == 1)
            // {
            //     window.location.href="study.php";
            // }
            // else
            // if(g_level_lesson == 2)
            // {
            //     window.location.href="study_2.php";
            // }
            // else
            // {
            //     window.location.href="study_3.php";
            //     var level = getLevel();
            //     var lesson = parseInt(getCourseNum())+1;
            //     var path = "English4Beginners/LEVEL"+level+"/LESSON"+(lesson)+"/TARGETW.xml"
            //     //save in cookies - in order to pass js value to php
            //     document.cookie = "PATH="+path;
            // }
        }

        if(btnName == "exerciseBtn")
        {
            if((g_level_lesson == 1)&& (getCategory() == BEGINNERS))
            {
                window.location.href="practice_1.php";

            }
            else
            {
                window.location.href="practice_2.php";
            }
        }

        if(btnName == "addQWordBtn")
        {
            if((g_level_lesson == 1)&& (getCategory() == BEGINNERS))
            {
                window.location.href="another_questions.php";
            }
            else
            {
                window.location.href="another_questions_1.php";
            }


        }

        if(btnName == "testWordBtn")
        {
            window.location.href="test_yourself.php";
        }
        if(btnName == "againBtn")
        {
            window.location.href="repeat_test.php";

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
