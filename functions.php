
<?php 
//function codes to be called in admin.php, index.php, dashboard.pho
function login(){
$result=array();
$result["title"]="Admin Login Form";
$result["pageheading"]="Fill in the Login Form";
if(isset($_POST['login'])){
//user has clicked the login form, login successful
$login = new User;
$login->storeForm($_POST);
User::getUser();
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
if(isset($_POST['editpage'])){
$createpage->storeForm($_POST);
$createpage->insert();
require(TEMPLATE_PATH."/editpage.php");
}
}
function editpage(){
$result= array;
$result['formAction']=editPage;
$result['pageheading']="Edit this Page";
$editpage =new Page;
if(isset($_POST['editpage'])){
$editpage->storeForm($_POST);
$editpage->update();
require(TEMPLATE_PATH."/editpage.php");
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

function editpost(){
$result= array;
$result['formAction']=newPost;
$result['pageheading']="Edit This Post";
$editpost =new Post
if(isset($_POST['editpost'])){
$editpost->storeForm($_POST);
$editpost->ipdate();
require(TEMPLATE_PATH."/editpost.php");

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











