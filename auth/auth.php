<?php

$authUser = null;

if (isset($_COOKIE['user'])) {
    $authUser = json_decode($_COOKIE['user'], true);
}

if (!$authUser) {
    header("Location:../auth/login.php");
}
