
// admin script allows you to carry out adminnistrative fuctions: modify, create, delete

// Admin codes

<?php 
$session_start();
$action=isset($_GET['action'])? $_GET['action'] : "";
$username=isset($username)? $_SESSION['username'] : "";
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
<div class="column left">
<a href="/createpage">create page</a>
<a href="/createpost">create post</a>
<a href="/viewpages">view pages</a>
<a href="/viewposts">view posts</a>
a href="/udatepage">update page</a>
a href="/updatepost">update post</a>
a href="/media">media</a>
a href="/template">templates</a>

</div>
<div class="column middle">
<?php
switch($action){
case "login":
case "login"."/":
login();
break;

case "logut":
case "logout"."/":
logout();
break;

case "dashboard":
case "dashboard"."/":
dashboard();
break;

case "dashboard"."/"."viewpages":
case "dashboard"."/"."viewpages"."/":
viewpages();
break;

case "dashboard"."/"."viewposts":
case "dashboard"."/"."viewposts"."/":
viewposts();
break;

case "dashboard"."/"."updatepage":
case "dashboard"."/"."updatepage"."/":
updatepage();
break;

case "dashboard"."/"."updatepost":
case "dashboard"."/"."updatepost"."/":
updatepost();
break;

case "dashboard"."/"."deletepage":
case "dashboard"."/"."deletepage"."/":
deletepage();
break;

case "dashboard"."/"."deletepost":
case "dashboard"."/"."deletepost"."/":
deletepost();
break;

}

?></div><div class="column right">
</div>
<div>copyright </div>

</body>

</html>







