
<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="column leftside">
</div>
</div class="column rightside">
<?php if(isset($_SESSION['firstname']) && isset($_SESSION['lastname']))
{echo "Welcome ".$_SESSION['firstname']." ".$_SESSION['lastname'];}?>
<p><?php if(isset($results['content']))echo $results['content'];?></p>
 
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";;?></div>
</body>
</html>


