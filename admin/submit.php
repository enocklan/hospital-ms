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

if(isset($_POST['submit_answer'])){
    $question_id = $_POST["question_id"];
    $responseText = $_POST["responseText"];
    $patient_id = $_POST["patient_id"];

    $sql = "INSERT INTO answers (question, Answer,patient_id)
            VALUES ('$question_id', '$responseText','$patient_id')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Answers submitted successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Server Down";
        header("Location: answer.php");
        exit();
    }
} 
?>
