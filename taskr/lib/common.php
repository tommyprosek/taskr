<?php

function writeErrorMessage($errorMessage)
{
    echo '<div class="error-message"><span>' . $errorMessage . '</span></div>';
}

/**
 * returns array with 3 values- day, month, year
 */
function parseDate($dateValue)
{
    if ($dateValue == null || $dateValue == '') {
        return null;
    }
    // Expecting format dd.mm.yyyy
    return explode(".", $dateValue);
}

function isValidDate($dateArray)
{
    if (!is_array($dateArray)) {
        return true;
    }
    $size = sizeof($dateArray);
    if ($size < 3 || $size > 3) {
        return false;
    }
    $day = $dateArray[0];
    $month = $dateArray[1];
    $year = $dateArray[2];
    if (!is_numeric($day) || !is_numeric($month) || !is_numeric($year)) {
        return false;
    }
    if (!checkdate($month, $day, $year)) {
        return false;
    }
    return true;
}

function isValidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}