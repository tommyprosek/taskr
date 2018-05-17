<?php
// Hash file using sha512, salt and a secret key.
// By github.com/lesander

function hashWithSalt($password) {
    $secretkey = "Flíček_bydlí_ve_Zdibech";
    $salt = hash('sha512', microtime(true).mt_rand(10000,90000));
    return hash('sha512', $salt.$password.$secretkey);
}