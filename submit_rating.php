<?php
include 'C:\xampp\htdocs\Isla de Cuyo Travel Ease\HTML\user\inc\Include.php'; // your DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
    $rating = (float) $_POST['rating'];

    if ($rating > 0 && $rating <= 5) {
        $stmt = $conn->prepare("INSERT INTO user_ratings (rating) VALUES (?)");
        $stmt->bind_param("d", $rating);

        if ($stmt->execute()) {
            echo "OK";  // simple confirmation
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Invalid rating value";
    }
    exit();
}
?>