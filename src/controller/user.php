
<?php 
require_once WORKING_DIR_PATH."/src/model/user.php";
function register(){
$results=array();
$results['title']="Account Creation Form";
$results['description']="Account Creation Form";
$userdata = array();
$reseturl = md5(rand(0,999).time());
if(isset($_POST['register'])){
if(isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) 
&& isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword']) 
&& isset($_POST['ipaddress'])){
if($_POST['password'] == $_POST['confirmpassword']){
$userdata =['username'=>$_POST['username'],'firstname'=>$_POST['firstname'],'lastname'=>$_POST['lastname'],
'email'=>$_POST['email'],'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT),'ipaddress'=>$_POST['ipaddress'],'reseturl'=>$reseturl];
$user = new Userdata($userdata);
$results['checkUsername'] = $user->verifyUsername($_POST['username']);
if($results['checkUsername'])$results['usernameError'] = 'Username already exists';
$results['checkEmail'] = $user->verifyUsername($_POST['email']);
if($results['checkEmail'])$results['emailError'] = 'Email already exists';
if(!$results['usernameError'] || !$results['emailError'] ){
$results['success'] = $user->insert("INSERT INTO userdata(username,firstname,lastname,email,password,
reseturl,ipaddress)VALUES(:username,:firstname,:lastname,:email,:password,:reseturl,:ipaddress)",$userdata);
if($results['success']) emailToActivate($_POST['email'],$reseturl);
$results['registerSuccess']= "check your email to complete your registeration";
}
}else{$results['errorMessage'] = "Password do not match";
}
}else{$results['errorMessage'] = "Forms not filled properly";
}
}
require(WORKING_DIR_PATH."/src/views/admin/registerform.php");
}


function login(){
$results=array();
$results['title']="Admin Login Form";
$results['description']="Admin Login Form";
$results['errorMessage'] = " ";
$userdata = array();
$hashpassword ="";
if(isset($_POST['login'])){
if(isset($_POST['username']) && isset($_POST['password'])){
$userdata = ['username'=>$_POST['username'], 'password'=>$_POST['password']];}
$user = new Userdata($userdata);
$verifiedusername = $user->verifyUsername($_POST['username']);
if(is_array($verifiedusername)){
foreach($verifiedusername as $key=>$value){
 $_SESSION['firstname'] = $value['firstname'];
 $_SESSION['lastname'] = $value['lastname'];
 $_SESSION['userid']  =$value['id'];
 $_SESSION['password'] = $value['password'];
 $_SESSION['email'] = $value['email'];
}

$result = $user->select("SELECT b.* FROM userdata a INNER JOIN userrole b ON a.userroleid = b.id 
WHERE email =:email",['email'=>$_SESSION['email']] );
if(is_array($result)){
foreach($result as $key=>$value){
$_SESSION['canCreate'] = $value['canCreate'];
$_SESSION['canRead'] = $value['canRead'];
$_SESSION['canUpdate']  =$value['canUpdate'];
$_SESSION['canDelete'] = $value['canDelete'];
$_SESSION['canApprove'] = $value['canApprove'];
$_SESSION['canUpgrade'] = $value['canUpgrade'];
}
}
var_dump($_SESSION['canCreate'] );
$verifiedpassword = $user->verifyUserPassword($_POST['password'],$_SESSION['password']);
if($verifiedpassword == true && $_SESSION['firstname'] && $_SESSION['firstname'] ){
header("Location:/Contentgo/dashboard");
}
}else{$results['errorMessage'] = "Incorrect Login details";
}
}
require(WORKING_DIR_PATH."/src/views/admin/loginform.php");
}

function logout(){
unset($_SESSION);
session_destroy();
homePage();
}

function dashboard(){
$results = array();
$results['title'] = "Administration Dashboard";
$results['description'] = "Administration Dashboard";
$results['content']="Dashboard area, carry out your transactions";
if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
include WORKING_DIR_PATH."/src/views/admin/dashboard.php";
}
else{ header("Location:/Contentgo/login");}
}

function requireReset(){
$results = array();
$results['title'] = "Reset Login";
$results['description'] = "Reset Login"; 
$userdata = array();
$reseturl = md5(rand(0,999).time());
if(isset($_POST['username'])){$userdata = ["username"=>$_POST['username']];}
if(isset($_POST['requireReset'])){
$user = new Userdata($userdata);
$verifiedusername = $user->verifyUsername($_POST['username']);
if(is_array($verifiedusername)){
foreach($verifiedusername as $key=>$value){
$_SESSION['email']  =$value['email'];
$result = modifyResetUrl($reseturl,$_SESSION['email']);emailToReset($_SESSION['email'],$reseturl);
if($result){$results['success'] = "Check your email to reset account";}
else{$results['success'] = 'Account does not exist'; }
}
}
}
require(WORKING_DIR_PATH."/src/views/admin/requireresetform.php");
}

function activateUser(){
global $path;
$success = "";
if(isset($path[0]) && isset($path[1])){
$user = new Userdata();
$reseturl = $path[1];
$result = modifyAccountStatus($reseturl);
if($result){$success ="Account correctly activated";}
else{$success = "Account does not exist";}
require(WORKING_DIR_PATH."/src/views/admin/activationform.php");
}
}

function resetUser(){
global $path;
$success = "";
if(isset($path[0]) && isset($path[1])) {
$user = new Userdata();
$reseturl = $path[1];;
$result = modifyAccountStatus($reseturl);
if($result){$success ="Account correctly reset";}
else{$success = "Account does not exist";}
require(WORKING_DIR_PATH."/src/views/admin/resetform.php");
}
}

function readUsers(){
$results = array();
$user = new User();
$results['users'] = $user->select("SELECT * FROM userdata");
return $results['users'];
}
    
function modifyEmail(){
if(isset($data['email'])  && isset($data['newemail'] )){
$newdata = ['email'=>data['email']];
$user = new Userdata($newdata );
$result1 = $user->select("SELECT* FROM userdata WHERE email=:email",["email"=>$user->email]); 
if($result1){
$result2 = $user->update("UPDATE userdata SET email=:newemail WHERE email=:email",["newemail"=>$user->newemail,
"email"=>$user->email]);
 return $result2;
} 
}
}
    
function modifyResetUrl($reseturl,$email){
if(isset($reseturl) && isset($email)){
$user= new Userdata();
$result = $user->update("UPDATE userdata SET reseturl=:reseturl WHERE 
email=:email",["reseturl"=>$reseturl,"email"=>$email]);
return $result;
}
}

function modifyAccountStatus($reseturl){
$status =1;
$newreseturl = "";
if(isset($reseturl)){
$user= new Userdata();
$result = $user->update("UPDATE userdata SET status =:status,reseturl=:newreseturl WHERE 
reseturl=:reseturl",["status"=>$status,"newreseturl"=>$newreseturl,"reseturl"=>$reseturl]);
return $result;
}
}
    
function modifyPassword($reseturl, $data= []){
$newreseturl = "";
if(isset($reseturl) && isset($data['email']) && isset($data['password']) && isset($data['confirmpassword'])
&& $data['password'] == $data['confirmpassword']){
$userdata  = ["email"=>$data['email'],"password"=>$data['password'],"confirmpassword"=>$data['confirmpassword']];
$user  = new Userdata($userdata);
$result1 = $user->verifyUsername($data['email']);
if($result1){
$result2 = $user->update("UPDATE userdata SET password =:password, reseturl=:newreseturl WHERE 
reseturl=:reseturl",["password"=>$user->password,"newreseturl"=>$newreseturl,"reseturl"=>$reseturl]);
return $result2;
}
}
}
           
function deleteUser(){
global $path;
if(isset($path[0]) && isset($path[1]) && isset($path[2]) && isset($path[3]) && isset($path[4])
&& isset($path[5]) && $path[3] == "delete" && $path[4] == "user"){
if(isset($_SESSION['canDelete'])){
$user = new Userdata();
$result = $user->delete("DELETE FROM userdata WHERE id=:id LIMIT 1",["id"=>$path[5]]);
include (WORKING_DIR_PATH."/src/views/admin/delete.php");
}
}
}

function emailToActivate($email,$reseturl){

//send activation email
if(isset($email))$to = $email;   
$subject = " Activate your account";
$msg = "Click on email below to activate <br>"
."<a href=activation/".$reseturl.">"
."Click to activate</a >";
$headers = "From:bejibay@gmail.com";
mail($to,$subject,$msg,$headers);
 }
    
    
function emailToReset($email,$reseturl){

//send reset email
if(isset($email))$to = $email;  
$subject = " reset your account";
$msg = "Click on email below to reset <br>".
"<a href=reseturl/".$reseturl.">".
"Click to reset</a >";
$headers = "From:bejibay@gmail.com";
mail($to,$subject,$msg,$headers);
}

?>
