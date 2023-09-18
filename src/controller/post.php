
<?php 

require_once WORKING_DIR_PATH."/src/model/post.php";
require_once WORKING_DIR_PATH."/src/model/category.php";

function createPost(){
$results = array();
$newdata = array();
$url = "";
$category = new Category();
$results['select'] = $category->select("SELECT* FROM category");  

if(isset($_SESSION['canCreate'])){
if(isset($_POST['createpost'])){

if(isset($_POST['title']) && isset($_POST['description']

)  && isset($_POST['content']) && isset($_POST['category_id']) && isset($_POST['ipaddress']) ){ 

$newdata = ['title'=>$_POST['title'],'description'=>$_POST['description'],'content'=>$_POST['content'],
'category_id'=>intval($_POST['category_id']),'ipaddress'=>$_POST['ipaddress']];
}
$post = new Post($newdata);
$url = $post->getSEOUrl($_POST['title']);
$result1 = $post->insert("INSERT INTO post(url,title,description,content,category_id,ipaddress)
VALUES(:url,:title,:description,:content,:category_id,:ipaddress)",["url"=>$url,
"title"=>$post->title,"description"=>$post->description, "content"=>$post->content,
"category_id"=>$post->category_id,"ipaddress"=>$post->ipaddress]);

}
require(WORKING_DIR_PATH."/src/views/admin/createpost.php"); 
}
}          
                
function viewPosts(){
$results = array();
global $path;
$results['title'] = "Post List";
$results['description'] = "A list of The Posts";
$results['pageheading'] = "The Post Lists";
if(isset($_SESSION['canRead']) && $_SESSION['canRead'] >0){
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3'])&& isset($path['4']) 
&& $path['3'] == "view" && $path['4'] == "posts"){
$post = new Post();
$results['success'] = $post->select("SELECT* FROM post");
if($results['success']){
include (WORKING_DIR_PATH."/src/views/admin/view.php");
}
}
}
}

function editPost(){
$results= array();
$newdata = array();
global $path;
if(isset($_SESSION['canRead']) && $_SESSION['canRead'] >0){
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3'])&& isset($path['4']) 
&& isset($path['5']) && $path['3'] == "edit" && $path['4'] == "post"){
$post = new Post();
$results['success'] = $post->select("SELECT* FROM post WHERE id=:id",["id"=>$path[5]]);
foreach($results['success']  as $key=>$value){
include (WORKING_DIR_PATH."/src/views/admin/edit.php");
}
} else {"Item not found in database";}
} 
} 



        
function updatePost(){
global $path;
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3']) && $path['2'] == "post"){
if(isset($_POST['update'])){
if(isset($_SESSION['canUpdate']) && $_SESSION['canUpdate'] > 0){  
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['content'])
&& isset($_POST['ipaddress'])){
$newdata = ['title'=>$_POST['title'],'description'=>$_POST['description'],'post_id'=>$_POST['post_id'],
'content'=>$_POST['content'],'ipaddress'=>$_POST['ipaddress']];
$post = new post($newdata);
}  
$results['success'] = $post->update("UPDATE post SET title =:title,description =:description,
content =:content,ipaddress =:ipaddress WHERE id =:id",["title"=>$post->title,
"description"=>$post->description,"content"=>$post->content,"ipaddress"=>$post->ipaddress,
"id"=>$path['3']]);
$formMsg = "post is successfully updated";
}else {$formMsg = "Form not properly filled";
}
} else {header('location:login');
}
return  $results['success'];
} 
}   

function deletePost(){
global $path;
if(isset($path[0]) && isset($path[1]) && isset($path[2]) && isset($path[3]) && isset($path[4])
&& isset($path[5]) && $path[3] == "delete" && $path[4] == "post"){
if(isset($_SESSION['canDelete'])){
$post = new post();
$result = $post->delete("DELETE FROM post WHERE id=:id LIMIT 1",["id"=>$path[5]]);
include (WORKING_DIR_PATH."/src/views/admin/delete.php");
}
}
}
?>
