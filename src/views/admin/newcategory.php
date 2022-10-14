
<?php include "templates/admin/header.php":?>
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
<lable>Name:</label>
<input type="text" name="name" >
<label>Description:</label> 
 <textarea name="content"></textarea>
 <label>Date:</label> 
<input type="date" name="date" >
<lable>Date:</label>
<input type="hidden" name="ip" >
<input type="submit" name="submit" value="Submit">
</form>
</div>
</div>
<div class="footer"><?php include "templates/include/footer.php";?></div>
</body>
</html>
