<?php

    session_start();

    //Initialising variables
    $username = "";
    $email = "";

    $errors = array();

    $db = mysqli_connect('localhost', 'root', '', 'photo_gallery') or die("could not connect to database");

    //Register user
    if(isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($db, $_POST["username"] ?? '');
        $email = mysqli_real_escape_string($db, $_POST["email"] ?? '');
        $password_1 = mysqli_real_escape_string($db, $_POST["password_1"] ?? '');
        $password_2 = mysqli_real_escape_string($db, $_POST["password_2"] ?? '');

        //Form validation

        if (empty($username)) array_push($errors, "Username is required");
        if (empty($email)) array_push($errors, "Email is required");
        if (empty($password_1)) array_push($errors, "Password is required");
        if ($password_1 != $password_2) array_push($errors, "Passwords do not match");

        // check db for existing user with the same username

        $user_check_query = "SELECT * FROM photo_gallery.user WHERE username = '$username' or email = '$email'  LIMIT 1";

        $results = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($results);

        if ($user) {
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($user['email'] === $email) {
                array_push($errors, "Email has already been registered to a different username");
            }
        }

        //Register the user if no errors

        if (count($errors) == 0) {
            $password = password_hash($password_1, PASSWORD_DEFAULT); //encrypts password
            $query = "INSERT INTO photo_gallery.user (username, email, password) VALUES ('$username', '$email', '$password')";

            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are logged in";

            header("location:index.php");
        }
    }

    //Login user

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ // checks if user is already logged in
        header("location:index.php");
        exit;
    }

    if(isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']); // gets username from login
        $password = mysqli_real_escape_string($db, $_POST['password']); // gets password from login

        $user_id_query = "SELECT id FROM photo_gallery.user WHERE username = '". $_POST['username']."'"; // query to get id where username is same as login
        $result = mysqli_query($db, $user_id_query);
        $user_id = mysqli_fetch_assoc($result); // gets user id

        if(empty($username)) {
            array_push($errors, "Username is required");
        }

        if(empty($password)) {
            array_push($errors, "Password is required");
        }

        if(count($errors) == 0) {
            $password_hash_query = "SELECT password FROM photo_gallery.user WHERE username = '". $_POST['username']."'";
            $result = mysqli_query($db, $password_hash_query);
            $password_hash = mysqli_fetch_assoc($result);
            if (password_verify($password, $password_hash['password'])) {
                if(!isset($_SESSION))
                {
                    session_start();
                }
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['success'] = "Logged in successfully";
                echo "<script type='text/javascript'> document.location = 'index.php'; </script>"; // javascript solution for not redirecting with header
            }else{
                array_push($errors, "Wrong username or password combination. Please try again");
            }
        }
    }
?>