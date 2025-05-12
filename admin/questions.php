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
    $patient_query= "SELECT * FROM $table";
    return $query_run =mysqli_query($con,$patient_query);
}
if (isset($_SESSION['doctor_id'])) {
    $doctor_id = $_SESSION['doctor_id'];
    $access_query= "SELECT * FROM doctor WHERE id='$doctor_id'";
    $access_query_run = mysqli_query($con,$access_query);
    $patient_details = mysqli_fetch_assoc($access_query_run);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Questions</title>
</head>

<body>
    <header>
        <div class="content">
            <div class="logo">
                <h1>doctor's panel</h1>
            </div>
            <nav>
                <a href="../index.php"><span></span>Home</a>
                <a href="./profile.php"><span></span>profile</a>
                <a href="./logout.php" class="login_btn"><span></span>logout</a>
            </nav>
        </div>
    </header>
    <section class="main">
        <section class="sidebar">
            <div class="avatar">
                <img src="../patientpassport/<?php echo  $patient_details['image'];?> " alt="">
            </div>
            <div class="name_view">
                <p>Dr.<?php echo  $patient_details['first_name'];?> <?php echo  $patient_details['last_name'];?></p>
            </div>
            <hr>
            <div class="nav_links">
                <a href="./index.php">Dashboard</a>
                <a href="./questions.php" class="active">Questions</a>
                <a href="./appointments.php">Appointments</a>
                <a href="./generatepdf.php">prescribe medicine</a>
            </div>
        </section>
        <section class="data">
            <div class="title">
                <h2>All Asked Questions</h2>
            </div>
            <div class="grid">

             <?php
                    $products = GetQuestions('questions');
                    if (mysqli_num_rows($products)>0) 
                    {
                        foreach($products as $item)
                        {
                            ?> 
                                <div class="question_tab">
                                    <div class="questions">
                                        <fieldset class="appointments">
                                            <legend>Concern</legend>
                                            <p> "<?=$item['consern'];?>" </p>
                                        </fieldset>
                                        <fieldset class="appointments">
                                            <legend>Symptoms</legend>
                                            <p> <?=$item['symptoms'];?> </p>
                                        </fieldset>
                                    </div>
                                    <div class="button">
                                        
                                        <a class="view_button" href="./viewanswer.php?id=<?=$item['id'];?>">View answers</a>
                                        <a class="view_button" href="./answer.php?id=<?=$item['id'];?>">Add an answers</a>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    else {
                        echo "No Questions found.";
                    }
                ?>
                 
                
                 

            </div>



        </section>
    </section>


</body>

</html>