<?php 
session_start();

require (__DIR__."/src/controller/functions.php");
//seesion variables for testing only

$requestUrl = $_SERVER['REQUEST_URI'];
$uri = explode("/",$requestUrl);
$path = $uri['0'];


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
   case '/Contentgo/activate-user':
    activateUser();
       break;
   case '/Contentgo/dashboard':
      dashboard();
       break;
   case '/Contentgo/dashboard/newpage':
      newPage();
      break;
   case '/Contentgo/dashboard/newpost':
      newPost();
      break;
   case '/Contentgo/dashboard/newcategory':
      newCategory();
       break;
   case '/Contentgo/dashboard/newauthor':
      newAuthor();
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

 

 