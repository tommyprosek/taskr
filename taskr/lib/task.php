<?php

include 'lib/connect.php';
include 'lib/common.php';
include_once 'common/header.php';

function isValid()
{
    if (empty($_POST['title']))
         {
        return false;
    }
    return true;
}



if (!empty($_POST['issubmit'])) {
    if (isValid()) {
        $connection = connect();
        $sql = "INSERT INTO `tasks` ( user_id, title) VALUES ( :user_id, :title);";
        $statement = $connection->prepare($sql);
        $statement->execute(array(
            "title" => $_POST['title']
        ));
    } else {
        writeErrorMessage('Zadej úkol');
    }

}