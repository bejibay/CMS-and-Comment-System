
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
﻿<form action="admin.php method="post">
title:<input type="text" name="title" >
description:<input type="text" name="description">
content: <textarea bname="content"></textarea>
date :<input type="hidden" name="date">
date :<input type="hidden" name="remote address">
<input type="submit" name="editpage" value="Click to submit">
</form>
</div>
</div>
<div class="footet"><?php include "templates/include/footer.php";?></div>
</body>
</html>
