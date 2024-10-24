<?php
require '../system/functions.php';
session_start();

if(isset($_POST['login'])){
    if($adminMenu->adminLogin($_POST) > 0){
        header("Location: index.php");
        exit;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.0/examples/sticky-footer/sticky-footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    nav {
        background: url(../assets/ui/bg_header.jpg);
    }
    </style>
    <title>Klik Indomaret</title>
    <link rel="shortcut icon" href="../assets/ui/Untitled.ico" type="image/x-icon">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-warning shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php"><img src="../assets/ui/logo.webp" style="width: 7rem;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav  me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container-fluid bg-light d-flex align-items-center justify-content-center position-absolute h-100">
        <div class="container shadow p-5 bg-body" style="border-radius: 2rem;">
            <div class="row text-dark">
                <div class="col-sm-12 mx-auto mb-3">
                    <h1 class="h3 fw-bold text-center">Admin Login</h1>
                </div>
                <form action="" method="post" class="">
                    <div class="col-md-9 mx-auto mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" name="adm-name" class="form-control" id="username"
                            aria-describedby="emailHelp" autocomplete="off">
                    </div>
                    <div class="col-md-9 mx-auto mb-5">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="adm-pass" class="form-control" id="password">
                        <?php if(isset($error)):?>
                            <p class="text-danger">Incorrect username or password!</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-9 mx-auto mb-5">
                        <p>Not an administrator? Return to <a href="../">user homepage.</a></p>
                    </div>
                    <div class="col-md-9 mx-auto">
                        <button type="submit" name="login" class="form-control btn btn-primary btn-block">Log
                            In</button>

                </form>
            </div>
        </div>
    </main>
    <footer class="footer shadow-sm bg-warning text-light text-center p-3">
        <div class="container">
            <h1 class="h3">Admin Access Only</h1>
        </div>
    </footer>
</body>

</html>