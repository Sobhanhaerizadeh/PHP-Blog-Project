<?php
// Sobhan Haerizadeh
// Www.SobiDev.ir

session_start();
require_once("functions/pdo_connection.php");
require_once("functions/helpers.php");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP tutorial</title>
    <link rel="stylesheet" href="<?= asset("assets/css/bootstrap.min.css"); ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?=  asset("assets/css/style.css"); ?>" media="all" type="text/css">
</head>
<body>
<section id="app">

    <?php require_once "layouts/top-nav.php"?>

    <section class="container my-5">
        <!-- Example row of columns -->

        <section class="row">
        <?php
                global $pdo;

                $query = "SELECT * FROM `posts`WHERE `status` = 1";
                $statement = $pdo->prepare($query);
                $statement->execute();
                $posts = $statement->fetchAll(PDO::FETCH_OBJ);
            
                foreach($posts as $post)
                {
                 
           ?>
                <section class="col-4">
                <section class="mb-2 overflow-hidden" style="max-width:20rem;max-height:50rem;">
                <img class="img-fluid" src="<?= asset($post->image) ?>" style="height:200px;width:300px;"   alt="<?= $post->title ?>">
                  </section>
                    <h2 class="h5 text-truncate"><?= $post->title ?></h2>
                    <p><?= substr($post->body , 0 , 50) . " ... " ?></p>
                    <p><?= '<img src="https://img.icons8.com/ios/20/000000/hand-with-pen.png"/> ' . $post->created_at ?></p>
                    <p>
                        <?php
                            if (isset($post->updated_at)){
                              echo '<img src="https://img.icons8.com/ios/20/000000/approve-and-update.png"/> ' . $post->updated_at;
                            }
                        ?>
                </p>
                    <p><a class="btn btn-primary" href="<?= url("detail.php?post_id=".$post->id) ?>" role="button">View details »</a></p>
                </section>
                <?php
                            }
               ?>   
        </section>
    </section>
</section>
<script src="<?= url("assets/js/jquery.min.js") ?>"></script>
<script src="<?= url("assets/js/bootstrap.min.js") ?>"></script>
</body>
</html>