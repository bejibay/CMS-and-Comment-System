
<?php 
//Admin codes for login, register, reset password
$action=isset($_GET['action'])? $_GET['action'] : "";
?>
<!DOCTYPE html>
<html>
<head>
<meta  name="description" content="<?php echo $result['description'];?>">
<meta  name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $result['title'];?></title>
</head>
<body>
<div class="header"></div>
<div class="topnav">
<a href="/homepage">home</a>
<a href="/about">About Us</a>
<a href="/contact">Contact Us</a>
<a href="/privacy">Privacy</a>
<a href="/register">Register</a>
<a href="/login">login</a>
<a href="javascript:void()"><i  class ="fa fa-bars" ></a>
</div>
<div>
<?php
switch($action){
case "login":
login();
break;
case "register":
register();
break;
case "logout":
logout();
break;
case "reset
reset();
break;
default:
login();
}
?>
</div>
<div class="footer"><?php include "templates/include/footer.php";?></div>
</body>
</html>







