<?php
include 'lib/connect.php';
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
            if (password_verify($_POST['password'], $row['password'])) {

                $first_name = $row['first_name'];
                $last_name = $row['last_name'];

// session_start();
// header("Location: index.php");

            } else {
                echo '<span style="color:red">E-mail nebo heslo se neshoduje. Zkuste to znovu.</span>';
            }
        } else {
            echo '<span style="color:red">Uživatel s tímto e-mailem nebyl nalezen.<br>Chcete se <a href="register.php">zaregistrovat</a>?</span>';
        }
    } else {
        echo '<span style="color:red">Musíte zadat e-mail a heslo...</span>';
    }
}

?>

    <div class="main-container">
        <div class="main-wrapper">
            <h2>Login</h2>
            <form class="signup-form" action="login.php" method="POST">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="hidden" name="issubmit" value="true">
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>


<?php
include_once 'common/footer.php';
?>