<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Health Consultation Form</title>
</head>

<body>
    <form id="consultationForm" action="./submit.php" method="post">
        <h2>Health Consultation Form</h2>
        <p class="additional" align="center">Write your consern down below and get answers</p>
        <hr>
        <!-- Health Information -->
        <div class="input-group">
            <label for="level">Select the scale in which you fear your consern:</label>
            <select name="level" id="level">
                <option value="" selected>--Worry Scale Level-- </option>
                <option value="Not that scared">Level 1 (Not that scared) </option>
                <option value="Medium scared">Level 2 (Medium scared) </option>
                <option value="very scared">Level 3 (very scared) </option>
            </select>
        </div>
        <div class="input-group">
            <label for="comments">Symptoms your facing:</label>
            <textarea id="comments" placeholder="Type here the Symptoms you are facing " name="symptoms" rows="4"></textarea>
        <div class="input-group">
            <label for="healthConcerns">Your Major Health Concerns about your Symptoms/The Question:</label>
            <textarea id="healthConcerns" placeholder="Type here your Major health consern about the symptoms /the Question " name="healthConcerns" rows="4" required></textarea>
        </div>

        <!-- Additional Comments/Questions -->
        </div>
        <div class="submit">
            <button name="post_conserns" type="submit">Submit</button>
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

    <script src="js/script.js"></script>
</body>

</html>