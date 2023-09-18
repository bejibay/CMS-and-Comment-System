
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
