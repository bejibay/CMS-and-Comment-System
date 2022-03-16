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
<label for ="username">Username:</label>
<input type="text" name="username" placeholder="should be minimum of five characters" id="username">
<label for ="firstname">Firstname:</label>
<input type="text" name="firstname" placeholder="Type in your firstname" id="firstname">
<label for ="lastname">Lastname:</label>
<input type="text" name="lastname" placeholder ="Type in your Lastname" id="lastname">
<label for =email">Email:</label>
<input type="text" name="email" placeholder ="Type in your email" id="email">
<label for ="password">Password:</label>
<input type="text" name="password" placeholder ="Type in your password" id="password">
<label for ="confirmpassword">Confirm Password:</label>
<input type="text" name="confirmpassword" placeholder ="Re type in your password" id="confirmpassword">
<input type="submit" name="register" value="Register">
</form>
</div>
</div class="column rightside"></div>
</div>
<div class="footet"><?php include "templates/include/footer.php";?></div>
</body>
</html>
