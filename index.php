<?php
    include('scripts.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Rock Shop</title>

    <!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    
    
	<!-- ================== END core-css ================== -->
</head>
<body class="dash-body">
    <!-- BEGIN navbar -->
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <!-- offcanvas trigger -->
            <button class="navbar-toggler btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            <!-- offcanvas trigger -->
            <a class="navbar-brand" href="#">
                <img src="assets/img/logo.png" alt="Bootstrap" width="180" height="40">
                </a>
                <button class="navbar-toggler btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse mt-3 mt-lg-1" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex ms-auto">
                    <li class="nav-item">
                        <form class="d-flex ms-auto" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-danger text-white" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                                    </div>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white fw-bold ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle fs-5 fw-bolder me-1"></i>
                                <?php echo $_SESSION['name']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="#">Inbox</a></li>
                                <li><a class="dropdown-item" href="#">Calender</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <form action="scripts.php" method="POST">
                                    <li><button class="dropdown-item" type="submit" name="logout">Log Out</button></li>
                                </form>
                            </ul>
                        </li>
                
                </ul>
            </div>
        </div>
    </nav>
    <!-- END navbar -->
    <!-- BEGIN Offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-bod p-0">
            <nav class="navbar-dark mt-3 px-4">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted fw-bold">CORE</div>
                    </li>
                    <li>
                        <a href="#" class="nav-link active mt-2">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="my-3">
                        <hr class="deopdown-divider" />
                    </li>
                    <li>
                        <div class="text-muted fw-bold">INTERFACE</div>
                    </li>
                    <li>
                    <a class="nav-link sidebar-link mt-2" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-2 text-white"><i class="bi bi-columns"></i></span>
                        <span class="text-white">Layouts</span>
                        <span class="ms-1"><i class="bi bi-chevron-compact-down"></i></span>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <a href="#" class="nav-link active">
                                <span><i class="bi bi-speedometer2"></i></span>
                                <span>Dashboard</span>
                            </a>
                        </div>
                    </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link active">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>Pages</span>
                        </a>
                    </li>
                    <li class="my-3">
                        <hr class="deopdown-divider" />
                    </li>
                    <li>
                        <div class="text-muted fw-bold">ADDONS</div>
                    </li>
                    <li>
                        <a href="#" class="nav-link active mt-2">
                            <span class="me-2"><i class="bi bi-graph-up"></i></span>
                            <span>Charts</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link active mt-2">
                            <span class="me-2"><i class="bi bi-table"></i></span>
                            <span>Tables</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- END Offcanvas -->
    
    <main class="mt-5 pt-5">
        <div class="card text-center bx-shadow" id="card1">
            <div class="card-style"></div>
            <div class="card-body box-card">
                <span class="card-title"><img src="assets/img/logo.png" alt="Bootstrap" class="image-logo" width="150" height="40"></span>
                <p class="card-text fs-5 mt-2">Welcome to <span class="fw-bolder">Rock shop!</span> Are you looking for new music equipment? Here in our online shop, you'll find both inexpensive instruments for beginners
                    and top-class professional equipment. We also offer a wide range of services - both online and in our store.</p>
                <a href="#modal-product" data-bs-toggle="modal" class="btn btn-dark" onclick="addProduct()">Add Product</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-5">
                <div class="card card-statis bg-black text-white">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 mt-5">
                <div class="card card-statis bg-black text-white">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 mt-5">
                <div class="card card-statis bg-black text-white">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 mt-5">
                <div class="card card-statis bg-black text-white">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-5">
        <div class="col">
                <div class="card bg-white mb-3">
                    <img src="assets/img/drump.jpg" class="card-img-top" height="300" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-white mb-3">
                    <img src="assets/img/drump.jpg" class="card-img-top" height="300" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-white mb-3">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-white mb-3">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            </div>
    </main>
    <!-- TASK MODAL -->
	<div class="modal fade" id="modal-product">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="scripts.php" method="POST" id="form-task">
					<div class="modal-header">
						<h5 class="modal-title">Add new instrument</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
							<!-- This Input Allows Storing Task Index  -->
							<input  type="hidden" name="product-id" id="product-id">
							<div class="mb-3">
								<label class="form-label">Name</label>
								<input type="text" class="form-control" name="title" id="product-title"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Category</label>
								<input type="text" class="form-control" name="category" id="product-category">
							</div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-label">Price</label>
                                    <input type="number" class="form-control" name="price" min="1" id="product-price"/>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" min="1" id="product-quantity"/>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Picture</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<textarea class="form-control" rows="8" name="description" id="product-description"></textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" name="delete" class="btn btn-danger product-action-btn" id="product-delete-btn">Delete</a>
						<button type="submit" name="update" class="btn btn-warning product-action-btn" id="product-update-btn">Update</a>
						<button type="submit" name="save" class="btn btn-primary product-action-btn" id="product-save-btn">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <!-- ================== BEGIN core-js ================== -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="main.js"></script>
	<!-- ================== END core-js ================== -->
</body>
</html>