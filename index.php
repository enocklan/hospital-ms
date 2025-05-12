<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Healthcare App</title>
</head>

<body>

    <header>
        <div class="content">
            <div class="logo">
                <h1><span>Tibika</span> healthcare</h1>
            </div>
            <nav>
                <a href="">About Us</a>
                <a href="#plan">Plans</a>
                <a class="login" href="./auth/index.php">LOGIN</a>
            </nav>
        </div>
    </header>

    <section class="types_image" id="types">
        <div class="image">
            <h1>Tibika Healthcare App</h1>
            <p class="care">
                We care for you
            </p>
            <p class="expln">
                We are resolute in our mission to bridge the gap and reduce health disparities between health seekers and health
                providers, by providing a comprehensive and streamlined one-stop solution for remote healthcare.
            </p>
        </div>
        <div class="care_T_container">
            <h2>Types of Healthcare</h2>
            <hr>
            <p>Explore different healthcare services we offer to cater to your needs.</p>

            <div class="healthcare-type">
                <h3>Primary Care</h3>
                <p>Comprehensive healthcare for routine check-ups and common illnesses.</p>
            </div>

            <div class="healthcare-type">
                <h3>Specialized Care</h3>
                <p>Specialized services for specific medical conditions and treatments.</p>
            </div>

            <div class="healthcare-type">
                <h3>Mental Health</h3>
                <p>Counseling and therapy services for mental health and well-being.</p>
            </div>
        </div>
    </section>

    <section class="questions_appointment">
        <div class="tabs">
            <img src="./images/ask.svg" alt="">
            <div class="detail">
                <p class="title_para">
                    Have Questions?
                </p>
                <hr>
                <p class="expla">Feel free to ask our healthcare professionals. We're here to help!</p>
                <a class="green-button" href="./consoltation/index.php">Ask a Question</a>
            </div>
        </div>
        <div class="tabs">
            <img src="./images/book.svg" alt="">
            <div class="detail">
                <p class="title_para">
                    Book an Appointment
                </p>
                <hr>
                <p class="expla">Schedule an appointment with our experts for personalized healthcare.</p>
                <a class="green-button" href="./appiontment/index.php">Book Now</a>
            </div>
        </div>
    </section>
    <div class="title">
        <p>Choose your Plan</p>
        <h6>Unsure whether Tibika healthcace is the right choice for you? Relax! Sign up Today to get our free Tutorial</h6>
    </div>
    <section id="plan" class="health_plan">
        <div class="plan">
            <img src="./images/free.svg" alt="">
            <h2>Free Plan</h2>
            <hr class="under">
            <div class="price">
                <p class="prev"><sup>Ksh</sup>200 <sub>/year</sub></p>
                <p class="current"><sup>Ksh</sup>0 <sub>/year</sub></p>
            </div>
            <p class="package">
                Plan's package
            </p>
            <ul>
                <li><span></span>Basic consultation for free</li>
                <li><span></span>24/7 Email Support</li>
                <li><span></span>Access to general health articles</li>
            </ul>
            <a class="green-button_main" href="">Buy Package</a>
        </div>
        <div class="plan">
            <img src="./images/premium.svg" alt="">
            <h2>Premium Plan</h2>
            <hr class="under">
            <div class="price">
                <p class="prev"><sup>Ksh</sup>700 <sub>/year</sub></p>
                <p class="current"><sup>Ksh</sup>500 <sub>/year</sub></p>
            </div>
            <p class="package">
                Plan's package
            </p>
            <ul>
                <li><span></span>Unlimited consultations</li>
                <li><span></span>24/7 Email Support</li>
                <li><span></span>Access to general health articles</li>
            </ul>
            <a class="green-button_main" href="">Buy Package</a>
        </div>
        <div class="plan">
            <img src="./images/family.svg" alt="">
            <h2>Family Plan</h2>
            <hr class="under">
            <div class="price">
                <p class="prev"><sup>Ksh</sup>200 <sub>/year</sub></p>
                <p class="current"><sup>Ksh</sup>1000 <sub>/year</sub></p>
            </div>
            <p class="package">
                Plan's package
            </p>
            <ul>
                <li><span></span>Unlimited consultation</li>
                <li><span></span>24/7 Email Support</li>
                <li><span></span>Priority scheduling</li>
                <li><span></span>Access to premium health articles</li>
            </ul>
            <a class="green-button_main" href="">Buy Package</a>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Online Health Consultation</p>
    </footer>
</body>

</html>