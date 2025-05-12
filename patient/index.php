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
    header('Location: ../auth/index.php');
}

if (isset($_SESSION['patient_id'])) {
    $patient_id = $_SESSION['patient_id'];
    $access_query= "SELECT * FROM patient WHERE id='$patient_id'";
    $access_query_run = mysqli_query($con,$access_query);
    $patient_details = mysqli_fetch_assoc($access_query_run);
}
 
function GetQuestions($table){
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
            <div class="profile_data">
                <div class="image_name">
                    <div class="image">
                        <img src="../patientpassport/<?php echo  $patient_details['image'];?>" alt="">
                    </div>
                    <!-- <div class="name">
                        <p>Albaert Mbago</p>
                    </div> -->
                </div>
                <div class="column">
                    <div class="top">
                        <ul class="other_data">
                            <li class="name"><?php echo  $patient_details['first_name'];?> <?php echo  $patient_details['last_name'];?></li>
                            <li><span>Phone number</span>0<?php echo  $patient_details['phone_number'];?></li>
                            <li><span>Email Adress</span><?php echo  $patient_details['email'];?></li>
                            <li><span>Date of birth</span><?php echo  $patient_details['DOB'];?></li>
                            <li><span>Sex</span><?php echo  $patient_details['gender'];?></li> 
                        </ul>
                        <div class="stats">
                            <div class="tabs">
                                <p><sup>total</sup>
                                <?php
                                    // Escape the input to prevent SQL injection
                                    $patient_totals = $_SESSION['patient_id'];

                                    // Construct the SQL query to count questions with the same ID
                                    $count_query = "SELECT COUNT(*) AS question_count FROM questions WHERE patient = '$patient_totals'";

                                    // Execute the query
                                    $result = mysqli_query($con, $count_query);

                                    // Check if query execution was successful
                                    if ($result) {
                                        // Fetch the result row as an associative array
                                        $row = mysqli_fetch_assoc($result);
                                        
                                        // Extract the count value from the result
                                        $question_count = $row['question_count'];
                                        
                                        // Output the count of questions with the specified ID
                                        echo "$question_count";
                                    } else {
                                        // If query execution failed, handle the error
                                        echo "Error: " . mysqli_error($con);
                                    }

                                    // Close connection
                                    // mysqli_close($con);
                                ?>
                            </p>
                            </div>
                            <div class="tabs">
                                <p><sup>total</sup>
                                    <?php
                    // Escape the input to prevent SQL injection
                                        $patient_totals = $_SESSION['patient_id'];

                                        // Construct the SQL query to count questions with the same ID
                                        $count_query = "SELECT COUNT(*) AS question_count FROM answers WHERE patient_id = '$patient_totals'";

                                        // Execute the query
                                        $result = mysqli_query($con, $count_query);

                                        // Check if query execution was successful
                                        if ($result) {
                                            // Fetch the result row as an associative array
                                            $row = mysqli_fetch_assoc($result);
                                            
                                            // Extract the count value from the result
                                            $question_count = $row['question_count'];
                                            
                                            // Output the count of questions with the specified ID
                                            echo "$question_count";
                                        } else {
                                            // If query execution failed, handle the error
                                            echo "Error: " . mysqli_error($con);
                                        }

                                        // Close connection
                                        // mysqli_close($con);
                                    ?>
                                </p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="navigation_tad">
                        <a href="./index.php" class="button_link active">
                            <div class="navs ">
                                <p>Dashboard</p>
                            </div>
                        </a>
                        <a href="./appointments.php" class="button_link">
                            <div class="navs">
                                <p>Appointment</p>
                            </div>
                        </a>
                        <a href="./prescriptions.php" class="button_link">
                            <div class="navs">
                                <p>See prescriptions</p>
                            </div>
                        </a>
                    </div>
                </div>
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
                                    <fieldset>
                                        <legend>Concern</legend>
                                        <p>"<?=$item['consern'];?>"</p>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Symptoms</legend>
                                        <p>"<?=$item['symptoms'];?>"</p>
                                    </fieldset>
                                </div>
                                <div class="button">
                                    <a class="view_button" href="./answer.php?id=<?=$item['id'];?>">View answers</a>
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
        </div>
    </div>
     <script>
        // Check if the session message is set
        <?php if(isset($_SESSION['message'])): ?>
            // Display SweetAlert with session message
            Swal.fire({
                title: 'Tibika health care',
                text: '<?php echo $_SESSION['message']; ?>',
                icon: '<?php echo $_SESSION['status']; ?>',
                confirmButtonText: 'OK'
            });
            // Clear the session message after displaying it
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
    </script>
</body>
</html>