<?php
session_start();

function isUserAuthenticated() {
    return isset($_SESSION["email"])
        && isset($_SESSION["first_name"])
        && isset($_SESSION["last_name"]);
}

function showAuthenticatedButtons()
{
    echo '<div class="nav-login">';
    echo '  <span class="user-name">'.$_SESSION['first_name'].'&nbsp;'.$_SESSION['last_name'].'&nbsp;</span>';
    echo '  <a href="logout.php">Odhlásit</a>';
    echo '</div>';
}

function showNotAuthenticatedButtons()
{
    echo '<div class="nav-login">';
    echo '  <a href="login.php">Přihlásit</a>';
    echo '&nbsp;|&nbsp;';
    echo '  <a href="register.php">Zaregistrovat</a>';
    echo '</div>';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Taskr</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Taskr</a></li>
            </ul>
            <?php
            if (isUserAuthenticated()) {
                showAuthenticatedButtons();
            } else {
                showNotAuthenticatedButtons();
            }
            ?>
        </div>
    </nav>
</header>
