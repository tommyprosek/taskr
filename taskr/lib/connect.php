<?php
//$dbServer = "127.0.0.1";
////$dbUsername = "proseto17";
////$dbPassword = "bOGust56";
//$dbUsername = "root";
//$dbPassword = "";
//$dbName = "proseto17";
//
//// TODO tommy - zjistit, proc tahle funkce je deprecated a pripadne nahradit za novejsi
//$conn = mysql_connect($dbServer, $dbUsername, $dbPassword, $dbName);
//global $conn;

function connect (){
    $host = '127.0.0.1';
    $db   = 'proseto17';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// TODO tommy - vygoogle co jsou tyhle parametry zač a napsat je sem do komentare
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        return new PDO($dsn, $user, $pass, $opt);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit;
    }
}


?>