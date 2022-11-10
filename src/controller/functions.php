
<?php 

require_once $_SERVER["DOCUMENT_ROOT"]."/Contentgo/config/bootstrap.php";
require_once WORKING_DIR_PATH."/src/model/author.php";
require_once WORKING_DIR_PATH."/src/model/category.php";
require_once WORKING_DIR_PATH."/src/model/comments.php";
require_once WORKING_DIR_PATH."/src/model/dynamicpages.php";
require_once WORKING_DIR_PATH."/src/model/staticpages.php";
require_once WORKING_DIR_PATH."/src/model/media.php";
require_once WORKING_DIR_PATH."/src/model/user.php";

//function codes to be called in admin.php, index.php, dashboard.pho
function login(){
$results=array();
$results['title']="Admin Login Form";
$results['description']="Admin Login Form";
if(isset($_POST['login'])){
//user has clicked the login form, login successful
$user = new User($_POST);
$results['success'] = $user->readAUser($_POST['email']);

if($result['success']){
    $_SESSION['firstname'] = $result['firstname'];
    $_SESSION['lastname'] = $result['lastname'];
    header("Location:dashboard");
}

else{//login failed display error message
$results['errormessage']="Incorrect Username or Password Try Again";}
}
require(WORKING_DIR_PATH."/src/views/admin/loginform.php");
}

function register(){
$results=array();
$results['title']="Account Creation Form";
$results['description']="Account Creation Form";
if(isset($_POST['register'])){
//user has posted the register form attempt to register
$user = new User($_POST);
$result['checkemail'] = $user->select($_POST['email']);
if($result['checkemail'])$result['emailError'] = 'email already exists';
else{$result['success'] = $user->createUser($userdata);
$userdata =['firstname'=>$_POST['firstname'],'lastname'=>$_POST['lastname'],'email'=>$_POST['email'],
'password'=>$_POST['pasword']];
if($result['success']){emailToActivate();
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
require(WORKING_DIR_PATH."/src/views/dashboard.php");
}

function requireReset(){
$results = array();
$results['title'] =" Reset Login";
$results['description'] = "Reset Login"; 
if(isset($_POST['resetpassword'])){
$user = new User($_POST);
$result['checkemail'] = $user->select($_POST['email']);
if($result['checkemai']){emailToreset();
$reset['Success'] = "Check your email to reset account";
}
else{$result['succes'] = 'email does not exist'; }
}
require(WORKING_DIR_PATH."/src/views/admin/resetform.php");
}

function activateUser(){
if(isset($_GET['reseturl'])){
$success = "";
$user = new User($_POST);
$reseturl = $_GET['reseturl'];
$update = ['reseturl'=>"", 'status'=>1];
$result = $user->updateUser($reseturl,$update);
if($result){$success ="Account correctly activated";}
else{$success = "Account does not exist";}
require(WORKING_DIR_PATH."/src/views/admin/activationform.php");
}
}

function resetUser(){
$success = "";
$user = new Userdata($_POST);
$reseturl = isset($_GET['reseturl'])?$_GET['reseturl']:"";
$update = ['reseturl'=>"", 'password'=>$_POST['password']];
$result = $user->modifyAccountStatus($reseturl,$update);
if($result){$success ="Account correctly activated";}
else{$success = "Account does not exist";}
require(WORKING_DIR_PATH."/src/views/admin/activationform.php");

}

function newPost(){
$results= array();
$results['title'] = "Create A New Post";
$results['description'] = "Create A new Post";
$results['pageheading']="Create A Post";
$dynamicpage  =new Dynamicpage($_POST);
if(isset($_POST['newpost'])){
$newdata = ['url'=>$_POST['url'],'title'=>$_POST['title'] , 
'description'=>$_POST['description'], 'content'=>$_POST['content'],'category_id'=>$_POST['category_id'],
'media_id'=>$_POST[['media_id']],'author_id'=>$_POST['author_id'],'created'=>$_POST['created'],
'updated'=>$_POST['updated'],'ipaddress'=>$_POS['ipaddress']];
$result['success'] = $dynamicpage->createAdynamicpage($newdata); 
}
require(WORKING_DIR_PATH."/src/views/admin/newpost.php");
}

function updatePost(){
$id = $_GET['id'];
$result = array();
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
require(WORKING_DIR_PATH."/src/views/admin/updatepost.php");
}

function newPage(){
    $results= array();
    $results['title'] = "Create A New Page";
    $results['description'] = "Create A new Page";
    $results['pageheading']="Create A Page";
    $staticpage  =new Staticpage($_POST);
    if(isset($_POST['newpage'])){
    $newdata = ['url'=>$_POST['url'],'title'=>$_POST['title'] , 
    'description'=>$_POST['description'], 'content'=>$_POST['content'],
    'author_id'=>$_POST['author_id'],'created'=>$_POST['created'],
    'updated'=>$_POST['updated'],'ipaddress'=>$_POS['ipaddress']];
    $result['success'] = $staticpage->createAStaticpage($newdata); 
    }
    require(WORKING_DIR_PATH."/src/views/admin/newpage.php");
    }
    

    function updatePage(){
    $result = array();
    $update = new StaticPage($_POST);
    $dataedited = $update->readAStaticpage($_GET['id']);
    if($dataedited) require(WORKING_DIR_PATH."/src/views/admin//updatepage.php");
    if(isset($_POST['updatepage'])){
    $updatepage = $update->updateAStaticpage($_GET['id'],$updateddata);
    $updateddata = ['url'=>$_POST['url'],'title'=>$_POST['title'] , 
    'description'=>$_POST['description'], 'content'=>$_POST['content'],
    'author_id'=>$_POST['author_id'],'created'=>$_POST['created'],
    'updated'=>$_POST['updated'],'ipaddress'=>$_POS['ipaddress']];
    if($updatepage) $result = "page succesfully updated";
    }
    require(WORKING_DIR_PATH."/src/views/admin/updatepage.php"); 
    }
    
function newCategory(){
$results= array();
$results['title'] = "Create A New Category";
$results['description'] = "Create A new Category";
$results['pageheading']="Create A Category";
$category  =new Category($_POST);
if(isset($_POST['newcategory'])){
 $newdata = ['name'=>$_POST['name'],'description'=>$_POST['description'], 
'created'=>$_POST['created'],'updated'=>$_POST['updated'],'ipaddress'=>$_POS['ipaddress']];
 $result['success'] = $category->createACategory($newdata); 
}
require(WORKING_DIR_PATH."/src/views/admin/newcategory.php");
}
    

function updateCategory(){
$result = array();
$update =new Category($_POST);
$dataedited = $update->readAcategory($_GET['id']);
if($dataedited) require(WORKING_DIR_PATH."/src/views/admin/updatecategory.php");
if(isset($_POST['updatecategory'])){
$updatecategory = $update->updateACategory($_GET['id'],$updateddata);
$updateddata = ['name'=>$_POST['name'] , 'description'=>$_POST['description'], 
'created'=>$_POST['created'],'updated'=>$_POST['updated'],'ipaddress'=>$_POS['ipaddress']];
 if($updatecategory) $result = "category succesfully updated";
}
require(WORKING_DIR_PATH."/src/views/admin/updatecategory.php");
}



function viewPosts(){
$dynamicpage = new Dynamicpage($_POST);
$viewposts = $dynamicpage->readDynamicPages();
foreach($viewposts as $key=>$value){
$list = "<ul>";
$list.= "<li><a href=".$value['url'].">".$value['title']."</a></li>";
$list .="</ul>";
return $list;
}
require(WORKING_DIR_PATH."/src/views/admin/viewposts.php");
}

function viewPages(){
$staticpage = new Staticpage($_POST);
$viewpages = $staticpage->readStaticPages();
foreach($viewpages as $key=>$value){
    $list = "<ul>";
    $list.= "<li><a href=".$value['url'].">".$value['title']."</a></li>";
    $list .="</ul>";
    return $list;
    }
require(WORKING_DIR_PATH."/src/views/admin/viewpages.php");
}

function viewCategories(){
$categories = new Category($_POST);
$viewcategories = $categories->readCategories();
foreach($viewcategories as $key =>$value){
    $list = "<ul>";
    $list.= "<li><a href=".$value['url'].">".$value['title']."</a></li>";
    $list .="</ul>";
    return $list;
    }
require(WORKING_DIR_PATH."/src/views/admin/viewcategorioes.php");
}


function viewMedia(){
$media = new Media($_POST);
$viewmedia = $media->readMedia;
foreach($viewmedia as $key =>$value){
    $list = "<ul>";
    $link = $value['url'].'.'.$value['ext'];
    $list.= "<li><a href=".$link.">".$link."</a></li>";
    $list .="</ul>";
    return $list;
    }
require(WORKING_DIR_PATH."/src/views/admin/viewcategorioes.php");
}

function otherUrls(){
$result1 = array();
$url = $_SERVER['REQUEST_URI'];
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

function homePage(){

require(WORKING_DIR_PATH."/src/views/homepage.php");
}



function emailToActivate(){
//generate activation URL
$reseturl =md5(rand(0,999).time());

$user = new User($_POST);
$reset = $user->updateUser($_POST['email'],$update);
$update = ['reseturl'=>$reseturl];
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
