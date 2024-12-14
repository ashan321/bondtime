<?php

require "SMTP.php"; // Include your SMTP library
require "PHPMailer.php"; // Include PHPMailer
require "Exception.php"; // Include PHPMailer Exception handling

use PHPMailer\PHPMailer\PHPMailer;

// Validate incoming data
$fname = isset($_POST['fname']) ? $_POST['fname'] : ''; // Get the first name
$lname = isset($_POST['lname']) ? $_POST['lname'] : ''; // Get the last name
$email = isset($_POST['email']) ? $_POST['email'] : ''; // Get the email
$job = isset($_POST['job']) ? $_POST['job'] : ''; // Get the job
$contact = isset($_POST['contact']) ? $_POST['contact'] : ''; // Get the contact number
$parentType = isset($_POST['parentType']) ? $_POST['parentType'] : ''; // Get the parent type

// Simple validation for required fields
if (empty($email)) {
    echo "Invalid email address.";
    exit;
}

if (empty($fname) || empty($lname) || empty($contact) || empty($parentType)) {
    echo "Please fill in all required fields.";
    exit;
}

$mail = new PHPMailer;

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  // Use Gmail's SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'hello.orterclothing@gmail.com'; // Replace with your Gmail address
$mail->Password = 'ukvrfaxiuyesrsax'; // Replace with your Gmail app-specific password (if 2FA is enabled)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL encryption
$mail->Port = 465; // Gmail uses port 465 for SSL encryption

// Email content setup
$mail->setFrom('hello.orterclothing@gmail.com', 'Client Contact Message');
$mail->addReplyTo('hello.orterclothing@gmail.com', 'Client Contact Message');
$mail->addAddress('ashanhimantha321@gmail.com');  // Replace with the recipient's email
$mail->isHTML(true);
$mail->Subject = 'Support Center';

// Prepare the body content
$bodyContent = "<b>Name</b>: ".$fname." ".$lname."<br><b>Email</b>: $email<br><b>Job</b>: $job<br><b>Contact</b>: $contact<br><b>Parent Type</b>: $parentType";
$mail->Body = $bodyContent;

// Send the email and handle errors
if (!$mail->send()) {
    echo 'Something Went Wrong!';
} else {
    echo 'Success';
}
?>
