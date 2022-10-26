<?php 
require_once("config/bootstrap.php");
require_once(WORKING_PATH."src/controller/functions.php");

$url = $_SERVER['REQUEST_URI'];
$path = explode('/',$url);
$path1 = $path[0];
$path2 = $path[1];
$path3 =$path[2];
if(!empty($path1)){
switch ($path1){
    case 'login' :
        login();
        break;
    case 'register':
        register();
        break;
    case 'require-request':
    requireReset();
       break;
    case 'reset':
    resetUser();
        break;
   case 'activate-user':
    acivateUser();
   case 'dashboiard':
    if(!empty($path1)) && !emoty($path2){
      switch ($path2){
      case 'newpage':
        newPage() 
        break;
     case 'newpost':
        newPost();
        break;
     case 'newcategory':
        newCategory();
         break;
     case 'update-page':
        updatePage();
        break;
     case 'update-post':
        updatePost();
        break;
     case 'update-category':
       updateCategory();
       break;
     case 'view-posts':
       viewPosts();
       break;
     case 'view-pages':
      viewPages();
      break;
      case 'view-categories':
         viewCategories();
         break; 
      default:
      dashboard();
}
    }
 default:
 logout();

}
}
 
if(empty($path2 && empty($path3))){
   switch($_GET) {
 case 'post':
    post();
    break;
case 'page':
    page();
    break;
case 'notfound':
    notFound();
default:
homepage();

   }

}

?>

