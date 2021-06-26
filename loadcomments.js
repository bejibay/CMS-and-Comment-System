function loadComments(){
var xhr=new XMLHttpRequest();
xhr.onload=function(){
document.getElementById("loadcomments").innerHTML=
xhr.responseText;
}
xhr.open("GET","/comments.php" true);
xhr.send();
}

