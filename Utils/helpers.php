<?php

function sanitizeString($string) {
    return htmlspecialchars(strip_tags(trim($string)));
}

function isEmailValid($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function generateRandomToken($length = 16) {
    return bin2hex(random_bytes($length));
}

?>
