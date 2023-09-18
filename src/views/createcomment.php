<?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>
<div class="row">
<div class="col-3">
<a href="/Contentgo/dashboard">dashboard</a>
<a href="dashboard/newpage">new page</a>
<a href="dashboard/newpost">new post</a>
<a href="dashboard/newpost">new category</a>
<a href="dashboard/view-pages">all pages</a>
<a href="dashboard/view-posts">all posts</a>
<a href="dashboard/view-categories">all categories</a>
<a href="dashboard/media">media</a>
</div>
<div class =" col-9">
<form action="" method="post">
<lable>Title:</label>
<input type="text" name="title" placeholder ="enter title" required>
<lable>Description:</label>
<input type="text" name="description" placeholder ="enter descripotion" required>
<lable>Content:</label> 
<textarea name="content" placeholder ="enter content" required></textarea>
<label>Date:</label>
<input type="date" name="created" required>
<input type="hidden" name="ipaddress" value ="<?php echo $_SERVER['REMOTE_ADDR'];?>">
<input type="submit" name="newpage" value="Create Page">
</form>
</div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
