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
if (isset($_POST['patient_create'])) {
    // Fetch data from the form
    $Passport = $_FILES['Passport']['name'];
    $path1 = "../patientpassport/";
    $Passport_ext = pathinfo($Passport, PATHINFO_EXTENSION);
    $Passport_filename = time() . '.' . $Passport_ext;

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $Gender = $_POST['Gender'];
    $date = $_POST['date'];
    $password = $_POST['password'];

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO patient (image,first_name,last_name,email,phone_number,gender,DOB,Password)
            VALUES ('$Passport_filename', '$first_name', '$last_name', '$email', '$phoneNumber','$Gender','$date','$hashed_password')";

    if (mysqli_query($con, $sql)) {
        move_uploaded_file($_FILES['Passport']['tmp_name'], $path1 . '/' . $Passport_filename);
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Patient registered successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($con);
        header("Location: ./create.php");
        exit();
    }
}
elseif (isset($_POST['doctor_create'])) {
    // Fetch data from the form
    $Passport = $_FILES['Passport']['name'];
    $path1 = "../patientpassport/";
    $Passport_ext = pathinfo($Passport, PATHINFO_EXTENSION);
    $Passport_filename = time() . '.' . $Passport_ext;

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $Gender = $_POST['Gender'];
    $password = $_POST['password'];

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO doctor (image,first_name,last_name,email,phone_number,gender,Password)
            VALUES ('$Passport_filename', '$first_name', '$last_name', '$email', '$phoneNumber','$Gender','$hashed_password')";

    if (mysqli_query($con, $sql)) {
        move_uploaded_file($_FILES['Passport']['tmp_name'], $path1 . '/' . $Passport_filename);
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Doctor registered successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "server error";
        header("Location: ./doctor.php");
        exit();
    }
}

?>
