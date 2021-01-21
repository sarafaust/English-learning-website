var imported = document.createElement('script');
imported.src = 'defines.js';
document.head.appendChild(imported);
var g_currentWord = 0
var g_last_ans = true
var inCorrArr = [];
var CorrArr;
var g_points = 0
var g_points_arr = [4,3,2,1]
var g_points_Helparr = [3,2,2,1]
var wordlist_tmp

function updateDataPage()
{

	// document.getElementById("imageWID").style.background  = "#f3f3f3 url('img_tree.png') no-repeat right top";;
	CorrArr = Array(exerciseWordList.length).fill(0);
	html_code = "";
	for (i = 0; i < wordsList.length; i++) {
        html_code += "<button id='wordID"+i+"'class='wordC' onclick='pressWordExe("+i+")' value="+i+">"+wordsList[i]+"</button>";
      }
	document.getElementById("wordsWrpprID").innerHTML=html_code;

	html_code = "";
	for (var i = 0; i <exerciseWordList.length; i++)
	{
		html_code+= "<div class='listWordsC' id='wrappWordID"+i+"'><div class='wordInListExeQC'>" + exerciseWordList[i]+ "</div><div class='wordInListExeAC'  id='ansWordID"+i+"'></div></div>"
	}
	document.getElementById("ListContentID").innerHTML=html_code;
	document.getElementById("wrappWordID"+g_currentWord).className  = "listWordsCSelect";
	document.getElementById("labelsCText").innerHTML  = g_points;
}

function pressWordExe(wordnum)
{
	if(CorrArr[wordnum] == 1)
	{
		return;
	}
	id = "wordID"+wordnum;
	if((exerciseAnsWordList[g_currentWord] == wordsList[wordnum]))
	{
		document.getElementById(id).style.backgroundColor = "green";
		for(i=0; i<inCorrArr.length;i++)
			document.getElementById(inCorrArr[i]).style.backgroundColor = "white";
		CorrArr[wordnum] = 1
		document.getElementById("wrappWordID"+g_currentWord).className = "listWordsC";
		document.getElementById("ansWordID"+g_currentWord).innerHTML  = exerciseAnsWordList[g_currentWord]

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
	for(i=0;i<exerciseAnsWordList.length;i++)
	{
		if(exerciseAnsWordList[g_currentWord] == wordsList[i])
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
	document.getElementById("ansWordID"+g_currentWord).innerHTML  = exerciseAnsWordList[g_currentWord]

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

