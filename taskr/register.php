<?php

include 'lib/connect.php';
include_once 'common/header.php';

function isValid()
{
    if (empty($_POST['first_name'])
        || empty($_POST['last_name'])
        || empty($_POST['email'])
        || empty($_POST['password'])) {

        return false;
    }
    return true;
}

if (!empty($_POST['issubmit'])) {
    if (isValid()) {
        $connection = connect();
        $sql = "INSERT INTO users (first_name, last_name, password, email) VALUES
  (:first_name, :last_name, :password, :email)";
        $statement = $connection->prepare($sql);
        $statement->execute(array(
            "first_name" => $_POST['first_name'],
            "last_name" => $_POST['last_name'],
            "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
            "email" => $_POST['email']
        ));

        session_start();
        header("Location: index.php");
    } else {
        echo '<span style="color:red">vsechny hodnoty jsou povinne</span>';
    }

}
?>

    <div class="main-container">
        <div class="main-wrapper">
            <h2>Signup</h2>
            <form class="signup-form" action="register.php" method="POST">
                <input type="text" name="first_name" placeholder="Firstname">
                <input type="text" name="last_name" placeholder="Lastname">
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="password" placeholder="Password">
                <input type="hidden" name="issubmit" value="true">
                <button type="submit" name="submit">Sign up</button>
            </form>
        </div>
    </div>

<?php
include_once 'common/footer.php';
?>