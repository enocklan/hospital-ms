<?php

session_start();


$host = "localhost";
$username = "root";
$password = "";
$database = "tibika";

$con = mysqli_connect ($host, $username, $password, $database);

if (!$con) {
    die("connection failed:".mysqli_connect_error());
}


// Check if form is submitted
if(isset($_POST['book_appointent'])){
    $full_name = $_POST["fullname"];
    $phone = $_POST["phone_number"];
    $email = $_POST["email"];
    $patient_id = $_SESSION['patient_id'];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $posted_date = date("Y-m-d H:i:s"); // Format: Year-Month-Day Hour:Minute:Second

    

    $sql = "INSERT INTO appointment (fullname, phone, email,patient_id, date,time, posted_date)
            VALUES ('$full_name', '$phone', '$email','$patient_id', '$date', '$time', '$posted_date')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "You Have Booked An Appointment successfully!";
        header("Location: ../patient/index.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Server Down";
        header("Location: ./index.php");
        exit();
    }
} 
?>