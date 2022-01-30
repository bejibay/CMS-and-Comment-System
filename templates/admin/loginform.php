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
﻿<form action="admin.php" method="post">
<label for ="login">Login:</label>
<input type="text" name="login" placeholder="Type In Your username or email" id="login">
<label for ="password">Password:</label>
<input type="text" name="password" placeholder ="Type in your password" id="password">
<input type="submit" name="submit" value="login">
</form>
<p><a href="/reset">Forgot Password</a><a href="/register">Not Yet Registered</a></p>
 </div>
</div class="column rightside"></div>
</div>
<div class="footet"><?php include "templates/include/footer.php";?></div>
</body>
</html>
