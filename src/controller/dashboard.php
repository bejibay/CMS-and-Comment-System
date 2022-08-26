<?php 
$session_start();
$action=isset($_GET['action'])? $_GET['action'] : "";
$username=isset($username)? $_SESSION['username'] : "";
require("config.php");
// admin script allows you to carry out adminnistrative fuctions:create, read, update, delete
switch($action){
case "newpage":
newpage();
break;
case "newpost":
newpost();
break;
case "newcategory":
newcategory();
break;
case "editpage":
editpage();
break;
case "editpost":
editpost();
break;
case "editcategory":
editcategory();
break;
case "viewpages":
viewpages();
break;
case "viewposts":
viewposts();
break;
case "viewcategories":
viewcategories();
break;
case "deletepage":
deletepage();
break;
case "deletepost":
deletepost();
break;
case "deletecategory":
deletecategory();
break;
default:
dashboard();
}
?>







