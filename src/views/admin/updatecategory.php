
<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="col-3">
<a href="/Contentgo/dashboard">dashboard</a>
<a href="/Contentgo/dashboard/newpage">new page</a>
<a href="/Contentgo/dashboard/newpost">new post</a>
<a href="/Contentgo/dashboard/newpost">new category</a>
<a href="/Contentgo/dashboard/view-pages">all pages</a>
<a href="/Contentgo/dashboard/view-posts">all posts</a>
<a href="/Contentgo/dashboard/view-categories">all categories</a>
<a href="/Contentgo/media">media</a>
</div>
<div class =" col-9">
<form action="" method="post">
<label>Name:</label>
<input type="text" name="name" value ="<?php if(isset($results['name']))echo $results['name'];?>" required>

<label>Description:</label>
<textarea name="description" required><?php if(isset($results['description']))echo $results['description'];?></textarea>

<label>Date:</label>
<input type="date" name="updated" required>

<label>IP Address</label>
<input type="hidden" name="ipaddress" value= "<?php echo $_SERVER['REMOTE_ADDR'];?>">

<input type="submit" name="updatecategory" value="Update Category">
</form>
</div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
