<?php
include_once 'common/header.php';
function jeZaregistrovany() {
    return isset($_SESSION["email"])
        && isset($_SESSION["first_name"])
        && isset($_SESSION["last_name"]);
}
function thereWillBeTasks()
{
    echo '<div class="nav-login">';
    echo '  <h2>Hlavní stránka</h2>';
    echo '  <p>Tady budou tasky...</p>';
    echo '</div>';
}
function registerHere()
{
   echo '<div class="no-login">';
                echo '<h2>Neznámý uživatel</h2>';
               echo '<p> Vítej na Taskru.<br>Zatím tě neznáme.<br> Chceš se <a href="login.php">přihlásit</a>?<br><br>
                    Pokud nejsi zaregistrovany  <a href="register.php">zaregistruj se</a>.
                </p>';
           echo '</div>';
}
?>

    <section class="main-container">
        <div class="main-wrapper">

            <?php
            if (jeZaregistrovany()) {
                thereWillBeTasks();
            } else {
                registerHere();
            }
            ?>
        </div>
    </section>

<?php
include_once 'common/footer.php';
?>