<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="col-3">
<a href="dashboard">dashboard</a>
<a href="newpage">new page</a>
<a href="newpost">new post</a>
<a href="newpost">new category</a>
<a href="view-pages">all pages</a>
<a href="view-posts">all posts</a>
<a href="view-categories">all categories</a>
<a href="media">media</a>

</div>
<div class = "col-9">
<form action="dashboard.php"  method="post">
<label>title:</label>
<input type="text" name="title" >
<label>Description:</label>
<input type="text" name="description"   >
content: <textarea name="content"></textarea>
<label>Date:</label>
<input type="date" name="date" >
<label>Ip Address:</label>
<input type="hidden" name="ip" >
<input type="submit" name="editpost" value="Edit Post">
</form>
</div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
