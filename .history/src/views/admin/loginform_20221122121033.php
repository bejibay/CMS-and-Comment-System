<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="col-12">
<form action="#" method="post">
<h2>Login</h2>
<p><?php  if(isset($results['errormessage'])) echo $results['errormessage'];?></p>
<label for ="email">Email:</label>
<input type="text" name="email" placeholder="Type In Your email" id="email">
<label for ="password">Password:</label>
<input type="text" name="password" placeholder ="Type in your password" id="password">
<input type="submit" name="login" value="Login">
</form>
<p><a href="require-reset">Forgot Password</a><a href="register">Not Yet Registered</a></p>
 </div>
</div class="column rightside"></div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
<?php if(isset($_SESSION['firstname'])) echo $_SESSION['firstname'];?>
<?php if(isset($results['lastname']))echo $results['success']['lastname'];?>
</body>
</html>
