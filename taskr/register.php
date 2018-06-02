<?php

include 'lib/db.php';
include 'lib/common.php';
include_once 'common/header.php';

/**
 * @return bool
 */
function isValid($first_name, $last_name, $email, $password)
{
    if (empty($first_name)
        || empty($last_name)
        || empty($email)
        || empty($password)) {
        return false;
    }
    if (!isValidEmail($email)) {

    }
    return true;
}


function emailExists($email)
{
    $result = findUserByEmail($email);
    return $result->rowCount() > 0;
}

if (!empty($_POST['issubmit'])) {
    if (isValid($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'])) {
        if (isValidEmail($_POST['email'])) {
            if (!emailExists($_POST['email'])) {
                $result = createUser($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
                if ($result) {
                    header("Location: index.php");
                } else {
                    writeErrorMessage('Nepodařilo se vytvořit uživatele. Zkuste to znovu.');
                }
            } else {
                writeErrorMessage('Uzivatel s timto emailem uz existuje');
            }
        } else {
            writeErrorMessage('Email je ve špatném formátu');
        }
    } else {
        writeErrorMessage('všechny hodnoty jsou povinné ...');
    }
}
?>

    <div class="main-container">
        <div class="main-wrapper">
            <h2>Registrace</h2>
            <form class="signup-form" action="register.php" method="POST">
                <input type="text" name="first_name" placeholder="Křestní jméno">
                <input type="text" name="last_name" placeholder="Příjmení">
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="password" placeholder="Heslo">
                <input type="hidden" name="issubmit" value="true">
                <button type="submit" name="submit">Sign up</button>
            </form>
        </div>
    </div>

<?php
include_once 'common/footer.php';
?>