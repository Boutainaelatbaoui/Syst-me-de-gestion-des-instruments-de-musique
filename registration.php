<?php
    include('scripts.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>

    <!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<!-- ================== END core-css ================== -->
    <!-- BEGIN parsley css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css">
    <!-- END parsley css-->
    <!-- BEGIN jquery js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- END jquery js-->
    <!-- BEGIN parsley js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- END parsley js-->
</head>
<body>
    <section class="h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-form mb-3 m-auto">
                        <div class="row">
                            <div class="col-md">
                                <div class="card-body">
                                <form action="scripts.php" method="POST" id="form-task" data-parsley-validate>
                                    <div class="d-flex justify-content-center align-items-center mt-3 mb-4">
                                        <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                                    </div>
                                    <?php if (isset($_SESSION['message'])): ?>
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong>
                                            <?php 
                                                echo $_SESSION['message']; 
                                                unset($_SESSION['message']);
                                            ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php elseif (isset($_SESSION['message1'])): ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>warning!</strong>
                                            <?php 
                                                echo $_SESSION['message1']; 
                                                unset($_SESSION['message1']);
                                            ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif ?>
                                    <div class="mb-3">
                                        <label for="user-name" class="form-label text-white">Admin name</label>
                                        <input type="text" name="username" class="form-control" id="user-name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-white">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label text-white">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="confirm-password" class="form-label text-white">Repeat your password</label>
                                        <input type="password" name="confirm-password" class="form-control" id="confirm-password" required>
                                    </div>
                                    <div class="d-grid d-block mb-4">
                                        <button type="submit" name="sign" class="btn btn-danger">Sign up</button>
                                    </div>
                                </form>
                                <p class="mb-3 text-light text-center">Have already an account? <button class="btn btn-outline-danger btn-sm">
                                        <a href="login.php" class="text-decoration-none text-white text-center">Login</a></button></p>
                                </div>
                            </div>
                            <div class="col-sm d-none d-md-block">
                                <img src="assets/img/music-store1.jpg" class="img-fluid rounded-end" id="img" alt="Music store">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="main.js"></script>
</body>
</html>