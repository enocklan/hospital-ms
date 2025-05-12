<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Healthcare App</title>
</head>

<body>
    
    <form action="./submit.php" method="post" id="appointmentForm">
        <h1>Healthcare Appointment Scheduler</h1>
        <hr>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="fullname" required placeholder="type here">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="type here">

        <label for="number">Your Phone Number:</label>
        <input type="number" id="number" name="phone_number" required placeholder="type here">
        <div class="date_time">
            <div class="flex_one">
                <label for="date">Preferred Date:</label>
                <input type="date" id="date" name="date" required placeholder="type here">
            </div>
            <div class="flex_one">
                <label for="time">Preferred time:</label>
                <input type="time" id="time" name="time" required placeholder="type here">
            </div>

        </div>
        <div class="submit">
            <button type="submit" name="book_appointent">Submit Appointment</button>
        </div>
    </form>

    <div id="response"></div>


    <script src="js/script.js"></script>
</body>

</html>