<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form class="register" action="./auth.php" method="post" enctype="multipart/form-data">
        <h1 align=center>create Patient's account</h1>
        <hr>
        <div class="rows">
            <label for="firstname">Passport</label>
            <input type="file" id="image" name="Passport">
        </div>
        <div class="flexinputs">
            <div class="rows">
                <label for="firstname">First Name as per id</label>
                <input type="text" id="firstname" placeholder="type here" name="first_name">
            </div>
            <div class="rows">
                <label for="lastname">Last Name as per id</label>
                <input type="text" id="lastname" placeholder="type here" name="last_name">
            </div>
        </div>
        <div class="flexinputs">
            <div class="rows">
                <label for="email">Your personal email</label>
                <input type="email" id="email" placeholder="type here" name="email">
            </div>
            <div class="rows">
                <label for="phoneNumber">Your personal phone number</label>
                <input type="number" id="phoneNumber" placeholder="type here" name="phoneNumber">
            </div>
        </div>
        <div class="flexinputs">
            <div class="rows">
                <label for="Gender">Gender</label>
                <select name="Gender" id="Gender">
                    <option value="">--select your Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    
                </select>
            </div>
            <div class="rows">
                <label for="date">date of birth</label>
                <input type="date" id="date" placeholder="type here" name="date">
            </div>
        </div>
        <div class="flexinputs">
            <div class="rows">
                <label for="password">Account password</label>
                <input type="password" id="password" placeholder="type here" name="password">
            </div>
            <div class="rows">
                <label for="Rpassword">Retype the Account password</label>
                <input type="password" id="Rpassword" placeholder="type here" name="Rpassword">
            </div>
        </div>

        <button class="submit_btn" type="submit" name="patient_create">create an account </button> <br>
        <div class="center">
            <label align=center for="">i have an account ?then <a href="./index.html">login</a></label><br>
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