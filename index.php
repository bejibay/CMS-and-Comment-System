<?php 
session_start();
// session for testing only
$_SESSION['firstnamne'] = "ayo";
$_SESSION['lastname'] = "tolu";

require (__DIR__."/src/controller/functions.php");

$requestUrl = $_SERVER['REQUEST_URI'];
$currentPageUrl = "http://"."locahost".$_SERVER['REQUEST_URI'];
if(isset($requestUrl)){
switch ($requestUrl){
    case   "/Contentgo/":
    case   "/Contentgo/home":
      homePage();
      break;
    case '/Contentgo/login' :
        login();
        break;
    case '/Contentgo/register':
        register();
        break;
    case '/Contentgo/require-reset':
    requireReset();
       break;
    case '/Contentgo/reset':
    resetUser();
        break;
   case 'Contentgo/activate-user':
    acivateUser();
   case '/Contentgo/dashboard':
      dashboard();
   case '/Contentgo/dashboard/newpage':
      newPage();
      break;
   case '/Contentgo/dashboard/newpost':
      newPost();
      break;
   case '/Contentgo/dashboard/newcategory':
      newCategory();
       break;
   case '/Contentgo/dashboard/update-page':
      updatePage();
      break;
   case '/Contentgo/dashboard/update-post':
      updatePost();
      break;
   case '/Contentgo/dashboard/update-category':
     updateCategory();
     break;
   case '/Contentgo/dashboard/view-posts':
     viewPosts();
     break;
   case '/Contentgo/dashboard/view-pages':
    viewPages();
    break;
   case '/Contentgo/dashboard/view-categories':
    viewCategories();
    break;
    case '/Contentgo/dashboard/view-media':
      viewMedia();
      break;
    case '/Contentgo/logout':
      logout();
   break;
    default:
    otherUrls();
    
   }
}

    

