<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Eingaben aus Formular holen & absichern
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Zieladresse (deine Mailadresse)
    $to = "kontakt@nopa-webdesign.de";
    $subject = "Neue Nachricht von der Website";
    $body = "Name: $name\nE-Mail: $email\n\nNachricht:\n$message";

    // Header für Absender
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Mail verschicken
    if (mail($to, $subject, $body, $headers)) {
        echo "<p style='color:green;'>Nachricht erfolgreich gesendet! Vielen Dank, $name.</p>";
    } else {
        echo "<p style='color:red;'>Fehler beim Senden der Nachricht. Bitte versuchen Sie es später erneut.</p>";
    }
} else {
    echo "<p style='color:red;'>Ungültiger Aufruf.</p>";
}
?>
