<?php
require_once('../../database/server.php');

if ($_SERVER['REQUST_METHOD'] == 'POST') {
    $username = $_POST['username'];
}
