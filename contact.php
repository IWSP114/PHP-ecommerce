<?php
// Simple form handling example (you can expand this with validation and email sending)
$messageSent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Normally, validate inputs and send email or save to database here
    // For demo, just simulate success
    $messageSent = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Contact Us - shopkeeper</title>
    <link rel="stylesheet" href="./styles/contact.css" />
</head>
<body>
    <?php include 'header.php'; // Your site header ?>

    <main class="contact-page">
        <h1>Contact Us</h1>

        <?php if ($messageSent): ?>
            <div class="success-message">
                <p>Thank you for reaching out! We will get back to you shortly.</p>
            </div>
        <?php else: ?>
            <div class="contact-container container">
                <form class="contact-form" action="contact.php" method="post">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>

                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>

                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>

                    <button type="submit">Send Message</button>
                </form>

                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    <p><strong>Address:</strong> 123 Market Street, Cityville, Country</p>
                    <p><strong>Phone:</strong> +1 234-567-8900</p>
                    <p><strong>Email:</strong> support@shopkeeper.com</p>
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; // Your site footer ?>

    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</body>
</html>