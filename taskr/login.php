<?php
include 'lib/connect.php';
include 'lib/common.php';
include_once 'common/header.php';

function isValid()
{
    if (empty($_POST['email'])
        || empty($_POST['password'])) {

        return false;
    }
    return true;
}

if (!empty($_POST['issubmit'])) {
    if (isValid()) {
        $connection = connect();
        $sql = "SELECT * FROM users where email=:email";
        $statement = $connection->prepare($sql);
        if ($statement->execute(array($_POST['email']))) {
            $row = $statement->fetch();
//            TODO tommy - vyresit password verify pro php 5.3.3
            if (password_verify($_POST['password'], $row['password'])) {

                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];

                $_SESSION["first_name"] = $first_name;
                $_SESSION["last_name"] = $last_name;
                $_SESSION["email"] = $email;
                header("Location: index.php");

            } else {
                writeErrorMessage('E-mail nebo heslo se neshoduje. Zkuste to znovu.');
            }
        } else {
            writeErrorMessage('Uživatel s tímto e-mailem nebyl nalezen.<br>Chcete se <a href="register.php">zaregistrovat</a>?');
        }
    } else {
        writeErrorMessage('Musíte zadat e-mail a heslo...');
    }
}

?>

    <div class="main-container">
        <div class="main-wrapper">
            <h2>Přihlášení</h2>
            <form class="signup-form" action="login.php" method="POST">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Heslo">
                <input type="hidden" name="issubmit" value="true">
                <button type="submit" name="submit">Přihlásit</button>
            </form>
        </div>
    </div>


<?php
include_once 'common/footer.php';
?>