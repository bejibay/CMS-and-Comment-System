<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="column leftside">
<form action="" method="post">
<label for ="username">Username:</label>
<input type="text" name="username" placeholder="should be minimum of five characters" id="username" required>
<label for ="firstname">Firstname:</label>
<input type="text" name="firstname" placeholder="Type in your firstname" id="firstname" required>
<label for ="lastname">Lastname:</label>
<input type="text" name="lastname" placeholder ="Type in your Lastname" id="lastname" required>
<label for =email">Email:</label>
<input type="text" name="email" placeholder ="Type in your email" id="email" required>
<label for ="password">Password:</label>
<input type="text" name="password" placeholder ="Type in your password" id="password" required>
<label for ="confirmpassword">Confirm Password:</label>
<input type="text" name="confirmpassword" placeholder ="Re type in your password" id="confirmpassword" required>
<label>Date:</label>
<input type = "date" name ="created" required>
<input type ="hidden" name ="ipaddress" value ="<?php echo $_SERVER['REMOTE_ADDR'];?>">
<input type="submit" name="register" value="Register">
</form>
</div>
</div class="column rightside"></div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
