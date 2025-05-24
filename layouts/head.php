<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Web</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- own css -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container"> 
            <a class="navbar-brand" href="#">Personal Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto fs-5">
                    <a class="nav-item nav-link active" href="http://localhost/personalweb">Home
                        <span class="visually-hidden">(current)</span></a>
                    <a class="nav-item nav-link" href="http://localhost/personalweb/pages/biography.php">Biography</a>
                    <a class="nav-item nav-link" href="http://localhost/personalweb/pages/portfolio.php">Portfolio</a>
                    <a class="nav-item nav-link" href="http://localhost/personalweb/pages/contact.php">Contact</a>
                    <a class="nav-item nav-link" href="http://localhost/personalweb/pages/userM.php">User Management</a>
                    <?php
                    session_start();
                    if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){
                    echo '<a class="nav-item nav-link" ↪ href="../pages/login.php">Login</a>';
                    } else{
                    echo '<a class="nav-item nav-link" ↪
                        href="../pages/logout.php">Logout</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->