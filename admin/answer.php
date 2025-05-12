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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.css">
    <title>Document</title>
</head>
<body>
    <form action="./submit.php" method="post">
        <h1 align=center>Answer the Question</h1>
        <hr>
        <div class="details">
            <span>Question:</span>
            <p class="question_para"> <?php echo  $question_details['consern'];?> </p>
            <span>Answer:</span>
        </div>
                <input type="hidden" name="question_id" value="<?php echo $question_id ?>">
        <input type="hidden" name="patient_id" value="<?php echo  $question_details['patient'];?> ">
        <textarea required name="responseText" id="" cols="20" rows="10" placeholder="type here"></textarea>
        <button type="submit" class="submit_btn" name="submit_answer">Submit</button>
    </form>
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