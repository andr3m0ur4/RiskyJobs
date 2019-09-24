<?php  

include_once 'config/connectvars.php';
include_once 'class/SQL.php';

$obj = new SQL ( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

$result = $obj -> select ( "SELECT * FROM riskyjobs" );
var_dump($result);

?>