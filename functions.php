
<?php 
//function codes to be called in admin.php, index.php, dashboard.pho
function login(){
$result=array();
$result["title"]="Admin Login Form";
$result["pageheading"]="Account Login";
if(isset($_POST['login'])){
//user has clicked the login form, login successful
$login = new User;
$login->storeForm($_POST);
User::getUser();
$username= $_POST['username'];
$_SESSION['username'];
header('Location:"/dashboard");
}
else{//login failed display error message
$result['errormessage']="Incorrect Username or Password, Try Again";
require(TEMPLATE_PATH."/loginform.php");
}
else{// no attempt already made to login
require (TEMPLATE_PATH."/loginform.php";
}
}

function register(){
$result=array();
$result["title"]="Account Creation Form";
$result["pageheading"]="Account Creation";
if(isset($_POST['register'])){
//user has posted the register form attempt to register
$register=new User;
$register->storeForm($_POST);
$register->insert();
$result['registerSuccess']= "check your email to complete your regusteration";
}
else{//Form not filled properly
$results['errormessage']="Forms not filled properly";
require(TEMPLATE_PATH. "/registerform.php");
}
else{// no attempt already made to register
require(TEMPLATE_PATH."/registerform.php");
}
}
function reset(){
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
$results = array();
$results['title'] = "Administration Dashboard";
$results[pageheading'] ="Dashboard Area";
$results['content']="Dashboard area, carry out your transactions";
require(TEMPLATE_PATH."/dashboarx.php");
}

function createpage(){
$result= array;
$result['formAction']="newPage";
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
$result['formAction']="editPage";
$result['pageheading']="Edit this Page";
$editpage =new Page;
if(isset($_POST['editpage'])){
$editpage->storeForm($_POST);
$editpage->update();
require(TEMPLATE_PATH."/editpage.php");
}
}

function createpost(){
{$result= array;
$result['formAction']="newPost";
$result['pageheading']="Create A Post";
$createpost =new Paost 
if(isset($_POST['createpage'])){
$createpage-m>storeForm($_POST);
$createpage->insert();
require(TEMPLATE_PATH."/editpost.php");
}
}

function editpost(){
$result= array;
$result['formAction']="newPost";
$result['pageheading']="Edit This Post";
$editpost =new Post
if(isset($_POST['editpost'])){
$editpost->storeForm($_POST);
$editpost->ipdate();
require(TEMPLATE_PATH."/editpost.php");
}
}

function viewpages(){
Page::getList();
foreach($row as $row){
<ul>
echo "<li><a href=".$row['url'].">".$row['title']."</a></li>";
</ul>
}
}


function viewposts(){
Post::getList();
foreach($row as $row){
<ul>
echo "<li><a href=".$row['URL'].">".$row['title']."</a></li>":
</ul>
}
}



<script>
function delPage(){
var deletePage;
deletePage=confirm("Are you sure you Want to delete this page");
if (deletePage=="ok"){<?php function deletepage();?>}
else{cancel;}}

function delPost(){
var deletePost;
deletePost=confirm("Are you sure you Want to delete this post");
if (deletePost=="ok"){<?php function deletepost();?}
else{cancel;}}
</script>
}

function page(){
if(isset($_GET['page'])){
$results = array();
$results['page'] = $Page::getByUrl($url);
require(TEMPLATE_PATH."/page.php");
}
}

function post(){
if(isset($_GET['post'])){
$results = array();
$results['post'] = $Post::getByUrl($url);
require(TEMPLATE_PATH."/post.php");
}
}

function notfound(){
if(isset($_GET['notfound'])){
$results = array();
$results['notfound'] != $Notfound::getByUrl($url);
require(TEMPLATE_PATH."/notfound.php");
}
}

function homepage(){
if(!isset($_GET['page'])||!isset($_GET['post']) 
||!isset($_GET['notfound'])){
require(TEMPLATE_PATH."/homepage.php");
}
}
?>











