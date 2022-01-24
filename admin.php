<?php 
//Admin codes for login, register, and  password reset
require("config.php");
$action=isset($_GET['action'])? $_GET['action'] : "";
?>
<!DOCTYPE html>
<html>
<head>
<meta  name="description" content="<?php echo $result['description'];?>">
<meta  name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="cmsstyle.css">
<title><?php echo $result['title'];?></title>
</head>
<body>
<div class="container">
<div class="topnav">
<div class="myLinks">
<a href="/register">Register</a>
<a href="/login">login</a>
<a href="/reset">Reset Login</a>
<a href="javascript:void();"><i  class ="fa fa-bars" ></i></a>
</div>
</div>
<div class="row">
<div class="col-12">
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
case "reset":
reset();
break;
}
?>
</div>
</div>
<div class="footer"><?php include "templates/include/footer.php";?>
</div>
</div>
</body>
</html>







