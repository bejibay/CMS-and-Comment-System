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
$sql="SELECT pageurl FROM pages Where pageurl=$action";
mysqli_query($con, $sql);
if(mysqli_num_rows==1){include "templates/page.php";
return;
}


$sql="SELECT posturl FROM posts Where posturl=$url";
mysqli_query($con, $sql);
if(mysqli_num_rows==1){ include "template/posts.php";
return;
}


else{include "templates/notfound.php";}

else{include "templates/homepage.php";}

}

?>
<div class="footer"><?php include "templates/footer.php";?></div>

</body>

</html>







