<?php

session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "tibika";


$con = mysqli_connect($host ,$username,$password , $database );

if (!$con) {
     die("connection failed:".mysqli_connect_error());
}

// Check if form is submitted
if(isset($_POST['post_conserns'])){
    $worry_level = $_POST["level"];
    $symptoms = $_POST["symptoms"];
    $health_concerns = $_POST["healthConcerns"];
    $patient_id = $_SESSION['patient_id'];
    $status = "Not Answered";
    $Date = date("Y-m-d H:i:s"); // Format: Year-Month-Day Hour:Minute:Second

    

    $sql = "INSERT INTO questions (worry_amount, symptoms, consern, patient,status, posted_date)
            VALUES ('$worry_level', '$symptoms', '$health_concerns', '$patient_id', '$status', '$Date')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Consern Submitted successfully!";
        header("Location: ../patient/index.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Server Down";
        header("Location: ./index.php");
        exit();
    }
    // if (mysqli_query($con, $sql) && sendMail($_POST['email'],$v_code)) {
    //     $_SESSION['status'] = "success";
    //     $_SESSION['message'] = "Patient registered successfully!";
    //     header("Location: index.php");
    //     exit();
    // } else {
    //     $_SESSION['status'] = "error";
    //     $_SESSION['message'] = "Server Down";
    //     header("Location: index.php");
    //     exit();
    // }
} 
?>
