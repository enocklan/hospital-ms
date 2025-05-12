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
function GetQuestions($table){
    global $con;
    $patient_id = $_SESSION['patient_id'];
    $patient_query= "SELECT * FROM $table WHERE patient_id='$patient_id' " ;
    return $query_run =mysqli_query($con,$patient_query);
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>appointment</title>
</head>

<body>
    <header>
        <div class="content">
            <div class="logo">
                <h1>patient's appointments</h1>
            </div>
            <nav>
                <a href="../index.php"><span></span>Home</a>
                <a href="../appiontment/index.php"><span></span>Book Appointment</a>
                <a href="../consoltation/index.php"><span></span>Ask a question</a>
                <a href="./logout.php" class="login_btn"><span></span>logout</a>
            </nav>
        </div>
    </header>
    <div class="hero">
        <div class="main">
            <div class="profile_data appointments">
                <div class="column ">
                    <div class="navigation_tad">
                        <a href="./index.php" class="button_link ">
                            <div class="navs ">
                                <p>Dashboard</p>
                            </div>
                        </a>
                        <a href="./appointments.php" class="button_link active">
                            <div class="navs">
                                <p>Appointment</p>
                            </div>
                        </a>
                        <a href="./prescriptions.php" class="button_link  ">
                            <div class="navs">
                                <p>See prescriptions</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid">
                <?php
                    $products = GetQuestions('appointment');
                    if (mysqli_num_rows($products)>0) 
                    {
                        foreach($products as $item)
                        {
                            ?> 
                                <div class="question_tab">
                                    <fieldset>
                                        <legend>APPOINTMENT DETAILS</legend>
                                        <!-- <hr> -->
                                        <ul>
                                            <li><span>Full Name</span><?=$item['fullname'];?></li>
                                            <li><span>Phone number</span><?=$item['phone'];?></li>
                                            <li><span>Email Adress</span><?=$item['email'];?></li>
                                            <li><span>Appointments date</span><?=$item['date'];?></li>
                                            <li><span>Appointments time</span><?=$item['time'];?></li>
                                        </ul>
                                    </fieldset>
                                </div>
                            <?php
                        }
                    }
                    else {
                        echo "No Appointments found.";
                    }
                ?>

            </div>
        </div>
    </div>
</body>

</html>