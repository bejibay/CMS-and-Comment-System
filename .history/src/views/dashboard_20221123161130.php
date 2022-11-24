
<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="column leftside">
 <?php if(isset($_SESSION['firstname'])){echo $_SESSION['firsname'];}?>
 <?php if(isset($results['firstname'])){echo $results['firstname'];}?>
 <?php if(isset($results['lastname'])){echo $results['lastname'];}?>
 <?php if(isset($_SESSION['userid'])){echo $_SESSION['userid'];}?>
</div>
</div class="column rightside">put this column content here</div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";;?></div>
</body>
</html>


