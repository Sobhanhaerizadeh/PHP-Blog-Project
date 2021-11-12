<?php
session_start();
    require_once("functions/helpers.php");
    require_once("functions/pdo_connection.php");

    if (!isset($_GET['cat_id']) || $_GET['cat_id'] == ""){
        redirect("index.php");
    }

    global $pdo;
    $query = "SELECT * FROM `categories` WHERE `id` = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_REQUEST['cat_id']]);
    $thisCategory = $statement->fetch();

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

    <section class="row">
                <?php
                if (!$thisCategory){
                    ?>
                                    <section class="col-12">
                    <h2 class="alert alert-danger">Category not found</h2>
                </section>
                <?php
                exit();
                }
                ?>
            </section>
                

            <section class="row">
                <?php
                global $pdo;
                $query = "SELECT * FROM `posts` WHERE `status` = 1 AND `cat_id` = ?";
                $statement = $pdo->prepare($query);
                $statement->execute([$_GET['cat_id']]);
                $posts = $statement->fetchAll();
                ?>

                <section class="col-12">
                    <h1> <?= $thisCategory->name ?> </h1>
                    <hr>
                </section>
            </section>

            
            <section>
                        <?php
                            if (!$posts)
                            {
                                echo "<div class='alert alert-danger' style='font-size:20px;'> There aren't any post ... </div>";
                                exit();
                            }
                        ?>
                  
                    </section>
            
            <section class="row">
               <?php
               
               foreach($posts as $post)
               {
                   ?>
                    <section class="col-md-4">
                        <section class="mb-2 overflow-hidden" style="max-height: 15rem;">
                        <img class="img-fluid"  style="height:200px;width:300px;"  src="<?= asset($post->image) ?>" alt="<?= $post->title  ?>">
                    </section>
                        <h2 class="h5 text-truncate"> <?= $post->title ?> </h2>
                        <p> <?= substr($post->body , 0 , 50); ?> </p>
                        <p><a class="btn btn-primary" href="<?= url('detail.php?post_id='.$post->id); ?>" role="button">View details »</a></p>
                    </section>
                  <?php
               }
               ?>
            </section>
       
        </section>
    </section>

</section>
<script src="<?= asset("assets/js/jquery.min.js") ?>"></script>
<script src="<?= asset("assets/js/bootstrap.min.js") ?>"></script>
</body>
</html>