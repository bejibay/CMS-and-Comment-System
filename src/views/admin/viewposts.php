
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
<a href="view-categories">all categories/a>
<a href="media">media</a>
</div>
<?php echo $lists;?></div>
</div>
<div class="footer"><?php include  WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
