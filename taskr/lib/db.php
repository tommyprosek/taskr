<?php
$dbServer = "127.0.0.1";
//$dbUsername = "proseto17";
//$dbPassword = "bOGust56";
$dbUsername = "root";
$dbPassword = "";
$dbName = "proseto17";

// TODO tommy - zjistit, proc tahle funkce je deprecated a pripadne nahradit za novejsi
$conn = mysql_connect($dbServer, $dbUsername, $dbPassword, $dbName);
global $conn;

?>