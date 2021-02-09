 var transWorld= ["אבא", "חום", "יש", "ו..." , "חולצה", "גם", "מכנסיים", "אז", "כתום"]
 var wordsList2 = ["Father","brown", "has",  "and", "shirt", "also","pants", "So", "orange"]
var g_current_q = 0
var g_current_char = 0
var point_per_char
var myPoints = 0
var model
var g_last_length = 1
function loadTestData()
{
	sum=0
	for (var i = 0; i < wordsList2.length; i++) {
		sum+=wordsList2[i].length
	}
	point_per_char = 100 / sum
	document.getElementById("prgressTestID").max = wordsList2.length;
	initWordQuestion()

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

function initWordQuestion()
{
	document.getElementById("heblishWroldID").innerHTML =  transWorld[g_current_q]
	document.getElementById("inputAndID").value =  wordsList2[g_current_q][0]
	document.getElementById("nextWordID").style.display = "none";
	document.getElementById("prgressTestID").value = g_current_q+1;
}

function showClueFunc()
{
	if(g_current_q > wordsList2.length) return;
	currentW = wordsList2[g_current_q]
	if(g_current_char+1 <= currentW.length)

	{
		document.getElementById("inputAndID").value = currentW.substring(0, g_current_char+2)/*+1 for next char and +1 to icnlude the char*/
		g_current_char++
	}
	if(g_current_char+1 == currentW.length)
	{
		document.getElementById("nextWordID").style.display = "block";
	}
}

function showAnsFunc()
{
	if(g_current_q > wordsList2.length)
	{
		return
	}

	if(g_current_q > wordsList2.length) return;
	for (var i = g_current_char; i < wordsList2[g_current_q].length; i++) {
		showClueFunc()
	}
}

function nextWordFunc()
{
	if(g_current_q > wordsList2.length)
	{
		return
	}

	g_current_char = 0
	g_last_length = 1
	g_current_q ++
	if(g_current_q >= wordsList2.length)
	{
		showPoints()
		return
	}
	document.getElementById("prgressTestID").value = g_current_q+1;
	initWordQuestion()

}

function checkChar()
{
	if(g_current_q > wordsList2.length)
	{
		return
	}

	subString = document.getElementById("inputAndID").value

	//add char
	if(subString.length > g_last_length)
	{
		g_current_char++
		g_last_length ++

	}
	else
	{
		//remove char
		g_current_char--
		g_last_length--
	}

	if(subString == (wordsList2[g_current_q]))
	{
		myPoints+= point_per_char*subString.length
		nextWordFunc()
	}

	if(g_current_char+1 >= wordsList2[g_current_q].length)
	{
		document.getElementById("nextWordID").style.display = "block";
		return;
	}
}

function showPoints()
{
	if(g_current_q > wordsList2.length)
	{
		return
	}

	// cleanData();//
	document.getElementById("textPointsID").innerHTML =Math.min(Math.floor(myPoints),100);
	modal = document.getElementById("myModal");

	modal.style.display = "block";
}