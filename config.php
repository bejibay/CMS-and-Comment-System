
<?php 
define("DB_DSN", "mysql:host=localhost;dbname=soowecco");
define("DB_USERNAME", "soowecca");
define("DB_PASSWORD", " ");
define("CLASS_PATH", "classes");
define("TEMPLATE_PATH", "templates");
require(CLASS_PATH."/page.php");
require(CLASS_PATH."/post.php");
require(CLASS_PATH."/category");
require(CLASS_PATH."/user.php");
require("functions.php");
function handle_execption($exception){
echo "there is an error, try again";
error_log($exeption->getMessage);
set_exception_handler(handle_exception);
}
?>















