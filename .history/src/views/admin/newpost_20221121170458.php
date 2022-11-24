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
<div class = "col-9">
<form action="#"  method="post">
<label>title:</label>
<input type="text" name="title" >
<label>Description:</label>
<input type="text" name="description">
<label>Content:</label>
<textarea name="content"></textarea>
<select name ="category_id"></select>
<option value =""></option
<label>Category Id:</label>
<input type="number" name="category_id">
<label>Author Id:</label>
<select name ="author_id">
 <option value ="">Select An Author</option>   
</select>
<input type="hidden" name="ipaddress" value ="1">
<input type="submit" name="newpost" value="Create Post">
</form>
</div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
