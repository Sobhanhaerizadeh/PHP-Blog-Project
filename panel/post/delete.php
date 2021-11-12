<?php
session_start();
    require_once("../../functions/helpers.php");
    require_once("../../functions/pdo_connection.php");
    include("../../functions/check-login.php");

if (!isset($_REQUEST['post_id']) || $_REQUEST['post_id'] == ""){
    redirect("panel/post");
}

else{
    global $pdo;
    $query = "SELECT * FROM `posts` WHERE `id` = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['post_id']]);
    $post = $statement->fetch(PDO::FETCH_OBJ);

    if ($post == true){

        $basePath = dirname(dirname(__DIR__));
       if (file_exists($basePath.$post->image)){
           unlink($basePath.$post->image);
       }
        $query = "DELETE FROM `posts` WHERE `id` = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$_GET['post_id']]);
    }
    redirect("panel/post");

}



?>