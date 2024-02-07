<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $comment = test_input($_POST["userComment"]);

    $email = test_input($_POST["userEmail"]);


    if (empty($comment) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

        http_response_code(400); // Bad Request

        echo "Invalid input. Please fill in both the comment and email fields.";

        exit;

    }


    // Additional security measures

    $comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);


    $to = "email@email.com”;

    $subject = "New Comment from Website";

    $message = "User Email: $email\n\nComment:\n$comment";


    $headers = "From: $email" . "\r\n" .

               "Reply-To: $email" . "\r\n" .

               "X-Mailer: PHP/" . phpversion();


    if (mail($to, $subject, $message, $headers)) {

        echo "Comment submitted successfully!";

    } else {

        http_response_code(500); // Internal Server Error

        echo "Error sending email. Please try again later.";

    }

} else {

    http_response_code(405); // Method Not Allowed

    echo "Invalid request method.";

}


function test_input($data) {

    $data = trim($data);

    $data = stripslashes($data);

    return $data;

}

?>

