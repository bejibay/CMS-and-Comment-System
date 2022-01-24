<?php 
require "config.php";
$action=isset($_GET['action'])? $_GET['action'] : "";
switch($action){
case "page":
page();
break;
case "post":
post();
break;
case "notfound":
notfound();
break;
default:
homepage();
}
?>








