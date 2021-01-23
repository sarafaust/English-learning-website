var GLOBAL_DICT = {};

function createDict()
{
	for (var i = 0; i < inputDictArray.length; i++) {
		GLOBAL_DICT[inputDictArray[i]] = hebDictArr[i];
		GLOBAL_DICT[inputDictOtherFormatArray[i]] = hebDictArr[i];
	}
}

function translateWord()
{
	inputText = document.getElementById("dictInTextID").value;
	document.getElementById("dictTranID").innerHTML = GLOBAL_DICT[inputText]
}