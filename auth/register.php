<?php
    require_once("../functions/helpers.php");
    require_once("../functions/pdo_connection.php");
    $error = "";

    if(isset($_POST['submit'])){
        if (isset($_POST['email']) && isset($_POST['first_name']) && 
        isset($_POST['last_name']) && isset($_POST['password']) && isset($_POST['confirm'])){
    
            $email = $_POST['email'];
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['confirm'];
            
            if ($email !== "" && $firstName !== "" && $lastName !== "" && $password !== "" && $passwordConfirm !== "")
            {
                
                if ($password === $passwordConfirm)
                {
    
                    if (strlen($password) > 5)
                    {
                        global $pdo;
                    $query = "SELECT * FROM `users` WHERE `email` = ?";
                    $statement = $pdo->prepare($query);
                    $statement->execute([$email]);
                    $checkEmail = $statement->fetch();
                    
                    if ($checkEmail == false){
    
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                        $query = "INSERT INTO `users` SET `email` =:email , `first_name` =:first_name , `last_name` =:last_name , `password` =:password , `created_at` = NOW() ";
                        $statement = $pdo->prepare($query);
                        $statement->bindParam(":email" , $email , PDO::PARAM_STR);
                        $statement->bindParam(":first_name" , $firstName , PDO::PARAM_STR);
                        $statement->bindParam(":last_name" , $lastName , PDO::PARAM_STR);
                        $statement->bindParam(":password" , $passwordHash , PDO::PARAM_STR);
                        $statement->execute();
                        redirect("auth/login.php");
                    }
    
                    else{
                        $error = "The email has been submited!";
                    }
    
                    }
    
                    else{
                        $error = "The password must be more than 6 characters";
                    }
    
                    
                }
                else{
                    $error = "The password is not the same as password confirm!";
                }
    
            }
    
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
    <link rel="stylesheet" href="<?=  asset("assets/css/style.css"); ?>" media="all" type="text/css">
</head>

<body>
    <section id="app">
    <?php require_once "../layouts/top-nav.php"?>

        <section style="height: 100vh; background-color: #138496;" class="d-flex justify-content-center align-items-center">
            <section style="width: 20rem;">
                <h1 class="bg-warning rounded-top px-2 mb-0 py-3 h5">PHP Tutorial login</h1>
                <section class="bg-light my-0 px-2"
                ><small class="text-danger">

                <?php
                    
                    if ($error !== "")
                        echo $error;
                    
                ?>
            
                </small>
            </section>
                <form class="pt-3 pb-1 px-2 bg-light rounded-bottom" action="<?= url('auth/register.php') ?>" method="post">
                    <section class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email ...">
                    </section>
                    <section class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first_name ...">
                    </section>
                    <section class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last_name ...">
                    </section>
                    <section class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password ...">
                    </section>
                    <section class="form-group">
                        <label for="confirm">Confirm</label>
                        <input type="password" class="form-control" name="confirm" id="confirm" placeholder="confirm ...">
                    </section>
                    <section class="mt-4 mb-2 d-flex justify-content-between">
                        <input type="submit" name="submit" class="btn btn-success btn-sm" value="register">
                        <a class="" href="<?= url('auth/login.php') ?>">login</a>
                    </section>
                </form>
            </section>
        </section>

    </section>
    <script src="<?= asset("assets/js/jquery.min.js"); ?>"></script>
<script src="<?= asset("assets/js/bootstrap.min.js"); ?>"></script>
</body>

</html>