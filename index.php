<?php 
$action=isset($_GET['action'])? $_GET['action'] : "";
if($action){
$results=array();
$results['article']=Page::getById($action);
require(TEMPLATES_PATH."/pages.php");
return;
}

$results=array();
$results['article']=Post::getById($action);
require(TEMPLATES_PATH."/posts.php");
return;
}


else{
$results=array();
$results['title']=" Page Not Found";
$results['description']="This Page Does Not Exist";
require (TEMPLATES_PATH."/notfound.php");}

else{require(TEMPLATES_PATH."/homepage.php");}
}
?>
<div class="footer"><?php include "templates/footer.php";?></div>

</body>

</html>







