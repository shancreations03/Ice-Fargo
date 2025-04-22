<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $message = htmlspecialchars(trim($_POST["message"]));
  
  if ($name && $email && $message) {
    $to = "yourcompany@email.com";
    $subject = "New Inquiry from ICE FARGO Website";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";
    mail($to, $subject, $body, $headers);
    echo "Message sent successfully.";
  } else {
    echo "Please fill all fields correctly.";
  }
} else {
  echo "Invalid request.";
}
?>