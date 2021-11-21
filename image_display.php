<?php
    $db = mysqli_connect('localhost', 'root', '', 'photo_gallery') or die("could not connect to database"); // database connection

    $img = mysqli_query($db, "SELECT * FROM photo_gallery.photos WHERE user_id = '". $_SESSION['user_id']['id'] ."'"); // selects all images from database
    while ($row = mysqli_fetch_array($img)) {
        echo "<div class=col-lg-3 col-md-4 col-xs-6 thumb>
                    <img src='" . $row['image'] . "' class=img-thumbnail>
                </div>"; // displays the images form the query on the website
    }

?>