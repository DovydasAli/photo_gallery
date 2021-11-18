<?php include "server.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>

    <div class="container register">
        <?php include("errors.php") ?>
        <h3>Registration</h3><br/>
        <form action="registration.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" id="username" aria-describedby="usernameHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password_1" type="password" class="form-control" id="password_1" aria-describedby="pwdHelp" required>
            </div>
            <div class="form-group">
                <label for="password2">Repeat password</label>
                <input name="password_2" type="password" class="form-control" id="password_2" aria-describedby="pwd2Help" required>
            </div>
            <button type="submit" name="reg_user" class="btn btn-primary register-button">Register</button>
        </form>
        <p>If you already have an account, <a href="login.php"><strong>Log in</strong></a></p>
    </div>

    </body>
</html>
