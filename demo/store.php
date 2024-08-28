<?php
session_start(); // Start the session
$companyEmail = $_SESSION['user_email']; // Retrieve the company's email from the session

$servername = "localhost";
$username = "root";
$password = "";
$database = "audition_calls";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve and sanitize form data
$projectTitle = mysqli_real_escape_string($conn, $_POST['project_title']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$auditionDate = mysqli_real_escape_string($conn, $_POST['audition_date']);
$auditionLocation = mysqli_real_escape_string($conn, $_POST['audition_location']);
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

// Move uploaded image to desired location
$target_dir = "uploads/";
$target_file = $target_dir . basename($image);
move_uploaded_file($image_tmp, $target_file);

// Use prepared statements to update the audition call
$sql = "UPDATE auditions 
        SET project_title = ?, category = ?, description = ?,
            audition_date = ?, audition_location = ?, image = ?
        WHERE contact_email = ?";

$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssssss", $projectTitle, $category, $description, $auditionDate, $auditionLocation, $target_file, $companyEmail);
    if (mysqli_stmt_execute($stmt)) {
        header('location: prodisplay.php');
        echo "Audition call updated successfully.";
    } else {
        echo "Error updating audition call: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error in the prepared statement: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
