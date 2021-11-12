<?php
session_start();
require_once("../functions/helpers.php");
require_once("../functions/pdo_connection.php");


if (isset($_SESSION['user']))
{
    unset($_SESSION['user']);
}

$error = "";

if (isset($_POST['submitLogin']) && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email !== "" && $password !== "") {
        global $pdo;
        $query = "SELECT * FROM `users` WHERE `email` =:email";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email" , $email , PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_OBJ);

        if ($user == true){

            if (password_verify($password , $user->password))
            {
                    $_SESSION['user'] = $user->email;
                    redirect("panel");
            }

            else{
                $error = "The email or password is incorrect!";
            }

        }

        else{
            $error = "The email or password is incorrect!";
        }

    }
    else{
        $error = "The fields cannot be null!";
    }

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP tutorial</title>
    <link rel="stylesheet" href="<?= asset("assets/css/bootstrap.min.css"); ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset("assets/css/style.css"); ?>" media="all" type="text/css">
</head>

<body>
    <section id="app">
        <?php require_once "../layouts/top-nav.php" ?>

        <section style="height: 100vh; background-color: #138496;" class="d-flex justify-content-center align-items-center">
            <section style="width: 20rem;">
                <h1 class="bg-warning rounded-top px-2 mb-0 py-3 h5">PHP Tutorial login</h1>
                <section class="bg-light my-0 px-2">
                    
                <small class="text-danger">
                    <?php
                        if ($error !== "")
                        echo $error;
                    ?>
                </small>
            
            </section>
                <form class="pt-3 pb-1 px-2 bg-light rounded-bottom" action="" method="post">
                    <section class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email ...">
                    </section>
                    <section class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password ...">
                    </section>
                    <section class="mt-4 mb-2 d-flex justify-content-between">
                        <input type="submit" name="submitLogin" class="btn btn-success btn-sm" value="login">
                        <a class="" href="<?= url('auth/register.php') ?>">register</a>
                    </section>
                </form>
            </section>
        </section>

    </section>
    <script src="<?= asset("assets/js/jquery.min.js"); ?>"></script>
    <script src="<?= asset("assets/js/bootstrap.min.js"); ?>"></script>
</body>

</html>