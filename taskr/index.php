<?php
include 'lib/connect.php';
include 'lib/common.php';
include_once 'common/header.php';


function isAuthorized()
{
    return isset($_SESSION["email"])
        && isset($_SESSION["user_id"])
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

function isValidTask()
{
    if (empty($_POST['title'])) {
        return false;
    }
    return true;
}

if (!empty($_POST['issubmit'])) {
    if (isValidTask()) {

        $dateArray = parseDate($_POST['deadline']);

        $connection = connect();
        $sql = "INSERT INTO tasks (user_id, title, deadline, category_id)
    values (:user_id, :title, :deadline, null )";
        $statement = $connection->prepare($sql);
        $statement->execute(array(
            "user_id" => $_SESSION['user_id'],
            "title" => $_POST['title'],
            "deadline" => $_POST['deadline']

        ));
        header("Location: index.php");
    } else {
        writeErrorMessage('Musíš vyplnit vše');
    }
}


?>


    <section class="main-container">
        <div class="main-wrapper">

            <?php
            if (isAuthorized()) {
                thereWillBeTasks();
                ?>
                <div id="tasks">
                    <form method="POST" action="index.php">
                        <input id="task-title" class="large" name="title" type="text" placeholder="Zadejte úkol...">
                        <select id="task-category" class="small" name="category">
                            <option>-vyberte kategorii-</option>
                            <option value="1">Saab</option>
                            <option value="2">Opel</option>
                            <option value="3">Audi</option>
                        </select>
                        <input id="task-deadline" class="small date" name="deadline" type="text" autocomplete="off"
                               placeholder="Zadejte termín splnění ve formátu dd.mm.yyyy...">
                        <input type="hidden" name="issubmit" value="true">
                        <button type="submit" name="submit">Přidat</button>
                    </form>
                    <div id="task-list">
                        <table>
                            <thead>
                            <tr>
                                <th width="400">Úkol</th>
                                <th width="100">Kategorie</th>
                                <th width="100">Termín</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $connection = connect();
                            $sql = "select t.title, t.deadline, t.category_id from tasks t";
                            $statement = $connection->prepare($sql);
                            $statement->execute();
                            while ($row = $statement->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $row['category_id'] . "</td>";
                                echo "<td>" . $row['deadline'] . "</td>";
                                echo "<td><a href=\"index.php?action=finished&id=1\">Splněno</a></td>";
                                echo "<td><span>&nbsp;|&nbsp;</span></td>";
                                echo "<td><a href=\"index.php?action=delete&id=1\">Odstranit</a></td>";
                                echo "</tr>";
                            }
                            ?>
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

    <!--Basic JQuery library from CDN-->
    <script type="text/javascript" src="js/jquery-latest.min.js"></script>
    <!--JQuery UI support for datepicker component from CDN-->
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <!--JQuery date mask script-->
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(function () {
            // Set mask for date input
            // Set datapicker support with date format for date input
            $('.date')
                .mask('00.00.0000', {placeholder: "Zadejte termín splnění ve formátu dd.mm.yyyy..."})
                .datepicker({dateFormat: "dd.mm.yy"});
        });
    </script>

<?php
include_once 'common/footer.php';
?>