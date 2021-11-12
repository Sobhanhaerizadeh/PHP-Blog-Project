<?php 
session_start();
require_once("../../functions/helpers.php");
require_once("../../functions/pdo_connection.php");
include("../../functions/check-login.php");

if (!isset($_REQUEST['post_id']) || $_REQUEST['post_id'] === ""){
    redirect("panel/post");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>

    <link rel="stylesheet" href="<?= asset("assets/css/bootstrap.min.css"); ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset("assets/css/style.css"); ?>" media="all" type="text/css">
</head>

<body>
    <section id="app">
        <?php // Top Nav
        require_once "../layouts/top-nav.php";
        ?>


        <section class="container-fluid">
            <section class="row">
                <section class="col-md-2 p-0">
                    <!-- Sidebar -->
                    <?php
                    require_once "../layouts/sidebar.php";
                    ?>
                </section>

                <?php
                global $pdo;

                $query = "SELECT posts.* , categories.name AS 'category_name' FROM `posts` LEFT JOIN `categories` ON posts.cat_id = categories.id WHERE posts.id = ?";
                $statement = $pdo->prepare($query);
                $statement->execute([$_REQUEST['post_id']]);
                $post = $statement->fetch(PDO::FETCH_OBJ);

                if (!$post) { // Check for exist Category ID
                       redirect("panel/post");
                }

                $query = "SELECT * FROM `categories`";
                $statement = $pdo->prepare($query);
                $statement->execute();
                $categories = $statement->fetchAll();

                ?>

                <section class="col-md-10 pt-3">

                    <?php // For show error
                    if (isset($_SESSION['invalidextension']) && $_SESSION['invalidextension'] == 1) {
                        echo "<div class='alert alert-danger' role='alert'> This extension is not valid! <br> valid extensions: png , jpeg , jpg , gif </div>";
                        $_SESSION['invalidextension'] = 0;
                    }
                    ?>

                    <form action="<?= url("panel/post/edit.php?post_id=" . $_GET['post_id']) ?>" method="post" enctype="multipart/form-data">
                        <section class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="title ..." value="<?= $post->title ?> ">
                        </section>
                        <section class="form-group">
                            <label for="image">Image</label> <br>
                            <img style="width:300px;padding:20px;" src="<?php echo asset($post->image) ?>" alt="<?= $post->title ?>">
                            <input type="file" class="form-control" name="image" id="image">
                        </section>
                        <section class="form-group">
                            <label for="cat_id">Category</label>
                            <select class="form-control" name="cat_id" id="cat_id">
                                <?php
                                foreach ($categories as $category) {


                                ?>
                                    <option value="<?= $category->id ?>" <?php
                                                                            if ($post->cat_id == $category->id)
                                                                                echo "SELECTED";
                                                                            ?>>

                                        <?= $category->name ?>

                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </section>
                        <section class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control" name="body" id="body" rows="5" placeholder="body ..."> <?= $post->body ?> </textarea>
                        </section>
                        <section class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </section>
                    </form>

                    <?php

if (
    isset($_POST['submit']) && isset($_POST['title']) &&
    isset($_POST['cat_id']) && isset($_POST['body'])
) {



    $title = $_POST['title'];
    $image = $_FILES['image'];
    $cat_id = $_POST['cat_id'];
    $body = $_POST['body'];


    global $pdo;
    $query = "SELECT * FROM `categories` WHERE `id` = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$cat_id]);
    $checkCategory = $statement->fetch();

    $basePath = dirname(dirname(__DIR__));



    if ($title !== ""  && $cat_id !== "" && $body !== "") {


        if (isset($image) && $image['name'] !== "") { // If user has been uploaded a image
            if (file_exists($basePath . $post->image)) {
                unlink($basePath . $post->image);
            }

            $allowedExtensions = array("png", "jpeg", "jpg", "gif");
            $imageExtension = pathinfo($image['name'], PATHINFO_EXTENSION);

            if (!in_array($imageExtension, $allowedExtensions)) {
                $_SESSION['invalidextension'] = 1;
                redirect("panel/post/edit.php");
            } else {

                $imageUrl = "/assets/images/posts/" . date("Y_m_d_H_i_s") . "." . $imageExtension;
                $image_upload = move_uploaded_file($image['tmp_name'], $basePath . $imageUrl);

                if ($checkCategory !== false && $image_upload !== false) {

                    global $pdo;
                    $query  = " UPDATE `posts` SET `title` =:title , `image` =:image , `cat_id` =:cat_id , `body` =:body , `updated_at` = NOW() WHERE `id` =:id ";
                    $statement = $pdo->prepare($query);
                    $statement->bindParam(":title", $title, PDO::PARAM_STR);
                    $statement->bindParam(":image", $imageUrl, PDO::PARAM_STR);
                    $statement->bindParam(":cat_id", $cat_id, PDO::PARAM_INT);
                    $statement->bindParam(":body", $body, PDO::PARAM_STR);
                    $statement->bindParam(":id", $_GET['post_id'], PDO::PARAM_INT);
                    $statement->execute();
                }
            }
        } else // If the user won't update any image
        {
            if ($checkCategory !== false) {
                global $pdo;
                $query  = " UPDATE `posts` SET `title` =:title , `cat_id` =:cat_id , `body` =:body , `updated_at` = NOW() WHERE `id` =:id ";
                $statement = $pdo->prepare($query);
                $statement->bindParam(":title", $title, PDO::PARAM_STR);
                $statement->bindParam(":cat_id", $cat_id, PDO::PARAM_INT);
                $statement->bindParam(":body", $body, PDO::PARAM_STR);
                $statement->bindParam(":id", $_GET['post_id'], PDO::PARAM_INT);

                $statement->execute();

            }
        }
        redirect("panel/post"); // Redirect Function (Helper Functions)
    }
}
?>
                </section>
            </section>
        </section>

    </section>

    <script src="<?= asset("assets/js/jquery.min.js"); ?>"></script>
    <script src="<?= asset("assets/js/bootstrap.min.js"); ?>"></script>
</body>

</html>
