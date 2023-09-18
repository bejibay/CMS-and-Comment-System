
<?php 
require_once WORKING_DIR_PATH."/src/model/comment.php";
function createComment(){
global $path;
$results = array();
$newdata = array();
$pageurl = "";
$pageid = null;
$pageMsg = "";
if(isset($path[0])){
$pageurl = $path[0];
$post = new Post();
$result1 = $post->select("SELECT*FROM post WHERE url =:url",["url"=>$pageurl]);
if(is_array($result1)){$pageid = $result1[0]['id'];
}
}

if(isset($_POST['createcomment'])){
if(isset($data['name']) && isset($data['email'])  && isset($data['comment'])){
$newdata = ["name"=>$_POST['name'],"email"=>$_POST['email'],"comment"=>$_POST['name']];
}

if(isset($data['name']) && isset($data['email'])  && isset($data['website'])  && isset($data['comment'])){
$newdata = ["name"=>$_POST['name'],"email"=>$_POST['email'],"website"=>$_POST['website'],"comment"=>$_POST['name']];
}
$comment = new Comment($newdata);
$result2 = $comment->insert("INSERT INTO comment(name,email,website,post_id,comment)
VALUES(:name,:email,:website,:post_id,:comment,)",["name"=>$comment->name,"email"=>$comment->email, 
"website"=>$comment->website,
"post_id"=>$pageid]);
$pageMsg = "Comment Successfully saved";
}
require(WORKING_DIR_PATH."/src/views/newcomment.php");
}
function readComments(){
global $path;
$pageurl = "";
$result2 = null;
$status = 1;
$postid = null;
if(isset($path[0])){
$pageurl = $path[0];
$post = new Post();
$result1 = $post->select("SELECT*FROM post WHERE url =:url",["url"=>$pageurl]);
if(is_array($result1)){$postid = $result1[0]['id'];
$comment = new Comment();
if(is_int($postid)){$result2 = $comment->select("SELECT*FROM comment INNER JOIN post ON 
comment.post_id =post.id AND status = :status",["url"=>$postid,"status"=>$status]);
return $result2;
}
}
}
}

function editComment(){
global $path;
$results= array();
$newdata = array();
$post_id = null;
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3']) && $path['2'] == "comment"){
$comment = new Comment();
$results['success'] = $comment->select("SELECT* FROM comment WHERE id=:id",["id"=>$path['3']]);
if(is_array($results['success'])){$results['success'] = $results['success'][0]['post_id'];
$_SESSION['editcommentid']=$results['success'];
}
}else {$formMsg = "Comment not in the database";
}
include (WORKING_DIR_PATH."/src/views/admin/editcomment.php");
}

function approveComment(){
global $path;
$results= array();
$newdata = array();
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3']) && $path['2'] == "comment"){
if(isset($_POST['approvecomment'])){
if(isset($_SESSION['canApprove']) && $_SESSION['canApprove'] > 0){  
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['website'])
 && isset($_POST['comment'])&& isset($_POST['ipaddress'])){
$newdata = ['name'=>$_POST['name'],'email'=>$_POST['email'],'website'=>$_POST['website'],
'ipaddress'=>$_POST['ipaddress']];
}  
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment'])&& isset($_POST['ipaddress'])){
$newdata = ['name'=>$_POST['name'],'email'=>$_POST['email'],'ipaddress'=>$_POST['ipaddress']];
} 
$comment = new Comment($newdata);
$results['success'] = $comment->update("UPDATE comment SET name =:name,email =:email,website =:website,
updated =:updated,ipaddress =:ipaddress WHERE id =:id",["name"=>$comment->name,
"email"=>$comment->email,"updated"=>CURRENT_TIMEESTAMP(),"ipaddress"=>$comment->ipaddress,
"id"=>$path['3']]);
$formMsg = "category is successfully updated";
}
} else {header('location:login');
}   
return  $results['success'];
}

}


    
function deleteComment(){
global $path;
if(isset($path[0]) && isset($path[1]) && isset($path[2]) && isset($path[3]) && isset($path[4])
&& isset($path[5]) && $path[3] == "delete" && $path[4] == "comment"){
if(isset($_SESSION['canDelete'])){
$comment = new Comment();
$result = $comment->delete("DELETE FROM comment WHERE id=:id LIMIT 1",["id"=>$path[5]]);
include (WORKING_DIR_PATH."/src/views/admin/delete.php");
}
}
}
?>