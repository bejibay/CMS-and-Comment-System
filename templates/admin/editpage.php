
<html>
<head>
<title><?php echo $results['title'];?></title>
<meta  name="description" content="<?php echo $results['description'];?>">
<meta  name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="header"><?php include "templates/include/header.php";?></div>
<div class="row">
<div class="col-3">
<a href="/dashboard">dashboard</a>
<a href="/newpage">new page</a>
<a href="/newpost">new post</a>
<a href="/viewpages">all pages</a>
<a href="/viewposts">all posts</a>
a href="/media">media</a>
a href="/templates">templates</a>
</div>
<div class =" col-9>
﻿<form action="dashboard.php?action=<?php echo $results['formAction];?>" method="post">
title:<input type="text" name="title" value ="<?php echo $results['title'];?>">
description:<input type="text" name="description" value ="<?php echo $results['description'];?>"  >
content: <textarea name="content"><?php echo $results['content'];?></textarea>
date :<input type="date" name="date" value ="<?php echo $results['date'];?>"  >
date :<input type="hidden" name="ip" value= "<?php echo $_SERVER['REMOTE_ADDR'];>">
<input type="submit" name="editpage" value="Edit Page">
</form>
</div>
</div>
<div class="footet"><?php include "templates/include/footer.php";?></div>
</body>
</html>
