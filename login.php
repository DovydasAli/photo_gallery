<?php include "server.php" ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Login</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>

        <body>

        <div class="container login">
            <?php include("errors.php") ?>
            <h3>Login</h3><br/>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control" id="username" aria-describedby="usernameHelp" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" aria-describedby="pwdHelp" required>
                </div>
                <button type="submit" name="login_user" class="btn btn-primary register-button">Log In</button>
            </form>
            <p>Not registered yet? <a href="registration.php"><strong>Register</strong></a></p>
        </div>

        </body>
    </html>
