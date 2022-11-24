
<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="column leftside">
<?php if(isset($results['content'])){echo $results['content'];}?>
<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?>  
 <?php if(isset($_SESSION['firstname'])){echo $_SESSION['firstname'];}?>
 <?php if(isset($_SESSION['lastname'])){echo $_SESSION['lastname'];}?>
 <?php if(isset($_SESSION['userid'])){echo $_SESSION['userid'];}?>
</div>
</div class="column rightside">put this column content here</div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";;?></div>
</body>
</html>


