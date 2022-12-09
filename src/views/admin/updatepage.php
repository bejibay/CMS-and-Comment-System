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
<form action="#" method="post">
<label>title:</label>
<input type="text" name="title" value ="<?php if(isset($results['title']))echo $results['title'];?>">
<label>Description:</label>
<input type="text" name="description" value ="<?php if(isset($results['description']))echo $results['description'];?>" >
<label>Content:</label>
<textarea name="content"><?php if(isset($results['content']))echo $results['content'];?></textarea>
<label>Date:</label>
<input type="date" name="updated">
<label>IP Address</label>
<input type="hidden" name="ip" value= "3">
<input type="submit" name="updatepage" value="Update Page">
</form>
</div>
</div>
<div class="footer"><?php include "src/views/include/footer.php";?></div>
</body>
</html>
