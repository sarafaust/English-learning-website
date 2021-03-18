//include englishWeb.js
var imported = document.createElement('script');
imported.src = 'englishWeb.js';
document.head.appendChild(imported);
var g_resualt;

var g_grads_1 =[]
var g_grads_2=[]
var g_grads_3=[]

var g_lessons_1=[]
var g_lessons_2=[]
var g_lessons_3=[]

var g_all_level_lessons
var g_all_level_points
var lengthArr = []
function loadData()
{
    data_1 = parsingResualt(loadGrades(1))
    g_lessons_1 = data_1[0]
    g_lessons_1 = g_lessons_1.slice(1, g_lessons_1.length)
    g_grads_1 = data_1[1]
    g_grads_1 = g_grads_1.slice(1, g_grads_1.length)
    if(getCategory != BUSINESS)
    {
        data_2 = parsingResualt(loadGrades(2))
        g_lessons_2 = data_2[0]
        g_grads_2 = data_2[1]
        g_lessons_2 = g_lessons_2.slice(1, g_lessons_2.length)
        g_grads_2 = g_grads_2.slice(1, g_grads_2.length)

        data_3 = parsingResualt(loadGrades(3))
        g_lessons_3 = data_3[0]
        g_grads_3 = data_3[1]
        g_lessons_3 = g_lessons_3.slice(1, g_lessons_3.length)
        g_grads_3 = g_grads_3.slice(1, g_grads_3.length)
    }
    g_all_level_lessons=[0,g_lessons_1, g_lessons_2, g_lessons_3] //in order to start from index 1
    g_all_level_points=[0,g_grads_1, g_grads_2, g_grads_3]
updateGradsData(1)

}

function checkPoints(level, lesson)
{
    lessonsArr = g_all_level_lessons[level]
    pointsArr = g_all_level_points[level]
    for(var k = 0; k<lessonsArr.length; k++)
    {
        if(lessonsArr[k] == lesson)
        return pointsArr[k]
    }
    return 0
}

function parsingResualt(resualt)
{
    flagPoints = "#######"
    data = resualt.split(flagPoints)
    lessonsArray = data[0]
    pointsArray = data[1]
    lessonsArray = lessonsArray.split("@")
    pointsArray = pointsArray.split("@")
    return [lessonsArray, pointsArray]
}

function updateGradsData(level)//start from 1
{
    document.getElementById("angExerTxtID").innerHTML = getExerAvg(level)
    document.getElementById("avgAllTxtID").innerHTML = getAllAvg()
    document.getElementById("label_for_grads").innerHTML = "ציונים לרמה "+ parseInt(level)
    lessonsArray = getLessonArray(level)
    lessonsArray = lessonsArray.split(",");
    //create dynamic table according the level
    htmlcode = "   <tr><th>תרגול</th><th>מבחן</th><th>שם השיעור</th></tr>"
    exerciseGrade = 0
    testGrade = 0
    for (i = 0; i < lessonsArray.length -1; i++) //-1 cause the is another , in the last string
    {
        testGrade = checkPoints(level, i)
        lessonName = lessonsArray[i]
        htmlcode += "<tr><td>"+exerciseGrade+"</td><td>"+testGrade+"</td><td>"+lessonName+"</td></tr>";
    }
    document.getElementById("gradesTableID").innerHTML = htmlcode

}

function sumArr(array)
{
    sum = 0
    for(var j =0; j< array.length; j++)
    {
        sum+=parseInt(array[j])
    }
    return sum
}

function getExerAvg(level)
{

    var pointsArr = g_all_level_points[level]
    var length = pointsArr.length
    if(length == 0)
    {
        return 0
    }
    avg = (sumArr(pointsArr))/length
    return avg
}

function getLengthArr(level)
{
    var lessonsArray = getLessonArray(level)
    var lessonsArray = lessonsArray.split(",");
    var lessonsArr_length = lessonsArray.length -1
    return lessonsArr_length
}

function getAllAvg()
{
    var sum = 0
    var sumIdx = 0
    for(var idx=1; idx<4;idx++)
    {
        if(getExerAvg(idx)!=0)
        {
            sum+=getExerAvg(idx)
            sumIdx+=1
        }
    }
    if(sumIdx == 0)
    sumIdx = 1
     return  (sum/sumIdx)


}

function loadGrades(level)
{
    userKey = getUserKey()
    category = getNumCategory()
    result = ''
    resualt = 0;

    $.ajax({
    type: "POST",
    url: "grads_server.php",
    async: false,
    data: {userKey: userKey, usercategory: category, userlevel: level},
    success: function(response) { resualt = response; }
    });

   return resualt
}