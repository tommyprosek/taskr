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
    echo '</div>';
}
function registerHere()
{
   echo '<div class="no-login">';
                echo '<h2>Neznámý uživatel</h2>';
               echo '<p> Vítej na Taskru.<br>Zatím tě neznáme.<br> Chceš se <a href="login.php">přihlásit</a>?<br><br>
                    Pokud nejsi zaregistrovaný  <a href="register.php">zaregistruj se</a>.
                </p>';
           echo '</div>';
}
?>

    <section class="main-container">
        <div class="main-wrapper">

            <?php
            if (jeZaregistrovany()) {
                thereWillBeTasks();
                ?>
                <form method="POST">
                <input  class="zadej-task" type="text" placeholder="Zadej úkol" style="background: white; width: 100%; padding: 16px 16px 16px 2px; border: none; position: relative; margin: 0; margin-top: 5px; font-size: 24px; border-radius: 4px 4px 4px 4px;">
                    <input type="hidden" name="issubmit" value="true">
                    <button type="submit" name="submit" style=" border-radius: 4px 4px 4px 4px; margin: 0 auto; width: 1018px; height: 40px; border: none; background-color: #222; font-size: 16px; color: #fff;">Přidat</button>
                </form>
                <div class="nahled">
                    <div class="tasks" style=" margin-top: 2px; border-radius: 4px 4px 4px 4px; background: white; width: 100%; padding: 16px 16px 16px 2px">dfdbdbdfbdbd</div>
                </div>
                <?php
            } else {
                registerHere();
            }
            ?>

        </div>
    </section>

<?php
include_once 'common/footer.php';
?>