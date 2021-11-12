<?php
if (!isset($_SESSION['user']))
{
    redirect("auth/login.php");
}