<?php 
session_start();
$requestUrl = $_SERVER['REQUEST_URI'];
$url = parse_url($requestUrl,PHP_URL_PATH);
$path = explode("/",$url);

require_once __DIR__."/config/bootstrap.php";
require WORKING_DIR_PATH."/route.php";
require WORKING_DIR_PATH."/src/controller/other.php";
require WORKING_DIR_PATH."/src/controller/category.php";
require WORKING_DIR_PATH."/src/controller/comment.php";
require WORKING_DIR_PATH."/src/controller/post.php";
require WORKING_DIR_PATH."/src/controller/page.php";
require WORKING_DIR_PATH."/src/controller/media.php";
require WORKING_DIR_PATH."/src/controller/user.php";

foreach($routes as $route){
if(preg_match($route['pattern'],$requestUrl,$matches)){
$path_match_found = true;
if($route['methods'] && in_array($_SERVER['REQUEST_METHOD'],$route['methods'])){
$route_match_found = true;
if($route['function'] && is_callable($route['function'])){
if($route['type'] === "admin"){call_user_func($route['function']);
exit();
}elseif($route['type'] !== "admin" && $route['type'] === "pages"){call_user_func($route['function']);
exit();
}
}
}
}
}
?>
