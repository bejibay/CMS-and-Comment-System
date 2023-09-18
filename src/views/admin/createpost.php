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
<div class = "col-9">
<form action=""  method="post">
<label>title:</label>
<input type="text" name="title" required>
<label>Description:</label>
<input type="text" name="description" required>
<label>Content:</label>
<textarea name="content" required></textarea>
<label>Select A Category:</label>
<select name ="category_id" required>
<option value ="">Select A Category</option>
<?php if(is_array($results['select'])){foreach($results['select'] as $key=>$value){
echo "<option value =".$value['id'].">".$value['name']."</option>";
}
}

?>
</select>
<input type="hidden" name="ipaddress" value ="<?php echo $_SERVER['REMOTE_ADDR'];?>">
<input type="submit" name="createpost" value="Create Post">
</form>
</div>
</div>
<div class="footer"><?php include WORKING_DIR_PATH."/src/views/include/footer.php";?></div>
</body>
</html>
