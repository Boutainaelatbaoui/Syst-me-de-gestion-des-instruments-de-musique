<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!-- ================== END core-css ================== -->
</head>
<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card mb-3 m-auto">
                        <div class="row g-0">
                            <div class="col-md d-none d-lg-block">
                                <img src="assets/img/music-store.jpg" class="img-fluid rounded-start" alt="Music store">
                            </div>
                            <div class="col-md">
                                <div class="card-body">
                                <form>
                                    <div class="d-flex justify-content-center align-items-center mt-5 h-100">
                                        <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                                    </div>
                                    <h4 class="mt-4 mb-3 fw-normal text-white text-center">Please login to your account</h4>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="d-grid d-block mb-3">
                                        <button type="submit" class="btn btn-danger btn-lg">Login</button>
                                    </div>
                                    <a class="text-light text-decoration-none" href="#!">Forgot password?</a>
                                    <p class="mb-3 text-light">Don't have an account? <button class="btn btn-outline-danger btn-sm"><a href="#!" class="text-decoration-none text-white">Register here</a></button></p>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>