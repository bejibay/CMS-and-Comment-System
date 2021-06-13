<?php 
$action=isset($_GET['action'])? $_GET['action'] : "";
?>

<!DOCTYPE html>
<html>
<head>
<meta  name="description" content="<?php echo $description;?>">
<meta  name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title;?></title>
</head>
<body>
<div class="header"><?php include "templates/header.php";?><div>
<?php 

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


else{require (TEMPLATES_PATH."/notfound.php");}

else{require(TEMPLATES_PATH."/homepage.php");}

}

?>
<div class="footer"><?php include "templates/footer.php";?></div>

</body>

</html>







