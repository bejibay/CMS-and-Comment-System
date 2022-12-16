<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="col-12">
<form action="" method="post">
<label for="logininfo">Login Info:</label>
<input type="text" name="logininfo" placeholder="Type in your username or email" id="logininfo" required>
<input type="submit" name="requirereset" value="Require Password Reset">
</form>
</div>
</div>
<div class="footer"><?php WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
