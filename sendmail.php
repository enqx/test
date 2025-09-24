<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    $to = "kontakt@nopa-webdesign.de"; // Deine Mailadresse
    $subject = "Neue Nachricht von der Website";
    $body = "Name: $name\nE-Mail: $email\n\nNachricht:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Vielen Dank, $name! Ihre Nachricht wurde erfolgreich gesendet.";
    } else {
        http_response_code(500);
        echo "Fehler beim Senden. Bitte versuchen Sie es später erneut.";
    }
} else {
    http_response_code(405);
    echo "Ungültige Anfrage.";
}
