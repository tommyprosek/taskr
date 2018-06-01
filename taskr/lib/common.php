<?php

function writeErrorMessage($errorMessage)
{
    echo '<div class="error-message"><span>' . $errorMessage . '</span></div>';
}

function parseDate($dateValue)
{
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
    if (!is_int($day) || !is_int($month) || !is_int($year)) {
        return false;
    }
    if (!checkdate($month, $day, $year)) {
        return false;
    }
    return true;
}