<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $results['title'];?></title>
<meta  name="description" content="<?php echo $results['description'];?>">
<meta  name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="cmsstyle.css>"
</head>
<body>
<div class="header"><?php include "templates/include/header.php";?></div>
<div class="row">
<div class="col-12">
﻿<form action="admin.php?action=login" method="post">
<h2>Login</h2>
<p><?php echo $results['errormessage'];?></p>
<label for ="email">Email:</label>
<input type="text" name="email" placeholder="Type In Your email" id="email">
<label for ="password">Password:</label>
<input type="text" name="password" placeholder ="Type in your password" id="password">
<input type="submit" name="submit" value="login">
</form>
<p><a href="/reset">Forgot Password</a><a href="/register">Not Yet Registered</a></p>
 </div>
</div class="column rightside"></div>
</div>
<div class="footer"><?php include "templates/include/footer.php";?></div>
</body>
</html>
