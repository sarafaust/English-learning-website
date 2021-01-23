var imported = document.createElement('script');
imported.src = 'defines.js';
document.head.appendChild(imported);

var imported = document.createElement('script');
imported.src = 'dictionary.js';
document.head.appendChild(imported);

//another_question - page
var listQuestion = ["Q", "W", "H", "G", "Y" , "J"]
var listAnsNum = ["2", "1", "3", "4", "0" , "5"]
var listOppArr = ["וּאַי","דַבְּליוּ","קִיוּ","'אֵיץ","גִי","גֵי"]
//``
var g_flag_ans = false
var userAns = []


var modal

function cleanData ()
{
	g_flag_ans = false
	for (var i = 0; i < listQuestion.length; i++) {
		listQuestion[i] = -1
	}
}
function loadQues()
{
	createDict();
	htmlq = ""
	for (var i = 0; i < listQuestion.length; i++) {
		numQ = i+1
		htmlq+="<div class='addQC'><div class='wrppQC'><div class='numQC' id='numQ"+i+"ID'>"+numQ+")</div><input type='text' class='inputAnsTxtC' value='"+listQuestion[i]+"' id='inputAns"+i+"ID'></div><div class='wrrpBtnC'>"
		for (var j = 0; j < listOppArr.length; j++)
		{
			htmlq+="<button class='btnAnsC' id='opt"+j+"Q"+i+"ID' onclick='updateAns("+i+","+j+")'>"+listOppArr[j]+"</button>"
		}
		htmlq+="</div></div>"
		userAns.push(-1)
	}
	document.getElementById("questionWrrprID").innerHTML = htmlq;

	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementById("closeSpanID");

	// When the user clicks the button, open the modal
	// btn.onclick = function() {
	//   modal.style.display = "block";
	// }

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	  }
	}

}

function updateAns(num_q, num_op)
{
	//for first answer
	g_flag_ans = true

	for (var i = 0; i < listOppArr.length; i++) {
		id = "opt"+i.toString()+"Q"+num_q.toString()+"ID"
		document.getElementById(id).style.backgroundColor ="white";
	}
	id= "opt"+num_op.toString()+"Q"+num_q.toString()+"ID"
	document.getElementById(id).style.backgroundColor ="#ff00ff";
	userAns[num_q] = num_op
}

function checkAllAns()
{
	point_per_q = 100/userAns.length
	points = 0
	for (var i = 0; i < userAns.length; i++)
	{
		if(userAns[i] == listAnsNum[i])
		{
			points+= point_per_q
		}
		else
		{

			id = "opt"+listAnsNum[i].toString()+"Q"+i.toString()+"ID"
			document.getElementById(id).style.backgroundColor ="green";
			if(userAns[i] != -1)
			{
				id = "opt"+userAns[i].toString()+"Q"+i.toString()+"ID"
				document.getElementById(id).style.backgroundColor ="red";
			}

		}
	}
	cleanData();
	document.getElementById("textPointsID").innerHTML = Math.floor(points);
	modal = document.getElementById("myModal");

	modal.style.display = "block";
}

