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
<div class =" col-9">
<?php if(isset($path['3']) && isset($path['4']) && isset($path['5']) && $path['3']=='edit' 
&& $path['4'] =='page' ){
echo
"<form action='' method='post'>
<label>title:</label>
<input type='text' name='title' value ='".$value["title"]."' required>
<label>Description:</label>
<input type='text' name='description' value ='".$value["description"]."' required>
<label>Content:</label>
<textarea name='content' required>".$value["content"]."</textarea>
<label>IP Address</label>
<input type='submit' name='updatepage' value='Update Page'>
</form>";
}?>
<?php if(isset($path['3']) && isset($path['4']) && isset($path['5']) && $path['3']=='edit' 
&& $path['4'] =='post' ){
echo
"<form action='' method='post'>
<label>title:</label>
<input type='text' name='title' value ='".$value["title"]."' required>
<label>Description:</label>
<input type='text' name='description' value ='".$value["description"]."' required>
<label>Category ID :</label>
<select name ='category-id'>
<option value = 'Select Fro Below'>                    
</select>
<label>Content:</label>
<textarea name='content' required>".$value["content"]."</textarea>
<label>IP Address</label>
<input type='submit' name='updatepost' value='Update Post'>
</form>";
}?>
<?php if(isset($path['3']) && isset($path['4']) && isset($path['5']) && $path['3']=='edit' 
&& $path['4'] =='category' ){
echo
"<form action='' method='post'>
<label>Label:</label>
<input type='text' name='title' value ='".$value["name"]."' required>
<label>Description:</label>
<input type='text' name='description' value ='".$value["description"]."' required>
<label>IP Address</label>
<input type='submit' name='updatepost' value='Update Post'>
</form>";
}?>
<?php if(isset($path['3']) && isset($path['4']) && isset($path['5']) && $path['3']=='edit' 
&& $path['4'] =='user' ){
echo
"<form action='' method='post'>
<label>title:</label>
<input type='text' name='title' value ='".$value["title"]."' required>
<label>Description:</label>
<input type='text' name='description' value ='".$value["description"]."' required>
<label>Category ID :</label>
<select name ='category-id'>
<option value = 'Select From Below'>                    
</select>
<label>Content:</label>
<textarea name='content' required>".$value["content"]."</textarea>
<label>IP Address</label>
<input type='submit' name='updatepost' value='Update Post'>
</form>";
}?>
</div>
</div>
<div class="footer"><?php include "src/views/include/footer.php";?></div>
</body>
</html>
