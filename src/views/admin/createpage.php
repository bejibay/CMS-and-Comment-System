<?php
?>
<div class="header"><?php include WORKING_DIR_PATH."/src/views/include/header2.php";;?></div>
<div class="row">
<div class="col-3">
<a href="/Contentgo/dashboard/create/page">new page</a>
<a href="/Contentgo/dashboard/create/post">new post</a>
<a href="/Contentgo/dashboard/create/category">new category</a>
<a href="/Contentgo/dashboard/view/pages">all pages</a>
<a href="/Contentgo/dashboard/view/posts">all posts</a>
<a href="/Contentgo/dashboard/view/categories">all categories</a>
<a href="/Contentgo/dashboard/view/medias">medias</a>
</div>
<div class =" col-9">
<form action="" method="post">
<lable>Title:</label>
<input type="text" name="title" placeholder ="enter title" required>
<lable>Description:</label>
<input type="text" name="description" placeholder ="enter descripotion" required>
<lable>Content:</label> 
<textarea name="content" placeholder ="enter content" required></textarea>
<input type="hidden" name="ipaddress" value ="<?php echo $_SERVER['REMOTE_ADDR'];?>">
<input type="submit" name="createpage" value="Create Page">
</form>
</div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
