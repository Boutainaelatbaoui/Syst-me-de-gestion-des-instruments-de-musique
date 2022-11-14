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
    if(isset($_POST['delete'])){
        
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
            }else{
                $_SESSION['message1'] = "Your email doesn't match with our records!";
                header('location: login.php');
            }
        }
    }

?>