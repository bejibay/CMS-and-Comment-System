
<?php 

// function codes



<?php 
function login(){
$result=array();
$result["title"]="Admin Login Form";
$result["pageheading"]="Fill in the Login Form";
if(isset($_POST['login'])){
$username= $_POST['username'];
$password=encrypted($password);
//user has posted the login form attempt to login
$SQL="SELECT username, password FRom Admin where username=$username AND password=$password";
if(mysql_num_rows==1) { $_SESSION['username']== $username; header ("templates/dashboard");}
else{}//login failed display errot message
$results['error message']="incorrect admin username or passworsd, Login failded, try again";
include "forms/loginform.php";
}
else{// no attempt already made to login
include "forms/loginform.php";

}
}


function register(){
$result=array();
$result["title"]="Account Creation Form";
$result["heading"]="Fill in the Form to create your account";
if(isset($_POST['register'])){
$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$username= $_POST['username'];
$email= $_POST['email'];
$password=encrypted($password);

//user has posted the register form attempt to register
$SQL="INSERT into admin ("fisrtsname", "lastname", "username", "email", "password") VALUES 
($firstname, $lastname,$username, $email)";
if(mysql_las_id) {$result["SuccessRegister"]="Thanks For Registering, You can now Login In";header(/login);}
else{//Form not filled properly
$results['error message']="Forms not filled properly";
include "forms/registerform.php";
}
else{// no attempt already made to register
include "forms/register.php";
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
}

function homepage(){

header ("/login");
}

function dashboard(){
$results['content']="Dashboard area, carry out your transactions";

}

function createpage(){

if(isset($_POST['createpage'])){
$sql="INSERT into pages("firstname","lastname","username","password")VALUES($firstname,$lastname,$username,$password)";
mysqli_query($conn,$sql);
if(mysqli_lasT_id){function updatepage();}

}
}

function createpost()
{if(isset($_POST['createpost'])){
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











