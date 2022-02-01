
<?php 
//function codes to be called in admin.php, index.php, dashboard.pho
function login(){
$results=array();
$results['title']="Admin Login Form";
$results['pageheading']="Account Login";
if(isset($_POST['login'])){
//user has clicked the login form, login successful
$login = new User;
$login->storeForm($_POST);
User::getUser();
$username= $_POST['username'];
$_SESSION['username'];
header("Location:'/dashboard'");
}else{//login failed display error message
$results['errormessage']="Incorrect Username or Password Try Again";
require(TEMPLATE_PATH."/loginform.php");
}
}

function register(){
$results=array();
$results['title']="Account Creation Form";
$results['pageheading']="Account Creation";
if(isset($_POST['register'])){
//user has posted the register form attempt to register
$register=new User;
$register->storeForm($_POST);
$register->insert();
$results['registerSuccess']= "check your email to complete your regusteration";
}
else{//Form not filled properly
$results['errormessage']="Forms not filled properly";
require(TEMPLATE_PATH. "/registerform.php");
}
}

function logout(){
unset($_SESSION['username']);
header("location:'/login'");
}

function dashboard(){
$results = array();
$results['title'] = "Administration Dashboard";
$results['pageheading'] ="Dashboard Area";
$results['content']="Dashboard area, carry out your transactions";
require(TEMPLATE_PATH."/dashboard.php");
}

function createpage(){
$results= array();
$results['formAction']="newPage";
$results['pageheading']="Create A Page";
$createpage =new Page;
if(isset($_POST['editpage'])){
$createpage->storeForm($_POST);
$createpage->insert();
require(TEMPLATE_PATH."/editpage.php");
}
}

function editpage(){
$results= array();
$results['formAction']="editPage";
$result['pageheading']="Edit this Page";
$editpage =new Page;
if(isset($_POST['editpage'])){
$editpage->storeForm($_POST);
$editpage->update();
require(TEMPLATE_PATH."/editpage.php");
}
}

function createpost(){
$results= array();
$results['formAction']="newPost";
$results['pageheading']="Create A Post";
$createpost =new Post;
if(isset($_POST['createpage'])){
$createpage-m>storeForm($_POST);
$createpage->insert();
require(TEMPLATE_PATH."/editpost.php");
}
}

function editpost(){
$results= array();
$results['formAction']="newPost";
$results['pageheading']="Edit This Post";
$editpost =new Post;
if(isset($_POST['editpost'])){
$editpost->storeForm($_POST);
$editpost->ipdate();
require(TEMPLATE_PATH."/editpost.php");
}
}

function viewpages(){
Page::getList();
foreach($row as $row){
echo "<ul>";
echo "<li><a href=".$row['url'].">".$row['title']."</a></li>";
"</ul>";
}
}

function viewposts(){
Post::getList();
foreach($row as $row){
echo "<ul>";
echo "<li><a href=".$row['url'].">".$row['title']."</a></li>";
echo "</ul>";
}
}

function homepage(){
if(!$_GET['page']||!$_GET['post']
||!$_GET['notfound']){
require(TEMPLATE_PATH."/homepage.php");
}
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
?>
