<?php
require_once("../auth/auth.php");
if (!$authUser['is_admin']) {
    header("location:../auth/login.php");
    exit;
}
require_once('../layout/header.php');
require_once('./layout/sidebar.php');

?>
<div class="col-md-10">
    <h1>Hello from order</h1>

</div>