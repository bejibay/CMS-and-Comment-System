
<?php include "src/views/include/header.php";?>
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
<div class =" col-9>
<form action="dashboard.php" method="post">
<lable>Title:</label>

<input type="text" name="title" >
<lable>Description:</label>
<input type="text" name="description" >
<lable>Content:</label> 
 <textarea name="content"></textarea>
date :<input type="date" name="date" >
<lable>Date:</label>
<input type="hidden" name="ip" >
<input type="submit" name="editpage" value="Edit Page">
</form>
</div>
</div>
<div class="footer"><?php include "templates/include/footer.php";?></div>
</body>
</html>
