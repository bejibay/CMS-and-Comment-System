<?php
?>
<div class="header"><?php include WORKING_DIR_PATH."/src/views/include/header2.php";;?></div>
<div class="row">
<div class="column leftside">
<a href="/Contentgo/dashboard/create/page">new page</a>
<a href="/Contentgo/dashboard/create/post">new post</a>
<a href="/Contentgo/dashboard/create/category">new category</a>
<a href="/Contentgo/dashboard/view/pages">all pages</a>
<a href="/Contentgo/dashboard/view/posts">all posts</a>
<a href="/Contentgo/dashboard/view/categories">all categories</a>
<a href="/Contentgo/dashboard/view/medias">medias</a>
</div>
</div class="column rightside">
<?php if(isset($_SESSION['firstname']) && isset($_SESSION['lastname']))
{echo "Welcome ".$_SESSION['firstname']." ".$_SESSION['lastname'];}?>
<p><?php if(isset($results['content']))echo $results['content'];?></p>
 
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";;?></div>
</body>
</html>


