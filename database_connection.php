<?php
//database_connection.php
/* Database config */
$db_host		= '127.0.0.1';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'comprastockproduccion'; 

/* End config */

$connect = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>