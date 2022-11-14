
<?php 
define("DB_DSN", "mysql:host=localhost;dbname=contentgo");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "contentgo");
function handle_execption($exception){
echo "there is an error, try again";
error_log($exeption->getMessage);
set_exception_handler(handle_exception);
}
?>















