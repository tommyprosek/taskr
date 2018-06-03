<?php

include 'lib/db.php';
include_once 'common/header.php';


function isNotEmpty ($name) {
    return isset($name);
}

if (!empty($_POST['issubmit'])) {
    if (isNotEmpty($_POST['name'])) {
        $create = createCategory($_POST['name'], $_SESSION['user_id']);
        if ($create) {
            header("Location: settings.php");
        }
    }
}


?>

<div class="main-container">
    <div class="main-wrapper">
        <h2>Nastavení</h2>
        <h3>Kategorie</h3>
        <form class="form" action="settings.php" method="POST">
            <input type="text" title="Zadejte novou kategorii" name="name"
                   placeholder="Nová kategorie" required>
            <input type="hidden" name="issubmit" value="true">
            <button type="submit" name="submit">Přidat kategorii</button>
        </form>
        <div class="settings">
        <table>
            <thead>
            <tr>
                <th>Název kategorie</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $category = findCategories($_SESSION['user_id']);
            while ($row = $category->fetch()) {
                echo '<tr>';
                 echo "<td>" . $row['name'] . "</td>";
                echo '</tr>';
            }
            ?>
            </tbody>

        </table>
        </div>
    </div>
</div>



<?php
include_once 'common/footer.php';
?>

