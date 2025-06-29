<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        // Set the recipient email address
        $to = 'ishalprishikachand@gmail.com'; // Your email

        // Set the email subject
        $email_subject = "New message from: $name";

        // Build the email content
        $email_body = "You have received a new message from $name.\n\n" .
            "Email: $email\n" .
            "Subject: $subject\n\n" .
            "Message:\n$message\n";

        // Set the email headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send the email
        if (mail($to, $email_subject, $email_body, $headers)) {
            header("Location: thankyou.html");
            exit(); // stop the script
        } else {
            echo "Message could not be sent.";
        }
    } else {
        echo "Invalid request.";
    }
?>
