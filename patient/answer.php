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
$question_id = mysqli_real_escape_string($con, $_GET['id']);
$access_query= "SELECT * FROM questions WHERE id='$question_id'";
$access_query_run = mysqli_query($con,$access_query);
$question_details = mysqli_fetch_assoc($access_query_run);


function GetAnswers($table){
    global $con;
    $patient_id = $_SESSION['patient_id'];
    $question_id = mysqli_real_escape_string($con, $_GET['id']);
    $answer_query= "SELECT * FROM $table  WHERE question='$question_id' AND patient_id='$patient_id'";
    return $query_run =mysqli_query($con,$answer_query);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="answer.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="content">
            <div class="logo">
                <h1>patient's</h1>
            </div>
            <nav>
                <a href=""><span></span>Home</a>
                <a href="" class="login_btn"><span></span>logout</a>
            </nav>
        </div>
    </header>
    <div class="hero">
        <div class="answers">
            <div class="question">
                <span>question</span>
                <hr>
                <p><?php echo  $question_details['consern'];?>.</p>
            </div>
            <div class="doctor_answers">
                <?php
                    $products = GetAnswers('answers');
                    if (mysqli_num_rows($products)>0) 
                    {
                        foreach($products as $item)
                        {
                            ?> 
                                <fieldset>
                                    <legend>ANSWER ID :  #<?=$item['id'];?>/2024</legend>
                                    <p><?=$item['Answer'];?>.</p>
                                </fieldset>
                            <?php
                        }
                    }
                    else {
                        echo "No Answers found.";
                    }
                ?>
                 
            </div>
        </div>
    </div>
</body>
</html>