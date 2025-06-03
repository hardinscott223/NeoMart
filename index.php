<?php
if (isset($_COOKIE['user'])) {
    $authUser = json_decode($_COOKIE['user'], true);
    if ($authUser['is_admin']) {
        header("location:./admin/dashboard.php");
    } else {
        header("location:./auth/login.php");
    }
} else {
    header("location:./auth/login.php");
}
