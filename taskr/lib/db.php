<?php
//$dbServer = "127.0.0.1";
////$dbUsername = "proseto17";
////$dbPassword = "bOGust56";
//$dbUsername = "root";
//$dbPassword = "";
//$dbName = "proseto17";


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

function findUserByEmail($email) {
    $connection = connect();
    $sql = "SELECT * FROM users where email=:email";
    $statement = $connection->prepare($sql);
    $statement->execute(array($email));
    return $statement;
}

function findTasksByUserId ($user_id) {
    $connection = connect();
    $sql = "select t.title, t.deadline, t.category_id from tasks t where user_id=:user_id";
    $statement = $connection->prepare($sql);
    $statement->execute(array($user_id));
    return $statement;
}

function createUser ($first_name, $last_name, $password, $email) {
    $connection = connect();
    $sql = "INSERT INTO users (first_name, last_name, password, email) VALUES (:first_name, :last_name, :password, :email)";
    $statement = $connection->prepare($sql);
    $statement->execute(array($first_name, $last_name, password_hash($password, PASSWORD_DEFAULT), $email));
    return $statement;
}

?>