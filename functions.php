
<?php 

// function codes



<?php 
function login(){
$result=array();
$result["title"]="Admin Login Form";
$result["pageheading"]="Fill in the Login Form";
if(isset($_POST['login'])){
//user has clicked the login form, login successful
$login = new User;
$login->store form($_POST);
User::get user();
$username= $_POST['username'];
$_SESSION['username'];
header('location:"/dashboard");
}
else{//login failed display error message
$result['errormessage']="Incorrect Username or Password, Try Again";
require(TEMPLATE_PATH."/loginfurm.php");
}
}
else{// no attempt already made to login
require (TEMPLATE_PATH."/loginform.php";

}
}

function register(){
$result=array();
$result["title"]="Account Creation Form";
$result["pageheading"]="Fill in the Form to create your account";
if(isset($_POST['register'])){
//user has posted the register form attempt to register
$register=new User;
$register->storeForm($_POST);
register->insert();
header("location:admin.php);

else{//Form not filled properly
$results['errormessage']="Forms not filled properly";
require(TEMPLATE_PATH. "/forms/registerform.php");
}
else{// no attempt already made to register
require(TEMPLATE_PATH./forms/register.php";
}

function resetpassword(){
$SQL="SELECT reseturl FRom Admin where reseturl=$url";
if(mysql_num_rows==1) { 
$results['successmessage']="password correctly changed you can login now";
header(/login);}
else{//Your login details not correect
include forms/resetform.php;
}
else{//Attempt not yet made to reset password
include forms/resetform.php;
}

}
function logout(){

unset($_SESSION['username']);
header(location:"/login");
}
function dashboard(){
$results['content']="Dashboard area, carry out your transactions";

}

function createpage(){
$result= array;
$result['formAction']=newPage;
$result['pageheading']="Create A Page";
$createpage =new Page
if(isset($_POST['createpage'])){
$createpage->storeForm($_POST);
$createpage->insert();
require(TEMPLATE_PATH."/editpage.php");
}

}
}

function createpost()
{$result= array;
$result['formAction']=newPost;
$result['pageheading']="Create A Postm";
$createpost8 =new Paost 
if(isset($_POST['createpage'])){
$createpage-m>storeForm($_POST);
$createpage->insert();
require(TEMPLATE_PATH."/editpost.php");
}

if(isset($_POST['createpost'])){
$sql="INSERT into pages("content","category","date","remoteaddress")VALUES($content,$category,$date,$remoteaddress)";
mysqli_query($conn,$sql);
if(mysqli_lasT_id){function updatepage();}


}

functionviewpages(){

$sql="SELECT everything FROM pages";
mysqli_query($conn,$sql);
if(mysqli_lasT_id){function updatepage();}
}

function viewposts(){

$sql="SELECT everything FROM posts";
mysqli_query($conn,$sql);
if(mysqli_lasT_id){function updatepage();}
}
}

function editpage(){
//get data out of database on load of url
$sql="SELECT everything FROM pages";
mysqli_query($conn,$sql);
if(mysqli_lasT_id){

// ajax refresj on submit of changes
function editpage();}
}
}

function editpost(){
//get data out of database on load of url
$sql="SELECT everything FROM posts";
mysqli_query($conn,$sql);
if(mysqli_lasT_id){

// ajax refresj on submit of changes
function editpost();}
}
}

function deletepage()
<script>
var deletePage;
deletePage=confirm("Are you sure you Want to delete this page");
if (deletePage=="ok"){fuction delPage;}
else{cancel;}
</script?

include "deletepost.php";
<script>
var deletePost;
deletePost=confirm("Are you sure you Want to delete this post");
if (deletePost=="ok"){fuction delPost;}
else{cancel;}
</script?
}

?>











