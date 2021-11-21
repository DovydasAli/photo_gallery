<?php
    $db = mysqli_connect('localhost', 'root', '', 'photo_gallery') or die("could not connect to database"); // database connection

    $img = mysqli_query($db, "SELECT * FROM photo_gallery.photos WHERE user_id = '". $_SESSION['user_id']['id'] ."'"); // selects all images from database
    while ($row = mysqli_fetch_array($img)) {

        echo "<img src='" . $row['image'] . "' height='200' width='200' >"; // displays the images form the query on the website
    }

?>