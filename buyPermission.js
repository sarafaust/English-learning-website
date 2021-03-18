//include englishWeb.js
var imported = document.createElement('script');
imported.src = 'englishWeb.js';
document.head.appendChild(imported);

GLOBAL_PERMISSION = "FREE2021"
function checkCodePerm()
{
    var persmission = document.getElementById("permissionID").value
    if(persmission == GLOBAL_PERMISSION)
    {
        userKey = getUserKey()
            $.ajax({
            type: "POST",
            url: "buyServer.php",
            async: false,
            data: {userKey: userKey},
            success: function(response) { resualt = response; }
            });


    }
    closeBtn()
}