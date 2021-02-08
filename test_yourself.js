 var imported = document.createElement('script');
imported.src = 'englishWeb.js';
document.head.appendChild(imported);

var transWorld
var wordsList2
var g_current_q = 0
function loadTestData()
{
    transWorld= HebListArray
    wordsList2 = englishWordsListArray
	num_option = 5
	document.getElementById("prgressTestID").max = data_length;
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
	if(g_current_q == data_length)
	{
		return
	}
	document.getElementById("englishWroldID").innerHTML  = wordsList2[g_current_q]
	option_array = Array.from({length: num_option}, () => Math.floor(Math.random() * data_length));
	for (var j = 0; j < num_option; j++) {
		if(option_array[j] == g_current_q)
		{
			opIdx = g_current_q+1
			if(opIdx == data_length)
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