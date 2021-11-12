<?php
session_start();

require_once "../functions/helpers.php";

if (isset($_SESSION['user']))
{
    session_destroy();
}

redirect("auth/login.php");

?>