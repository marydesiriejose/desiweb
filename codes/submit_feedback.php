<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your database password
$dbname = "feedback_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $feedback = $conn->real_escape_string($_POST['message']); // Match 'message' from the form with 'feedback' in the database

    $sql = "INSERT INTO feedback_table (name, feedback) VALUES ('$name', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        // Display success message with JavaScript
        echo "
        <script>
            alert('Thank you! Your feedback has been received.');
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
