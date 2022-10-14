
<?php 
define("DB_DSN", "mysql:host=localhost;dbname=soowecco");
define("DB_USERNAME", "soowecca");
define("DB_PASSWORD", " ");
function handle_execption($exception){
echo "there is an error, try again";
error_log($exeption->getMessage);
set_exception_handler(handle_exception);
}
?>















