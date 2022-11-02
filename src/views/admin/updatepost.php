
<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="col-3">
<a href="/dashboard">dashboard</a>
<a href="/newpage">new page</a>
<a href="/newpost">new post</a>
<a href="/viewpages">all pages</a>
<a href="/viewposts">all posts</a>
<a href="/media">media</a>
<a href="/templates">templates</a>
</div>
<div class = "col-9">
<form action="dashboard.php" method="post">
<label>title:</label>
<input type="text" name="title" value ="<?php echo $results['title'];?>">
<label>Description:</label>
<input type="text" name="description" value ="<?php echo $results['description'];?>"  >
<label>Content:</label>
<textarea name="content"><?php echo $results['content'];?></textarea>
<label>Date:</label>
<input type="date" name="date" value ="<?php echo $results['date'];?>" >
<label>Ip Address:</label>
<input type="hidden" name="ip" value= "<?php echo $_SERVER['REMOTE_ADDR'];?>">
<input type="submit" name="editpost" value="Edit Post">
</form>
</div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
