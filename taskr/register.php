<?php

include 'lib/db.php';
include 'lib/common.php';
include_once 'common/header.php';

/**
 * @return bool
 */
function isValid($first_name, $last_name, $email, $password)
{
    return !empty($first_name) && !empty($last_name) && !empty($email) && !empty($password);
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
            <form class="form" action="register.php" method="POST">
                <input type="text" name="first_name" title="Křestní jméno je povinné" placeholder="Křestní jméno"
                       required>
                <input type="text" name="last_name" title="Přijmení je povinné" placeholder="Příjmení" required>
                <input type="text" name="email" class="email" id="email" title="Email je povinný" placeholder="E-mail"
                       required>
                <input type="password" name="password" title="Heslo je povinné" placeholder="Heslo" required>
                <input type="hidden" name="issubmit" value="true">
                <button type="submit" name="submit">Registrovat</button>
            </form>
        </div>
    </div>

<?php
include_once 'common/footer.php';
?>