
<?php 

require_once WORKING_DIR_PATH."/src/model/page.php";

function createPage(){
$results = array();
$newdata = array();
$url = "";
if(isset($_SESSION['canCreate']) && $_SESSION['canCreate'] >0){
if(isset($_POST['createpage'])){
if(isset($_POST['title']) && isset($_POST['description'])  && isset($_POST['content']) 
&& isset($_POST['ipaddress']) ){ 
$newdata = ['title'=>$_POST['title'],'description'=>$_POST['description'],'content'=>$_POST['content'],
'ipaddress'=>$_POST['ipaddress']];
}
$page = new Page($newdata);
$url = $page->getSEOUrl($_POST['title']);
$result1 = $page->insert("INSERT INTO page(url,title,description,content,ipaddress)
VALUES(:url,:title,:description,:content,:ipaddress)",["url"=>$url,
"title"=>$page->title,"description"=>$page->description, "content"=>$page->content,
"ipaddress"=>$page->ipaddress]);
return $result1;
}
require(WORKING_DIR_PATH."/src/views/admin/createpage.php"); 
}
}          
             
function viewPages(){
$results = array();
global $path;
$results['title'] = "Page List";
$results['description'] = "A list of The Pages";
$results['pageheading'] = "The Page Lists";
if(isset($_SESSION['canRead']) && $_SESSION['canRead'] >0){
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3'])&& isset($path['4']) 
&& $path['3'] == "view" && $path['4'] == "pages"){
$page = new Page();
$results['success'] = $page->select("SELECT* FROM page");
if($results['success']){
include (WORKING_DIR_PATH."/src/views/admin/view.php");
}
}
}
}

function editPage(){
$results= array();
$newdata = array();
global $path;
if(isset($_SESSION['canRead']) && $_SESSION['canRead'] >0){
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3'])&& isset($path['4']) 
&& isset($path['5']) && $path['3'] == "edit" && $path['4'] == "page"){
$page = new Page();
$results['success'] = $page->select("SELECT* FROM page WHERE id=:id",["id"=>$path[5]]);
foreach($results['success']  as $key=>$value){
include (WORKING_DIR_PATH."/src/views/admin/editpage.php");
}
} else {$formMsg = "Item not in the database";
}
}

}
        
function updatePage(){
global $path;
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3']) && $path['2'] == "page")
if(isset($_POST['update'])){
if(isset($_SESSION['canUpdate']) && $_SESSION['canUpdate'] > 0){  
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['content'])
&& isset($_POST['ipaddress'])){
$newdata = ['title'=>$_POST['title'],'description'=>$_POST['description'],'page_id'=>$_POST['page_id'],
'content'=>$_POST['content'],'ipaddress'=>$_POST['ipaddress']];
$page = new Page($newdata);
}  
$results['success'] = $page->update("UPDATE page SET title =:title,description =:description,
category_id =:category_id,content =:content,ipaddress =:ipaddress WHERE id =:id",["title"=>$page->title,
"description"=>$page->description,"content"=>$page->content,"ipaddress"=>$page->ipaddress,
"id"=>$page->id]);
$formMsg = "page is successfully updated";
        
}else {$formMsg = "Form not properly filled";
}
} else {header('location:login');
}
include (WORKING_DIR_PATH."/src/views/admin/editpage.php");
return  $results['success'];
}   



function deletePage(){
global $path;
if(isset($path[0]) && isset($path[1]) && isset($path[2]) && isset($path[3]) && isset($path[4])
&& isset($path[5]) && $path[3] == "delete" && $path[4] == "page"){
if(isset($_SESSION['canDelete'])){
$page = new page();
$result = $page->delete("DELETE FROM page WHERE id=:id LIMIT 1",["id"=>$path[5]]);
include (WORKING_DIR_PATH."/src/views/admin/delete.php");
}
}
}
?>
