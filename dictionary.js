var GLOBAL_DICT = {};
var inputDictArray;

var inputDictOtherFormatArray;
var hebDictArr ;
var ArbDictArr ;

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

function loadDic()
{
    GLOBAL_DICT = JSON.parse(localStorage.getItem('DictionaryData'));
}

function saveDic()
{
    alert("save");
    localStorage.setItem('DictionaryData', JSON.stringify(GLOBAL_DICT));
}