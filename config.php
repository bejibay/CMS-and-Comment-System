

// config codes

<?php 

define("DB_DSN", "mysql:host=localhost;dbname=soowecco");
define("DB_USERNAME", "soowecca");
define("DB_PASSWORD", " ");
define("CLASS_PATH", "classes");
define("TEMPLATE_PATH", "templates"):
require(classes."/article.php");
require(classes."/category");
require(classes."/admin.php");
require(functions.php);
function handle_execption($exception){
echo "there is an error, try again";
error_log($exeption->getMessage);
set_exception_handler(handle_exception);
}

?>















