<?php
// Start the session
session_start();
            


if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: ../LOGIN/signup.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'audition_calls';

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Get the user ID and company ID from the POST data
    $user_id = $_SESSION['user_id'];
    $id = $_GET['id'];

    // Insert data into the audition_queue table
    $sql = "INSERT INTO audition_queue (user_id, company_id) VALUES ($user_id, $id)";

    if (mysqli_query($conn, $sql)) {
        // Successful insertion
        // You can redirect the user to a success page or perform any other actions here
        header("Location: success.php"); // Redirect to a success page
        exit();
    } else {
        // Error occurred
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
