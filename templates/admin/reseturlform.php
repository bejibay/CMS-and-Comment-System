
<html>
<head>
<title><?php echo $results['title'];?></title>
<meta  name="description" content="<?php echo $results['description'];?>">
<meta  name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="header"><?php include "templates/include/header.php";?></div>
<div class="row">
<div class="column leftside">
﻿<form action="admin.php?action=reset" method="post">
<label for="logininfo">Login Info:</label>
<input type="text" name="logininfo" placeholder="Type in your username or email" id="logininfo">
<label for="password">Password:</label>
<input type="text" name="password" placeholder ="Type in your new password">
<label for="confirmpassworf">Confirm Password:</label>
<input type="text" name="confirmpassword" placeholder ="Re type in your new password">
<input type="submit" name="reseturl" value="Reset">
</form>
</div>
</div class="column rightside"></div>
</div>
<div class="footet"><?php include "templates/include/footer.php";?></div>
</body>
</html>
