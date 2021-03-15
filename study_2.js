var GO_FLAG = 99;
 var clickedWordIdx = 0 // is a defualt word
 var wordsList2 = ["Father","brown", "has",  "and", "shirt", "also","pants", "So", "orange"]
 var wordsList2Heb = [" ָדְ'ר", " בְּראַוּן", "הֱז", "אֱנְד", "שִׁרְט", "אוֹלסוֹוּ", "פֱּנְטְס" ,"סוֹוּ", "אוֹרֲנְג "]
 var partsHeb = ["adjective","adjective","adjective","adjective","adjective","adjective","adjective","adjective","adjective"]
 var transWorld= ["אבא", "חום", "יש", "ו..." , "חולצה", "גם", "מכנסיים", "אז", "כתום"]
 var memHelp = [
 "",
 "ראה בדמיונך עוגיות בראוניס חומות ",
 "",
 "",
 "",
 "",
 "ראה בדמיונך את הפנתר-הורוד לובש מכנסיים.",
 "",
 " נשמע כמו אוראנג' (חברת פלאפון. שצבע הלוגו שלה הוא כתום).  "
 ]
 function loadData()
 {
    document.getElementById("progressBarID").max = wordsList2.length;
     var html_code = "<select size='5' name='' id='selectListID' class='form-control'>"+'\n';
      for (i = 0; i < wordsList2.length; i++) {
        html_code += "<option   onclick='pressWord("+i+")' value="+i+">"+wordsList2[i]+"</option>";
      }
      html_code+="</select>"
      document.getElementById("WorldList").innerHTML=html_code;
      pressWord(0);

 }

 function pressWord(wordIdx)
 {
    max_word = wordsList2.length
    if(wordIdx == GO_FLAG)
    {
        var e = document.getElementById("selectListID");
        wordIdx = e.options[e.selectedIndex].value;
    }
    wordIdx = Math.min(max_word, wordIdx);
    wordIdx = Math.max(0, wordIdx);
    // var urlString = 'url(buttons/' + imagePrefix + '.png)';
    // var urlString = 'url(English4Beginners/LEVEL1/LESSON1/pic/'+wordsList2[wordIdx]+'.jpg)';
    var urlPath = getPathCategory()+'/LEVEL'+level+'/LESSON'+lesson+'/pic/picture1.JPG'
    if(getCategory()!= BEGINNERS)
    {
      urlPath = getPathCategory()+'/LEVEL'+level+'/LESSON'+lesson+'/pic/picture1.jpg'
    }
    // alert(urlPath)
    var urlString = 'url('+urlPath+')';
    clickedWordIdx = wordIdx;
    document.getElementById("imgWordId").style.backgroundImage =  urlString;
    // document.getElementById("imgWordId").src =  'English4Beginners/LEVEL1/LESSON1/pic/'+wordsList2[wordIdx]+'.jpg';
    document.getElementById("imgWordId").src =  'picture1.JPG';
    document.getElementById("textMemHelpID").innerHTML  =  memHelp[wordIdx];
    document.getElementById("progressBarID").value =Math.min( wordIdx +1, max_word+1) ;
    document.getElementById("wordCharId").innerHTML= wordsList2[wordIdx];
    document.getElementById("worldPartsId").innerHTML= partsHeb[wordIdx];
    document.getElementById("worldHebTransId").innerHTML= transWorld[wordIdx];
    document.getElementById("worldHebId").innerHTML=wordsList2Heb[wordIdx];
 }
