<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Here, you can send the email or store the data into a database
    // Sending email example:
    $to = "sales@marconisoftware.com";  // Replace with your email
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    $email_subject = "Message from " . $name . " regarding: " . $subject;
    $email_message = "
    <html>
    <body>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Subject:</strong> $subject</p>
    <p><strong>Message:</strong><br>$message</p>
    </body>
    </html>
    ";

    // Send the email
    if (mail($to, $email_subject, $email_message, $headers)) {
        // Redirect to the homepage after successful submission
        header("Location: index.html");  // Replace with your homepage URL
        exit();
    } else {
        echo "Error in sending message.";
    }
} else {
    echo "Invalid request.";
}
?>