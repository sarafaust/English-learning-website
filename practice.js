var imported = document.createElement('script');
imported.src = 'defines.js';
document.head.appendChild(imported);

var imported = document.createElement('script');
imported.src = 'englishWeb.js';
document.head.appendChild(imported);
//textLsnFile <- string that contains TSL input
var g_currentWord = 0
var g_last_ans = true
var inCorrArr = [];
var CorrArr;
var g_points = 0
var g_points_arr = [4,3,2,1]
var g_points_Helparr = [3,2,2,1]

var g_ans_array = ["Father","brown", "has", "has",  "has", "and", "shirt", "also", "has","pants", "So","orange" ,"and"]
var string_exercise = "This is #.  Father is a man.  Father is tall.  He is a tall man. Father is a tall man. Father has # shoes.   He # brown shoes. Father # an orange shirt. He # brown shoes # an orange shirt. This man is Father. Father is the tall man with brown shoes and an orange #. He # has blue pants. Father # blue #. # he has an # shirt, blue pants # brown shoes. "
var wordsList2 = ["Father","brown", "has", "has", "has","has",  "and",  "and", "shirt", "also","pants", "So", "orange"]

var g_string_to_questions = []
var g_ans_array2 = []
var g_shufleAns
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

function updateDataPage()
{
    document.getElementById("textTitleID").innerHTML = " אנגלית ל " + getHebCategory() + " רמה  "+ getLevel() + " שיעור " + (parseInt(getCourseNum())+1)
	document.getElementById("imageWID").style.backgroundImage = "url('picture1.JPG')";
    str = ""
    answerTxt = ""
    flagArr = []
    for(i=0; i<textLsnFile.length; i++)
    {
        if(textLsnFile[i]!= "#")
        {
            str+=textLsnFile[i]
        }
        else
        {
            i++
            while((textLsnFile[i]!= " ") && (textLsnFile[i]!= ",") && (textLsnFile[i]!= "."))
            {
                answerTxt += textLsnFile[i]
                i++
            }
            if(str!="")
            {
                g_string_to_questions.push(str)
                flagArr.push("Q")
            }
            if(answerTxt!= "")
            {
                g_ans_array2.push(answerTxt)
                flagArr.push("A")
            }

            str = ""
            answerTxt = ""
        }
    }
    if(str!="")
    {
        g_string_to_questions.push(str)
        flagArr.push("Q")
    }
    if(answerTxt!= "")
    {
        g_ans_array2.push(answerTxt)
        flagArr.push("A")
    }

	CorrArr = Array(exerciseWordList.length).fill(0);
    g_shufleAns = g_ans_array2.slice();
	g_shufleAns = shuffle(g_shufleAns)
    html_code = "";
	for (i = 0; i < g_shufleAns.length; i++) {
        html_code += "<button id='wordID"+i+"'class='wordC' onclick='pressWordExe("+i+")' value="+i+">"+g_shufleAns[i]+"</button>";
      }
	document.getElementById("wordsWrpprID").innerHTML=html_code;

	html_code = "";
	n=0;
    q=0
    a=0
    for(i=0; i< flagArr.length; i++)
    {
        if(flagArr[i]=="Q")
        {
            html_code+= "<div class='wordTextClass' >"+g_string_to_questions[q]+"</div>"
            q++
        }
        else
        {
            html_code+= "<div class='listWordsC' id='wrappWordID"+a+"'><div class='wordInListExeAC2'  id='ansWordID"+a+"'></div></div>"
            a++
        }
    }

	document.getElementById("ListContentID").innerHTML=html_code;
	document.getElementById("wrappWordID"+g_currentWord).className  = "listWordsCSelect";
	document.getElementById("labelsCText").innerHTML  = g_points;
    var urlPath = 'English4Beginners/LEVEL'+level+'/LESSON'+lesson+'/pic/picture1.JPG'
    var urlString = 'url('+urlPath+')';
    document.getElementById("imageWID").style.backgroundImage =  urlString;
}

function pressWordExe(wordnum)
{
	id = "wordID"+wordnum;
	if((g_ans_array2[g_currentWord] == g_shufleAns[wordnum]))
	{
		document.getElementById(id).style.backgroundColor = "green";
		for(i=0; i<inCorrArr.length;i++)
			document.getElementById(inCorrArr[i]).style.backgroundColor = "white";
		CorrArr[wordnum] = 1
		document.getElementById("wrappWordID"+g_currentWord).className = "listWordsC";
		document.getElementById("ansWordID"+g_currentWord).innerHTML  = g_ans_array2[g_currentWord]

		g_currentWord++
		document.getElementById("wrappWordID"+(g_currentWord)).className = "listWordsCSelect";

		//points
		g_points+=calcPoints(inCorrArr.length)
		document.getElementById("labelsCText").innerHTML  = g_points;

		inCorrArr = []
	}
	else
	{
		document.getElementById(id).style.backgroundColor = "red";
		inCorrArr.push(id)
	}
}

function calcPoints(numIncorr)
{

	switch(numIncorr) {
	  case 0:
	    return g_points_arr[0];
	  case 1:
	    return g_points_arr[1]
	  case 2:
	    return g_points_arr[2]
      case 3:
	    return g_points_arr[2]
	  default:
    return g_points_arr[3]
	}
}

function showAns()
{
	var answer = window.confirm("שים לב, ציונך לשיעור זה יופחת! להמשיך? ");
	if (answer) {
	    //some code
	wordnum = 0;
	for(i=0;i<g_ans_array2.length;i++)
	{
		if(g_ans_array2[g_currentWord] == g_shufleAns[i])
		{
			wordnum = i;
			break;
		}
	}
	id = "wordID"+wordnum;
	document.getElementById(id).style.backgroundColor = "green";
	for(i=0; i<inCorrArr.length;i++)
		document.getElementById(inCorrArr[i]).style.backgroundColor = "white";

	CorrArr[wordnum] = 1
	document.getElementById("wrappWordID"+g_currentWord).className = "listWordsC";
	document.getElementById("ansWordID"+g_currentWord).innerHTML  = g_ans_array2[g_currentWord]

	g_currentWord++
	document.getElementById("wrappWordID"+(g_currentWord)).className = "listWordsCSelect";

	//points
	g_points_arr = g_points_Helparr

	inCorrArr = []
  }
}

function vacableFun()
{
	window.open("vocabulary_page.html", "_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=200,width=600,height=800");
}

function InsBtnFun()
{
	window.open("instruction_lesson.html", "_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=200,width=600,height=800");
}

function anotherExplnationBtnFunc()
{
	window.open("help.pdf", "_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=200,width=600,height=800");
}

function grammerSignsBtnFun()
{

	window.open("grammerSign_page.html", "_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=200,width=600,height=800");
}

