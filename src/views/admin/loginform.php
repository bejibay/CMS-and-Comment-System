<?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>
<div class="row">
<div class="col-12">
<form action="" method="post">
<h2>Login</h2>
<p><?php  if(isset($results['errormessage'])) echo $results['errormessage'];?></p>
<label for ="username">Username:</label>
<input type="text" name="username" placeholder="Type username or email" id="username" required>
<label for ="password">Password:</label>
<input type="text" name="password" placeholder ="Type in your password" id="password" required>
<input type="submit" name="login" value="Login">
</form>
<p><a href="require-reset">Forgot Password</a><a href="register">Not Yet Registered</a></p>
 </div>
</div class="column rightside"></div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>


</body>
</html>
