
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
<div class="header"></div>
<div class="topnav">
<a href="https://www.soowec.com">home</a>
<a href="/about/">About Us</a>
<a href="/contact/">Contact Us</a>
<a href="/privacy/">Privacy</a>
<a href="/register/">Register</a>
<a href="/login/">login</a>
<a href="javascript:void()"><i  class ="fa fa-bars" ></a>
</div>
<div>
<?php
switch($action){
case "login":
case "login"."/":
login();
break;

case "register":
case "register"."/":
register();
break;

case "resetpassword"."/".$reseturl:
resetpassword();
break;
default:
default();
}

?>
</div>
<div class="footer">copyright </div>

</body>

</html>






