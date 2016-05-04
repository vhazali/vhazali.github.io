<?php
// Check for empty fields
if(empty($_POST['name'])    ||
   empty($_POST['email'])   ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
  echo "No arguments Provided!";
  return false;
}
  
$name = $_POST['name'];
$email_address = $_POST['email'];
if(!empty($_POST['phone'])) {
  $phone = $_POST['phone'];
} else {
  $phone = 'no number provided';
}
$message = $_POST['message'];
  
// Create the email and send the message
$to = 'victorhazali@gmail.com';
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n";
$headers .= "Reply-To: $email_address"; 
mail($to,$email_subject,$email_body,$headers);
return true;      
?>