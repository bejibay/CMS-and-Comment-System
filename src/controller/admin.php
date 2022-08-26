<?php 
//Admin codes for login, register, and  password reset
require("config.php");
$action=isset($_GET['action'])? $_GET['action'] : "";
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








