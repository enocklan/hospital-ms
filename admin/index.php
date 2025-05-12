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
if (!isset($_SESSION['doctor_id'])) {
    header('Location: ../auth/index.php');
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
    <title>Dashboard</title>
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
                <a href="./index.php" class="active">Dashboard</a>
                <a href="./questions.php">Questions</a>
                <a href="./appointments.php">Appointments</a>
                <a href="./generatepdf.php">prescribe medicine</a>
            </div>
        </section>
        <section class="data">
            <div class="stats">
                <fieldset>
                    <legend>total users</legend>
                    <p><?php
                        $count_query = "SELECT COUNT(*) AS question_count FROM 	patient ";
                        $result = mysqli_query($con, $count_query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);

                            $question_count = $row['question_count'];
 
                            echo "$question_count";
                        } else {
 
                            echo "Error: " . mysqli_error($con);
                        }

                    ?></p>
                </fieldset>
                <fieldset>
                    <legend>Total Questions</legend>
                    <p><?php
                    
                        $count_query = "SELECT COUNT(*) AS question_count FROM questions ";

                        // Execute the query
                        $result = mysqli_query($con, $count_query);

                        // Check if query execution was successful
                        if ($result) {
                            // Fetch the result row as an associative array
                            $row = mysqli_fetch_assoc($result);
 
                            $question_count = $row['question_count'];
 
                            echo "$question_count";
                        } else {
  
                            echo "Error: " . mysqli_error($con);
                        }

                        
                    ?></p>
                </fieldset>
                <fieldset>
                    <legend>Total Appointments</legend>
                    <p><?php
                    
                        $count_query = "SELECT COUNT(*) AS question_count FROM appointment ";
 
                        $result = mysqli_query($con, $count_query);
 
                        if ($result) {
 
                            $row = mysqli_fetch_assoc($result);
                            
                            // Extract the count value from the result
                            $question_count = $row['question_count'];
  
                            echo "$question_count";
                        } else {
 
                            echo "Error: " . mysqli_error($con);
                        }

                        
                    ?></p>
                </fieldset>
            </div>
            <div class="chart">
                <h3>Asked Questions per month</h3>
                <hr>
                <canvas id="lineChart" width="600px" height="300px"></canvas>
            </div>


        </section>
    </section>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
      // Get the canvas element
        var ctx = document.getElementById('lineChart').getContext('2d');

        // Define the data for the chart
        var data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'september', 'october', 'November', 'December'],
        datasets: [{
            label: 'Asked questions',
            backgroundColor: '#fff', // Background color for the area under the line
            borderColor: '#ff9900', // Border color for the line
            borderWidth: 2,
            data: [100, 250, 400, 350, 400, 300, 550,680,700,540,800,1000] // Data points for the line chart
        }]
        };

        // Configure the options for the chart
        var options = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
            ticks: {
                beginAtZero: true
            }
            }]
        }
        };

        // Create the line chart
        var lineChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
        });

    });

    </script>
</body>
</html>