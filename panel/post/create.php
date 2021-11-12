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
                    <?php

if (isset($_SESSION['invalidextension']) && $_SESSION['invalidextension'] == 1){
    echo "<div class='alert alert-danger' role='alert'> This extension is not valid! <br> valid extensions: png , jpeg , jpg , gif </div>";
    $_SESSION['invalidextension'] = 0;
}
                    ?>
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title ...">
                    </section>
                    <section class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </section>
                    <section class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" name="cat_id" id="cat_id">
                           <?php
                                    global $pdo;
                                    $query = "SELECT * FROM `categories` WHERE `id` > 0";
                                    $statement = $pdo->prepare($query);
                                    $statement->execute();
                                    $categories = $statement->fetchAll();

                                    foreach($categories as $category)
                                    {

                                    
                           ?>


                            <option value="<?= $category->id  ?>">
                                        <?= $category->name?>
                            </option>

                            <?php
                                    }
                                    ?>

                        </select>
                    </section>
                    <section class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="5" placeholder="body ..."></textarea>
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Create</button>
                    </section>
                </form>


                <?php

if (isset($_POST['submit']) && isset($_POST['title']) && isset($_FILES['image']) &&
 isset($_POST['cat_id']) && isset($_POST['body']))
{


    
    $title = $_POST['title'];
    $image = $_FILES['image'];
    $cat_id = $_POST['cat_id'];
    $body = $_POST['body'];


    global $pdo;
    $query = "SELECT * FROM `categories` WHERE `id` = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$cat_id]);
    $checkCategory = $statement->fetch();
    
    if ($title !== "" && $image['name'] != ""  && $cat_id !== "" && $body !== ""){

        $allowedExtensions = array("png" , "jpeg" , "jpg" , "gif");
        $imageExtension = pathinfo($image['name'] , PATHINFO_EXTENSION);

        if (!in_array($imageExtension , $allowedExtensions))
        {
            $_SESSION['invalidextension'] = 1;
            redirect("panel/post/create.php");
        }

        else{
            $basePath = dirname(dirname(__DIR__));
            $imageUrl = "/assets/images/posts/" . date("Y_m_d_H_i_s") . "." . $imageExtension;
            $image_upload = move_uploaded_file($image['tmp_name'] , $basePath.$imageUrl);

            if ($checkCategory !== false && $image_upload !== false)
            {

                global $pdo;
                $query  = "INSERT INTO `posts` (`title` , `image` , `cat_id` , `body` , `created_at`) VALUES (:title , :image , :cat_id , :body , NOW() )";
                $statement = $pdo->prepare($query);
                $statement->bindParam(":title" , $title , PDO::PARAM_STR);
                $statement->bindParam(":image" , $imageUrl , PDO::PARAM_STR);
                $statement->bindParam(":cat_id" , $cat_id , PDO::PARAM_INT);
                $statement->bindParam(":body" , $body , PDO::PARAM_STR);
                
                $statement->execute();
                redirect("panel/post"); // Redirect Function (Helper Functions)
            }

        }


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