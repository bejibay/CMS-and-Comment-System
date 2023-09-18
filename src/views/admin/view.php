
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
<?php 
if($path[4] == "posts"){
echo "<table>";
echo "<tr><th>ID</th><th>Title</th><th>Url</th></tr>";
foreach($results['success'] as $key=>$value){
echo "<tr><td>".$value['id']."</td><td>".$value['title']."</td><td>".$value['url']."</td></tr>";
}
echo "</table>";
}
if($path[4] == "pages"){
echo "<table>";
echo "<tr><th>ID</th><th>Title</th><th>Url</th></tr>";
foreach($results['success'] as $key=>$value){
echo "<tr><td>".$value['id']."</td><td>".$value['title']."</td><td>".$value['url']."</td></tr>";
}
echo "</table>";
}
if($path[4] == "categories"){
echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Description</th></tr>";
foreach($results['success'] as $key=>$value){
echo "<tr><td>".$value['id']."</td><td>".$value['name']."</td><td>".$value['description']."</td></tr>";
}
echo "</table>";
}
if($path[4] == "medias"){
echo "<table>";
echo "<tr><th>ID</th><th>Url</th></tr>";
foreach($results['success'] as $key=>$value){
echo "<tr><td>".$value['id']."</td><td>".$value['url']."</td></tr>";
}
echo "</table>";
}
?>
</div>
<div class="footer"><?php include  WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
