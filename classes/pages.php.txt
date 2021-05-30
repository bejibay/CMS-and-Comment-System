

// config codes

<?php 

define("HOSTNAME", "Localhost");
define("DATABASE", "soowecca");
define("USERNAME", "soowecco");
define("PASSWORD", "");

$conn=mysqli_connect("HOSTNAME", "DATABASE","USERNAME","PASSWORD"); 
if (!$conn){echo "connection failed". "". mysqli_connect_error();}
require("functions.php");

?>















