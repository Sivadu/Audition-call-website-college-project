<?php
session_start();

// Check if the user is logged in as an admin (you can implement your own authentication logic here)
if (!isset($_SESSION["adminname"])) {
    header("Location: login.php"); // Redirect to the login page or appropriate page
    exit();
}

// Establish a database connection (you may reuse your existing connection code)
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "audition_calls";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET["id"])) {
    // Get the 'id' value from the URL
    $id = $_GET["id"];

    // Update the status to 'approved' for the specified audition call
    $query = "UPDATE auditions SET status = 'approved' WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        // If the update was successful, redirect back to the page where you list pending auditions
        header("Location: approve.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "No 'id' parameter provided in the URL.";
}

// Close the database connection
mysqli_close($conn);
?>
