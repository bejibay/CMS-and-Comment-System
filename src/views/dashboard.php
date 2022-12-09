
<?php require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";?>
 
 <?php include  WORKING_DIR_PATH."/src/views/include/header.php";?>

<div class="row">
<div class="column leftside">
<a href="dashboard">dashboard</a>
<a href="dashboard/newpage">new page</a>
<a href="dashboard/newpost">new post</a>
<a href="dashboard/newcategory">new category</a>
<a href="dashboard/view-pages">all pages</a>
<a href="dashboard/view-posts">all posts</a>
<a href="dashboard/view-categories">all categories</a>
<a href="dashboard/media">media</a>
</div>
</div class="column rightside">
<?php if(isset($_SESSION['firstname']) && isset($_SESSION['lastname']))
{echo "Welcome ".$_SESSION['firstname']." ".$_SESSION['lastname'];}?>
<p><?php if(isset($results['content']))echo $results['content'];?></p>
 
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";;?></div>
</body>
</html>


