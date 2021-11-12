<?php
session_start();
    require_once("../../functions/helpers.php");
    require_once("../../functions/pdo_connection.php");
    include("../../functions/check-login.php");

    if (isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] !== ""){

        global $pdo;

        $query = "DELETE FROM blog_project.categories WHERE `id` = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$_GET['cat_id']]);
        

    }

    redirect("panel/category");

?>