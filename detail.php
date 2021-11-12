<?php
session_start();
require_once("functions/pdo_connection.php");
require_once("functions/helpers.php");

    if (!isset($_REQUEST['post_id']) || $_REQUEST['post_id'] == ""){
        redirect("index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP tutorial</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="all" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" media="all" type="text/css">
</head>
<body>
<section id="app">
<?php require_once "layouts/top-nav.php"?>

    <section class="container my-5">
        <!-- Example row of columns -->
        <section class="row">
            <?php
                global $pdo;
                $query = "SELECT posts.* , categories.name AS 'category_name' FROM `posts` JOIN `categories` ON posts.cat_id = categories.id WHERE posts.status = 1 AND posts.id = ?";
                $statement = $pdo->prepare($query);
                $statement->execute([$_GET['post_id']]);
                $post = $statement->fetch();
                
            ?>

<section>
                        <?php
                            if (!$post)
                            {
                                echo "<div class='alert alert-danger' style='font-size:20px;'> Post not found! </div>";
                                exit();
                            }
                        ?>
                  
                    </section>

            <section class="col-md-12">
                <h1><?= $post->title ?> </h1>
                <h5 class="d-flex justify-content-between align-items-center">
                    <a href="<?= url('category.php?cat_id='.$post->cat_id); ?>"> <?= $post->category_name?> </a>
                    <span class="date-time"><?= $post->created_at ?></span>
                </h5>
                <article class="bg-article p-3">                
            <?= $post->body ?>

        </article>
        <div class="text-center">
        <img class="mt-4 img-responsive rounded" style="width: 40rem;" src="<?= asset($post->image); ?>" alt="<?= $post->title ?>"/>
</div>

            </section>
        </section>
    </section>

</section>
<script src="<?= url("assets/js/jquery.min.js") ?>"></script>
<script src="<?= url("assets/js/bootstrap.min.js") ?>"></script>
</body>
</html>