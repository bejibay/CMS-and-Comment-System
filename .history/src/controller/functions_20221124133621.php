
<?php 
$requestUrl = $_SERVER['REQUEST_URI'];
$uri = explode("/",$requestUrl);
$path = $uri['0'];
$path1 = $uri['1'];
$path2 = $uri['2'];
require_once $_SERVER["DOCUMENT_ROOT"]."/Contentgo/config/bootstrap.php";
require_once WORKING_DIR_PATH."/src/model/author.php";
require_once WORKING_DIR_PATH."/src/model/category.php";
require_once WORKING_DIR_PATH."/src/model/comments.php";
require_once WORKING_DIR_PATH."/src/model/dynamicpages.php";
require_once WORKING_DIR_PATH."/src/model/staticpages.php";
require_once WORKING_DIR_PATH."/src/model/media.php";
require_once WORKING_DIR_PATH."/src/model/user.php";

//function codes to be called in index.php
function login(){
$results=array();
$results['title']="Admin Login Form";
$results['description']="Admin Login Form";
$results['errormessage'] = " ";
if(isset($_POST['login'])){
//user has clicked the login form, login successful
$userdata = array();
if(isset($_POST['email']) && isset($_POST['password'])){
$userdata = ['email'=>$_POST['email'], 'password'=>$_POST['password']];}
$user = new Userdata($userdata);
$results['successEmail'] = $user->verifyUserEmail($userdata);
foreach($results['successEmail'] as $key=>$value){
 $_SESSION['firstname'] = $value['firstname'];
 $_SESSION['lastname'] = $value['lastname'];
 $_SESSION['userid']  =$value['id'];
}
$results['successPassword'] = $user->verifyUserPassword($userdata);

if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
    header("location:/Contentgo/dashboard");}

else{return $results['errormessage ='] ="Account not found";}
}
require(WORKING_DIR_PATH."/src/views/admin/loginform.php");
}

function register(){
$results=array();
$results['title']="Account Creation Form";
$results['description']="Account Creation Form";
$userdata = array();
if(isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) && 
isset($_POST['email']) && isset($_POST['password']) && isset($_POST['ipaddress'])){
$userdata =['username'=>$_POST['username'],'firstname'=>$_POST['firstname'],'lastname'=>$_POST['lastname'],
'email'=>$_POST['email'],'password'=>$_POST['password'],'ipaddress'=>$_POST['ipaddress']];}

if(isset($_POST['register'])){
//user has posted the register form attempt to register
$user = new Userdata($userdata);
$results['checkemail'] = $user->verifyUserEmail($_POST['email']);
if($results['checkemail'])$results['emailError'] = 'email already exists';
else{$results['success'] = $user->createUser($userdata);

if($results['success']){emailToActivate();
$results['registerSuccess']= "check your email to complete your registeration";
}
}

}
else{//Form not filled properly
$results['errormessage']="Forms not filled properly";}
require(WORKING_DIR_PATH."/src/views/admin/registerform.php");
}

function logout(){
session_unset();
session_destroy();
header("location: /Contentgo/login");
}



function dashboard(){
$results = array();
$results['title'] = "Administration Dashboard";
$results['description'] = "Administration Dashboard";
$results['content']="Dashboard area, carry out your transactions";
if(!isset($_SESSION{'firstname'}) && !isset($_SESSION['lastname']))
{header("location:/Contentgo/login");}
else{require(WORKING_DIR_PATH."/src/views/dashboard.php");}
}



function requireReset(){
$results = array();
$results['title'] =" Reset Login";
$results['description'] = "Reset Login"; 
if(isset($_POST['resetpassword'])){
$user = new Userdata($_POST);
$result['checkemail'] = $user->select($_POST['email']);
if($result['checkemail']){emailToreset();
$results['Success'] = "Check your email to reset account";
}
else{$results['succes'] = 'email does not exist'; }
}
require(WORKING_DIR_PATH."/src/views/admin/requireresetform.php");
}

function activateUser(){
global $path1;
$success = "";
if(isset($path1)){
$user = new Userdata($_POST);
$reseturl = $path1;
$update = ['reseturl'=>"", 'status'=>1];
$result = $user->modifyAccountStatus($reseturl,$update);
if($result){$success ="Account correctly activated";}
else{$success = "Account does not exist";}
require(WORKING_DIR_PATH."/src/views/admin/activationform.php");
}
}

function resetUser(){
global $path1;
$success = "";
if(isset($path1)){
$user = new Userdata($_POST);
$reseturl = $path1;
$update = ['reseturl'=>"", 'password'=>$_POST['password']];
$result = $user->modifyAccountStatus($reseturl,$update);
if($result){$success ="Account correctly activated";}
else{$success = "Account does not exist";}
require(WORKING_DIR_PATH."/src/views/admin/resetform.php");
}
}

function newPost(){
$results= array();
$results['firstname'] =$_SESSION['firstname'];
$results['lastname'] =$_SESSION['lastname'];
$results['title'] = "Create A New Post";
$results['description'] = "Create A new Post";
$results['pageheading']="Create A Post";
$newdata = array();
if(isset($newdata)){$newdata = ['title'=>$_POST['title'],'description'=>$_POST['description'],
'content'=>$_POST['content'],'category_id'=>$_POST['category_id'],'author_id'=>$_POST['author_id'],
'created'=>$_POST['created'],'ipaddress'=>$_POST['ipaddress']];}
$author = new Author($newdata);
$category = new Category($newdata);
$results['author'] = $author->readAuthors();
$results['category'] =$category->readCategories();
if(isset($results['firstname']) && isset($results['lastname'])){
require(WORKING_DIR_PATH."/src/views/admin/newpost.php");}
else{header("location:/Contentgo/login");}
$dynamicpage = new Dynamicpage($newdata);
if(isset($_POST['newpost'])){
$result['success'] = $dynamicpage->createDynamicPage($newdata); 
}
}

function updatePost(){
global $path2;
$id = $path2;
$result = array();
$results['firstname'] =$_SESSION['firstname'];
$results['lastname'] =$_SESSION['lastname'];
if(isset($results['firstname']) && isset($results['lastname'])){
require(WORKING_DIR_PATH."/src/views/admin/updatepost.php");}
else{header("location:/Contentgo/login");}
$update = new DynamicPage($_POST);
$dataedited = $update->readADynamicpage($id);
if($dataedited) {require(WORKING_DIR_PATH."/src/views/admin/updatepost.php");}
if(isset($_POST['updatepage'])){
$updatepost = $update->updateADynamicpage($id,$updateddata);
$updateddata = ['url'=>$_POST['url'],'title'=>$_POST['title'] , 
'description'=>$_POST['description'], 'content'=>$_POST['content'],'category_id'=>$_POST['category_id'],
'media_id'=>$_POST[['media_id']],'author_id'=>$_POST['author_id'],'created'=>$_POST['created'],
'updated'=>$_POST['updated'],'ipaddress'=>$_POS['ipaddress']];
if($updatepage) $result = "page succesfully updated";
}
}

function newPage(){
$results= array();
$results['title'] = "Create A New Page";
$results['description'] = "Create A new Page";
$results['pageheading']="Create A Page";
$newdata = array();
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['content']) && isset($_POST['created'])
&& isset($_POST['ipaddress'])){
$newdata = ['title'=>$_POST['title'],'description'=>$_POST['description'],'content'=>$_POST['content'],
'created'=>$_POST['created'],'ipaddress'=>$_POST['ipaddress']];
}
if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
require(WORKING_DIR_PATH."/src/views/admin/newpage.php");}
else{header("location:/Contentgo/login");}
$staticpage  = new Staticpage($newdata);
if(isset($_POST['newpage'])){
$results['success'] = $staticpage->createStaticPage($newdata); 
}
}
    

function updatePage(){
global $path2;
$id = $path2;
$result = array();
$results['firstname'] =$_SESSION['firstname'];
$results['lastname'] =$_SESSION['lastname'];
$update = new StaticPage($_POST);
if(isset($results['firstname']) && isset($results['lastname'])){
require(WORKING_DIR_PATH."/src/views/admin/updatepage.php");}
else{header("location:/Contentgo/login");}
$dataedited = $update->readAStaticpage($id);
if(isset($_POST['updatepage'])){
$updatepage = $update->updateAStaticpage($id,$updateddata);
$updateddata = ['url'=>$_POST['url'],'title'=>$_POST['title'] , 
'description'=>$_POST['description'], 'content'=>$_POST['content'],
'author_id'=>$_POST['author_id'],'created'=>$_POST['created'],
'updated'=>$_POST['updated'],'ipaddress'=>$_POS['ipaddress']];
if($updatepage) $result = "page succesfully updated";
}
}
    
function newCategory(){
$results= array();
$results['title'] = "Create A New Category";
$results['description'] = "Create A new Category";
$results['pageheading']="Create A Category";
$newdata = array();
if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created'])
&& isset($_POST['ipaddress'])){$newdata = ['name'=>$_POST['name'],'description'=>$_POST['description'], 
'created'=>$_POST['created'],'ipaddress'=>$_POST['ipaddress']];}

if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
require(WORKING_DIR_PATH."/src/views/admin/newcategory.php");}
else{header("location:/Contentgo/login");}
$category  =new Category($newdata);
if(isset($_POST['newcategory'])){
$results['success'] = $category->createCategory($newdata); 
}
}

function newAuthor(){
$results= array();
$results['title'] = "Create A New Author";
$results['description'] = "Create A new Author";
$results['pageheading']="Create Author Data";
$newdata = array();
if(isset($_SESSION['userid']) && isset($_POST['biography']) && isset($_POST['ipaddress']))
{
$newdata = ['userdata_id'=>$_SESSION['userid'],'biography'=>$_POST['biography'], 
'ipaddress'=>$_POST['ipaddress']];
}
if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
require(WORKING_DIR_PATH."/src/views/admin/newauthor.php");}
else{header("location:/Contentgo/login");}
$author  =new Author($newdata);
if(isset($_POST['newauthor'])){
$result['success'] = $author->createAuthor($newdata); 
}
}
    
    

function updateCategory(){
global $path2;
$id = $path2;
$results = array();
$results['firstname'] =$_SESSION['firstname'];
$results['lastname'] =$_SESSION['lastname'];
$updateddata = ['name'=>$_POST['name'] , 'description'=>$_POST['description'], 
'created'=>$_POST['created'],'updated'=>$_POST['updated'],'ipaddress'=>$_POST['ipaddress']];
if(isset($results['firstname']) && isset($results['lastname'])){
require(WORKING_DIR_PATH."/src/views/admin/updatecategory.php");}
 else{header("location:/Contentgo/login");}
$update = new Category($_POST);
$dataedited = $update->readAcategory($id);
if(isset($_POST['updatecategory'])){
$updatecategory = $update->updateACategory($id,$updateddata);
if($updatecategory) $result = "category succesfully updated";
}
}



function viewPosts(){
$results = array();
$results['firstname'] =$_SESSION['firstname'];
$results['lastname'] =$_SESSION['lastname']; 
if(isset($results['firstname']) && isset($results['lastname'])){
$dynamicpage = new Dynamicpage($_POST);
$viewposts = $dynamicpage->readDynamicPages();
if($viewposts){
foreach($viewposts as $key=>$value){
$list = "<ul>";
$list.= "<li><a href=".$value['url'].">".$value['title']."</a></li>";
$list .="</ul>";
return $list;
}
}
require(WORKING_DIR_PATH."/src/views/admin/viewposts.php");
}
else{header("locsation:/Contentgo/login");}
}

function viewPages(){
$results = array();
$results['firstname'] =$_SESSION['firstname'];
$results['lastname'] =$_SESSION['lastname']; 
if(isset($results['firstname']) && isset($results['lastname'])){
$staticpage = new Staticpage($_POST);
$viewpages = $staticpage->readStaticPages();
if($viewpages){
foreach($viewpages as $key=>$value){
    $list = "<ul>";
    $list.= "<li><a href=".$value['url'].">".$value['title']."</a></li>";
    $list .="</ul>";
    return $list;
    }
}
require(WORKING_DIR_PATH."/src/views/admin/viewpages.php");
}
else{header("locsation:/Contentgo/login");}
}

function viewCategories(){
$results = array();
$results['firstname'] =$_SESSION['firstname'];
$results['lastname'] =$_SESSION['lastname']; 
if(isset($results['firstname']) && isset($results['lastname'])){
$categories = new Category($_POST);
$viewcategories = $categories->readCategories();
if($viewcategories){
foreach($viewcategories as $key =>$value){
    $list = "<ul>";
    $list.= "<li><a href=".$value['url'].">".$value['title']."</a></li>";
    $list .="</ul>";
    return $lists;
}
}
require(WORKING_DIR_PATH."/src/views/admin/viewpages.php");
}
else{header("locsation:/Contentgo/login");}
}


function viewMedia(){
$media = new Media($_POST);
$viewmedia = $media->readAllMedia();
foreach($viewmedia as $key =>$value){
    $list = "<ul>";
    $link = $value['url'].'.'.$value['ext'];
    $list.= "<li><a href=".$link.">".$link."</a></li>";
    $list .="</ul>";
    return $list;
    }
require(WORKING_DIR_PATH."/src/views/admin/viewmedia.php");
}

function otherUrls(){
global $path1;
$url = $path1;
$result1 = array();
if(isset($url)){
$page = new Staticpage($url);
$result1 = $page->displayStaticPage($url);
if($result1){require(WORKING_DIR_PATH."/src/views/page.php");}
return $result1;

if(!$result1){
$result2 = array();
$post = new Dynamicpage($url);
$result2 = $post->displayDynamicPage($url);
if($result2){require(WORKING_DIR_PATH."/src/views/post.php");}
return $result2;
}
if(!$result1 && !$result2){require(WORKING_DIR_PATH."/src/views/notfound.php");}
return false;
}
}

function homePage(){

require(WORKING_DIR_PATH."/src/views/homepage.php");
}



function emailToActivate(){
//generate activation URL
$reseturl =md5(rand(0,999).time());
$update = ['email'=>$_POST['email'], 'password'=>$_POST['password'], 'reseturl'=>$reseturl];
$user = new Userdata($_POST);
$reset = $user->modifyAccountStatus($reseturl,$update);
//send activation email
if($reset){
$to = $_POST['email'];
$subject = " Activate your account";
$msg = 'Click on email below to activate <br>
<a href="/activation.php?reseturl='.$reseturl.'">
Click to activate</a >';
$headers = "From:bejibay@gmail.com";
mail($to,$subject,$msg,$headers);
}
}

function emailToreset(){
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
