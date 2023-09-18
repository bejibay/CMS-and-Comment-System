
<?php 

require_once WORKING_DIR_PATH."src/model/category.php";
function createCategory(){
$formMsg = "";
$results= array();
$results['title'] = "Create A New Category";
$results['description'] = "Create A new Category";
$results['pageheading']="Create A Category";
$newdata = array();
if( isset($_SESSION['canCreate']) && $_SESSION['canCreate'] > 0){
if(isset($_POST['createcategory'])){
if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['ipaddress'])){
$newdata = ['name'=>$_POST['name'],'description'=>$_POST['description'],'ipaddress'=>$_POST['ipaddress']];
$category  =new Category($newdata);
$result= $category->insert("INSERT INTO category(name,description,ipaddress)
VALUES(:name,:description,:ipaddress)",["name"=>$category->name,"description"=>$category->description,
"ipaddress"=>$category->ipaddress]);
$formMsg = "The new category has been created";
} else{$formError  = "Form not properly filled!"; 
}
}
require(WORKING_DIR_PATH."/src/views/admin/createcategory.php"); 
}
}
 


function viewCategories(){
$results = array();
global $path;
$results['title'] = "Category List";
$results['description'] = "A list of The Categories";
$results['pageheading'] = "The Category Lists";
if(isset($_SESSION['canRead']) && $_SESSION['canRead'] >0){
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3'])&& isset($path['4']) 
&& $path['3'] == "view" && $path['4'] == "categories"){
$category = new Category();
$results['success'] = $category->select("SELECT* FROM category");
if($results['success']){
include (WORKING_DIR_PATH."/src/views/admin/view.php");
}
}
}
}
    
     
function editCategory(){
$results= array();
$newdata = array();
global $path;
if(isset($_SESSION['canRead']) && $_SESSION['canRead'] >0){
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3'])&& isset($path['4']) 
&& isset($path['5']) && $path['3'] == "edit" && $path['4'] == "category"){
$post = new Post();
$results['success'] = $post->select("SELECT* FROM category WHERE id=:id",["id"=>$path[5]]);
foreach($results['success']  as $key=>$value){
include (WORKING_DIR_PATH."/src/views/admin/edit.php");
}
} else {"Item not found in database";}
} 
} 

function updateCategory(){
global $path;
if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3']) && $path['2'] == "category")
if(isset($_POST['update'])){
if(isset($_SESSION['canUpdate']) && $_SESSION['canUpdate'] > 0){  
if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['updated']) && isset($_POST['ipaddress'])){
$newdata = ['name'=>$_POST['name'],'description'=>$_POST['description'],'updated'=>$_POST['updated'],
'ipaddress'=>$_POST['ipaddress']];
$category = new Category($newdata);
$results['success'] = $category->update("UPDATE category SET name =:name,description =:description,
updated =:updated,ipaddress =:ipaddress WHERE id =:id",["name"=>$category->name,"description"=>$category->description,
"updated"=>$category->updated,"ipaddress"=>$category->ipaddress,"id"=>$path[3]]);
$formMsg = "category is successfully updated";
    
}else {$formMsg = "Form not properly filled";
}
} else {header('location:Contentgo/login');
}   
}
return  $results['success'];
}

function deleteCategory(){
global $path;
if(isset($path[0]) && isset($path[1]) && isset($path[2]) && isset($path[3]) && isset($path[4])
&& isset($path[5]) && $path[3] == "delete" && $path[4] == "category"){
if(isset($_SESSION['canDelete'])){
$category = new Category();
$result = $category->delete("DELETE FROM category WHERE id=:id LIMIT 1",["id"=>$path[5]]);
include (WORKING_DIR_PATH."/src/views/admin/delete.php");
}
}
}
?>
                