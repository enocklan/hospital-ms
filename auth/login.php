<?php
session_start();

// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "tibika";

// Create connection
$con = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// User login logic
if (isset($_POST['loginbtn'])) {
    // Get user input
    $role = $_POST["role"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Your authentication logic goes here
    if ($role === "doctor" || $role === "patient") {
        $table_name = ($role === "doctor") ? "doctor" : "patient";
        $access_query = "SELECT * FROM $table_name WHERE email='$email'";
        $access_query_run = mysqli_query($con, $access_query);

        if (mysqli_num_rows($access_query_run) > 0) {
            $row = mysqli_fetch_assoc($access_query_run);

            // Verify password
            $hashed_password_from_db = $row['Password'];

            if (password_verify($password, $hashed_password_from_db)) {
                // Passwords match, user is authenticated
                $_SESSION['patient_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['logged_in'] = true;
                $_SESSION['status'] = "success";
                $_SESSION['message'] = 'You logged in successfully';
                
                // Redirect user based on role
                if ($role === "doctor") {
                    $_SESSION['doctor_id'] = $row['id'];
                    header("Location: ../admin/index.php");
                } else {
                    header("Location: ../patient/index.php");
                }
                exit();
            } else {
                // Passwords don't match, show error message
                $_SESSION['status'] = "error";
                $_SESSION['message'] = 'Invalid Credentials';
                header('Location: ./index.php');
                exit();
            }
        } else {
            // User not found, show error message
            $_SESSION['status'] = "error";
            $_SESSION['message'] = 'Invalid Credentials';
            header('Location: ./index.php');
            exit();
        }
    }
}
?>
