
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
<label for="logininfo">Login Info:</label>
<input type="text" name="logininfo" placeholder="Type in your username or email" id="logininfo">
<input type="submit" name="reset" value="Reset">
</form>
</div>
</div class="column rightside"></div>
</div>
<div class="footet"><?php include "templates/include/footer.php";?></div>
</body>
</html>
