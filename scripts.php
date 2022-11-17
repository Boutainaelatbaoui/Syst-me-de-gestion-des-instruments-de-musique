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

    }

    function saveProducts(){
        global $conn;
        //CODE HERE
        $title       = $_POST['name'];
        $category    = $_POST['category'];
        $price       = $_POST['price'];
        $quantity    = $_POST['quantity'];
        $description = $_POST['description'];

        //Form validation
        if(empty($title) || empty($category) || empty($price) || empty($quantity) || empty($description)) {
            $_SESSION['message1'] = "Please fill the form !";
		    header('location: index.php');
        }
        else {
            //SQL INSERT
            $sql = "INSERT INTO `products`(`name`, `category_id`, `quantity`, `price`, `filename`, `description`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')";

            //checking if the Query is successful. 
            if (mysqli_query($conn, $sql)) {
                $_SESSION['message'] = "Task has been added successfully !";
                header('location: index.php');
            } else {
                echo "ERROR: Could not able to execute $sql. " .mysqli_error($conn);
            }
        }

    }

    function updateProducts(){

    }

    function deleteProducts(){

    }
?>