<?php 
$session_start();
$action=isset($_GET['action'])? $_GET['action'] : "";
$username=isset($username)? $_SESSION['username'] : "";
require("config.php);
// admin script allows you to carry out adminnistrative fuctions:create, read, update, delete
?>
<!DOCTYPE html>
<html>
<head>
<meta  name="description" content="<?php echo $description;?>">
<meta  name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title;?></title>
</head>
<body>
<div class="header"><a href="/logout">logout</a></div>
<div class="row">
<div class="col-3">
<a href="/dashboard">dashboard</a>
<a href="/newpage">new page</a>
<a href="/newpost">new post</a>
<a href="/viewpages">all pages</a>
<a href="/viewposts">all posts</a>
a href="/media">media</a>
a href="/templates">templates</a>
</div>
<div class="col-9">
<?php
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
case "updatepage":
updatepage();
break;
case "updatepost":
updatepost();
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
</div><div class="column right">
</div>
<div>&copy;copyright example.com</div>
</body>
</html>







