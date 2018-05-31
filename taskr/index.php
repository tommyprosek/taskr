<?php
include_once 'common/header.php';


function isAuthorized()
{
    return isset($_SESSION["email"])
        && isset($_SESSION["first_name"])
        && isset($_SESSION["last_name"]);
}

function thereWillBeTasks()
{
    echo '<div class="nav-login">';
    echo '</div>';
}

function notAuthorizedContent()
{
    echo '<div id="no-login">';
    echo '<p> Vítej na Taskru. Zatím se neznáme.<br><br>
            Máš účet? <a href="login.php">Přihláš se</a>.<br>Pokud ne, můžeš se <a href="register.php">zaregistrovat</a>.</p>';
    echo '</div>';
}

?>

    <section class="main-container">
        <div class="main-wrapper">

            <?php
            if (isAuthorized()) {
                thereWillBeTasks();
                ?>
                <div id="tasks">
                    <form method="POST" action="lib/task.php">
                        <input id="task-title" class="large" name="task-title" type="text" placeholder="Zadejte úkol">
                        <input id="task-category" class="small" name="task-category" type="text"
                               placeholder="Zadejte kategorii">
                        <input id="task-deadline" class="small" name="task-deadline" type="text"
                               placeholder="Zadejte termín splnění">
                        <input type="hidden" name="issubmit" value="true">
                        <button type="submit" name="submit">Přidat</button>
                    </form>
                    <div id="task-list">
                        <table>
                            <thead>
                            <th width="400">Úkol</th>
                            <th width="100">Kategorie</th>
                            <th width="100">Termín</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            <td>radek zadek</td>
                            <td>Domácnost</td>
                            <td>5.3.2018</td>
                            <td>
                                <a href="index.php?action=finished&id=1">Splněno</a>
                            </td>
                            <td>
                                <span>&nbsp;|&nbsp;</span>
                            </td>
                            <td>
                                <a href="index.php?action=delete&id=1">Odstranit</a>
                            </td>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            } else {
                notAuthorizedContent();
            }
            ?>

        </div>
    </section>

<?php
include_once 'common/footer.php';
?>