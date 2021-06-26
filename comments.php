?php 
$action=isset($ction)?$_GET['action']:"";
?>
<?php 
if($action)){
Comments::getComments($action);
foreach($row as $row){}
if($_POST['savecomments']){
$comments=new Comments();
$comments->storeForm($_POST);
$comments->insertComments($action);
Comments::getComments($action);
foreach($row as $row){
echo "<ul>";
}
}
}
?>









