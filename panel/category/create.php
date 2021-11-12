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
    <section id="app"> <!-- Top Nav -->
    <?php
        require_once("../layouts/top-nav.php");
    ?>
        <section class="container-fluid">
            <section class="row">
                <section class="col-md-2 p-0"> <!-- Sidebar -->

                
            <?php
             require_once("../layouts/sidebar.php");
              ?>


                </section>
                <section class="col-md-10 pt-3">

                    <form action="<?= url('panel/category/create.php') ?>" method="post">
                        <section class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
                        </section>
                        <section class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit">Create</button>
                        </section>

                    </form>

                </section>
            </section>
        </section>

    </section>

<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>

<?php


    if (isset($_POST['submit'])){
        if (isset($_POST['name']) && $_POST['name'] !== ''){
            $name = $_POST['name'];
            $query = "INSERT INTO blog_project.categories (`name` , `created_at`) VALUES (:name , NOW() ) ";
            $statement = $pdo->prepare($query);
            $statement->bindParam(":name" , $name , PDO::PARAM_STR);
            $statement->execute();
            redirect("panel/category");
        }
    }

?>