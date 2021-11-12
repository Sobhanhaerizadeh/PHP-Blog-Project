<?php
session_start();
    require_once("../../functions/helpers.php");
    require_once("../../functions/pdo_connection.php");
    include("../../functions/check-login.php");

if (isset($_REQUEST['post_id'])){
    global $pdo;

    $query = "SELECT * FROM `posts` WHERE `id` = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['post_id']]);
    $post = $statement->fetch(PDO::FETCH_OBJ);

            if ($post == true)
            {
            $status = ($post->status == 1) ? 0 : 1;
            $query = "UPDATE `posts` SET `status` = ? WHERE `id` = ?";
            $statement = $pdo->prepare($query);
            $statement->execute([$status , $_GET['post_id']]);
            }
    }

    else if (isset($_REQUEST['changeall'])){
        global $pdo;

        $query = "UPDATE `posts` SET `status` = ? ";
        $statement = $pdo->prepare($query);
        $statement->execute([ rand(0 , 1)]);
    }

    redirect("panel/post");
