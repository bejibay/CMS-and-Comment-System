
<?php 
//function codes to be called in admin.php, index.php, dashboard.pho
function login(){
$results=array();
$results['title']="Admin Login Form";
$results['description']="Admin Login Form";
if(isset($_POST['login'])){
//user has clicked the login form, login successful
$login = new User;
$login->storeForm($_POST);
$user = User::getUser();
$_SESSION['firstname'] = $user->firstname;
$_SESSION['lastname'] = $user->lastname;
$_SESSION['email'] = $user->lastname;
header("Location:'/dashboard'");
}else{//login failed display error message
$results['errormessage']="Incorrect Username or Password Try Again";
require(TEMPLATE_PATH."/loginform.php");
}
}

function register(){
$results=array();
$results['title']="Account Creation Form";
$results['description']="Account Creation Form";
if(isset($_POST['register'])){
//user has posted the register form attempt to register
$register=new User;
$register->storeForm($_POST);
$user = User::getEmail;
if(!$user)$register->insert();
sendEmail();
$results['registerSuccess']= "check your email to complete your registeration";
}
else{//Form not filled properly
$results['errormessage']="Forms not filled properly";
require(TEMPLATE_PATH. "/registerform.php");
}
}

function logout(){
session_unset();
session_destroy();
header("location:'/login'");
}

function dashboard(){
$results = array();
$results['title'] = "Administration Dashboard";
$results['description'] = "Administration Dashboard";
$results['content']="Dashboard area, carry out your transactions";
require(TEMPLATE_PATH."/dashboard.php");
}

function reset{
$results = array();
$results['title'] =" Reset Login";
$results['description'] = "Reset Login"; 
if(isset($_POST['reset'])){
$reset = new User;
$reset->storeform($_POST);
$reset->updateResetUrl();
$reseter = User::getEmail();
if(!$reseter) $emailError = "Email not found";
sendEmailTo();
$resetSuccess = "Check your email to reset account";
require(TEMPLATE_PATH."/resetform.php");
}
if(isset($_POST['reseturl'])){
if($_GET['reseturl']){
$reset = new User;
$reset->storeform($_POST);
$reset->updatePassword();
require(TEMPLATE_PATH."/reseturlform.php");
}
}
}
}

function newpage(){
$results= array();
$results['title'] = "Create A New Page";
$results['description'] = "Create A new Page";
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
$results['title'] = "Edit A Page";
$results['description'] = "Edit A Page";
$results['formAction']="editPage";
$result['pageheading']="Edit this Page";
$editpage =new Page;
if(isset($_POST['editpage'])){
$editpage->storeForm($_POST);
$editpage->update();
require(TEMPLATE_PATH."/editpage.php");
}
}

function newpost(){
$results= array();
$results['title'] = "Create A New Post";
$results['description'] = "Create A New Post";
$results['formAction']="newPost";
$results['pageheading']="Create A Post";
$createpost =new Post;
if(isset($_POST['createpage'])){
$createpage->storeForm($_POST);
$createpage->insert();
require(TEMPLATE_PATH."/editpost.php");
}
}

function editpost(){
$results= array();
$results['title'] = "Edit A Post";
$results['description'] = "Edit A Post";
$results['formAction']="editPost";
$results['pageheading']="Edit This Post";
$editpost =new Post;
if(isset($_POST['editpost'])){
$editpost->storeForm($_POST);
$editpost->ipdate();
require(TEMPLATE_PATH."/editpost.php");
}
}

function newcategory(){
$results= array();
$results['title'] = "Create A New Category";
$results['description'] = "Create A New Category";
$results['formAction']="newCategory";
$results['pageheading']="Create A Category";
$createcategory =new Category;
if(isset($_POST['createcategory'])){
$createcategory->storeForm($_POST);
$createcategory->insert();
require(TEMPLATE_PATH."/editcategory.php");
}
}

function editcategory(){
$results= array();
$results['title'] = "Edit A Category";
$results['description'] = "Edit A Category";
$results['formAction']="editCategory";
$results['pageheading']="Edit This Category";
$editcategory =new Category;
if(isset($_POST['editcategory'])){
$editcategory->storeForm($_POST);
$editcategory->ipdate();
require(TEMPLATE_PATH."/editcategory.php");
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

function viewcategories(){
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
function getSEOUrl($title){
$title = explode(" ",$title);
$title = array_slice($title,0,9);
$title = implode("-" $title);
return $title;
}

function sendEmail(){
//generate activation URL
$activationurl =md5(rand(0,999).time());
//send activation email
$to = $_POST['email'];
$subject = " Activate your account";
$msg = 'Click on email below to activate <br>
<a href="/activation.php?activationurl='.$activationurl.'">
Click to activate</a >';
$headers = "From:bejibay@gmail.com";
mail($to,$subject,$msg,$headers);
}
function sendEmailTo(){
//generate reset URL
$reseturl =md5(rand(0,999).time());
//send reset email
$to = $_POST['email'];
$subject = " reset your account";
$msg = 'Click on email below to reset <br>
<a href="/reseturl.php?reseturl='.$reseturl.'">
Click to reset</a >';
$headers = "From:bejibay@gmail.com";
mail($to,$subject,$msg,$headers);
}

?>
