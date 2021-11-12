<?php
session_start();
    require_once("../../functions/helpers.php");
    require_once("../../functions/pdo_connection.php");
    include("../../functions/check-login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="<?= asset("assets/css/bootstrap.min.css"); ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?=  asset("assets/css/style.css"); ?>" media="all" type="text/css">
</head>
<body>
<section id="app">
<?php // Top Nav
        require_once "../layouts/top-nav.php";
    ?>

    <section class="container-fluid">
        <section class="row">
        <section class="col-md-2 p-0"> <!-- Sidebar -->
            <?php
                require_once "../layouts/sidebar.php"; 
            ?>
            </section>
            <section class="col-md-10 pt-3">

                <section class="mb-2  justify-content-between align-items-center">
                    <h2 class="h4">Articles</h2>
                    <a href="create.php" class="btn btn-sm btn-success">Create</a>
                    <a href="change-status.php?changeall" class="btn btn-sm btn-warning">Change status</a>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>title</th>
                            <th>category name</th>
                            <th>body</th>
                            <th>status</th>
                            <th>setting</th>
                        </tr>
                        </thead>
                        <tbody>

    <?php
            global $pdo;
            $query = "SELECT posts.* , categories.name AS 'category_name' FROM `posts` LEFT JOIN `categories` ON posts.cat_id = categories.id";
            $statement = $pdo->prepare($query);
            $statement->execute();
            $posts = $statement->fetchAll();
            foreach ($posts as $post)
            {
                   
    ?>

                            <tr>
                                <td><?= $post->id ?></td>
                                <td>
                                    <?php
                                    if (isset($post->image) && $post->image !== ""){
                                        ?>
                                        
                                        <img style="width: 90px;" src="<?= asset($post->image) ?>">
                                        <?php
                                    }

                                    else{
                                        echo "null";
                                    }
                                    ?>
                                
                                </td>
                                <td><?= $post->title ?></td>
                                <td><?= $post->category_name ?></td>
                                <td><?= substr($post->body , 0 , 40) . " ..." ?></td>
                                <td>
                                    <?php
                                            if ($post->status == 1){
                                                ?>
                                                <span class="text-success">enable</span> 
                                        <?php    }
                                        else{
                                            ?>
                                    <span class="text-danger">disable</span>
                                            <?php
                                        }
                                    ?>
                                    
                                
                                </td>
                                <td>
                                    <a href="<?= url("panel/post/change-status.php?post_id=$post->id") ?>" class="btn btn-warning btn-sm">Change status</a>
                                    <a href="<?= url("panel/post/edit.php?post_id=$post->id") ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?= url("panel/post/delete.php?post_id=$post->id") ?>" onclick=" return confirm('Are you sure to delete this post? | <?= $post->title . '=>' . $post->id ?> ')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>

                            <?php
            }
            ?>

                        </tbody>
                    </table>
                </section>


            </section>
        </section>
    </section>





</section>

<script src="<?= asset("assets/js/jquery.min.js"); ?>"></script>
<script src="<?= asset("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>