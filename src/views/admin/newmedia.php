
<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="col-3">
<a href="/Contentgo/dashboard">dashboard</a>
<a href="newpage">new page</a>
<a href="newpost">new post</a>
<a href="newpost">new category</a>
<a href="view-pages">all pages</a>
<a href="view-posts">all posts</a>
<a href="view-categories">all categories</a>
<a href="media">media</a>
</div>
<div class =" col-9">
<form action="" method="post" enctype = "multipart/form-data">
<lable>Name:</label>
<input type="text" name="name" required placeholder ="type in your desired image name" required>
<label>Image/Video:</label>
<input type = "file" name = "filetoupload" required>
<label>Date:</label> 
<input type="date" name="created" required>
<input type="hidden" value = "<?php echo $_SERVER['REMOTE_ADDR'];?>" name="ipaddress" >
<input type="submit" name="uploadmedia" value="Upload Media">
</form>
</div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
