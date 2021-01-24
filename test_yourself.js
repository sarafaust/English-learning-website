 var transWorld= ["אבא", "חום", "יש", "ו..." , "חולצה", "גם", "מכנסיים", "אז", "כתום"]
 var wordsList2 = ["Father","brown", "has",  "and", "shirt", "also","pants", "So", "orange"]
var g_current_q = 0
function loadTestData()
{
	num_option = 5
	document.getElementById("prgressTestID").max = wordsList2.length;
	document.getElementById("englishWroldID").innerHTML =  wordsList2[0]
	//create btns
	html_code = ""
	for (var i = 0; i < num_option; i++) {
		html_code +="<button class='answer' id='Ans"+i+"ID' onclick='updateNextQ()'>מילה בעברית</button>"
	}
	document.getElementById("answerBtnwrrrprID").innerHTML = html_code
	updateNextQ()
}

function updateNextQ()
{
	if(g_current_q == wordsList2.length)
	{
		return
	}
	document.getElementById("englishWroldID").innerHTML  = wordsList2[g_current_q]
	option_array = Array.from({length: num_option}, () => Math.floor(Math.random() * wordsList2.length));
	for (var j = 0; j < num_option; j++) {
		if(option_array[j] == g_current_q)
		{
			opIdx = g_current_q+1
			if(opIdx == wordsList2.length)
			{
				opIdx-=2
			}
		}
		else
		{
			opIdx = option_array[j]
		}
		document.getElementById("Ans"+(j)+"ID").innerHTML =  transWorld[opIdx]
	}
	q_idx = Math.floor(Math.random() * num_option);
	document.getElementById("Ans"+(q_idx)+"ID").innerHTML =  transWorld[g_current_q]
	g_current_q++
	document.getElementById("prgressTestID").value = g_current_q;

}