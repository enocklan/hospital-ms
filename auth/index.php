<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="./login.php" method="post">
        <h1 align=center>login</h1>
        <hr>
        <label for="role">You role</label>
        <select name="role" id="role" required>
            <option value="">--select your role--</option>
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
        </select>
        <label for="email">Email:</label>
        <input type="email" placeholder="your email address" name="email" id="email">
        <label for="password">password:</label>
        <input type="password" placeholder="your password address" name="password" id="password">
        <button class="submit_btn" name="loginbtn" type="submit">login</button>

        <hr>
        <label for="">Don't have an account ?then create an account for </label><br>
        <div class="flex">
            <a href="./doctor.php">Create  a doctor's account</a>
            <p>or</p>
            <a href="./patient.php">Create a Patient's account</a>
        </div>


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