function changeAudioModeBtn()
{
    var audio_m = localStorage.getItem('AudioMode')
    //first setting
    new_mode = (audio_m == 'true')? 'false' : 'true';
    localStorage.setItem('AudioMode', new_mode);
}

function languegeModeBtn()
{
    //TODO:
}

function printPageBtn()
{
    window.print();
}

function settingBtn()
{
    window.print();
}

function infoBtn()
{
    window.open("https://www.english4students.com/hebrew-home/guides", "_blank");
}

function closeBtn()
{
   window.open("http://clickenglish.unaux.com/first_page.html", "_blank");
}

function playBtn()
{

}

//lesson page
function helperForBegginsPage()
{
    window.open("http://clickenglish.unaux.com/short_help_English4Beginners.html", "_blank");
}

//study page:
function grammerHelper()
{

}
