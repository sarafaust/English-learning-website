 var GO_FLAG = 99;
 var clickedWordIdx = 0 // is a defualt word
 var lesson_path=""

 function loadData()
 {
    document.getElementById("tftableID").innerHTML = html_codeGrammer

     document.getElementById("titleID").innerHTML  = "  אוצר מילים לרמה "+level+ " לשיעור " + lesson
     document.getElementById("progressBarID").max = data_length;
     var html_code = "<select size='5' name='' id='selectListID' class='form-control'>"+'\n';
      for (i = 0; i < data_length; i++) {
        html_code += "<option   onclick='pressWord("+i+")' value="+i+">"+englishWordsListArray[i]+"</option>";
      }
      html_code+="</select>"
      document.getElementById("WorldList").innerHTML=html_code;
      pressWord(0);
      document.getElementsByTagName("option")[0].selected = true;
 }

 function pressWord(wordIdx)
 {
    max_word = data_length
    if(wordIdx == GO_FLAG)
    {
        var e = document.getElementById("selectListID");
        wordIdx = e.options[e.selectedIndex].value;
    }
    document.getElementsByTagName("option")[wordIdx].selected = true;

    wordIdx = Math.min(max_word, wordIdx);
    wordIdx = Math.max(0, wordIdx);
    var urlPath = getPicPath(lesson, level)
    var urlString = 'url('+urlPath+')';
    clickedWordIdx = wordIdx;
    document.getElementById("imgWordId").style.backgroundImage =  urlString;
    document.getElementById("imgWordId").src =  urlPath;
    // document.getElementById("textMemHelpID").innerHTML  =  memHelp[wordIdx];
    document.getElementById("progressBarID").value =Math.min( wordIdx +1, max_word+1) ;
    document.getElementById("wordCharId").innerHTML= englishWordsListArray[wordIdx];
    document.getElementById("worldPartsId").innerHTML= PartOfSpeechHebListArray[wordIdx];
    document.getElementById("worldHebTransId").innerHTML= HebListArray[wordIdx];
    document.getElementById("worldHebId").innerHTML=EngInHebListArray[wordIdx];
 }
