<?php
session_start();
require_once("../../functions/helpers.php");
require_once("../../functions/pdo_connection.php");
include("../../functions/check-login.php");

if (isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] !== "") {

    global $pdo;
    $query = "SELECT * FROM `categories` WHERE `id` = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['cat_id']]);
    $category = $statement->fetch();
    
    if (!$category){
        redirect("panel/category");
    }

    if (isset($_POST['submit']) && isset($_POST['name']) && $_POST['name'] !== "" && is_numeric($_POST['name']) == false ) {
        global $pdo;
        $query = "UPDATE `categories` SET `name` = :name , `updated_at` = NOW()  WHERE `id`= :catid ";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
        $statement->bindParam(":catid", $_REQUEST['cat_id'], PDO::PARAM_INT);
        $statement->execute();
        redirect("panel/category");
    }
} else {
    redirect("panel/category");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" media="all" type="text/css">
    <link rel="stylesheet" href="../../assets/css/style.css" media="all" type="text/css">
</head>

<body>
    <section id="app">
        <!-- Top Nav -->

        <?php
        require_once("../layouts/top-nav.php");
        ?>
        <section class="container-fluid">
            <section class="row">
                <section class="col-md-2 p-0">
                    <!-- Sidebar -->

                    <?php
                    require_once("../layouts/sidebar.php");
                    ?>
                </section>
                <section class="col-md-10 pt-3">

                    <form action="<?= url("panel/category/edit.php?cat_id=".$_GET['cat_id']) ?>" method="post">
                        <section class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" value="<?= $category->name ?>">
                            <!-- <p class="form-text text-dark ">Created At: <?= $category->created_at ?></p> -->
                        </section>
                        <section class="form-group">
                            <label>Created At</label>
                            <input type="text" class="form-control" value="<?= $category->created_at ?>" disabled />
                        </section>

                        <section class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control" value="<?= $category->updated_at ?>" disabled />
                        </section>
                        <section class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
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