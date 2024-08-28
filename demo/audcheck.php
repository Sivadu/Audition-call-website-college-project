<?php
// Start the session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "audition_calls";

// Create a connection to the database
$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($connection, "utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contact_email = mysqli_real_escape_string($connection, $_POST["contact_email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM auditions WHERE contact_email = '$contact_email'";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row["password"];

            if (password_verify($password, $stored_password)) {
                // Password is correct, set session variables for authentication
                $_SESSION['user_email'] = $contact_email;
                $_SESSION['company_name'] = $row['producer_name'];
                $_SESSION['compname'] = $row['producer_name'];
                header("Location: prodisplay.php");
                exit();
            } else {
                echo "Login failed. Please check your email and password.";
            }
        } else {
            echo "User not found with the provided email.";
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}

?>
