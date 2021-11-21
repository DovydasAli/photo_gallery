<?php

    session_start();

    error_reporting(0);

    $db = mysqli_connect('localhost', 'root', '', 'photo_gallery') or die("could not connect to database"); // database connection

    if($db) {
        echo "Connection successful";
    }
    else {
        echo "Connection failed";
    }

    if (isset($_POST['upload'])) {
        $var1 = rand(1111, 9999);  // generate random number in $var1 variable
        $var2 = rand(1111, 9999);  // generate random number in $var2 variable

        $var3 = $var1 . $var2;  // concatenate $var1 and $var2 in $var3
        $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

        $nm = $_FILES["image"]["name"];    // get the image name in $fnm variable
        $dst = "images/" . $var3 . $nm;  // storing image path into the {images} folder with 32 characters hex number and file name
        $dst_db = "images/" . $var3 . $nm; // storing image path into the database with 32 characters hex number and file name

        $img_name = $_POST['img_name']; // sets image name
        $img_user_id = $_SESSION['user_id']['id']; // sets the images' user_id to the user that is uploading it


        move_uploaded_file($_FILES["image"]["tmp_name"], $dst);  // move image into the {images} folder with 32 characters hex number and image name
        $sql =  "INSERT INTO photos(name, image, user_id) VALUES('$img_name', '$dst_db', '$img_user_id')"; // insert image into database

        mysqli_query($db, $sql); // executing insert query

//        testing for errors

//        echo "<strong>'$img_user_id'</strong>";

//        echo mysqli_error($db); // testing for error when inserting image to database

//        $query = mysqli_query($db, $sql);

//        if ($query) {
//            echo '<script type="text/javascript"> alert("Image Inserted Successfully!"); </script>';  // alert message
//        } else {
//            echo '<script type="text/javascript"> alert("Error Uploading Image!"); </script>';  // when error occur
//        }
    }

    mysqli_close($db);  // close connection
    header('location:index.php');

?>