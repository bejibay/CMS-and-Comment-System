
<?php 

require_once WORKING_DIR_PATH."/src/model/post.php";
require_once WORKING_DIR_PATH."/src/model/page.php";
require_once WORKING_DIR_PATH."/route.php";

function homePage(){
require(WORKING_DIR_PATH."/src/views/homepage.php");
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
function displayContent(){
global $path;
global $routes;
if(!empty($path)){
$urlpage = $path[2];
$page = new Page();
$post = new Post();

$result1 = $page->select("SELECT*FROM page WHERE url = :url",["url"=>$urlpage]);
$result2= $post->select("SELECT*FROM post WHERE url = :url",["url"=>$urlpage]);
if(!empty($result1)){include WORKING_DIR_PATH."/src/views/page.php";}
elseif(!empty($result2)){include WORKING_DIR_PATH."/src/views/post.php";
} else {include WORKING_DIR_PATH."/src/views/notfound.php";} 
}
}

?> 