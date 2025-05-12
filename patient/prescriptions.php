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
if (!isset($_SESSION['patient_id'])) {
    header('Location: ../login/index.php');
}

if (isset($_SESSION['patient_id'])) {
    $patient_id = $_SESSION['patient_id'];
    $access_query= "SELECT * FROM patient WHERE id='$patient_id'";
    $access_query_run = mysqli_query($con,$access_query);
    $patient_details = mysqli_fetch_assoc($access_query_run);
}
 
function Getprescriptions($table){
    global $con;
    $patient_id = $_SESSION['patient_id'];
    $patient_query= "SELECT * FROM $table WHERE patient='$patient_id'";
    return $query_run =mysqli_query($con,$patient_query);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Health Dashboard</title>
</head>
<body>
    <header>
        <div class="content">
            <div class="logo">
                <h1>patient's</h1>
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
                        <!-- <?php echo  $_SESSION['patient_id']?> -->
                        <a href="./index.php" class="button_link ">
                            <div class="navs ">
                                <p>Dashboard</p>
                            </div>
                        </a>
                        <a href="./appointments.php" class="button_link  ">
                            <div class="navs">
                                <p>Appointment</p>
                            </div>
                        </a>
                        <a href="./prescriptions.php" class="button_link  active">
                            <div class="navs">
                                <p>See prescriptions</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid">
                <?php
                    $products = Getprescriptions('prescriptions');
                    if (mysqli_num_rows($products)>0) 
                    {
                        foreach($products as $item)
                        {
                            ?> 
                                <a target="blank" href="../prescriptions/<?=$item['doc'];?>" class="prescription_pdf_link"><?=$item['doc'];?></a>
                            <?php
                        }
                    }
                    else {
                        echo "No prescriptions found.";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>