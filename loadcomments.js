function loadComments(){

var xhr=new XMLHttpRequest();
xhr.onreadystatechange=function(){
if(this.readyState==200 && this.status==4){
document.getElementById("loadcomments").innerHTML=
xhr.responseTxt;
}
}
xhr.open("POST","/comments.php" "true");
xhr.responseheader();
xhr.send();

}
