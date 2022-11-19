<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['sign'])){
        registerAdmin();
    }
    if(isset($_POST['login'])){
        loginAdmin();
    }
    if(isset($_POST['logout'])){
        logoutAdmin();
    }
    if(isset($_POST['save'])){
        saveProducts();
    };
    if(isset($_POST['update'])){
        updateProducts();
    }
    if(isset($_POST['delete'])){
        deleteProducts();
    }

    function registerAdmin(){
        global $conn;
        //CODE HERE 
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        //Select email from the database to use it for validation
        $sql = "SELECT email FROM admins";
        $result = mysqli_query($conn, $sql);
        $admin = mysqli_fetch_assoc($result);

        //Form validation
        if(empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
            $_SESSION['message1'] = "Please fill all required fields!!";
		    header('location: registration.php');
        }
        elseif($password !== $confirm_password){
            //Check if password and confirm password not the same
            $_SESSION['message1'] = "Password and Confirm password should match!!";
            header('location: registration.php');
        }
        // in_array($email,$admin)
        elseif($email == $admin['email']){
            //Check if password and confirm password not the same
            $_SESSION['message1'] = "Email already exists!!";
            header('location: registration.php');
        }
        else {
            //SQL INSERT
            $sql = "INSERT INTO `admins`(`name`, `email`, `password`) VALUES ('$username','$email','$password')";

            //checking if the Query is successful. 
            if (mysqli_query($conn, $sql)) {
                $_SESSION['message'] = "Registration has been added successfully !";
                header('location: login.php');
            } else {
                echo "ERROR: Could not able to execute $sql. " .mysqli_error($conn);
            }
        }
    }

    function loginAdmin() {
        
        global $conn;
        //CODE HERE 
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Form validation
        if(empty($email) || empty($password)){
            $_SESSION['message1'] = "Please fill all required fields!!";
		    header('location: login.php');
        }
        else{
            
            //SQL SELECT
            $sql = "SELECT * FROM admins WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
                
                $admin = mysqli_fetch_assoc($result);
                if ($admin['email'] === $email && $admin['password'] === $password) {

                    $_SESSION['message'] = "Logged in!";
                    header('location: login.php');
                    
                    //Create session to store 
                    $_SESSION['name'] = $admin['name'];
                    $_SESSION['email'] = $admin['email'];
                    $_SESSION['id'] = $admin['id'];

                    header('location: index.php');
                }
                else{
                    $_SESSION['message1'] = "Incorect password!!";
                    header('location: login.php');
                }
            }
            else{
                $_SESSION['message1'] = "Your email doesn't match with our records!";
                header('location: login.php');
            }
        }
    }

    function logoutAdmin(){
        session_unset();
        session_destroy();

        header("Location: login.php");
    }

    function getProducts(){
        global $conn;
        //CODE HERE
        //SQL SELECT
        $sql = "SELECT products.*,
                categories.name as `category`
                FROM `products`
                INNER JOIN `categories` on products.category_id = categories.id";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            //Output data of each row
            while($row = mysqli_fetch_assoc($result)){
                echo '<div class="col">
                <div class="card btn bg-white mb-3 p-0" href="#modal-product" data-bs-toggle="modal"
                id="'.$row["id"].'" title="'.$row["name"].'" category="'.$row["category_id"].'" quantity="'.$row["quantity"].'"
                price="'.$row["price"].'" description="'.$row["description"].'" picture="'.$row['filename'].'"
                onclick="editTask('.$row["id"].')">
                    <div style="height: 300px; background-position: center; background-size: cover; background-repeat: no-repeat; background-image: url(image/'.$row['filename'].');"></div>
                    <div class="card-body">
                        <h5 class="card-title text-center text-truncate fw-bolder mb-3 ">'.$row["name"].'</h5>
                        <p class="card-text text-start"><span class="fw-bold text-muted">Category: </span>'.$row["category"].'</p>
                        <p class="card-text text-start"><span class="fw-bold text-muted">Quantity: </span>'.$row["quantity"].'</p>
                        <p class="card-text text-start"><span class="fw-bold text-muted">Price: </span>'.$row["price"].' $</p>
                        <p class="card-text text-start text-truncate"><span class="fw-bold text-muted">Description: </span>'.$row["description"].'</p>
                    </div>
                </div>
        </div>';
            }
        }
    }

    function saveProducts(){
        global $conn;
        //CODE HERE
        $title       = $_POST['title'];
        $category    = $_POST['category'];
        $price       = $_POST['price'];
        $quantity    = $_POST['quantity'];
        $description = $_POST['description'];
        $filename    = $_FILES["picture"]["name"];
        $tempname    = $_FILES["picture"]["tmp_name"];
        $folder      = "image/". $filename;

        //Form validation
        if(empty($title) || empty($category) || empty($price) || empty($quantity) || empty($description)) {
            $_SESSION['message2'] = "Please fill the form !";
		    header('location: index.php');
        }
        else {
            //SQL INSERT
            $sql = "INSERT INTO `products`(`name`, `category_id`, `quantity`, `price`, `description`, `filename`) VALUES ('$title','$category','$quantity','$price','$description', '$filename')";

            $result = mysqli_query($conn, $sql);

            //checking if the Query is successful. 
            if ($result) {
                move_uploaded_file($tempname, $folder);
                $_SESSION['message3'] = "Task has been added successfully !";
                header('location: index.php');
            } else {
                echo "ERROR: Could not able to execute $sql. " .mysqli_error($conn);
            }
        }

    }

    function statisqueVente($number){
        global $conn;
        //CODE HERE
        if($number == 1){
            $sql = "SELECT COUNT(name) as total
                    FROM admins";

            $result = mysqli_query($conn, $sql);
            $data   = mysqli_fetch_assoc($result);
            echo $data['total'];
        }

        elseif($number == 2){
            $sql = "SELECT COUNT(id) as product
                    FROM products";

            $result = mysqli_query($conn, $sql);
            $data   = mysqli_fetch_assoc($result);
            echo $data['product'];
        }

        elseif($number == 3){
            $sql = "SELECT sum(quantity) as quantity
                    FROM products";

            $result = mysqli_query($conn, $sql);
            $data   = mysqli_fetch_assoc($result);
            echo $data['quantity'];
        }

        else{
            $sql = "SELECT sum(price) as prices
                    FROM products";

            $result = mysqli_query($conn, $sql);
            $data   = mysqli_fetch_assoc($result);
            echo $data['prices'];
        }
    }

    function updateProducts(){
        global $conn;
        //CODE HERE
        $id          = $_POST['product-id'];
        $title       = $_POST['title'];
        $category    = $_POST['category'];
        $price       = $_POST['price'];
        $quantity    = $_POST['quantity'];
        $description = $_POST['description'];
        $filename    = $_FILES["picture"]["name"];
        $tempname    = $_FILES["picture"]["tmp_name"];
        $folder      = "image/". $filename;

        //Form validation
        if(empty($title) || empty($category) || empty($price) || empty($quantity) || empty($description)) {
            $_SESSION['message2'] = "Please fill the form !";
		    header('location: index.php');
        }
        else {
            //SQL UPDATE
            if (empty($filename)) {
                $sql = "UPDATE `products`
                SET `name`='$title',`category_id`='$category',
                `quantity`='$quantity',`price`='$price',`description`='$description'
                WHERE id = $id";

                $result = mysqli_query($conn, $sql);

                //checking if the Query is successful. 
                if ($result) {
                    // move_uploaded_file($tempname, $folder);
                    $_SESSION['message3'] = "Task has been updated successfully !";
                    header('location: index.php');
                } else {
                    echo "ERROR: Could not able to execute $sql. " .mysqli_error($conn);
                }
            }
            else{
                $sql = "UPDATE `products`
                SET `name`='$title',`category_id`='$category',
                `quantity`='$quantity',`price`='$price',`description`='$description',
                `filename`='$filename'
                WHERE id = $id";

                $result = mysqli_query($conn, $sql);

                //checking if the Query is successful. 
                if ($result) {
                    move_uploaded_file($tempname, $folder);
                    $_SESSION['message3'] = "Task has been updated successfully !";
                    header('location: index.php');
                } else {
                    echo "ERROR: Could not able to execute $sql. " .mysqli_error($conn);
                }
            }
        }
    }

    function deleteProducts(){
        global $conn;
        //CODE HERE
        $id  = $_POST['product-id'];

        //SQL DELETE
        $sql = "DELETE FROM products WHERE id = $id";

        //checking if the Query is successful. 
        if (mysqli_query($conn, $sql)) {
            $_SESSION['message3'] = "Task has been deleted successfully !";
		    header('location: index.php');
        } else {
            $_SESSION['message2'] = "Task has not been deleted !";
		    header('location: index.php');
        }
    }
?>