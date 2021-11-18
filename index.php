<?php include("login_required.php") ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Photo gallery</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Gallery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Nature</a>
                        <a class="dropdown-item" href="#">Architecture</a>
                        <a class="dropdown-item" href="#">City</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login_required.php?logout='1'">Emergency Logout</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <?php if(isset($_SESSION['username'])) : ?>
        <h2>Welcome, <strong><?php echo $_SESSION['username']; ?></strong></h2>
        <button><a href="index.php?logout='1'">Logout</a></button>
            <section class="my-4">
                <h2 class="text-center">Add an image to the gallery</h2>

                <div class="w-50 m-auto">
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Enter Photo Name:</label>
                            <input type="text" name="img_name" placeholder="Name" class="form-control" Required>
                        </div>
                        <div class="form-group">
                            <label>Select Image</label>
                            <input type="file" name="image" Required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="upload" value="Upload">
                        </div>
                    </form>
                </div>
            </section>
        <?php include("image_display.php") ?>

    <?php endif ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
